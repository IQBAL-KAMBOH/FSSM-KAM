<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RpConversionHistory;
use App\Models\PairPoint;
use App\Models\BvLog;
use App\Models\UserKyc;
use App\Models\AdminAccountDetails;
use App\Models\WithdrawTransactions;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public static function dashboard()
    {   
        if(auth()->user()->hasRole('User')){
            $data=User::find(Auth::user()->id);
        }else{
            $data=[];
            $data['totalMembers']= User::where('user_type','User')->count();
            $data['activeMembers'] = User::where('user_type','User')->where('status','Active')->count();
            $data['inactiveMembers'] = User::where('user_type','User')->where('status','Inactive')->count();
            $data['cbv'] = User::where('user_type','User')->sum('cbv');
            $data['leftRefralSide'] = User::where('user_type','User')->where('refral_side','Left')->count();
            $data['rightRefralSide'] = User::where('user_type','User')->where('refral_side','Right')->count();
            $data['e_wallet']=User::where('user_type','User')->sum('e_wallet');
            $data['onlineStoreWallet']=User::where('user_type','User')->sum('store_bv');
            $settings = AdminAccountDetails::find(1);
            $pvlimit=$settings->pv_limit ?? 10;
            $autonetlimit=$settings->auto_net_limit ?? 1500;
            $data['unilevel_qualified']=User::where('user_type','User')->where('store_bv','>=',$pvlimit)->count('id');
            $data['auto_net_qualified']=User::where('user_type','User')->where('cpv','>=',$autonetlimit)->count('id');
            $data['pv_store']= User::where('user_type','User')->sum('store_pv_wallet');
            $data['cpv']= User::where('user_type','User')->sum('cpv');
            
            $data['ecoPoints']=User::where('user_type','User')->sum('direct_points');
            $data['affiliate_wallet']=User::where('user_type','User')->sum('affiliate_wallet');
            $data['left_bv']=User::where('user_type','User')->sum('bv_left');
            $data['right_bv']=User::where('user_type','User')->sum('bv_right');
            // $data['total_bv']=0;
            $data['total_withdraw']=WithdrawTransactions::where('status','Approved')->sum('amount');
            $data['withdraw_pending']=WithdrawTransactions::where('status','Pending')->sum('amount');
            $data['kyc_approved']=UserKyc::where('status','Approved')->count();
            $data['kyc_pending']=UserKyc::where('status','Pending')->count();
            $data['total_support']=0;
            $data['c_wallet']=User::where('user_type','User')->sum('c_wallet');
            $data['paid'] = User::where('user_type','User')->whereNotNull('plan_id')->count();
            $data['unpaid'] = User::where('user_type','User')->whereNull('plan_id')->count();
            $data['rank_ac'] = User::where('user_type','User')->whereNotNull('rank')->where('rank','!=','')->count();
            $data['rp_conversion']=User::where('user_type','User')->sum('register_points');
            $data['all_users_pairs_bv']=BvLog::whereDate('created_at',date('Y-m-d'))->where('type','up')->sum('bv');
            $data['all_users_pairs']=BvLog::whereDate('created_at',date('Y-m-d'))->where('type','up')->count('id');
           
            
        }
       
        return $data;
    }
    public static function b2bDashboard()
    {   
       
            $data=[];
         
            $settings = AdminAccountDetails::find(1);
            $data['b2b_price']=$settings->b2b_price ?? 1;
            $data['b2b_bv_wallet']= User::where('user_type','User')->sum('b2b_bv_wallet');
            $permissions = Permission::where('name','b2b_permission')->first();
            $data['b2b_users']=$permissions->users->count();
            $data['b2b_user_names']=$permissions->users;
       
            return $data;
    }
    public static function b2cDashboard()
    {   
       
            $data=[];
         
            $settings = AdminAccountDetails::find(1);
            $data['b2c_price']=$settings->b2c_price ?? 1;
            $data['b2c_percentage']=$settings->b2c_pool_percentage ?? 10;
            $data['b2c_pv_wallet']= User::where('user_type','User')->sum('b2c_pv_wallet');
            $permissions = Permission::where('name','b2c_permission')->first();
            $data['b2c_users']=$permissions->users->count();
            $data['b2c_user_names']=$permissions->users;
       
            return $data;
    }
    
    public static function checkRefralPermission($name)
    { 
        $sid4=0;
        $data = User::where('name', $name)->with('referral')->first();
        if($data->user_type=='Admin'){
            $sid4=1;
        }
        if($data){
            $s1 = User::where('id', $data->refral_id)->with('referral')->where('user_type','User')->first();
            if($s1 && $s1->refral_id){
               
                $sid4 =$s1->plan_id ?? 0;
                $s2 = User::where('id', $s1->refral_id)->with('referral')->where('user_type','User')->first();
                if($s2 && $s2->refral_id){
                    
                    $sid4 =$s2->plan_id ?? 0;
                    $s3 = User::where('id', $s2->refral_id)->with('referral')->where('user_type','User')->first();
                    if($s3 && $s3->refral_id){
                        
                        $sid4 =$s3->plan_id ?? 0;
                        
                    }
                }
            }
        }
       
       
       
        return $sid4;
    }
    public function b2bPoolReset($self){
        $data=User::where('user_type','User')->where('b2b_bv_wallet','>',0)->get();
        $permissions = Permission::where('name','b2b_permission')->first();
        $users=$permissions->users;
        $com=$self/100;
        

        foreach($users as $user){
            $userid=$user->id;
           $this->updateCwallet($userid,$com,'up');
           

        }
        foreach($data as $d){
            $data2=User::find($d->id);
            $data2->b2b_bv_wallet_converted=$data2->b2b_bv_wallet;
            $data2->b2b_bv_wallet=0;
            $data2->save();
        }
        return redirect()->to('/dashboard')->with('success','Converted Successfully');
    }
    public function b2cPoolReset($selfc){
        $data=User::where('user_type','User')->where('b2c_pv_wallet','>',0)->get();
        $permissions = Permission::where('name','b2c_permission')->first();
        $users=$permissions->users;
        $com=$selfc/100;
        

        foreach($users as $user){
            $userid=$user->id;
           $this->updateCwallet($userid,$com,'up');
           

        }
        
        
        foreach($data as $d){
            $data2=User::find($d->id);
            $data2->b2c_pv_wallet_converted=$data2->b2c_pv_wallet;
            $data2->b2c_pv_wallet=0;
            $data2->save();
        }
        return redirect()->back()->with('success','Converted Successfully');
    }
    public function convertBv(){
        $data=User::where('user_type','User')->get();
        foreach($data as $d){
            $this->indirectPairCommission($d->id);
            // $this->userRank($d->id);
        }
        return redirect()->back()->with('success','Converted Successfully');
    }
    public function userRank($id){
        $data='';
        $leftside=0;
        $rightside=0;
        $user=User::find($id);
        $refside=$this->checkWeaker($id);
       
        $refral_count= User::where('refral_id', $id)->get();
        foreach($refral_count as $ref){
            $refral_left= User::where('left_refral_side', $ref->id)->first();
            $refral_right= User::where('right_refral_side', $ref->id)->first();
            if($refral_left){
                $leftside++;
            }
            if($refral_right){
                $rightside++;
            }
        }
        $cbv=$user->cbv;
        if($cbv>=500 && $rightside>=2 && $leftside>=2){
            $data='Bronze Star';
        }
        if($cbv>=1200 && $rightside>=4 && $leftside>=4){
            $data='Silver Star';
        }
        if($cbv>=3000 && $rightside>=10 && $leftside>=10){
            $data='Gold Star';  
        }
        if($cbv>=7500){
            $ranks=$this->checkWeakerSidePackage($id,$refside,'Gold Star');
            if($ranks==1){
                $data='Platinum star'; 
            }
        }
        if($cbv>=10000){
            $ranks=$this->checkWeakerSidePackage($id,$refside,'Platinum star');
            if($ranks==1){
                $data='Ambassador Star'; 
            }
             
        }
        if($cbv>=35000){
            $ranks=$this->checkWeakerSidePackage($id,$refside,'Ambassador Star');
            if($ranks==1){
                $data='Ambassador Diamond  Star'; 
            }
             
        }
        if($cbv>=95000){
            $ranks=$this->checkWeakerSidePackage($id,$refside,'Ambassador Diamond  Star');
            if($ranks==1){
                $data='Global Ambassador Diamond Star';
            }
            
        }
        if($cbv>=450000){
            $ranks=$this->checkWeakerSidePackage($id,$refside,'Global Ambassador Diamond Star');
            if($ranks==1){
                $data='Crown Ambassador Diamond Star';
            }
            
        }
       
        $user->rank =$data;
        $user->save();
        return $user;
    }

   

    
}
