<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Modules\Core\Http\Requests\LoginWebRequest;
use Modules\Core\Providers\RouteServiceProvider;

class LoginWebController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function view(): Response
    {
        return inertia('Core::auth/login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginWebRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route(RouteServiceProvider::HOME));
    }

    /**
     * Destroy an authenticated session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route(RouteServiceProvider::LOGIN);
    }
}
