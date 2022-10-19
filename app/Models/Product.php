<?php


namespace App\Models;


class Product extends BaseModel
{
    protected $table = 'users';

    //column
    const ON_SALE = 1; //Đang mở bán
    const FINISHED = 2; //Dự án đã hoàn thành
    const PENDING = 3; //Dự án đang pending
    const CLOSE_INVESTMENT = 4; //Đóng đầu tư

    const IMAGE_AVATAR = 'image_avatar'; //Ảnh đại diện sản phẩm

}
