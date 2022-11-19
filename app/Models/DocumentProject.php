<?php


namespace App\Models;


class DocumentProject extends BaseModel
{
    public $table = 'document_project';

    //column
    const TITLE_VI = 'title_vi';
    const TITLE_EN = 'title_en';
    const SLUG_VI = 'slug_vi';
    const SLUG_EN = 'slug_en';
    const DESCRIPTION_VI = 'description_vi';
    const DESCRIPTION_EN = 'description_en';
    const LINK = 'link';
    const STATUS = 'status';
    const REAL_ESTATE_PROJECT_ID = 'real_estate_project_id';
    const NAME_FILE_VI = 'name_file_vi';
    const NAME_FILE_EN = 'name_file_en';
    const TYPE_FILE = 'type_file';

    //status
    const ACTIVE = 'active';
    const BLOCK = 'block';

    public function realEstateProject()
    {
        return $this->belongsTo(RealEstateProject::class, self::REAL_ESTATE_PROJECT_ID);
    }
}
