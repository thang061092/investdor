<?php


namespace App\Http\Services;


class UploadService
{
    public function upload($request)
    {
        $file = $request->file;
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '-' . uniqid() . '.' . $extension;
        $path = $file->storeAs('uploads', $fileName, 'public');
        $url = env('BASE_URL') . 'storage/' . $path;
        return $url;
    }

    public function validate_upload($request)
    {
        $message = [];
        $file = $request->file;
        if (empty($file)) {
            $message[] = __('validate.file_not_null');
        }

        if (!empty($file) && $file->getSize() > 15000000) {
            $message[] = __('validate.size_is_too_big');
        }

        $acceptFormat = ["jpeg", "png", "jpg", "svg", 'mp3', 'mp4'];
        if (!empty($file) && !in_array($file->getClientOriginalExtension(), $acceptFormat)) {
            $message[] = __('validate.format_not_allowed');
        }

        return $message;
    }
}
