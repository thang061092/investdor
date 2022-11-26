<?php


namespace App\Models;


class Action extends BaseModel
{
    protected $table = 'action';

    const NAME = 'name';
    const SLUG = 'slug';
    const STATUS = 'status';
    const MENU_ID = 'menu_id';
    const URL = 'url';

//    status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function menu()
    {
        return $this->belongsTo(Menu::class, self::MENU_ID);
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'user_action','action_id', 'user_id');
    }
}
