<?php


namespace App\Http\Services;


use App\Http\Repositories\ActionRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Action;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ActionService
{
    protected $actionRepository;
    protected $userRepository;

    public function __construct(ActionRepository $actionRepository,
                                UserRepository $userRepository)
    {
        $this->actionRepository = $actionRepository;
        $this->userRepository = $userRepository;
    }

    public function get_all()
    {
        return $this->actionRepository->getAll();
    }

    public function validate_create($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:action',
            'menu_id' => 'required',
            'url' => 'required',
        ], [
            'name.required' => __('validate.role_not_null'),
            'name.unique' => __('validate.role_already_exists'),
            'menu_id.required' => __('validate.menu_not_null'),
            'url.required' => __('validate.url_not_null'),
        ]);
        return $validate;
    }

    public function create($request)
    {
        $role = $this->actionRepository->create([
            Action::NAME => $request->name,
            Action::SLUG => slugify($request->name),
            Action::URL => $request->url,
            Action::MENU_ID => $request->menu_id,
            Action::STATUS => Menu::ACTIVE,
            Action::CREATED_BY => Session::get('employee')['email']
        ]);
        return $role;
    }

    public function get_action_add_user($request)
    {
        $menuIds = [];
        $actions_id = json_decode($request->actions_id);
        $user = $this->userRepository->find($request->user_id);
        $groupRoles = $user->groupRoles()->get();
        foreach ($groupRoles as $groupRole) {
            $menus = $groupRole->menus()->pluck(Menu::ID);
            foreach ($menus as $menu_id) {
                array_push($menuIds, $menu_id);
            }
        }

        $data_action = [];
        $menuIds_new = array_unique($menuIds);
        foreach ($menuIds_new as $value) {
            $actions = $this->actionRepository->findMany([Action::MENU_ID => $value]);
            foreach ($actions as $action) {
                if (in_array($action['id'], $actions_id)) continue;
                array_push($data_action, $action);
            }
        }

        return $data_action;
    }
}
