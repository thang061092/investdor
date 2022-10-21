<?php
namespace App\Http\Repositories;

use App\Models\ImageGallery;


class ImageGalleryRepository extends BaseRepository
{
    public  function getModel(){
        // TODO: Implement getModel() method.
        return ImageGallery::class;
    }
}
