<?php

namespace MVG\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserSocialDeleted.
 */
class UserSocialDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
