<?php

namespace MVG\Http\Controllers\Backend\Auth\User;

use MVG\Models\Auth\User;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Auth\SessionRepository;
use MVG\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     * @param SessionRepository $sessionRepository
     *
     * @return mixed
     */
    public function clearSession(User $user, ManageUserRequest $request, SessionRepository $sessionRepository)
    {
        $sessionRepository->clearSession($user);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
