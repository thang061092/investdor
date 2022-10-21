<?php

namespace App\Http\Services;

use App\Http\Repositories\ImageGalleryRepository;
use App\Models\ImageGallery;

class ImageGalleryService
{
    protected $imageGalleryRepository;

    public function __construct(ImageGalleryRepository $imageGalleryRepository)
    {
        $this->imageGalleryRepository = $imageGalleryRepository;
    }

    function create_image_gallery_project($project_id, $image_gallery){
        if(!empty($image_gallery)){
            foreach ($image_gallery as $value){
                $data = [
                    ImageGallery::PROJECT_ID => $project_id,
                    ImageGallery::PATH => $value
                ];
                $this->imageGalleryRepository->create($data);
            }
        }
    }


}
