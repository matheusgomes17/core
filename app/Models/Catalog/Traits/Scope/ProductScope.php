<?php

namespace MVG\Models\Catalog\Traits\Scope;

/**
 * Class ProductScope.
 */
trait ProductScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('status', $status);
    }

    /**
     * @param $query
     * @param bool|true $featured
     * @return mixed
     */
    public function scopeFeatured($query, $featured = true)
    {
        return $query->where('featured', $featured);
    }

    /**
     * @param $query
     * @param bool|true $made_history
     * @return mixed
     */
    public function scopeMadeHistory($query, $made_history = true)
    {
        return $query->where('made_history', $made_history);
    }
}