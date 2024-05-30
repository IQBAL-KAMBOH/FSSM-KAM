<?php

namespace App\Http\Controllers\Admin;


use App\Models\WithdrawTransactions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class WithdrawTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.withdraw.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request){
        $user = auth()->user();
        $kyc=$this->checkKyc($user->id);
        if($kyc==0){
            return redirect()->back()->with('error',"Your KYC Not Approved");
        }
       

       
        $points = $request->points;
        if($points < 13){
            return redirect()->back()->with('error','Minimum withdrawal amount is 13 points');
        }elseif($points > $user->c_wallet){
            return redirect()->back()->with('error','Insufficient points');
        }
       
            $amount = $points * 100;
            $commission = $amount * 0.1;
            $amount -= $commission;
            $withdrawTransaction = new WithdrawTransactions();
            $withdrawTransaction->user_id = $user->id;
            $withdrawTransaction->amount = $amount;
            $withdrawTransaction->points = $points;
            $withdrawTransaction->commission = $commission;
            $withdrawTransaction->account_type = $request->account_type;
            $withdrawTransaction->account_name = $request->account_name;
            $withdrawTransaction->account_number = $request->account_number;
            $withdrawTransaction->status = 'Pending';
            $withdrawTransaction->save();
           
            $point_up=$this->updateCwallet($user->id,$points,'down');
           
            return redirect()->back()->with('success','Withdraw Request sent successfully');
    }

    public function Transactions(Request $request){
       
            $transaction = WithdrawTransactions::with('user')->where('status','Pending')->get();
       
        return view('modules.withdraw.index',compact('transaction'));
    }
    public function TransactionsHistory(Request $request){
        $user = auth()->user();
            $transaction = WithdrawTransactions::with('user')->where('user_id',$user->id)->get();
        
        return view('modules.withdraw.index-h',compact('transaction'));
    }
    

    
    public function WithdrawTransactions(Request $request){
        $user = auth()->user();
        $transaction = WithdrawTransactions::with('user')->where('user_id',$user->id)->get();
        return view('modules.withdraw.show',compact('transaction'));
    }
    public function approve_transaction(Request $request)
    {
        
           
            $data =WithdrawTransactions::where('id',$request->id)->update(['status' => 'Approved']);
            
            return redirect()->back()->with('success','WithdrawTransactions Approved Successfully');

    }
    public function cancell_transaction(Request $request)
    {
        
            $data =WithdrawTransactions::where('id',$request->id)->update(['status' => 'Cancelled']);
            $points=$request->points;
            $point_up=$this->updateCwallet($request->user_id,$points,'up');
            
            return redirect()->back()->with('success','WithdrawTransactions Cancelled Successfully');

    }

    public function WithdrawHistory(Request $request){
        if(auth()->user()->hasRole('Admin')){
            $data = WithdrawTransactions::with('user')->get();
           
        }else{
            $data = WithdrawTransactions::with('user')->where('user_id',Auth::user()->id)->get();
        }
       
        return view('modules.Histories.WIthdraw_Transactions.index',compact('data'));
    }

    public function DeleteWithdrawTransactionHistory(Request $request){
        $data = WithdrawTransactions::where('id',$request->id)->delete();
        return redirect()->back()->with('success','WithdrawTransactions Deleted Successfully');
    }



    }

