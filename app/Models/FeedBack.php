<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    //
    protected $table = 'feed_back';
    protected $primaryKey = 'id';
    

    const ID = 'id';
    const STATUS = 'status';
    const FULL_NAME = 'full_name';
    const JOB_VI = 'job_vi';
    const JOB_EN = 'job_en';
    const AVATAR = 'avatar';
    const FEEDBACK_VI = 'feedback_vi';
    const FEEDBACK_EN = 'feedback_en';
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';

    const ACTIVE = 'active';
    const DEACTIVE = 'deactive';

    protected $guarded = [];  

}
