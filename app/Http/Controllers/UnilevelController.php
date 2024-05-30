<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAccountDetails;
use App\Models\User;
use App\Models\PvCommission;
class UnilevelController extends Controller
{
    public function income()
    {
       
        return view('modules.unilevel.income');
    }
    public static function incomeAll($userId,$level)
    {
       
        $com = PvCommission::where([
        'users_id' => $userId,
        'level' => $level
        ])->sum('commission');
        $pv = PvCommission::where([
            'users_id' => $userId,
            'level' => $level
            ])->sum('pv');
        $data['com']=$com;
        $data['pv']=$pv;
       
        return $data;
    }
    public function index()
    {
        return view('modules.UnilevelSettings.index');
    }
    public function update(Request $request, $adminAccountDetails)
    {

        $data = AdminAccountDetails::find($adminAccountDetails);
        if(hasrole('Admin')){
            $data->update($request->all());
        }

       
        return redirect()->back()->with('success','Updated successfully.');
    }
    public function convertPv(){
        $settings = AdminAccountDetails::find(1);
        $pvlimit=$settings->pv_limit ?? 10;
        $data=User::where('user_type','User')->where('store_bv','>=',$pvlimit)->get();
        $data2=User::where('user_type','User')->where('store_bv','>',0)->get();
        /// Commission Distribution
        $comd=0;
        foreach($data as $user){
            $comms=$this->getDirectRefralsComm($user->id);
            foreach($comms as $key => $value){
              
                $per=0;
                $percent=0;
                if($key==1){
                   $percent=$settings->l1;
                }
                if($key==2){
                    $percent=$settings->l2;
                 }
                 if($key==3){
                    $percent=$settings->l3;
                 }
                 if($key==4){
                    $percent=$settings->l4;
                 }
                 if($key==5){
                    $percent=$settings->l5;
                 }
                 if($key==6){
                    $percent=$settings->l6;
                 }
                 if($key==7){
                    $percent=$settings->l7;
                 }
                 if($key==8){
                    $percent=$settings->l8;
                 }
                 if($key==9){
                    $percent=$settings->l9;
                 }
                 if($key==10){
                    $percent=$settings->l10;
                 }
                

                $commission=($percent/100)*$value;
                
                 // Check if a record with the given values already exists
                   $existingCommission = PvCommission::where([
                       'users_id' => $user->id,
                       'level' => $key,
                       'pv' => $value,
                       'commission' => $commission,
                       'percent' => $percent,
                   ])->whereDate('created_at', now()->toDateString())->first();

                  // If the record doesn't exist, create a new one
                  if (!$existingCommission) {
                      $com_done = PvCommission::create([
                          'users_id' => $user->id,
                          'level' => $key,
                          'pv' => $value,
                          'commission' => $commission,
                          'percent' => $percent,
                      ]);
                      $this->updateCwallet($user->id,$commission,'up');
                      
                  } 


               
            }
            $comd++;
        }
        /// Commission Distribution End


        ///// PV Co{nversion
        
            foreach($data2 as $userId){
                $user=User::find($userId->id);
                $oldpv=$user->store_bv;
                $oldcpv=$user->cpv;
                $newcpv=$oldcpv+$oldpv;
                $user->store_bv=0;
                $user->cpv=$newcpv;
                $user->save();
            }
        
       

        ///// PV Conversion End
        
        return redirect()->back()->with('success','Converted Successfully');
    }
    public static function networkSummary(Request $request)
    {   
        
            $dashboard=User::find($request->id);
        
        return view('modules.unilevel.summary', compact(['dashboard']));
    }
    public static function getDirectRefralsComm($refral)
    {
            
            $user=User::select('id','store_bv')->whereNotNull('plan_id')->where('refral_id',$refral)->get();
            $user1ids =$user->pluck('id');
            $user1['1'] =$user->sum('store_bv');
            

            $user2=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user1ids)->get();
            $user2ids =$user2->pluck('id');
            $user1['2'] =$user2->sum('store_bv');

            $user3=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user2ids)->get();
            $user3ids =$user3->pluck('id');
            $user1['3'] =$user3->sum('store_bv');

            $user4=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user3ids)->get();
            $user4ids =$user4->pluck('id');
            $user1['4'] =$user4->sum('store_bv');

            $user5=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user4ids)->get();
            $user5ids =$user5->pluck('id');
            $user1['5'] =$user5->sum('store_bv');

            $user6=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user5ids)->get();
            $user6ids =$user6->pluck('id');
            $user1['6'] =$user6->sum('store_bv');

            $user7=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user6ids)->get();
            $user7ids =$user7->pluck('id');
            $user1['7'] =$user7->sum('store_bv');

            $user8=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user7ids)->get();
            $user8ids =$user8->pluck('id');
            $user1['8'] =$user8->sum('store_bv');

            $user9=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user8ids)->get();
            $user9ids =$user9->pluck('id');
            $user1['9'] =$user9->sum('store_bv');

            $user10=User::select('id','store_bv')->whereNotNull('plan_id')->whereIn('refral_id',$user9ids)->get();
            $user10ids =$user10->pluck('id');
            $user1['10'] =$user10->sum('store_bv');
           
            return $user1;
    }
    public static function getUnilevelTeam(Request $request)
    {
            $refral=auth()->user()->id;
            $i=$request->id;
            $user=User::select('id','name')->whereNotNull('plan_id')->where('refral_id',$refral)->get();
            $user1ids =$user->pluck('id');
            $user1['1'] =$user;
            

            $user2=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user1ids)->get();
            $user2ids =$user2->pluck('id');
            $user1['2'] =$user2;

            $user3=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user2ids)->get();
            $user3ids =$user3->pluck('id');
            $user1['3'] =$user3;

            $user4=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user3ids)->get();
            $user4ids =$user4->pluck('id');
            $user1['4'] =$user4;

            $user5=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user4ids)->get();
            $user5ids =$user5->pluck('id');
            $user1['5'] =$user5;

            $user6=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user5ids)->get();
            $user6ids =$user6->pluck('id');
            $user1['6'] =$user6;

            $user7=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user6ids)->get();
            $user7ids =$user7->pluck('id');
            $user1['7'] =$user7;

            $user8=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user7ids)->get();
            $user8ids =$user8->pluck('id');
            $user1['8'] =$user8;

            $user9=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user8ids)->get();
            $user9ids =$user9->pluck('id');
            $user1['9'] =$user9;

            $user10=User::select('id','name')->whereNotNull('plan_id')->whereIn('refral_id',$user9ids)->get();
            $user10ids =$user10->pluck('id');
            $user1['10'] =$user10;

            return response(['data' => $user1[$i]],200);
           
    }
}
