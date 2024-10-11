<?php

namespace App\Http\Common\Controllers;

use App\Domain\Common\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailVerificationNotificationController extends Controller {
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
