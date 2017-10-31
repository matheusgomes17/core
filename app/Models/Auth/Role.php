<?php

namespace MVG\Models\Auth;

use MVG\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute;
}
