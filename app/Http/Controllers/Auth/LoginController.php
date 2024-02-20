<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(): string
    {

        $userLogin = request()->input('userLogin');

        if (filter_var($userLogin, FILTER_VALIDATE_EMAIL)) {
            request()->merge(['email' => $userLogin]);

            return 'email';
        } elseif (preg_match("/^[a-z ,.'-]+$/i", $userLogin)) {
            request()->merge(['name' => $userLogin]);

            return 'name';
        }
        // If neither email nor valid name is provided, default to email
        request()->merge(['email' => $userLogin]);

        return 'email';

    }

    protected function validateLogin(Request $request): void
    {

        $request->validate([
            'userLogin' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'userLogin' => [trans('auth.failed')],
        ]);
    }
}
