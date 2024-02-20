<?php

namespace Modules\Admin\App\Services;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\App\Http\Requests\Auth\AdminLoginRequest;
use Modules\Admin\App\Http\Requests\Auth\AdminRegisterRequest;
use Modules\Admin\App\Repositories\AdminRepository;

class AdminAuthService
{
    public function __construct(protected AdminRepository $adminRepository)
    {

    }

    public function login(AdminLoginRequest $request): RedirectResponse
    {

        if (Auth::guard('admin')->attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect()
                ->route('admin.index');
        }

        return redirect()
            ->back()
            ->withInput(['admin_email' => \request()->admin_email])
            ->with('errorResponse', 'these Credentials do not match our Records');
    }

    public function validateRegister(AdminRegisterRequest $request)
    {

        $adminData = $request->except(['password_confirmation', 'admin_key', '_token']);

        return $adminData = $request->validated();
    }

    public function store(array $adminData)
    {
        return $this->adminRepository->createAdmin($adminData);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
    }
}
