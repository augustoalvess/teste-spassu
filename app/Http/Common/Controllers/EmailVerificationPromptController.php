<?php

namespace App\Http\Common\Controllers;

use App\Domain\Common\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller {
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request) {
        return $request->user()->hasVerifiedEmail() ? redirect()->intended(RouteServiceProvider::HOME) : view('auth.verify-email');
    }
}
