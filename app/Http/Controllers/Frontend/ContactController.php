<?php

namespace MVG\Http\Controllers\Frontend;

use MVG\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use MVG\Mail\Frontend\Contact\SendContact;
use MVG\Http\Requests\Frontend\Contact\SendContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
