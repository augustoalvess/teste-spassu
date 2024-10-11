<?php

namespace App\Http\Common\Controllers;

use App\Domain\Common\Providers\RouteServiceProvider;
use App\Http\Common\Requests\LoginRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create() {
        //return view('auth.login');
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $request->session()->put('ies_id', $user->ies_id);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->remove('ies_id');
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
