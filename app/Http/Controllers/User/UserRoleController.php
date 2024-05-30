<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;


class UserRoleController extends Controller
{
    public static function  allRoles(){
        $data = Role ::select('name')->get();
        $roles =array();
        foreach($data as $role){
            $roles[] = $role->name;
        }
        return $roles;
    }
    public function createRole(){

        $role = "Sub Admin";

        $role = Role::create(['name' => $role, 'guard_name ' => 'web']);

        return "Role Created";

    }
    public function allPermissions(Request $request)
    {
        if(Auth::user()->hasRole('Super Admin')){
            $permissions = Permission::all();
        }else{
            $permissions = Permission::where('name','!=','reports')
                                      ->get();
           
             
        }
       
        $user_id=$request->user_id;
        $user_permissions = DB::table('model_has_permissions')->where('model_id',$request->user_id)->get();
        return view('modules.permission.index',compact(['permissions','user_permissions','user_id']));
    }
    public function searchPermissions(){
        $loggedInUser = Auth::user()->id;
        $user = User::where('id','!=',$loggedInUser)->get();
        return view('modules.permission.search',compact(['user']));
    }
    public function createPermission(){

        //$permission = "convert_bv";
        // $permission = "kyc_data";
        // $permission = "withdraw_cancell";
        // $permission = "withdraw_approve";
         //$permission = "user_profile";
         //$perms=['products','courses','library','order_apc'];
         $perms=['rank_update'];
         foreach($perms as $p){
            $permission = Permission::create(['name' => $p,'guard_name' => 'web']);

         }

        return "Permission Created";

    }
    public function changePermission(Request $request){

        $user_id = $request->user_id;
        $type = $request->action;
        $permission = $request->permission;
        
        if($type=='add'){
          
        $perm = Permission::find($permission);
        $user = User::find($user_id);
        $user->givePermissionTo($perm);
        }else{
            $perm = Permission::find($permission);
            $user = User::find($user_id);
            $user->revokePermissionTo($perm);
        }
        

        return redirect()->back()->with('success','Permission Updated Successfully');

    }
    public function changePermissionLive(Request $request){

        $user_id = $request->user_id;
        $type = $request->action;
        $permission = $request->permission;
        if($type=='add'){

        $perm = Permission::find($permission);
        $user = User::find($user_id);
        $user->givePermissionTo($perm);
        }else{
            $perm = Permission::find($permission);
            $user = User::find($user_id);
            $user->revokePermissionTo($perm);
        }
        

        return response(['data'=>$user],200);

    }
    public function assignPermission(){

        $permission = 19;
        $role = 1;

        $permission = Permission::find($permission);
        $role = Role::find($role);

        //$permission->assignRole($role);
        $role->givePermissionTo($permission);

        //print_r($permission);

        return "Permission Assigned";

    }

    public function assignRole(){

        $user = 2;

        $user = User::find($user);

        $user->assignRole('User');

        return "Role Assigned";

    }

}
