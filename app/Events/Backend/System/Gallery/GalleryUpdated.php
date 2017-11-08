<?php

namespace MVG\Events\Backend\System\Gallery;

use Illuminate\Queue\SerializesModels;

/**
 * Class GalleryUpdated.
 */
class GalleryUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $gallery;
    
    /**
     * @param $gallery
     */
    public function __construct($gallery)
    {
        $this->gallery = $gallery;
    }
}