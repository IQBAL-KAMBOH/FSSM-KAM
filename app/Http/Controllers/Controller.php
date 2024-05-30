<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\User;
use App\Models\packages;
use App\Models\BvLog;
use App\Models\PairPoint;
use App\Models\DirectPoint;
use App\Models\UserKyc;
use App\Models\AdminAccountDetails;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function updatePvStorewallet($id,$points,$type)
    {
        $NewUser=0;
        $user =User::where('id',$id)->first();
        if($user){
            $old_points=$user->store_pv_wallet;
            if($type=='up'){
                $new_points=$old_points+$points;
            }else if($type=='down'){
                $new_points=$old_points-$points;
            }
            $NewUser =User::where('id',$id)->update(['store_pv_wallet'=>$new_points]);
        }
        
       
        return $NewUser;
    }
    public function updateB2BWallet($id,$points,$type)
    {
        $NewUser=0;
        $user =User::where('id',$id)->first();
        if($user){
            $old_points=$user->b2b_bv_wallet;
            if($type=='up'){
                $new_points=$old_points+$points;
            }else if($type=='down'){
                $new_points=$old_points-$points;
            }
            $NewUser =User::where('id',$id)->update(['b2b_bv_wallet'=>$new_points]);
        }
        
       
        return $NewUser;
    }
    public function updateB2CWallet($id,$points,$type)
    {
        $NewUser=0;
        $user =User::where('id',$id)->first();
        if($user){
            $old_points=$user->b2c_pv_wallet;
            if($type=='up'){
                $new_points=$old_points+$points;
            }else if($type=='down'){
                $new_points=$old_points-$points;
            }
            $NewUser =User::where('id',$id)->update(['b2c_pv_wallet'=>$new_points]);
        }
        
       
        return $NewUser;
    }
    public function updateAffiliateWallet($id,$points,$type)
    {
        $NewUser=0;
        $user =User::where('id',$id)->first();
        if($user){
            $old_points=$user->affiliate_wallet;
            if($type=='up'){
                $new_points=$old_points+$points;
            }else if($type=='down'){
                $new_points=$old_points-$points;
            }
            $NewUser = User::where('id',$id)->update(['affiliate_wallet'=>$new_points]);
        }
        
       
        return $NewUser;
    }
    public function balancePvStorewallet($id)
    {
           
            $settings = User::find($id);
            $old_points=$settings->store_pv_wallet;
            return $old_points;
    }
    public static function getDirectRefrals($refral)
    {
            
            $user1=User::where('refral_id',$refral)->whereNotNull('plan_id')->get();
            $user1ids =$user1->pluck('id');
            $user1['1'] =$user1->count();

            $user2=User::whereIn('refral_id',$user1ids)->whereNotNull('plan_id')->get();
            $user2ids =$user2->pluck('id');
            $user1['2'] =$user2->count();

            $user3=User::whereIn('refral_id',$user2ids)->whereNotNull('plan_id')->get();
            $user3ids =$user3->pluck('id');
            $user1['3'] =$user3->count();

            $user4=User::whereIn('refral_id',$user3ids)->whereNotNull('plan_id')->get();
            $user4ids =$user4->pluck('id');
            $user1['4'] =$user4->count();

            $user5=User::whereIn('refral_id',$user4ids)->whereNotNull('plan_id')->get();
            $user5ids =$user5->pluck('id');
            $user1['5'] =$user5->count();

            $user6=User::whereIn('refral_id',$user5ids)->whereNotNull('plan_id')->get();
            $user6ids =$user6->pluck('id');
            $user1['6'] =$user6->count();

            $user7=User::whereIn('refral_id',$user6ids)->whereNotNull('plan_id')->get();
            $user7ids =$user7->pluck('id');
            $user1['7'] =$user7->count();

            $user8=User::whereIn('refral_id',$user7ids)->whereNotNull('plan_id')->get();
            $user8ids =$user8->pluck('id');
            $user1['8'] =$user8->count();

            $user9=User::whereIn('refral_id',$user8ids)->whereNotNull('plan_id')->get();
            $user9ids =$user9->pluck('id');
            $user1['9'] =$user9->count();

            $user10=User::whereIn('refral_id',$user9ids)->whereNotNull('plan_id')->get();
            $user10ids =$user10->pluck('id');
            $user1['10'] =$user10->count();
           
            return $user1;
    }
    public function updateDirectPoints($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->direct_points;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['direct_points'=>$new_points]);
            }
            
           
            return $NewUser;
    }
    public function updateStoreBv($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->store_bv;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['store_bv'=>$new_points]);
            }
            
           
            return $NewUser;
    }
    public function updateCpv($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->cpv;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['cpv'=>$new_points]);
            }
            
           
            return $NewUser;
    }
    public function updatePvCommission($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->pv_commission;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['pv_commission'=>$new_points]);
            }
            
           
            return $NewUser;
    }
    public function updateCwallet($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->c_wallet;
                if($type=='up'){
                    $new_points=$old_points+$points;
                    $this->updateTotalEarning($id,$points,$type);
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['c_wallet'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateTotalEarning($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->total_earning;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['total_earning'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateStoreWallet($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->online_store_wallet;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['online_store_wallet'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateFuturePoints($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->future_points;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['future_points'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateCBV($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->cbv;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['cbv'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateB2B($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->b2b_bv_wallet;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['b2b_bv_wallet'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function updateB2C($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->b2c_pv_wallet;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['b2c_pv_wallet'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    

    public function indirectPairCommission($user_id)
    {
            
            $user= User::find($user_id);
            if($user->cbv){
                $usercbv=$user->cbv;
            }else{
                $usercbv=0;
            }
            
             $cut_bv=25;
            /////////// Store Wellat ki jo 3000 CBV k bad Condition set ki ha  Admin apne hisab se New Condition add ya Remove kar paye / 
            $sotre_wallet_limit=3000;
            $store_percentage =10;
            $future_point_pair_count =4;
            if($user){
                $user_package = packages::find($user->plan_id);
                if($user_package){
                //$pairPoints=5;
                $pairPoints=$user_package->pair_points;
                
                
                $pairPoints2=$user_package->pair_points_2;
                $pair_1=$user_package->pair_1;
                $future_point_limit=$user_package->future_point_limit;
                $pair_limit=$user_package->pair_limit;

                $sotre_wallet_limit=$user_package->sotre_wallet_limit ?? 3000;
                $store_percentage =$user_package->store_percentage ?? 10;
                $future_point_pair_count =$user_package->future_point_pair_count ?? 4;
                
                $left_bv=$user->bv_left;
                $right_bv=$user->bv_right;
                while($left_bv>0 && $right_bv>0 && $left_bv>=$cut_bv && $right_bv>=$cut_bv){
                    if($left_bv>=$cut_bv && $right_bv>=$cut_bv){
                        $pair_points_count=PairPoint::where('user_id',$user->id)->count();
                        $todaypair_limit=PairPoint::where('user_id',$user->id)->whereDate('created_at', Carbon::today())->sum('points');
                        $todaypair_points=PairPoint::where('user_id',$user->id)->where('points',$pairPoints)->whereDate('created_at', Carbon::today())->count();
                        if($todaypair_limit<$pair_limit){
                            $cwallet_points=0;
                            $future_points=0;
                            $storeWalletPoints=0;
                            $final_points=0;
                            
                            if($pair_1!=NULL && $todaypair_points>=$pair_1){
                                // Pair 2
                                // $final_points=$pairPoints2; 
                                
                                $final_points=$pairPoints;
                            }else{
                                $final_points=$pairPoints;
                            }

                            /// Checking for future Points
                            $i=$pair_points_count+1;
                            if ($i < $future_point_limit || ($i - $future_point_limit) % $future_point_pair_count != 0) {
                                $log_type='C Wallet';
                                /// is store Open
                                // if($usercbv>=$sotre_wallet_limit){
                                //     $storeWalletPoints = ($store_percentage / 100) * $final_points;
                                //     $cwallet_points=$final_points-$storeWalletPoints;
                                // }else{
                                //     $cwallet_points=$final_points;
                                // }  
                                $cwallet_points=$final_points;
                            }else{
                                $log_type='Future Points';
                                // $future_points=$final_points;
                                $future_points=1;
                            }
                            /// Checking for future Points end
                            $point=$this->updateCwallet($user->id,$cwallet_points,'up');
                            //$point=$this->updateStoreWallet($user->id,$storeWalletPoints,'up');
                            $point=$this->updateFuturePoints($user->id,$future_points,'up');
                            $pair_history=$this->createPairPointLogs($user->id,$final_points,$log_type,'up');
                        }
                        
                        $cbv=$this->updateCBV($user->id,$cut_bv,'up');
                        $left_bv_cut=$this->updateBv($user->id,$cut_bv,'Left','down');
                        $right_bv_cut=$this->updateBv($user->id,$cut_bv,'Right','down');
                        
                    }
                   $user= User::find($user_id);
                   $left_bv=$user->bv_left;
                   $right_bv=$user->bv_right;
                }
                }
                
            }
           return $user;      
    }
  
    public function updateBv($id,$points,$position,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                if($position=='Left'){
                    $old_points=$user->bv_left;
                    if($type=='up'){
                        $new_points=$old_points+$points;
                    }else if($type=='down'){
                    $new_points=$old_points-$points;
                    }
                   $NewUser =User::where('id',$id)->update(['bv_left'=>$new_points]);
                  
                }else if($position=='Right'){
                    $old_points=$user->bv_right;
                     if($type=='up'){
                         $new_points=$old_points+$points;
                     }else if($type=='down'){
                         $new_points=$old_points-$points;
                     }
                    $NewUser =User::where('id',$id)->update(['bv_right'=>$new_points]);

                }
                $this->createBvLogs($id,$points,$position,$type);
            }
            
            
            return $NewUser;
    }
    public function updateRegisterPoints($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->register_points;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['register_points'=>$new_points]);
            }
            
            
            return $NewUser;
    }
    public function checkDirectPoints($id)
    {
            $balance=0;
            $user =User::where('id',$id)->first();
            if($user){
                $balance =$user->direct_points;
            }
            return $balance;
    }
    public function checkCwallet($id)
    {
            $balance=0;
            $user =User::where('id',$id)->first();
            if($user){
                $balance =$user->c_wallet;
            }
            return $balance;
    }
   
    public function checkPair($id)
    {
            $done=0;
            $user =User::where('id',$id)->whereNotNull('left_refral_side')->whereNotNull('right_refral_side')->first();
            if($user){
                $done=1;
            }
            return $done;
    }
    public function checkRegisterPoints($id)
    {
            $balance=0;
            $user =User::where('id',$id)->first();
            if($user){
                $balance =$user->register_points;
            }
            return $balance;
    }
    public function checkKyc($id)
    {
            $ok=0;
            $user =UserKyc::where('user_id',$id)->first();
            if($user){
                if($user->status=='Approved'){
                 $ok =1;
               }
            }
            return $ok;
    }
    public static function checkUserKyc($id)
    {
            $user =UserKyc::where('user_id',$id)->first();
            return $user;
    }
    public function updateUserPackage($id,$plan_id)
    {
            $user =User::where('id',$id)->update(['plan_id' => $plan_id]);
            return $user;
    }
    public function checkRefralSide($id,$side)
    {      
            $done=0;
            $user_id=$id;
            if($side=='Left'){
                while($done==0){
                    $user =User::where('id',$user_id)->whereNotNull('left_refral_side')->first();
                    if($user){
                        $user_id=$user->left_refral_side;
                    }else{
                        $done=1;
                    }
                }  
            }else if($side=='Right'){
                while($done==0){
                    $user =User::where('id',$user_id)->whereNotNull('right_refral_side')->first();
                    if($user){
                        $user_id=$user->right_refral_side;
                    }else{
                        $done=1;
                    }
                }  
            }
           

            return $user_id;
    }
    public function updateRefralSide($id,$side,$ref)
    {      
            if($side=='Left'){
                if($id==$ref){
                    $user =User::where('id',$id)->first(); 
                }else{
                    $user =User::where('id',$id)->update(['left_refral_side'=>$ref]); 
                }

            }else if($side=='Right'){
                if($id==$ref){
                    $user =User::where('id',$id)->first(); 
                }else{
                    $user =User::where('id',$id)->update(['right_refral_side'=>$ref]); 
                }

            }
           return $user;      
    }
    public static function checkUserPackage($id)
    {      
           $isPackage=User::where('id',$id)->with('package')->whereNotNull('plan_id')->first();
           return $isPackage;      
    }
   
    public function createBvLogs($id,$bv,$position,$type)
    {
            $user =BvLog::create(['user_id' => $id,'bv' => $bv,'position' => $position,'detail' => '','type' => $type]);
            return $user;
    }
    public function createPairPointLogs($id,$bv,$details,$type)
    {
            $user =PairPoint::create(['user_id' => $id,'points' => $bv,'position' => 'All','detail' => $details,'type' => $type]);
            return $user;
    }
    public function dailyPairPoints($id)
    {
            $get =PairPoint::where('user_id',$id)->whereDate('created_at', Carbon::today())->get();
            return $get;
    }
    public function createDirectPointLogs($id,$bv,$position,$type)
    {
            $user =DirectPoint::create(['user_id' => $id,'points' => $bv,'position' => $position,'detail' => '','type' => $type]);
            return $user;
    }
    public function countTeam($id){
        $user =User::where('id',$id)->first();
        if(!$user){
            return 0;
        }
        if($user){
               return ( 1 + $this->countTeam($user->left_refral_side) + $this->countTeam($user->right_refral_side));
        }
    }
public function checkWeaker($id){
    $count_left=0;
    $count_right=0;
        $user =User::where('id',$id)->whereNotNull('left_refral_side')->first();
        if($user){
            $count_left=$this->countTeam($user->left_refral_side);
            $count_right=$this->countTeam($user->right_refral_side);
        }
        
       if($count_left<$count_right){
          return 'Left';
       }else{
          return 'Right';
       }

}

public function checkWeakerSidePackage($id,$side,$package){

    
    $rank='e';
    $user_id=$id;
    $user =User::where('id',$user_id)->first();
    $left_side=$user->left_refral_side;
    $right_side=$user->right_refral_side;
    if($side=='Left'){
           $refr =User::where('id',$left_side)->first();
           if($refr){
                $rank=$refr->rank;
           }
      
    }else if($side=='Right'){
        $refr =User::where('id',$right_side)->first();
        if($refr){
             $rank=$refr->rank;
        }
       
    }
    if($rank==$package){
        return 1;
    }else{
        return 0;
    }
 

}

///////////////////////////////////////////////    Upline Finding ///////////////
public static function findingUpline($id,$side){

    $done=0;
    $upline=[];
    $user_id=$id;
    if($side=='Left'){
        while($done==0){
            $user =User::where('left_refral_side',$user_id)->first();
            if($user){
                $user_id=$user->id;
                $upline[]=$user->id;
            }else{
                $done=1;
            }
        }  
    }else if($side=='Right'){
        while($done==0){
            $user =User::where('right_refral_side',$user_id)->first();
            if($user){
                $user_id=$user->id;
                $upline[]=$user->id;
            }else{
                $done=1;
            }
        }  
    }
   

    return $upline;
 

}


public function findingUplineNew($id) {
    $upline =array();
    $left_id = $id;
    $right_id = $id;
    while (true) {
        $left_user = User::where('left_refral_side', $left_id)->first();
        if ($left_user) {
            $upline['Left'][] = $left_user->id;
            $left_id = $left_user->id;
            $right_id = $left_user->id;
        }

        $right_user = User::where('right_refral_side', $right_id)->first();
        if ($right_user) {
            $upline['Right'][] = $right_user->id;
            $right_id = $right_user->id;
            $left_id = $right_user->id;
        }

        if (!$left_user && !$right_user) {
            break;
        }
    }

    return $upline;
}









// Indirect Commission 

// public function indirectPairCommission($refral,$package_bv,$position)
//     {
            
//             $packages = packages::orderBy('id', 'DESC')->get();
//             $done=0;
//             foreach($packages as $pac){
//                 $user =User::where('id',$refral)->first();
//                 $left_bv=$user->bv_left;//25
//                 $right_bv=$user->bv_right;//75
//                 if($left_bv>0 && $right_bv>0){
//                     if($pac->bv<=$left_bv && $pac->bv<=$right_bv){
//                     $point=$this->updateCwallet($refral,$pac->pair_points,'up');
//                     $cbv=$this->updateCBV($refral,$pac->bv,'up');
//                     $this->createPairPointLogs($refral,$pac->pair_points,$position,'up');
//                     if($point){
//                         $this->updateBv($refral,$pac->bv,'Left','down');
//                         $this->updateBv($refral,$pac->bv,'Right','down');
//                     }
//                 }
//              }

//             }
//             return $user;
//     }



// Indirect Commission 


public function checkDownline($id, $id2) {
    $downlines = [];

    $user = User::where('id', $id)->first();

    if (!$user) {
        return $downlines;
    }

    $downlines[] = $user->id; // Add the current user's ID to the list of downlines

    $leftDownlines = $this->checkDownline($user->left_refral_side, $id2);
    $rightDownlines = $this->checkDownline($user->right_refral_side, $id2);

    $downlines = array_merge($downlines, $leftDownlines, $rightDownlines);

    return $downlines;
}



}


