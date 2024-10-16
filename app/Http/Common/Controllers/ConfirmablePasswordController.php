<?php

namespace App\Http\Common\Controllers;

use App\Domain\Common\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller {
    /**
     * Show the confirm password view.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request) {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request) {
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages(['password' => __('auth.password'),]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
