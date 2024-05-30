<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DirectPoint;
use App\Models\WithdrawTransactions;
use App\Models\PairPoint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class StatsController extends Controller
{
    
    public function index()
    {  
       
        $data['myReferrals']= User::where('refral_id', Auth::user()->id)->count();
        $data['fp']= Auth::user()->future_points;
        $data['total_deposit']= Transaction::where('user_id', Auth::user()->id)->sum('amount');
        $data['total_withdraw']= WithdrawTransactions::where('user_id', Auth::user()->id)->sum('amount');
        $data['complete_withdraw']= WithdrawTransactions::where('user_id', Auth::user()->id)->where('status', 'Approved')->sum('amount');
        $data['pending_withdraw']= WithdrawTransactions::where('user_id', Auth::user()->id)->where('status', 'Pending')->sum('amount');
        $data['rejected_withdraw']= WithdrawTransactions::where('user_id', Auth::user()->id)->where('status', 'Cancelled')->sum('amount');
        $data['tfc']= DirectPoint::where('user_id', Auth::user()->id)->sum('points');
        $data['tbc']= PairPoint::where('user_id', Auth::user()->id)->sum('points');
        $data['cbv']= Auth::user()->cbv;
        $start_date =date('Y-m-d', strtotime( Auth::user()->created_at));
        $data['total_days']= floor((time() - strtotime($start_date)) / 86400);
        $data['e_wallet']= Auth::user()->e_wallet;
        $data['osw']= Auth::user()->online_store_wallet;
        return view('modules.Stats.index',compact(['data']));
    }

}
