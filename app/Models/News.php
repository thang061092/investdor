<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $primaryKey = 'id';

    const ID = 'id';
    const STATUS = 'status';
    const TITLE = 'title';
    const TITLE_EN = 'title_en';
    const SLUG = 'slug';
    const CREATED_AT = 'created_at';
    const CREATED_BY = 'created_by';
    const LEVEL = 'level';
    const DESCRIPTION_VI = 'description_vi';
    const DESCRIPTION_EN = 'description_en';
    const SUMARY_VI = 'sumary_vi';
    const SUMARY_EN = 'sumary_en';
    const CATEGORY = 'category';
    const CATEGORY_EN = 'category_en';
    const CATEGORY_SLUG = 'category_slug';
    const CONTENT = 'content';
    const CONTENT_EN = 'content_en';
    const IMAGE = 'image';

    const ACTIVE = 'active';
    const DEACTIVE = 'deactive';
    protected $guarded = [];  
}