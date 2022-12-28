<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Http\Services\UploadService;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;
    protected $uploadService;
    protected $mailService;
    protected $notificationService;

    public function __construct(UserRepository $userRepository,
                                UploadService $uploadService,
                                MailService $mailService,
                                NotificationService $notificationService)
    {
        $this->userRepository = $userRepository;
        $this->uploadService = $uploadService;
        $this->mailService = $mailService;
        $this->notificationService = $notificationService;
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function create_admin($request)
    {
        $data = [
            Users::FULL_NAME => $request->full_name,
            Users::EMAIL => $request->email,
            Users::PASSWORD => Hash::make($request->password),
            Users::STATUS => Users::ACTIVE,
            Users::TYPE => Users::EMPLOYEE,
            Users::IS_ADMIN => Users::ADMIN
        ];
        return $this->userRepository->create($data);
    }

    public function create_employee($request)
    {
        if ($request->hasFile('file')) {
            $avatar = $this->uploadService->upload($request);
        }
        $data = [
            Users::FULL_NAME => $request->full_name,
            Users::EMAIL => $request->email,
            Users::PASSWORD => Hash::make($request->password),
            Users::STATUS => Users::ACTIVE,
            Users::TYPE => Users::EMPLOYEE,
            Users::AVATAR => $avatar ?? "",
            Users::BANK_NAME => "",
            Users::ACCOUNT_NAME => "",
            Users::ACCOUNT_NUMBER => "",
            Users::CREATED_BY => session()->get('employee')['email'] ?? "",
            Users::CREATED_AT => date('Y-m-d H:i:s', time()),
        ];
        $user = $this->userRepository->create($data);
        return $user;
    }

    public function customer_register($request)
    {
        $otp = rand(100000, 999999);
        $data = [
            Users::FULL_NAME => $request->full_name,
            Users::EMAIL => $request->email,
            Users::PASSWORD => Hash::make($request->password),
            Users::STATUS => Users::NEW,
            Users::TYPE => Users::INVESTOR,
            Users::BANK_NAME => null,
            Users::ACCOUNT_NAME => null,
            Users::ACCOUNT_NUMBER => null,
            Users::OTP => $otp,
            Users::EXPIRE_OTP => Carbon::now()->addMinutes(5)->unix()
        ];
        $user = $this->userRepository->findOne([Users::EMAIL => $request->email]);
        if ($user) {
            if ($user['status'] == Users::NEW) {
                $user_new = $this->userRepository->update($user['id'], $data);
            } else {
                $user_new = $this->userRepository->create($data);
            }
        } else {
            $user_new = $this->userRepository->create($data);
        }

        return $user_new;
    }

    public function validate_login_social($request)
    {
        $message = [];

        if (empty($request->type)) {
            $message[] = __('message.repassword_not_null');
            return $message;
        }

        if (!in_array($request->type, [Users::FACEBOOK, Users::GOOGLE])) {
            $message[] = __('message.type_social_illegal');
            return $message;
        }

        if (empty($request->provider_id)) {
            $message[] = __('message.account_social_not_null');
            return $message;
        } else {
            if ($request->type == 'facebook') {
                $user = $this->userRepository->findOne([Users::ID_FACEBOOK => $request->provider_id]);
            } elseif ($request->type == 'google') {
                $user = $this->userRepository->findOne([Users::ID_GOOGLE => $request->provider_id]);
            }

            if ($user && $user['status'] == Users::BLOCK) {
                $message[] = __('message.account_block');
                return $message;
            }
        }

        return $message;
    }

    public function login_social($request)
    {
        if ($request->type == 'facebook') {
            $user = $this->userRepository->findOne([Users::ID_FACEBOOK => $request->provider_id]);
        } elseif ($request->type == 'google') {
            $user = $this->userRepository->findOne([Users::ID_GOOGLE => $request->provider_id]);
        }
        $data = [];
        if ($user) {
            if ($user['status'] == Users::ACTIVE) {
                $data = [
                    'id' => $user['id'],
                    'time' => time(),
                    'string' => uniqid()
                ];
                $token = Authorization::generateToken($data);
                $this->userRepository->update($user['id'], [Users::TOKEN_WEB => $token, Users::LAST_LOGIN => Carbon::now()]);
                $data['token'] = $token;
            } else {
                $data['id'] = $user['id'];
            }
        } else {
            $data = [
                Users::STATUS => Users::NEW,
                Users::TYPE => Users::INVESTOR,
            ];
            if ($request->type == Users::GOOGLE) {
                $data['id_google'] = $request->provider_id;
            } elseif ($request->type == Users::FACEBOOK) {
                $data['id_facebook'] = $request->provider_id;
            }
            $user_new = $this->userRepository->create($data);
            $data['id'] = $user_new['id'];
        }
        return $data;
    }

    public function check_login($request, $type)
    {
        $data = [];
        $user = $this->userRepository->findOne([
            Users::EMAIL => $request->email,
            Users::TYPE => $type
        ]);
        if (!($user)) {
            $data['message'] = __('auth.email_unregistered');
        } else {
            if ($user['status'] == Users::NEW) {
                $data['message'] = __('auth.email_not_activated');
            } elseif ($user['status'] == Users::BLOCK) {
                $data['message'] = __('auth.email_temporarily_locked');
            } elseif ($user['status'] == Users::ACTIVE) {
                if (!Hash::check($request->password, $user['password'])) {
                    $data['message'] = __('auth.password_incorrect');
                } else {
                    $data['user'] = $user;
                }
            }
        }
        $remember_me = $request->remember;
        if ($remember_me == "on") {
            $minutes = 3600 * 30;
            $hash = $user->id . $user->email . $user->password;
            $cookieValue = Hash::make($hash);
            cookie('admin_login_remember', $cookieValue, $minutes);
            DB::table('users')
                ->where('id', $user->id)
                ->update(['token_web' => $cookieValue]);
        }
        return $data;
    }

    public function login($user)
    {
        $data = [
            'id' => $user['id'],
            'time' => time(),
            'string' => uniqid()
        ];
        $token = Authorization::generateToken($data);
        $user = $this->userRepository->update($user['id'], [Users::TOKEN_WEB => $token, Users::LAST_LOGIN => Carbon::now()]);
        return $user;
    }

    public function update_profile($request, $id)
    {
        $user = $this->userRepository->find($id);
        if ($request->hasFile('file')) {
            $avatar = $this->uploadService->upload($request);
        }
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PHONE => $request->phone_number ?? "",
            Users::GENDER => $request->gender ?? "",
            Users::BIRTHDAY => $request->birthday ?? "",
            Users::BANK_NAME => $request->bank_name ?? "",
            Users::ACCOUNT_NUMBER => $request->account_number ?? "",
            Users::ACCOUNT_NAME => $request->account_name ?? "",
            Users::CITY => $request->province ?? "",
            Users::DISTRICT => $request->district ?? "",
            Users::WARD => $request->ward ?? "",
            Users::ADDRESS => $request->specific_address ?? "",
            Users::AVATAR => $avatar ?? $user['avatar'],
            Users::IDENTITY => $request->identity ?? "",
            Users::DATE_IDENTITY => $request->date_identity ?? "",
            Users::ADDRESS_IDENTITY => $request->address_identity ?? "",
        ];
        $user = $this->userRepository->update($id, $data);
        return $user;
    }

    public function get_all_employee($request)
    {
        $search = $request->all();
        $employees = $this->userRepository->get_all_employee($search);
        if ($employees) {
            return $employees;
        }
        return false;
    }


    public function update_employee($request, $id)
    {
        if ($request->avatar) {
            $avatar = $this->uploadService->upload_param($request->avatar);
        }
        if ($request->img_before) {
            $img_before = $this->uploadService->upload_param($request->img_before);
        }
        if ($request->img_after) {
            $img_after = $this->uploadService->upload_param($request->img_after);
        }
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PHONE => $request->phone_number ?? "",
            Users::GENDER => $request->gender ?? "",
            Users::BIRTHDAY => $request->birthday ?? "",
            Users::BANK_NAME => $request->bank_name ?? "",
            Users::ACCOUNT_NUMBER => $request->account_number ?? "",
            Users::ACCOUNT_NAME => $request->account_name ?? "",
            Users::CITY => $request->province ?? "",
            Users::DISTRICT => $request->district ?? "",
            Users::WARD => $request->ward ?? "",
            Users::ADDRESS => $request->specific_address ?? "",
            Users::AVATAR => !empty($request->avatar) ? $avatar : session()->get('employee')['avatar'],
            Users::IDENTITY => $request->identity ?? "",
            Users::DATE_IDENTITY => $request->date_identity ?? "",
            Users::ADDRESS_IDENTITY => $request->address_identity ?? "",
            Users::FRONT_FACING_CARD => !empty($request->img_before) ? $img_before : session()->get('employee')['front_facing_card'],
            Users::CARD_BACK => !empty($request->img_after) ? $img_after : session()->get('employee')['card_back'],
        ];
        $user = $this->userRepository->update($id, $data);
        return $user;
    }

    public function update_status($id)
    {
        $detail = $this->userRepository->find($id);
        if ($detail[Users::STATUS] == Users::ACTIVE) {
            $data = [
                Users::STATUS => Users::BLOCK
            ];
        } else {
            $data = [
                Users::STATUS => Users::ACTIVE
            ];
        }
        $user = $this->userRepository->update($id, $data);
        return $user;
    }

    public function get_all_customer($request)
    {
        $search = $request->all();
        $customer = $this->userRepository->get_all_customer($search);
        if ($customer) {
            return $customer;
        }
        return false;
    }

    public function update_customer($request, $id)
    {
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PASSWORD => Hash::make($request->password) ?? "",
        ];
        $user = $this->userRepository->update($id, $data);
        return $user;
    }


    public function auth($request, $id)
    {
        $img_before = $this->uploadService->upload_param($request->img_before);
        $img_after = $this->uploadService->upload_param($request->img_after);
        $data = [
            Users::ACCURACY => Users::WARNING_AUTH,
            Users::FRONT_FACING_CARD => $img_before ?? "",
            Users::CARD_BACK => $img_after ?? "",
        ];
        $auth = $this->userRepository->update($id, $data);
        if ($auth) {
            return $auth;
        }
        return false;
    }


    //admin confirm
    public function confirm_auth($id)
    {

        $data = [
            Users::ACCURACY => Users::AUTH,
        ];
        $auth = $this->userRepository->update($id, $data);
        if ($auth) {
            return $auth;
        }
        return false;
    }

    //admin không confirm
    public function not_confirm_auth($id)
    {

        $data = [
            Users::ACCURACY => Users::FAIL_AUTH,
        ];
        $auth = $this->userRepository->update($id, $data);
        if ($auth) {
            return $auth;
        }
        return false;
    }

    public function login_google($user_google)
    {
        $data = [];
        $user = $this->userRepository->findOne([Users::EMAIL => $user_google->email]);
        if ($user) {
            if ($user['type'] == Users::EMPLOYEE) {
                $data['message'] = __('auth.invalid_authentication');
            } else {
                if ($user['status'] == Users::ACTIVE) {
                    $user_new = $this->userRepository->update($user['id'], [Users::LAST_LOGIN => Carbon::now()]);
                    $data['user'] = $user_new;
                } elseif ($user['status'] == Users::BLOCK) {
                    $data['message'] = __('auth.account_is_locked');
                }
            }
        } else {
            $data = [
                Users::STATUS => Users::ACTIVE,
                Users::TYPE => Users::INVESTOR,
                Users::ID_GOOGLE => $user_google->id,
                Users::FULL_NAME => $user_google->name,
                Users::EMAIL => $user_google->email,
                Users::LAST_LOGIN => Carbon::now(),
            ];
            $user_new = $this->userRepository->create($data);
            $this->notificationService->push_welcome($user_new);
            $data['user'] = $user_new;
        }
        return $data;
    }

    public function get_user_add_role($request)
    {
        $userIds = json_decode($request->user_ids);
        $users = $this->userRepository->get_user_add_role($userIds);
        return $users;
    }

    public function update_role_employee($request)
    {
        $user = $this->userRepository->find($request->user_id);
        $actions = [];
        if (!empty($request->actions)) {
            $actions = explode(',', $request->actions);
        }
        $user->actions()->sync($actions);
        return $user;
    }

    public function check_email($request)
    {
        $message = [];
        $user = $this->userRepository->findOne([Users::EMAIL => $request->email]);
        if ($user) {
            if ($user['status'] == Users::ACTIVE) {
                $message[] = __('auth.email_exist');
            } elseif ($user['status'] == Users::BLOCK) {
                $message[] = __('auth.email_block');
            }
        }
        return $message;
    }

    public function otp_register($request)
    {
        $user = $this->userRepository->update($request->id, [
            Users::STATUS => Users::ACTIVE,
            Users::OTP => null,
            Users::EXPIRE_OTP => null
        ]);
        $this->notificationService->push_welcome($user);
        return $user;
    }

    public function check_otp_register($request)
    {
        $message = [];
        $user = $this->userRepository->find($request->id);
        if ($user) {
            if (empty($request->otp)) {
                $message[] = __('auth.otp_not_null');
                return $message;
            }
            if ($user['otp'] != $request->otp) {
                $message[] = __('auth.invalid_authentication');
            }
        } else {
            $message[] = __('auth.invalid_authentication');
        }
        return $message;
    }

    public function check_send_email_forgot_pass($request)
    {
        $message = [];
        if (empty($request->email)) {
            $message[] = __('auth.email_not_null');
            return $message;
        } else {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $message[] = __('auth.email_malformed');
                return $message;
            }
            $user = $this->userRepository->findOne([Users::EMAIL => $request->email, Users::STATUS => Users::ACTIVE]);
            if (!$user) {
                $message[] = __('auth.email_not_exist');
                return $message;
            }
        }
        return $message;
    }

    public function send_email_forgot_pass($request)
    {
        $user = $this->userRepository->findOne([Users::EMAIL => $request->email, Users::STATUS => Users::ACTIVE]);
        $token = Authorization::generateToken([
            'id' => $user['id'],
            'time' => Carbon::now()->addMinutes(5)->unix()
        ]);
        $this->userRepository->update($user['id'], [Users::TOKEN_RESET => $token]);
        $link = env('BASE_URL') . 'new_password?e=' . $token;
        $html = view('email.quenmatkhau', compact('user', 'link'))->render();
        $result = $this->mailService->sendMail('Quên mật khẩu', $user['email'], $user['full_name'], $html);
        return $result;
    }

    public function check_new_password($request)
    {
        $message = [];
        if (empty($request->password)) {
            $message[] = __('auth.password_not_null');
            return $message;
        } else {
            if (strlen($request->password) < 6) {
                $message[] = __('auth.password_min');
                return $message;
            }
        }

        if (empty($request->re_password)) {
            $message[] = __('auth.repassword_not_null');
            return $message;
        } else {
            if (strlen($request->re_password) < 6) {
                $message[] = __('auth.password_min');
                return $message;
            }
        }

        if ($request->password != $request->re_password) {
            $message[] = __('auth.repassword_mismatched');
            return $message;
        }
        $token = Authorization::validateToken($request->token);
        if (!$token) {
            $message[] = __('auth.Invalid_request');
            return $message;
        } else {
            $user = $this->userRepository->findOne([Users::ID => (int)$token->id, Users::TOKEN_RESET => $request->token]);
            if (!$user) {
                $message[] = __('auth.Invalid_request');
                return $message;
            } else {
                if (time() > $token->time) {
                    $message[] = __('auth.Time_out');
                    return $message;
                }
            }
        }
        return $message;
    }

    public function new_password($request)
    {
        $token = Authorization::validateToken($request->token);
        $user = $this->userRepository->update($token->id, [Users::PASSWORD => Hash::make($request->password), Users::TOKEN_RESET => null]);
        return $user;

    }

    public function change_password_employee($request, $id)
    {
        $data = [
            Users::PASSWORD => Hash::make($request->new_password) ?? "",
        ];
        $pass = $this->userRepository->update($id, $data);
        if ($pass) {
            return $pass;
        }
        return false;
    }

    public function investment_update_profile($request)
    {
        $user = Session::get('customer');
        if (in_array($user['accuracy'], [0, 3])) {
            $data = [
                Users::FULL_NAME => $request->full_name ?? $user['full_name'],
                Users::PHONE => $request->phone_number ?? $user['phone'],
                Users::GENDER => $request->gender ?? $user['gender'],
                Users::BIRTHDAY => $request->birthday ?? $user['birthday'],
                Users::BANK_NAME => $request->bank_name ?? $user['bank_name'],
                Users::ACCOUNT_NUMBER => $request->account_number ?? $user['account_number'],
                Users::ACCOUNT_NAME => $request->account_name ?? $user['account_name'],
            ];
            $user_new = $this->userRepository->update($user['id'], $data);
            return $user_new;
        } else {
            return $user;
        }

    }
}
