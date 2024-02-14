<?php

namespace Modules\Admin\App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Admin\App\Http\Requests\StoreAdminRequest;
use Modules\Admin\App\Services\AdminService;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function __construct(protected AdminService $adminService)
    {
    }

    public function createAdmin(StoreAdminRequest $request): JsonResponse
    {
        $admin = $this->adminService->create($request);

        return response()->json($admin, Response::HTTP_CREATED);
    }
}
