<?php


namespace App\Models;


class Posts extends BaseModel
{
    protected $table = 'posts';

    const TITLE_VI = 'title_vi';
    const TITLE_EN = 'title_en';
    const SLUG = 'slug';
    const CONTENT_VI = 'content_vi';
    const CONTENT_EN = 'content_en';
    const PARENT_ID = 'parent_id';
    const TYPE = 'type';
    const STATUS = 'status';
    const LEVEL = 'level';

    public function post()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
