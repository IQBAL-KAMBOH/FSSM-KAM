<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PairPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PairPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function cWallet(){
        $loggedInUser = Auth::user()->id;
        $data = PairPoint::where('user_id','!=',$loggedInUser)->where('detail','C Wallet')->get();
        return view('modules.Histories.c_wallet',compact(['data']));
    }
    public function futurePoint(){
        $loggedInUser = Auth::user()->id;
        $data = PairPoint::where('user_id','!=',$loggedInUser)->where('detail','Future Points')->get();
        return view('modules.Histories.c_wallet',compact(['data']));
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
     * @param  \App\Models\PairPoint  $pairPoint
     * @return \Illuminate\Http\Response
     */
    public function show(PairPoint $pairPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PairPoint  $pairPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(PairPoint $pairPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PairPoint  $pairPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PairPoint $pairPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PairPoint  $pairPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(PairPoint $pairPoint)
    {
        //
    }
}
