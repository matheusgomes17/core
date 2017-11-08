<?php

namespace MVG\Models\System\Traits\Attribute;

use Carbon\Carbon;

/**
 * Class DepositionAttribute.
 */
trait DepositionAttribute
{
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.system.deposition.show', $this) . '" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.system.deposition.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.system.deposition.destroy', $this) . '"
             data-method="delete"
             data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
             data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
             data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.system.deposition.restore', $this) . '" name="restore_deposition" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.system.depositions.restore_deposition') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.system.deposition.delete-permanently', $this) . '" name="delete_deposition_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.system.depositions.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            $this->getDeletePermanentlyButtonAttribute();
        }
        return
            //$this->getShowButtonAttribute() .
            $this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    public function getPhotoAttribute()
    {
        return '<img src="'. asset($this->attributes['cover']) .'" width="35" />';
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
    public function getcityAndStateAttribute()
    {
        return $this->attributes['city'] . '/' . $this->attributes['state'];
    }

    /**
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}