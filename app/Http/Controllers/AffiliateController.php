<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAccountDetails;
use App\Models\User;
use App\Models\PvCommission;
class AffiliateController extends Controller
{
   
    public function income()
    {
       
        return view('modules.affiliate.income');
    }
    public function transfer(Request $request)
    {
          $id=$request->id;
          $points=$request->points;
        if($request->to=='C-Wallet'){
            $this->updateAffiliateWallet($id,$points,'down');
            $this->updateCwallet($id,$points,'up');
        }elseif($request->to=='DP'){
            $this->updateAffiliateWallet($id,$points,'down');
            $this->updateDirectPoints($id,$points,'up');
        }
        return redirect()->back()->with('success','Transfer successfully.');
    }
    public function index()
    {
        return view('modules.AffiliateSettings.index');
    }
    public function update(Request $request, $adminAccountDetails)
    {

        $data = AdminAccountDetails::find($adminAccountDetails);
        if(hasrole('Admin')){
            $data->update($request->all());
        }

       
        return redirect()->back()->with('success','Updated successfully.');
    }
    public static function networkSummary(Request $request)
    {   
        
            $dashboard=User::find($request->id);
        
        return view('modules.affiliate.summary', compact(['dashboard']));
    }
    public static function getTeam(Request $request)
    {
            $refral=auth()->user()->id;
            $i=$request->id;
            $user=User::select('id','name')->whereNull('plan_id')->where('refral_id',$refral)->get();
            $user1ids =$user->pluck('id');
            $user1['1'] =$user;
            

            $user2=User::select('id','name')->whereNull('plan_id')->whereIn('refral_id',$user1ids)->get();
            $user2ids =$user2->pluck('id');
            $user1['2'] =$user2;

            $user3=User::select('id','name')->whereNull('plan_id')->whereIn('refral_id',$user2ids)->get();
            $user3ids =$user3->pluck('id');
            $user1['3'] =$user3;

            $user4=User::select('id','name')->whereNull('plan_id')->whereIn('refral_id',$user3ids)->get();
            $user4ids =$user4->pluck('id');
            $user1['4'] =$user4;

            return response(['data' => $user1[$i]],200);
           
    }

}
