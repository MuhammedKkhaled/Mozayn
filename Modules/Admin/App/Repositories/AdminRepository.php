<?php

namespace Modules\Admin\App\Repositories;

use Modules\Admin\App\Interfaces\AdminRepositoryInterface;
use Modules\Admin\App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    public function createAdmin($data)
    {
        return Admin::create($data);
    }
}
