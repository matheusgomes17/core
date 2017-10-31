<?php

namespace MVG\Repositories\Backend\Access\User;

use MVG\Models\Auth\User;
use MVG\Models\Auth\SocialAccount;
use MVG\Exceptions\GeneralException;
use MVG\Events\Backend\Auth\User\UserSocialDeleted;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.access.users.social_delete_error'));
    }
}
