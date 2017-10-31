<?php

namespace MVG\Http\Controllers\Frontend\Auth;

use MVG\Http\Controllers\Controller;
use MVG\Repositories\Frontend\Auth\UserRepository;
use MVG\Http\Requests\Frontend\User\UpdatePasswordRequest;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdatePasswordRequest $request
     *
     * @return mixed
     */
    public function update(UpdatePasswordRequest $request)
    {
        $this->user->updatePassword($request->only('old_password', 'password'));

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
