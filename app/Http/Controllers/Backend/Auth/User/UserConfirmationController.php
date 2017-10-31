<?php

namespace MVG\Http\Controllers\Backend\Auth\User;

use MVG\Models\Auth\User;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\Auth\UserRepository;
use MVG\Http\Requests\Backend\Auth\User\ManageUserRequest;
use MVG\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user, ManageUserRequest $request)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(__('alerts.backend.users.cant_resend_confirmation'));
        }

        if ($user->isConfirmed()) {
            return redirect()->back()->withFlashSuccess(__('exceptions.backend.access.users.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.confirmation_email'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function confirm(User $user, ManageUserRequest $request)
    {
        $this->users->confirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.confirmed'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function unconfirm(User $user, ManageUserRequest $request)
    {
        $this->users->unconfirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.unconfirmed'));
    }
}
