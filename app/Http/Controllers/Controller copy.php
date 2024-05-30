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
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
    public function updateCwallet($id,$points,$type)
    {
            $NewUser=0;
            $user =User::where('id',$id)->first();
            if($user){
                $old_points=$user->c_wallet;
                if($type=='up'){
                    $new_points=$old_points+$points;
                }else if($type=='down'){
                    $new_points=$old_points-$points;
                }
                $NewUser =User::where('id',$id)->update(['c_wallet'=>$new_points]);
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
    public function indirectPairCommission($user_id)
    {
            
            $user= User::find($user_id);
            $cut_bv=25;
            if($user){
                $user_package = packages::find($user->plan_id);
                $pairPoints=$user_package->pair_points;
                $pairPoints2=$user_package->pair_points_2;
                $pair_1=$user_package->pair_1;
                $future_point_limit=$user_package->future_point_limit;
                $pair_limit=$user_package->pair_limit;
                if($user_package){
                $left_bv=$user->bv_left;
                $right_bv=$user->bv_right;
                while($left_bv>0 && $right_bv>0){
                    if($left_bv>=$cut_bv && $right_bv>=$cut_bv){
                        $pair_points_count=PairPoint::where('user_id',$user->id)->count();
                        $todaypair_limit=PairPoint::where('user_id',$user->id)->whereDate('created_at', Carbon::today())->sum('points');
                        $todaypair_points=PairPoint::where('user_id',$user->id)->where('points',5)->whereDate('created_at', Carbon::today())->count();
                        if($todaypair_limit<$pair_limit){
                            if($todaypair_points>=$pair_1){
                                $i=$pair_points_count+1; // Last Pair Transaction Of all time
                                if ($i < $future_point_limit || ($i - $future_point_limit) % 5 != 0) {
                                    // Indirect Commission   updateStoreWallet

                                    /// Calculating 10 % for Store wallet
                                    $percentage =10;
                                    $old_points = $pairPoints2;
                                    $ten_percent = ($percentage / 100) * $old_points;
                                    $remaining_points=$old_points-$ten_percent;
                                    $point=$this->updateCwallet($user->id,$remaining_points,'up');
                                    //// Creating pair points Logs For C wallet
                                    $pair_history=$this->createPairPointLogs($user->id,$pairPoints2,'C Wallet','up');
                                }else{
                                    $point=$this->updateFuturePoints($user->id,$pairPoints2,'up');
                                    //// Creating pair points Logs For Future Points 
                                    $pair_history=$this->createPairPointLogs($user->id,$pairPoints2,'Future Points','up');
                                }
                                
                            }else{
                                $i=$pair_points_count+1;
                                if ($i < $future_point_limit || ($i - $future_point_limit) % 5 != 0) {
                                    $point=$this->updateCwallet($user->id,$pairPoints,'up');
                                     //// Creating pair points Logs For C wallet
                                    $pair_history=$this->createPairPointLogs($user->id,$pairPoints,'C Wallet','up');
                                }else{
                                    $point=$this->updateFuturePoints($user->id,$pairPoints,'up');
                                     //// Creating pair points Logs Futue Points
                                    $pair_history=$this->createPairPointLogs($user->id,$pairPoints,'Future Points','up');
                                }
                              
                                
    
                            }
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
                $user =User::where('id',$id)->update(['left_refral_side'=>$ref]); 
            }else if($side=='Right'){
                $user =User::where('id',$id)->update(['right_refral_side'=>$ref]); 
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
    public function checkWeaker($id){

        $done=0;
        $done2=0;
        $count_left=0;
        $count_right=0;
        $user_id=$id;

           while($done==0){
               $user =User::where('id',$user_id)->whereNotNull('left_refral_side')->first();
               if($user){
                   $user_id=$user->left_refral_side;
                   $count_left++;
               }else{
                   $done=1;
               }
           }  
           while($done2==0){
               $user =User::where('id',$user_id)->whereNotNull('right_refral_side')->first();
               if($user){
                   $user_id=$user->right_refral_side;
                   $count_right++;
               }else{
                   $done2=1;
               }
           }  
       
      
       if($count_left<$count_right){
          return 'Right';
       }else{
        return 'Left';
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
public function findingUpline($id,$side){

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







}


