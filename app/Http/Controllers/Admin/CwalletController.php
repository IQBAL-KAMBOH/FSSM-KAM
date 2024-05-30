<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CWalletHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class CwalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Admin')){
            $data =CWalletHistory::with(['user','userBy'])->get();
        }else{
            $data =CWalletHistory::with(['user','userBy'])->where('user_id',auth()->user()->id)->orWhere('user_by',auth()->user()->id)->get();
        }
       
        
        return view('modules.Balance_Transfer.index-c_wallet',compact(['data']));
    }
    public function BalanceTransferCwallet(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_cWallet',compact(['user']));
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
        
        $sender = Auth::user();
        if($sender->hasRole('Admin')){
            $tp = new CWalletHistory();
            $tp->user_id = $request->user_id;
            $tp->user_by = $sender->id;
            $tp->transfer_by = $sender->user_type;
            $tp->points = $request->points;
            $tp->point_type = 'C Wallet';
            $tp->type = $request->type;
            $tp->save();
           
            $point_up=$this->updateCwallet($request->user_id,$request->points,$request->type);
           
    
            return redirect()->back()->with('success',"C Wallet Updated Successfully");
           
        }else{

            return redirect()->back()->with('error',"Un-Authorized Access");
          
        }
        
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferPoint  $transferPoint
     * @return \Illuminate\Http\Response
     */
    public function show(TransferPoint $transferPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferPoint  $transferPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferPoint $transferPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferPoint  $transferPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferPoint $transferPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferPoint  $transferPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferPoint $transferPoint)
    {
        //
    }
}
