<?php

namespace MVG\Models\System\Traits\Attribute;

use Carbon\Carbon;

/**
 * Class GalleryAttribute.
 */
trait GalleryAttribute
{
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if ($this->type === 'image') {
            return '<a href="' . route('admin.system.gallery.image.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '<a href="' . route('admin.system.gallery.video.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->type === 'image') {
            return '<a href="' . route('admin.system.gallery.image.destroy', $this) . '"
                data-method="delete"
                data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
        }

        return '<a href="' . route('admin.system.gallery.video.destroy', $this) . '"
                data-method="delete"
                data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getShowButtonAttribute() .
            $this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    public function getPhotoAttribute()
    {
        if ($this->type === 'image') {
            return '<img src="' . asset($this->attributes['image']) . '" width="35" />';
        }

        return '<img src="' . asset('img/video.png') . '" width="45" />';
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->attributes['name'];
    }

    /**
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return date('d/m/Y h:m', strtotime($this->attributes['created_at']));
    }

    /**
     * @return string
     */
    public function getCityAndStateAttribute()
    {
        return ucwords($this->attributes['city']) . '/' . strtoupper($this->attributes['state']);
    }

    /**
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}