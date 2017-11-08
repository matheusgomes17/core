<?php

namespace MVG\Events\Backend\System\Gallery;

use Illuminate\Queue\SerializesModels;

/**
 * Class GalleryPermanentlyDeleted.
 */
class GalleryPermanentlyDeleted
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