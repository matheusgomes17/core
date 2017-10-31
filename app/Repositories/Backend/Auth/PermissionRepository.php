<?php

namespace MVG\Repositories\Backend\Auth;

use Spatie\Permission\Models\Permission;
use MVG\Repositories\Traits\CacheResults;
use MVG\Repositories\BaseEloquentRepository;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var array
     */
    protected $relationships = ['roles', 'users'];

    /**
     * @var string
     */
    protected $model = Permission::class;
}
