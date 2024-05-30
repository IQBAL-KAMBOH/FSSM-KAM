<?php

namespace App\Http\Controllers\User;

use App\Models\BvLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BvLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $dashboard = Auth::user();
        $bv= BvLog::where('user_id',$dashboard->id)->get();
        return view('modules.Bv_Log.index',compact(['dashboard','bv']));
    }
    public function bvLogs()
    {
        $bv= BvLog::with('user')->get();
        return view('modules.Bv_Log.index_history',compact(['bv']));
    }
    public function cbvLogs()
    {
        $bv= BvLog::with('user')->get();
        return view('modules.Bv_Log.index_cbv_history',compact(['bv']));
    }
    public function storeToBv(Request $request)
    {
         $sender = Auth::user();
         /////////////////Check Balance
         $balance =$sender->store_bv;
         if($balance==0){
             return redirect()->back()->with('error',"You have 0 Points");
         }
         if($balance<$request->points){
             return redirect()->back()->with('error',"Insufficient  Points");
         }
         /////////////////Check Balance End 
         $point_down_r=$this->updateStoreBv($request->user_id,$request->points,'down');
         $up=$this->updateBv($request->user_id,$request->points,$request->side,'up');
      
      
         return redirect()->back()->with('success','Converted Successfully Successfully');
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
     * @param  \App\Models\BvLog  $bvLog
     * @return \Illuminate\Http\Response
     */
    public function show(BvLog $bvLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BvLog  $bvLog
     * @return \Illuminate\Http\Response
     */
    public function edit(BvLog $bvLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BvLog  $bvLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BvLog $bvLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BvLog  $bvLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BvLog $bvLog)
    {
        //
    }
}
