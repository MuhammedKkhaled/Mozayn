<?php

namespace Modules\Branch\App\Http\Controllers;

use App\Http\Controllers\API\BaseApiController;
use Illuminate\Http\Request;
use Modules\Branch\App\Http\Requests\BranchStoreRequest;
use Modules\Branch\App\Services\BranchService;

class BranchController extends BaseApiController
{
    public function __construct(protected BranchService $branchService)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchStoreRequest $request)
    {

        $data = $this->branchService->store($request);

        return $this->addToResponse('Branch', [$data])
            ->addSuccessMessageToResponse('Branch Created Successfully')
            ->toResponse();
    }
}
