<?php

namespace MVG\Repositories\Backend;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * Class ImageRepository.
 */
class ImageRepository
{
    /**
     * @param $image
     * @param $type
     * @param $size
     * @return string
     */
    public function saveImage($image, $type, $size)
    {
        if (!is_null($image)) {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $name = time() . random_int(100, 999);
            $fileName = $name . '.' . $extension;
            $destinationPath = public_path('uploads/' . $type . '/');
            $url = 'uploads/' . $type . '/' . $fileName;
            $fullPath = $destinationPath . $fileName;
            $fullPathOriginalFile = $destinationPath . $name . '_original.' . $extension;

            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }

            $original_image = Image::make($file)->encode('jpg');
            $original_image->save($fullPathOriginalFile, 100);

            $image = Image::make($file);
            $image->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            $image->save($fullPath, 100);

            return $url;
        } else {
            return 'http://' . $_SERVER['HTTP_HOST'] . '/images/' . $type . '/placeholder300x300.jpg';
        }
    }

    public function deleteImage($image)
    {

    }
}