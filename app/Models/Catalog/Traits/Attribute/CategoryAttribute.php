<?php

namespace MVG\Models\Catalog\Traits\Attribute;

use Carbon\Carbon;

/**
 * Class CategoryAttribute.
 */
trait CategoryAttribute
{
    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    /**
     * @return string
     */
    public function getCategoryAttribute()
    {
        return $this->getCategoryOptions();
    }

    /**
     * @return string
     */
    protected function getCategoryOptions()
    {
        if (!is_null($this->attributes['parent_id'])) {
            return 'Categoria Filha';
        }

        return 'Categoria Principal';
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
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.catalog.category.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->children->count()) {
            return '';
        }
        if ($this->products->count()) {
            return '';
        }

        return '<a href="' . route('admin.catalog.category.destroy', $this) . '"
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
        return '<a href="' . route('admin.catalog.category.restore', $this) . '" name="restore_category" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.catalog.categories.restore_category') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.catalog.category.delete-permanently', $this) . '" name="delete_category_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.catalog.categories.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute() .
            $this->getDeletePermanentlyButtonAttribute();
        }
        return
            $this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }
}