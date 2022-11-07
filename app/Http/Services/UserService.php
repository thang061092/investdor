<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Http\Services\UploadService;

class UserService
{
    protected $userRepository;
    protected $uploadService;

    public function __construct(UserRepository $userRepository, UploadService $uploadService)
    {
        $this->userRepository = $userRepository;
        $this->uploadService = $uploadService;
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
        $data = [
            Users::FULL_NAME => $request->full_name,
            Users::EMAIL => $request->email,
            Users::PASSWORD => Hash::make($request->password),
            Users::STATUS => Users::ACTIVE,
            Users::TYPE => Users::EMPLOYEE,
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
        $data = [
            Users::FULL_NAME => $request->full_name,
            Users::EMAIL => $request->email,
            Users::PASSWORD => Hash::make($request->password),
            Users::STATUS => Users::ACTIVE,
            Users::TYPE => Users::INVESTOR,
            Users::BANK_NAME => "",
            Users::ACCOUNT_NAME => "",
            Users::ACCOUNT_NUMBER => "",
        ];
        $user = $this->userRepository->create($data);
        return $user;
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
        if ($request->hasFile('file')){
            $avatar = $this->uploadService->upload($request);
        }
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PHONE => $request->phone_number ?? "",
            Users::GENDER => $request->gender ?? "",
            Users::BIRTHDAY =>  $request->birthday ?? "",
            Users::BANK_NAME => $request->bank_name ?? "",
            Users::ACCOUNT_NUMBER => $request->account_number ?? "",
            Users::ACCOUNT_NAME => $request->account_name ?? "",
            Users::CITY => $request->province ?? "",
            Users::DISTRICT => $request->district ?? "",
            Users::WARD => $request->ward ?? "",
            Users::ADDRESS => $request->specific_address ?? "",
            Users::AVATAR => $avatar ?? "",
        ];
        $user = $this->userRepository->update_profile($id, $data);
        return $user;
    }

    public function get_all_employee() {
        $employees = $this->userRepository->get_all_employee();
        if ($employees) {
            return $employees;
        }
        return false;
    }

    public function update_employee($request, $id) {
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PASSWORD => Hash::make($request->password) ?? "",
        ];
        $user = $this->userRepository->update($id, $data);
        return $user;
    }

    public function update_status($id) {
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

    public function get_all_customer() {
        $customer = $this->userRepository->get_all_customer();
        if ($customer) {
            return $customer;
        }
        return false;
    }

    public function update_customer($request, $id) {
        $data = [
            Users::FULL_NAME => $request->full_name ?? "",
            Users::EMAIL => $request->email ?? "",
            Users::PASSWORD => Hash::make($request->password) ?? "",
        ];
        $user = $this->userRepository->update($id, $data);
        return $user;
    }
}
