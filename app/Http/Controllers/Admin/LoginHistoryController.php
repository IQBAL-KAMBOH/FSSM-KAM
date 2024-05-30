<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Auth;

class LoginHistoryController extends Controller
{

  
    public function LoginHistory()
    {
        $data = LoginHistory::with('user')->get();
        return view('modules.login_history.index', compact(['data']));

    }

    
   
    public function DeleteLoginHistory(Request $request)
    
    {
        $id = $request->id;
        $loginHistory = LoginHistory::find($id);
        $loginHistory->delete();
        return redirect()->back()->with('success', 'Login History Deleted Successfully');
    }
}
