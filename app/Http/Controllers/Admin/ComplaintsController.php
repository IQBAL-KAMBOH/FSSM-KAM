<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Complaints;




class ComplaintsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $complaints = Complaints::where('user_id', $user->id)->get();
        return view('modules.complaint.index', compact(['complaints']));

    }

    public function create(){
        return view('modules.complaint.add');
    }



    public function store(Request $request)
    {
        $user = Auth::user();
        $complaint = new Complaints();
        $complaint->user_id = $user->id;
        $complaint->user_name = $request->name;
        $complaint->complaint_name = $request->complaint_name;
        $complaint->description = $request->description;
        $complaint->status = 'pending';
        $complaint->tracking_id = $this->generateTID();
        $complaint->save();
        return redirect()->route('complaint.index')->with('success','complaint submitted successfully');
    }

   

    public function approveComplaint(Request $request){
        $complaint = Complaints::where('id', $request->id)->update(['status' => 'resolved']);
        return redirect()->route('complaint.index')->with('success','complaint approved successfully');
    }

public function cancellComplaint(Request $request){
        $complaint = Complaints::find($request->id);
        $complaint->status = 'canceled';
        $complaint->save();
        return redirect()->route('complaint.index')->with('success','complaint canceled successfully');
    }

    public function generateTID()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkTID($trackingid);
    }
    public function checkTID($trackingdid)
    {
        $verifytrackingid = Complaints::where('tracking_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateTID();
        }
    }

    public function destroy($id)
    {
        $Complaints = Complaints::findOrFail($id);
         $Complaints->delete();
        return redirect()->route('complaint.index')->with('success', 'complaint deleted successfully.');
    }
    

}
