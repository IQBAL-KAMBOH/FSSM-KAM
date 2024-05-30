<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BvLog;
use App\Models\packages;
use App\Models\AdminAccountDetails;
use App\Models\purchasedPlan;
use PDF;
use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{

    public static function checkUserPackage($userId)
    {
        $user = User::find($userId);

        if ($user) {
            // Assuming you have a relationship set up between users and plans
            // For example, you might have a pivot table named 'user_plans' to store user-plan associations
            $plans = $user->plan_id;

            // Check if the user has any plans associated
           
                return $plans;
            
        }

        return false; // User does not have any plans
    }

    public function update(Request $request,$id){

        $existUser = User::where('email', $request->email)->where('id', '!=', $id)->first();
        if($existUser){
            return redirect()->back()->with('error','Email Already Exist');
        }
        $existUsername = User::where('name', $request->name)->where('id', '!=', $id)->first();
        if($existUsername){
            return redirect()->back()->with('error','Username Already Exist');
        } 
        $existFullName = User::where('full_name',$request->full_name)->where('id', '!=', $id)->first();
        if($existFullName){
            return redirect()->back()->with('error','Full Name Already Exist');
        }
        $data = User::find($id);
        $pic=$data->profile_photo_path;
          if ($_FILES['file']['name']) {       
            if (!$_FILES['file']['error']) {
                  $image = $request->file('file');
                  $imageName = time() . '_' . $image->getClientOriginalName();  
                  $destination ='uploads/Profile/'.$imageName ;
                  $request->file->move(public_path('uploads/Profile'), $imageName);
                  $pic = $destination;
            }else{
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
           
          }
          
        
        $data->update($request->except('file')+['profile_photo_path' => $pic]);
        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    public function UserProfile(){
        $user = Auth::user()->id;
        $data = User::find($user);
        return view('modules.User_Profile.user_Profile',compact(['data']));

    }
    public function UserShow(Request $request){
        $data = User::find($request->user_id);
        return view('modules.Users.user_Profile',compact(['data']));
    }
    public function myReferral_tree(Request $request)
    {  
        if($request->user_name){
            $user1=User::where('name',$request->user_name)->first();
            if($user1){
                $ids=$this->checkDownline(Auth::user()->id,$user1->id);
                
                if(in_array($user1->id, $ids)){
                    $data= User::where('id', $user1->id)->with(['left','right'])->first();
                   
                }else{
                    $data= User::where('id', Auth::user()->id)->with(['left','right'])->first();
                    return view('modules.referrals.refral_tree',compact(['data']));
                }
               
            }else{
                $data= User::where('id', Auth::user()->id)->with(['left','right'])->first();
                return view('modules.referrals.refral_tree',compact(['data']));
            }
           
            
        }else{
            $data= User::where('id',$request->user_id)->with(['left','right'])->first();
        }
      
        return view('modules.referrals.refral_tree',compact(['data']));
    }
    public function networkSummary(Request $request)
    {   
             $network=[];
            if($request->user_name){
                
                $user1=User::where('name',$request->user_name)->first();
                if($user1){
                    $ids=$this->checkDownline(Auth::user()->id,$user1->id);
                    
                    if(in_array($user1->id, $ids)){
                        $user=User::where('id', $user1->id)->first();
                    }else{
                        return view('modules.Network_Summary.index',compact(['network']));
                    }
                   
                }else{
                    return view('modules.Network_Summary.index',compact(['network']));
                }
                
            }else if($request->user_id){
                $user=User::find($request->user_id);
            }else{
                return view('modules.Network_Summary.index',compact(['network']));
            }
            
            
            $network['paid_left']=$this->checkNodes($user->left_refral_side);
            $network['paid_right']= $this->checkNodes($user->right_refral_side);
            $network['bv_left']= $user->bv_left;
            $network['bv_right']= $user->bv_right;
            $network['ref_left']=  $this->checkRef($user->id,'Left');
            $network['ref_right']=  $this->checkRef($user->id,'Right');
            $network['user_name_own']= $user->name;
            $network['user_package_own']= $user->package?->packages ?? 'Unpaid';
            $network['referred_by']= $user->referral?->name;
            $network['cbv']= $user->cbv;
            $network['rank']= $user->rank;
            return view('modules.Network_Summary.index',compact(['network']));
    }
    public function userPassword(Request $request)
    {
        
        $user =User::where('id',$request->user_id)->first();
        return view('modules.Users.updatePassword',compact(['user']));

    }
    public function editUser(Request $request)
    {
        
        $user =User::where('id',$request->user_id)->first();
      
        return view('modules.Users.edit',compact(['user']));

    }
    public static function mySponser($id)
    {  
        $user =User::find($id);
        return $user;
    }


    public function updateUser(Request $request)
    {
      
         $user =User::where('id','!=',$request->user_id)->where('name',$request->name)->first();
        
         if($user){
            if(auth()->user()->hasrole('User') && auth()->user()->hasAnyPermission(['unpaid-users'])){
                return \Redirect::to('unpaid-users/?error=Username Already Exists');
            }
            return \Redirect::to('users/?error=Username Already Exists');
         
         }
         $emailuser =User::where('id','!=',$request->user_id)->where('email',$request->email)->first();
         if($emailuser){
            if(auth()->user()->hasrole('User') && auth()->user()->hasAnyPermission(['unpaid-users'])){
                return \Redirect::to('unpaid-users/?error=Email Already Exists');
            }
            return \Redirect::to('users/?error=Email Already Exists');
         
         }
         
         $cnicuser =User::where('id','!=',$request->user_id)->where('cnic',$request->cnic)->first();
         if($cnicuser){
            if(auth()->user()->hasrole('User') && auth()->user()->hasAnyPermission(['unpaid-users'])){
                return \Redirect::to('unpaid-users/?error=Cnic Already Exists');
            }
            return \Redirect::to('users/?error=Cnic Already Exists');
         
         }
        
        $data =User::where('id',$request->user_id)->update(
            [
                'name'=> $request->name,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'father_name' => $request->father_name,
                'cnic' => $request->cnic,
                'created_at' => $request->created_at
            ]
        );
        if(auth()->user()->hasrole('User') && auth()->user()->hasAnyPermission(['unpaid-users'])){
            return \Redirect::to('unpaid-users/?success=Updated Successfully');
        }
        return \Redirect::to('users/?success=Updated Successfully');
       
       
    }
    public function searchAllUsers(){
      
        return view('modules.Users.searchAll');
    }
    public function searchPaidUsers(){
      
        return view('modules.Users.searchPaid');
    }
    public function searchUnPaidUsers(){
      
        return view('modules.Users.searchUnPaid');
    }
    public function updatePassword(Request $request)
    {
        // Get the authenticated user
        $user =User::where('id',$request->user_id)->first();
    // Check if the old password matches the user's current password
  
    // if (!Hash::check($request->old_password, $user->password)) {
    //       return redirect()->intended('/users')->with('error', 'Old Password is Incorrect');
    // }
    
    // Update the user's password
    $user->password = Hash::make($request->new_password);
    $user->string_password = $request->new_password;
    $user->save();
    
    
    return redirect()->intended('/users')->with('success', 'password has been updated.');
       
       
    }
    public function myPassword(Request $request)
    {
        // Get the authenticated user
    $user = auth()->user();
    // Check if the old password matches the user's current password
  
    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('error', 'Old Password is Incorrect');
    }
    
    // Update the user's password
    $user->password = Hash::make($request->new_password);
    $user->string_password = $request->new_password;
    $user->save();
    
    return redirect()->back()->with('success', 'Your password has been updated.');
       
       
    }

    public function networkSummaryRefrals(Request $request)
    {       
            $user_id=$request->user_id;
            $user =User::where('id',$user_id)->first();
        
            $network=[];
            $network['paid_left']= $this->checkNodes($user->left_refral_side);
            $network['paid_right']= $this->checkNodes($user->right_refral_side);
            $network['bv_left']= $user->bv_left;
            $network['bv_right']= $user->bv_right;
            $network['ref_left']=  $this->checkRef($user_id,'Left');
            $network['ref_right']=  $this->checkRef($user_id,'Right');
            $network['user_name_own']= $user->name;
            $network['user_package_own']= $user->package?->packages ?? 'Unpaid';
            $network['referred_by']= $user->referral?->name;
            $network['cbv']= $user->cbv;
            $network['rank']= $user->rank;
           
            return response(['data'=>$network],200);
    }
    public function checkNodes($id){
        $user =User::where('id',$id)->first();
        if(!$user){
            return 0;
        }
        if($user){
               return ( 1 + $this->checkNodes($user->left_refral_side) + $this->checkNodes($user->right_refral_side));
        }
    }
    public static function checkUserNodes($id){
        $user =User::where('id',$id)->first();
        if(!$user){
            return 0;
        }
        if($user){
               return ( 1 + Self::checkUserNodes($user->left_refral_side) + Self::checkUserNodes($user->right_refral_side));
        }
    }
   public function checkNetworkBv($id,$side){

    $done=0;
    $count=0;
   $user_id=$id;
   if($side=='Left'){
       while($done==0){
           $user =User::where('id',$user_id)->whereNotNull('left_refral_side')->first();
           if($user){
               $user_id=$user->left_refral_side;
               $count+=$user->bv_left;
           }else{
               $done=1;
           }
       }  
   }else if($side=='Right'){
       while($done==0){
           $user =User::where('id',$user_id)->whereNotNull('right_refral_side')->first();
           if($user){
               $user_id=$user->right_refral_side;
               $count+=$user->bv_right;
           }else{
               $done=1;
           }
       }  
   }
  

   return $count;


}

public function checkRef($id,$side){

    $count=0;
   $user_id=$id;
   $user = User::where('refral_id',$user_id)->get();
   foreach($user as $u){
       if($side=='Left'){
        $user =User::where('left_refral_side',$u->id)->first();
        if($user){
         $count++;
        }

       }else if($side=='Right'){
        $user =User::where('right_refral_side',$u->id)->first();
        if($user){
         $count++;
        }
       }

   }
   return $count;
}
public function customLogin(Request $request)
{

   
    $credentials = $request->validate([
        'login' => 'required',
        'password' => 'required',
    ]);
  
    $user = User::where(function ($query) use ($credentials) {
        $query->where('email', $credentials['login'])
              ->orWhere('name', $credentials['login']);
    })->first();
   
    if ($user && Hash::check($credentials['password'], $user->password)) {
        // Successful login
        Auth::login($user);
        return response()->json(['message' => 'success','user' => $user], 200);
    }

    // Failed login attempt
    return response()->json(['message' => 'unauthenticated'], 401);
}


public function logout(Request $request)
{
    Auth::guard('web')->logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
    public function checkRefral(Request $request)
    { 
        $sid4=0;
        $data = User::where('name', $request->name)->with('referral')->first();
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
       
       
       
        return response(['data'=>$data,'s4' => $sid4],200);
    }
    
    public function myReferrals()
    {  
        $data= User::where('refral_id', Auth::user()->id)->get();
        return view('modules.referrals.index',compact(['data']));
    }
    public function drawTree(Request $request)
    {  
        $data= User::where('id',$request->id)->with(['left','right'])->first();
        return response(['data'=> $data],200);;
    }
    
    public static function myReferralSides($id)
    {  
        $user= User::find($id);
        
        return $user;
    }
    
    public function getUserDetail(Request $request)
    {  
        $data =User::where('name', $request->name)->first();
    
     
        return response(['data' => $data],200);
    }
      public function allUsers(Request $request){
            $user = Auth::user();
            if($user->user_type == 'Admin'){
                $data = User::where('id','!=',$user->id)->where('user_type','User')->get();
                return view('modules.Users.index',compact(['data']));
            }else  if(auth()->user()->hasAnyPermission(['user_profile'])){
                $data = User::where('id','!=',$user->id)->where('user_type','User')->get();
                return view('modules.Users.index2',compact(['data']));
            }else{
                return redirect()->back()->with('error','You are not authorized to view this page');
            }
     }
     public function allUnpaidUsers(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin' || auth()->user()->hasAnyPermission(['unpaid-users'])){
            $data = User::where('id','!=',$user->id)->where('user_type','User')->whereNull('plan_id')->get();
            return view('modules.Users.index-unpaid',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allpaidUsers(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('user_type','User')->whereNotNull('plan_id')->get();
            return view('modules.Users.index-paid',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function getSearchedAll(Request $request){
        $user = Auth::user();
        if(auth()->user()->user_type == 'Admin' || auth()->user()->hasAnyPermission(['search-all-users'])){
            $data = User::where('id','!=',$user->id)->where('id',$request->user_id)->where('user_type','User')->get();
            return view('modules.Users.index',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function getSearchedPaid(Request $request){
        $user = Auth::user();
        if(auth()->user()->user_type == 'Admin' || auth()->user()->hasAnyPermission(['search-paid-users'])){
            $data = User::where('id','!=',$user->id)->where('id',$request->user_id)->where('user_type','User')->whereNotNull('plan_id')->get();
            return view('modules.Users.index-paid',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function getSearchedUnPaid(Request $request){
        $user = Auth::user();
        if(auth()->user()->user_type == 'Admin' || auth()->user()->hasAnyPermission(['search-unpaid-users'])){
            $data = User::where('id','!=',$user->id)->where('id',$request->user_id)->where('user_type','User')->whereNull('plan_id')->get();
            return view('modules.Users.index-unpaid',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
    //  public function createPDF()
    //  {
    //     $user = Auth::user();
    //     if($user->user_type == 'Admin'){
    //         $data = User::where('id','!=',$user->id)->where('user_type','User')->whereNotNull('plan_id')->get();
    //         return view('modules.Users.paid_user_pdf',compact(['data']));
    //     }else{
    //         return redirect()->back()->with('error','You are not authorized to view this page');
    //     }
    //  }
     public function createPDF() {
        // retreive all records from db
        $user = Auth::user();
        $data = User::where('id','!=',$user->id)->where('user_type','User')->whereNotNull('plan_id')->get();
        // share data to view
        view()->share('modules.Users.paid_user_pdf',$data);
        $pdf = PDF::loadView('modules.Users.paid_user_pdf', ['data' => $data]);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
     public static function getUserJoiningSide($id){
        $side='';
        $left = User::where('left_refral_side',$id)->first();
        if($left){
            $side='Left';
        }
        $right = User::where('right_refral_side',$id)->first();
        if($right){
            $side='Right';
        }
        return $side;
     }
     public function getUserRank(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.UserRanks.index',compact(['user']));
     }
    public function updateUserRank(Request $request){
        $sender = Auth::user();
        if($sender->hasRole('Admin')|| auth()->user()->hasDirectPermission('rank_update')){
            $user = User::find($request->user_id);
            $user->rank =$request->rank;
            $user->save();
    
            return redirect()->back()->with('success',"Rank Updated Successfully");
           
        }else{

            return redirect()->back()->with('error',"Un-Authorized Access");
          
        }
    }
    public static function checkUserWeaker($id){

  
        $user =User::where('id',$id)->first();
        $count_left=Self::checkUserNodes($user->left_refral_side);
        $count_right=Self::checkUserNodes($user->right_refral_side);
          
      
       if($count_left<$count_right){
          return 'Left';
       }else{
          return 'Right';
       }
    
       
    
    
    }
    
     public function allUsersCwallet(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('c_wallet','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-c_wallet',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersPv(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('store_bv','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-pv',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersCpv(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('cpv','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-cpv',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersCbv(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('cbv','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-cbv',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersPvStore(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('store_pv_wallet','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-pv-store',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersUniQ(Request $request){
        $user = Auth::user();
        $settings = AdminAccountDetails::find(1);
        $pvlimit=$settings->pv_limit ?? 10;
       
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('store_bv','>=',$pvlimit)->where('user_type','User')->get();
            return view('modules.Users.index-uni-q',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersAutoQ(Request $request){
        $user = Auth::user();
        $settings = AdminAccountDetails::find(1);
       
        $autonetlimit=$settings->auto_net_limit ?? 1500;
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('cpv','>=',$autonetlimit)->where('user_type','User')->get();
            return view('modules.Users.index-auto-q',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersDp(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('direct_points','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-direct_points',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersAffiliate(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('affiliate_wallet','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-affiliate',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function usersPairPoints(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = BvLog::select('user_id',
            \DB::raw('SUM(bv) as total_bv'),
            \DB::raw('SUM(CASE WHEN position = "Left" THEN bv ELSE 0 END) as bv_left'),
            \DB::raw('SUM(CASE WHEN position = "Right" THEN bv ELSE 0 END) as bv_right'))
         ->groupBy('user_id')
         ->with('user')
         ->whereDate('created_at',date('Y-m-d'))
         ->where('type','up')
         ->get();
            return view('modules.Users.index-pair-points',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function usersRankAchievers(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->whereNotNull('rank')->where('rank','!=','')->where('user_type','User')->get();
            return view('modules.Users.index-rank-achiever',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }
     public function allUsersRp(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('register_points','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-rp',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }

     public function allUsersStore(Request $request){
        $user = Auth::user();
        if($user->user_type == 'Admin'){
            $data = User::where('id','!=',$user->id)->where('online_store_wallet','>',0)->where('user_type','User')->get();
            return view('modules.Users.index-store',compact(['data']));
        }else{
            return redirect()->back()->with('error','You are not authorized to view this page');
        }
     }

     
    public function premiumUser(Request $request){
        $user = User::find($request->id);
        $user->is_premium =$request->is_premium;
        $user->save();
        return redirect()->back()->with('success','Updated Successfully');
    }
    public function deactivateUser(Request $request){
        $user = User::find($request->id);
        $user->removeRole('User');
        $user->status = 'InActive';
        $user->save();
        return redirect()->back()->with('success','User Deactivated Successfully');
    }


  public function activateUser(Request $request){
        $user = User::find($request->id);
        $user->assignRole('User');
        $user->status = 'Active';
        $user->save();
        return redirect()->back()->with('success','User Activated Successfully');
  }

  public function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->removeRole('User');
        $user->delete();

        $user_left = User::where('left_refral_side' , $request->id)->update(['left_refral_side' => null]);
        $user_right = User::where('right_refral_side' , $request->id)->update(['right_refral_side' => null]);
        $package =purchasedPlan::where('user_id' , $request->id)->first();
        if($package){
            $package->delete();
        }
      
        return redirect()->back()->with('success','User Deleted Successfully');
  }
}