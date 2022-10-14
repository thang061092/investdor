<?php


namespace Modules\Backend\Http\Middleware;


use Closure;
use Modules\Backend\Http\Repository\UserRepository;
use Modules\Backend\Http\Service\Authorization;
use Modules\Mysql\Controller\BaseController;
use Modules\Mysql\Models\User;

class Auth_employee
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($request, Closure $next)
    {
        if ($request->hasHeader('Authorization')) {
            $token = Authorization::validateToken($request->header('Authorization'));
            if ($token) {
                $user = $this->userRepository->findOne([
                    User::ID => $token->id,
                    User::TOKEN_APP => $request->header('Authorization'),
                    User::STATUS => User::ACTIVE,
                    User::TYPE => User::EMPLOYEE
                ]);
                if ($user) {
                    return $next($request);
                } else {
                    return BaseController::send_response(BaseController::HTTP_FORBIDDEN, __('Backend::message.invalid_authentication'));
                }
            } else {
                return BaseController::send_response(BaseController::HTTP_FORBIDDEN, __('Backend::message.invalid_authentication'));
            }
        } else {
            return BaseController::send_response(BaseController::HTTP_FORBIDDEN, __('Backend::message.invalid_authentication'));
        }
    }
}
