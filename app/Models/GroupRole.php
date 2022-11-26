<?php


namespace App\Models;


class GroupRole extends BaseModel
{
    protected $table = 'group_role';

    const NAME = 'name';
    const SLUG = 'slug';
    const STATUS = 'status';
    const CALL_BACK = 'call_back';

    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_group_role', 'group_role_id', 'user_id');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_group_role', 'group_role_id', 'menu_id');

    }
}
