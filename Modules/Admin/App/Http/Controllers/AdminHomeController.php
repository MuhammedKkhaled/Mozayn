<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Branch\App\Models\Branch;
use Modules\Provider\App\Models\Provider;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $branch = Branch::with("provider")->findOrFail($id) ;
        return view('admin::pages.branchDetails' , compact("branch"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
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

    public function showProvidersPage()
    {
        //        $providers = Provider::all();
        $providers = Provider::with('branches')->get();

        return view('admin::pages.providers', compact('providers'));
    }

    public function allBranches()
    {
        $branches = Branch::with('provider')->get();

        return view('admin::pages.branches', compact('branches'));
    }
}
