<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function create_admin($request)
    {
        $data = [
            User::FULL_NAME => $request->full_name,
            User::EMAIL => $request->email,
            User::PASSWORD => Hash::make($request->password),
            User::STATUS => User::ACTIVE,
            User::TYPE => User::EMPLOYEE,
            User::IS_ADMIN => User::ADMIN
        ];
        return $this->userRepository->create($data);
    }

    public function validate_create_employee($request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:user',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'full_name' => 'required'
        ], [
            "email.required" => __('Backend::message.email_not_null'),
            "email.email" => __('Backend::message.email_malformed'),
            "email.unique" => __('Backend::message.email_exist'),
            "password.required" => __('Backend::message.password_not_null'),
            "full_name.required" => __('Backend::message.name_not_null'),
            "confirm_password.required" => __('Backend::message.repassword_not_null'),
            "confirm_password.same" => __('Backend::message.repassword_mismatched'),
        ]);
        return $validate;
    }

    public function create_employee($request)
    {
        $data = [
            User::FULL_NAME => $request->full_name,
            User::EMAIL => $request->email,
            User::PASSWORD => Hash::make($request->password),
            User::STATUS => User::ACTIVE,
            User::TYPE => User::EMPLOYEE,
        ];
        $user = $this->userRepository->create($data);
        return $user;
    }

    public function validate_customer_register($request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:user',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'full_name' => 'required'
        ], [
            "email.required" => __('Backend::message.email_not_null'),
            "email.email" => __('Backend::message.email_malformed'),
            "email.unique" => __('Backend::message.email_exist'),
            "password.required" => __('Backend::message.password_not_null'),
            "full_name.required" => __('Backend::message.name_not_null'),
            "confirm_password.required" => __('Backend::message.repassword_not_null'),
            "confirm_password.same" => __('Backend::message.repassword_mismatched'),
        ]);
        return $validate;
    }

    public function customer_register($request)
    {
        $data = [
            User::FULL_NAME => $request->full_name,
            User::EMAIL => $request->email,
            User::PASSWORD => Hash::make($request->password),
            User::STATUS => User::ACTIVE,
            User::TYPE => User::INVESTOR,
        ];
        $user = $this->userRepository->create($data);
        return $user;
    }

    public function validate_login_social($request)
    {
        $message = [];

        if (empty($request->type)) {
            $message[] = __('Backend::message.repassword_not_null');
            return $message;
        }

        if (!in_array($request->type, [User::FACEBOOK, User::GOOGLE])) {
            $message[] = __('Backend::message.type_social_illegal');
            return $message;
        }

        if (empty($request->provider_id)) {
            $message[] = __('Backend::message.account_social_not_null');
            return $message;
        } else {
            if ($request->type == 'facebook') {
                $user = $this->userRepository->findOne([User::ID_FACEBOOK => $request->provider_id]);
            } elseif ($request->type == 'google') {
                $user = $this->userRepository->findOne([User::ID_GOOGLE => $request->provider_id]);
            }

            if ($user && $user['status'] == User::BLOCK) {
                $message[] = __('Backend::message.account_block');
                return $message;
            }
        }

        return $message;
    }

    public function login_social($request)
    {
        if ($request->type == 'facebook') {
            $user = $this->userRepository->findOne([User::ID_FACEBOOK => $request->provider_id]);
        } elseif ($request->type == 'google') {
            $user = $this->userRepository->findOne([User::ID_GOOGLE => $request->provider_id]);
        }
        $data = [];
        if ($user) {
            if ($user['status'] == User::ACTIVE) {
                $data = [
                    'id' => $user['id'],
                    'time' => time(),
                    'string' => uniqid()
                ];
                $token = Authorization::generateToken($data);
                $this->userRepository->update($user['id'], [User::TOKEN_WEB => $token, User::LAST_LOGIN => Carbon::now()]);
                $data['token'] = $token;
            } else {
                $data['id'] = $user['id'];
            }
        } else {
            $data = [
                User::STATUS => User::NEW,
                User::TYPE => User::INVESTOR,
            ];
            if ($request->type == User::GOOGLE) {
                $data['id_google'] = $request->provider_id;
            } elseif ($request->type == User::FACEBOOK) {
                $data['id_facebook'] = $request->provider_id;
            }
            $user_new = $this->userRepository->create($data);
            $data['id'] = $user_new['id'];
        }
        return $data;
    }

    public function validate_login($request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            "email.required" => __('Backend::message.email_not_null'),
            "email.email" => __('Backend::message.email_malformed'),
            "password.required" => __('Backend::message.password_not_null'),
        ]);
        return $validate;
    }

    public function check_login($request, $type)
    {
        $data = [];
        $user = $this->userRepository->findOne([
            User::EMAIL => $request->email,
            User::TYPE => $type
        ]);
        if (!($user)) {
            $data['message'] = __('Backend::message.email_unregistered');
        } else {
            if ($user['status'] == User::NEW) {
                $data['message'] = __('Backend::message.email_not_activated');
            } elseif ($user['status'] == User::BLOCK) {
                $data['message'] = __('Backend::message.email_temporarily_locked');
            } elseif ($user['status'] == User::ACTIVE) {
                if (!Hash::check($request->password, $user['password'])) {
                    $data['message'] = __('Backend::message.password_incorrect');
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
        $user = $this->userRepository->update($user['id'], [User::TOKEN_WEB => $token, User::LAST_LOGIN => Carbon::now()]);
        return $user;
    }

}
