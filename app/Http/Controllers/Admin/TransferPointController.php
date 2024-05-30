<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TransferPoint;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class TransferPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Admin')){
            $data =TransferPoint::with(['user','userBy'])->get();
        }else{
            $data =TransferPoint::with(['user','userBy'])->where('user_id',auth()->user()->id)->orWhere('user_by',auth()->user()->id)->get();
        }
       
        
        return view('modules.Balance_Transfer.index',compact(['data']));
    }
    public function PvStoreTransfer()
    {
        if(auth()->user()->hasRole('Admin')){
            $data =TransferPoint::with(['user','userBy'])->where('point_type','Store_pv_wallet')->get();
        }else{
            $data =TransferPoint::with(['user','userBy'])->where('point_type','Store_pv_wallet')->where('user_id',auth()->user()->id)->orWhere('user_by',auth()->user()->id)->get();
        }
       
        
        return view('modules.Balance_Transfer.index-pv-transfer',compact(['data']));
    }
    public function balanceSent()
    {
            $data =TransferPoint::with(['user'])->orWhere('user_by',auth()->user()->id)->get();
            return view('modules.Balance_Transfer.index_sent',compact(['data']));
    }
    public function balanceRecieved()
    {
            $data =TransferPoint::with(['userBy'])->where('user_id',auth()->user()->id)->get();
            return view('modules.Balance_Transfer.index_recieved',compact(['data']));
    }
    public function BalanceTransferRP(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_rp',compact(['user']));
    }
    public function BalanceTransferDP(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_dp',compact(['user']));
    }
    public function BalanceTransferFuture(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_future',compact(['user']));
    }
    public function BalanceTransferStore(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_store',compact(['user']));
    }
    public function BalanceTransferStoreBv(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_store_bv',compact(['user']));
    }
    public function BalanceTransferAffiliatePv(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_affiliate_pv',compact(['user']));
    }
    public function BalanceTransferStorePvWallet(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_store_pv_wallet',compact(['user']));
    }
    public function BalanceTransferCpv(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_cpv',compact(['user']));
    }
    public function BalanceTransferTotalEarning(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_earning',compact(['user']));
    }
    public function BalanceTransferBV(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_bv',compact(['user']));
    }
    public function BalanceTransferCBV(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points_cbv',compact(['user']));
    }
 
    public function BalanceTransfer(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.Balance_Transfer.transfer_points',compact(['user']));
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
        if(empty($request->user_id) || $request->user_id==''){
            return redirect()->back()->with('error',"User Not Exist");
        }
        
        $sender = Auth::user();
        if($sender->hasRole('Admin')){
            $tp = new TransferPoint();
            $tp->user_id = $request->user_id;
            $tp->user_by = $sender->id;
            $tp->transfer_by = $sender->user_type;
            $tp->points = $request->points;
            $tp->point_type = $request->point_type;
            $tp->type = $request->type;
            $tp->save();
            if($request->point_type=='Direct'){
                $point_up=$this->updateDirectPoints($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Register'){
                $point_up=$this->updateRegisterPoints($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Future'){
                $point_up=$this->updateFuturePoints($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Store'){
                $point_up=$this->updateStoreWallet($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Store_bv'){
                $point_up=$this->updateStoreBv($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Affiliate_pv'){
                $point_up=$this->updateAffiliateWallet($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='Store_pv_wallet'){
                $point_up=$this->updatePvStorewallet($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='cpv'){
                $point_up=$this->updateCpv($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='TotalEarning'){
                $point_up=$this->updateTotalEarning($request->user_id,$request->points,$request->type);
            }else if($request->point_type=='BV'){
                $bv_update=$this->updateBv($request->user_id,$request->points,$request->side,$request->type);
            }else if($request->point_type=='CBV'){
              
                $cbv=$this->updateCBV($request->user_id,$request->points,$request->type);
            }
    
            return redirect()->back()->with('success',"Points Transferred Successfully");
           
        }else{

            $kyc=$this->checkKyc($sender->id);
            if($kyc==0){
                return redirect()->back()->with('error',"Your KYC Not Approved");
            }
            /////////////////Check Balance
            if($request->point_type=='Direct'){
                $balance=$this->checkDirectPoints($sender->id);
                if($balance==0){
                    return redirect()->back()->with('error',"You have 0 Direct Points");
                }
                if($balance<$request->points){
                    return redirect()->back()->with('error',"Insufficient Direct Points");
                }
            }else{
                $balance=$this->checkRegisterPoints($sender->id);
                if($balance==0){
                    return redirect()->back()->with('error',"You have 0 Register Points");
                }
                if($balance<$request->points){
                    return redirect()->back()->with('error',"Insufficient Register Points");
                }
            }
            
            
            /////////////////Check Balance End 
            $tp = new TransferPoint();
            $tp->user_id = $request->user_id;
            $tp->user_by = $sender->id;
            $tp->transfer_by = $sender->user_type;
            $tp->points = $request->points;
            $tp->point_type = $request->point_type;
            $tp->type = $request->type;
            $tp->save();
            
            if($request->point_type=='Direct'){
                $point_up=$this->updateDirectPoints($request->user_id,$request->points,$request->type);
                $point_down=$this->updateDirectPoints($sender->id,$request->points,'down');
            }else if($request->point_type=='Register'){
                $point_up=$this->updateRegisterPoints($request->user_id,$request->points,$request->type);
                $point_down=$this->updateRegisterPoints($sender->id,$request->points,'down');
            }
            return redirect()->back()->with('success',"Points Transferred Successfully");
          
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
