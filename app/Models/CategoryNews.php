<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    //
    protected $table = 'category_news';
    protected $primaryKey = 'id';

    const NAME = 'name';
    const SLUG = 'slug';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const UPDATED_BY = 'updated_by';
    const IMAGE = 'image';
    const STATUS = 'status';
    const DESCRIPTION = 'description';

    const ACTIVE = 'active';
    const DEACTIVE = 'deactive';

    protected $guarded = [];  

}
