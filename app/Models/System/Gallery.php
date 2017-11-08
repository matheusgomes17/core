<?php

namespace MVG\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use MVG\Models\System\Traits\Attribute\GalleryAttribute;

class Gallery extends Model
{
    use Notifiable,
    	GalleryAttribute,
    	SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'image',
        'video',
    ];
    
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function getOriginalImage()
    {
        $url = explode('.', $this->image);
        $newName = $url[0] . '_original.' . $url[1];

        return $newName;
    }
}
