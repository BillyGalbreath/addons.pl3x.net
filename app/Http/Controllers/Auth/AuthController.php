<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller {
    /**
     * Redirect to GitHub for authentication.
     *
     * @return RedirectResponse
     */
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Handle GitHub's callback then redirect to dashboard.
     *
     * @return RedirectResponse
     */
    public function callback() {
        $github = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'github_id' => $github->id
        ], [
            'username' => $github->nickname,
            'realname' => $github->name,
            'email' => $github->email,
            'github_id' => $github->id,
            'github_token' => $github->token,
            'github_refresh_token' => $github->refreshToken
        ]);
        Auth::login($user);
        return redirect(route('dashboard'));
    }

    /**
     * Log user out then redirect to home.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}