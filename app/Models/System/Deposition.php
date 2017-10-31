<?php

namespace MVG\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use MVG\Models\Traits\Uuid;
use MVG\Models\System\Traits\Scope\DepositionScope;
use MVG\Models\System\Traits\Attribute\DepositionAttribute;
use MVG\Models\System\Traits\Relationship\DepositionRelationship;

/**
 * Class Deposition.
 */
class Deposition extends Model
{
    use DepositionScope,
        Notifiable,
        SoftDeletes,
        DepositionAttribute,
        Uuid,
        DepositionRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'cover',
        'city',
        'state',
        'link',
    ];
    
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}