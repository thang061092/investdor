<?php


namespace App\Models;


class Menu extends BaseModel
{
    protected $table = 'menu';

    const NAME = 'name';
    const SLUG = 'slug';
    const URL = 'url';
    const STATUS = 'status';
    const PARENT_ID = 'parent_id';
    const ICON = 'icon';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';


    public function menu()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function actions()
    {
        return $this->hasMany(Action::class, Action::MENU_ID);
    }

    public function groupRoles()
    {
        return $this->belongsToMany(GroupRole::class, 'menu_group_role', 'menu_id', 'group_role_id');
    }
}
