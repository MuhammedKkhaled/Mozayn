<?php

namespace Modules\Branch\App\Http\Controllers;

use App\Http\Controllers\API\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Branch\App\Models\Branch;

class BranchController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('branch::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branch::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Data
        $validate_data = $request->validate([
            'branch_name' => ['required', 'string', 'min:5'],
            'branch_location' => ['required', 'string'],
            'phone' => ['required', "regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}/"],
            'social_media_links' => ['required', function ($attribute, $value, $fail) {
                // Validate each social media link
                foreach ($value as $platform => $link) {
                    if (! in_array($platform, ['facebook', 'instagram'])) {
                        $fail('Invalid social media platform: '.$platform);

                        return;
                    }
                    if (! filter_var($link, FILTER_VALIDATE_URL)) {
                        $fail('Invalid URL for '.$platform);

                        return;
                    }
                }
            }],

        ]);

        /// Store The data into database
        $data = Branch::create([
            'branch_name' => $validate_data['branch_name'],
            'branch_location' => $validate_data['branch_location'],
            'phone' => $validate_data['phone'],
            'social_media_links' => $validate_data['social_media_links'],
        ]);

        //// Return Response

        return $this->addToResponse("Branch",array($data))
            ->addSuccessMessageToResponse('Branch Created Successfully')
            ->toResponse();
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('branch::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('branch::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
