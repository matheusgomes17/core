<?php

namespace MVG\Http\Controllers\Backend\Auth\User;

use MVG\Models\Auth\User;
use MVG\Helpers\Auth\Auth;
use MVG\Exceptions\GeneralException;
use MVG\Http\Controllers\Controller;
use MVG\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserAccessController.
 */
class UserAccessController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAs(User $user, ManageUserRequest $request)
    {
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Let's not try to login as ourselves.
            if (auth()->id() == $user->id || session()->get('admin_user_id') == $user->id) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            // Overwrite temp user ID.
            session(['temp_user_id' => $user->id]);

            // Login.
            auth()->loginUsingId($user->id);

            // Redirect.
            return redirect()->route(home_route());
        }

        app()->make(Auth::class)->flushTempSession();

        // Won't break, but don't let them "Login As" themselves
        if (auth()->id() == $user->id) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        // Add new session variables
        session(['admin_user_id' => auth()->id()]);
        session(['admin_user_name' => auth()->user()->full_name]);
        session(['temp_user_id' => $user->id]);

        // Login user
        auth()->loginUsingId($user->id);

        // Redirect to frontend
        return redirect()->route(home_route());
    }
}
