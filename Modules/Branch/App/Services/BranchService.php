<?php

namespace Modules\Branch\App\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Branch\App\Http\Requests\BranchStoreRequest;
use Modules\Branch\App\Repositories\BranchRepository;
use Symfony\Component\HttpFoundation\Response;

class BranchService
{
    public function __construct(protected BranchRepository $branchRepository)
    {

    }

    public function store(BranchStoreRequest $request)
    {

        $provider = Auth::guard('provider-api')->user();

        if (! $provider) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
        // Validate the data form request
        $validate_data = $request->validated();

        // Associate the provider ID with the branch being stored
        $validate_data['provider_id'] = $provider->id;

        return $this->branchRepository->store($validate_data);

    }
}
