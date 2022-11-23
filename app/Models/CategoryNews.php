<?php

namespace App\Models;


class CategoryNews extends BaseModel
{
    //
    protected $table = 'category_news';
    protected $primaryKey = 'id';

    const NAME = 'name';
    const NAME_EN = 'name_en';
    const SLUG = 'slug';
    const SLUG_EN = 'slug_en';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const UPDATED_BY = 'updated_by';
    const IMAGE = 'image';
    const STATUS = 'status';
    const DESCRIPTION = 'description';
    const DESCRIPTION_EN = 'description_en';

    const ACTIVE = 'active';
    const DEACTIVE = 'deactive';

    public function news()
    {
        return $this->hasMany(News::class, News::CATEGORY_NEWS_ID);
    }

}
