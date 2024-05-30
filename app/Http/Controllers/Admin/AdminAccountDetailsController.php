<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\AdminAccountDetails;
use Illuminate\Http\Request;

class AdminAccountDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.AccountDetails.index');
    }
    public static function globalSettings()
    {
        $data=AdminAccountDetails::find(1);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminAccountDetails  $adminAccountDetails
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAccountDetails $adminAccountDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAccountDetails  $adminAccountDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminAccountDetails $adminAccountDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAccountDetails  $adminAccountDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminAccountDetails)
    {
        $data = AdminAccountDetails::find($adminAccountDetails);
        $data->update($request->all());
        return redirect()->back()->with('success','Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminAccountDetails  $adminAccountDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminAccountDetails $adminAccountDetails)
    {
        //
    }
}
