<?php

namespace Modules\Admin\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\App\Http\Requests\Auth\AdminRegisterRequest;
use Modules\Admin\App\Services\AdminAuthService;

class AdminAuthController extends Controller
{
    public function __construct(protected AdminAuthService $adminAuthService)
    {

    }

    public function showRegisterForm()
    {
        return view('admin::auth.register');
    }

    public function register(AdminRegisterRequest $request)
    {
        $adminKey = 'AdminAdmin';

        if ($request->admin_key == $adminKey) {

            $adminData = $this->adminAuthService->validateRegister($request);

            $this->adminAuthService->store($adminData);

            return redirect()
                ->route('admin.dashboard.login');

        }

        return redirect()
            ->back()
            ->withInput(request()->only(['email', 'name']))
            ->with('errorResponse', 'There Is an error');

    }

    public function showLoginForm()
    {
        return view('admin::auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()
                ->route('admin.dashboard.home');
        }

        return redirect()
            ->back()
            ->withInput(['email' => $request->email])
            ->with('errorResponse', "This Credentials don't match Our Records");
    }

    public function logout()
    {

        $this->adminAuthService->logout();

        return redirect()
            ->route('user.profile');

    }
}
