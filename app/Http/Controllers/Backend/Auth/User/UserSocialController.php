<?php

namespace MVG\Http\Controllers\Backend\Auth\User;

use MVG\Models\Auth\User;
use MVG\Models\Auth\SocialAccount;
use MVG\Http\Controllers\Controller;
use MVG\Http\Requests\Backend\Auth\User\ManageUserRequest;
use MVG\Repositories\Backend\Access\User\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param User                 $user
     * @param SocialAccount          $social
     * @param ManageUserRequest    $request
     * @param SocialRepository $socialRepository
     *
     * @return mixed
     */
    public function unlink(User $user, SocialAccount $social, ManageUserRequest $request, SocialRepository $socialRepository)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
