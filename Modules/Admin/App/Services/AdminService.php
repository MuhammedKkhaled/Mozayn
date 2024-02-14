<?php

namespace Modules\Admin\App\Services;

use Modules\Admin\App\Http\Requests\StoreAdminRequest;
use Modules\Admin\App\Models\Admin;

class AdminService
{
    public function create(StoreAdminRequest $request)
    {
        return Admin::create($request->all());
    }
}
