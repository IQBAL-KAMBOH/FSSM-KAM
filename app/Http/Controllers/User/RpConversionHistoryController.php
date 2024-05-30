<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\RpConversionHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RpConversionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUser = Auth::user()->id;
        $data = RpConversionHistory::where('user_by',$loggedInUser)->get();
        return view('modules.Histories.rp-conversion',compact(['data']));
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
    public function convertToRp(Request $request){
       

            
       
       
        
       
    }
    public function store(Request $request)
    {
        $sender = Auth::user();
         /////////////////Check Balance
         $balance =$this->checkCwallet($request->user_id);
         if($balance==0){
             return redirect()->back()->with('error',"You have 0 Points");
         }
         if($balance<$request->points){
             return redirect()->back()->with('error',"Insufficient  Points");
         }
         /////////////////Check Balance End 
         $rp = new RpConversionHistory();
         $rp->user_id = $request->user_id;
         $rp->user_by = $sender->id;
         $rp->converted_by = $sender->user_type;
         $rp->points = $request->points;
         $rp->point_type = $request->point_type;
         $rp->type = $request->type;
         $rp->save();
         $point_down_r=$this->updateCwallet($request->user_id,$request->points,'down');
         $point_up=$this->updateRegisterPoints($request->user_id,$request->points,'up');
         return redirect()->back()->with('success','Converted Successfully Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RpConversionHistory  $rpConversionHistory
     * @return \Illuminate\Http\Response
     */
    public function show(RpConversionHistory $rpConversionHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RpConversionHistory  $rpConversionHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(RpConversionHistory $rpConversionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RpConversionHistory  $rpConversionHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RpConversionHistory $rpConversionHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RpConversionHistory  $rpConversionHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RpConversionHistory $rpConversionHistory)
    {
        //
    }
}
