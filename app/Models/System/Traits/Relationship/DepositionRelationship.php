<?php

namespace MVG\Models\System\Traits\Relationship;

/**
 * Class DepositionRelationship.
 */
trait DepositionRelationship
{
    /**
     * HasMany relations with Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories()
    {
        return $this->hasOne(config('catalog.category'), 'id', 'category_id');
    }

    /**
     * HasMany relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(config('access.user'));
    }
}