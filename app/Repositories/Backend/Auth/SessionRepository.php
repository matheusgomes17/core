<?php

namespace MVG\Repositories\Backend\Auth;

use MVG\Models\Auth\User;
use MVG\Exceptions\GeneralException;

/**
 * Class SessionRepository.
 */
class SessionRepository
{
    /**
     * @param User $user
     *
     * @return mixed
     * @throws GeneralException
     */
    public function clearSession(User $user)
    {
        if ($user->id === auth()->id()) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_delete_own_session'));
        }

        if (config('session.driver') != 'database') {
            throw new GeneralException(__('exceptions.backend.access.users.session_wrong_driver'));
        }

        return $user->sessions()->delete();
    }
}
