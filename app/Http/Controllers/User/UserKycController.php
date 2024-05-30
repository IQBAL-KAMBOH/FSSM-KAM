<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserKyc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserKycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data= UserKyc::with('user')->whereNotNull('user_id')->get();
        return view('modules.KYC.index',compact(['data']));
    }
    public function myKyc()
    {  
       
        $user= User::find(Auth::user()->id);
        $data= UserKyc::where('user_id', Auth::user()->id)->whereNotNull('user_id')->first();
        return view('modules.KYC.mykyc',compact(['data','user']));
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
        
       
       
        //////////////////////// Id Card Back

        // $get= UserKyc::where('user_id',$request->user_id)->first();
        $get= UserKyc::where('user_id',$request->id)->first();


        if($get){
            $data =$get->update($request->except('card_f','card_b','under_age'));
            return redirect()->to('KYC')->with('msg','Successfully Updated!');

        }else{
            $data = UserKyc::create($request->except('card_f','card_b','under_age'));
            return redirect()->to('KYC')->with('msg','Successfully Created !');

        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserKyc  $userKyc
     * @return \Illuminate\Http\Response
     */
    public function show(UserKyc $userKyc)
    {
       
        $user= User::find($userKyc->user_id);
        $data= UserKyc::where('user_id', $userKyc->user_id)->whereNotNull('user_id')->first();
        return view('modules.KYC.mykyc',compact(['data','user']));
    }
    public function showKyc(Request $request)
    {
       
        $user= User::find($request->user_id);
        $data= UserKyc::where('user_id', $request->user_id)->whereNotNull('user_id')->first();
        return view('modules.KYC.show',compact(['data','user']));
    }
    public function approveKyc(Request $request){
        $user = UserKyc::find($request->id);
        $user->status = 'Approved';
        $user->save();
        return redirect()->back()->with('success','KYC Approved Successfully');
    }
    public function cancellKyc(Request $request){
    $user = UserKyc::find($request->id);
    $user->status = 'Cancelled';
    $user->save();
    return redirect()->back()->with('success','KYC Cancelled Successfully');
    }
    public function pendingKyc(Request $request){
        $user = UserKyc::find($request->id);
        $user->status = 'Pending';
        $user->save();
        return redirect()->back()->with('success','KYC Pending Successfully');
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserKyc  $userKyc
     * @return \Illuminate\Http\Response
     */
    public function edit(UserKyc $userKyc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserKyc  $userKyc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserKyc $userKyc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserKyc  $userKyc
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserKyc $userKyc)
    {
        //
    }
}
