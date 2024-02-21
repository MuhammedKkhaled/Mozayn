<?php

namespace Modules\Branch\App\Repositories;

use Modules\Branch\App\Models\Branch;

class BranchRepository
{
    public function store(array $validateData)
    {

        return Branch::create([
            'branch_name' => $validateData['branch_name'],
            'branch_location' => $validateData['branch_location'],
            'phone' => $validateData['phone'],
            'social_media_links' => $validateData['social_media_links'],
            'provider_id' => $validateData['provider_id'],
        ]);
    }
}
