<?php

namespace Modules\Branch\App\Services;

use Illuminate\Http\Request;
use Modules\Branch\App\Http\Requests\BranchStoreRequest;
use Modules\Branch\App\Repositories\BranchRepository;

class BranchService
{
    public function __construct(protected BranchRepository $branchRepository)
    {

    }

    public function store(BranchStoreRequest $request)
    {

        $validate_data = $request->validated();

        return $this->branchRepository->store($validate_data);

    }
}
