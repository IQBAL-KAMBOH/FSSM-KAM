<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index()
    {  
        $user = auth()->user();
        if(auth()->user()->hasRole('Admin')){
            $data= Transaction::with('user')->where('status','Pending')->get();
        }else{
            $data= Transaction::with('user')->where('user_id',$user->id)->get();
        }
        
       return view('modules.Transactions.index',compact(['data']));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $screenshot='';
      
          if ($_FILES['file']['name']) {       
            if (!$_FILES['file']['error']) {
                  $image = $request->file('file');
                  $imageName = time() . '_' . $image->getClientOriginalName();  
                  $destination ='uploads/Deposit/'.$imageName ;
                  $request->file->move(public_path('uploads/Deposit'), $imageName);
                  $screenshot = $destination;

            }else{
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
           
          }
            $data =Transaction::create($request->except('file')+['screenshot' => $screenshot]);
            //return view('modules.Transactions.index',compact(['data']));
            return redirect()->to('deposit_now')->with('success','Submitted Successfully');
    
    }
    public function approve_transaction(Request $request)
    {
        
            $data =Transaction::where('id',$request->id)->update(['status' => 'Approved']);
            $amount=$request->amount;
            $points=$amount/100;
           
            $point_up=$this->updateDirectPoints($request->user_id,$points,'up');
            return redirect()->back()->with('success','Transaction Approved Successfully');

    }
    public function cancell_transaction(Request $request)
    {
        
            $data =Transaction::where('id',$request->id)->update(['status' => 'Cancelled']);
            
            return redirect()->back()->with('success','Transaction Cancelled Successfully');

    }

    public function show(UserKyc $userKyc)
    {
        //
    }
    public function edit(UserKyc $userKyc)
    {
        //
    }

    public function update(Request $request, UserKyc $userKyc)
    {
        //
    }

    public function destroy(UserKyc $userKyc)
    {
        //
    }

    public function TransactionHistory(){
        $data = Transaction::with('user')->get();
        return view('modules.Histories.Transaction_history.index',compact(['data']));
    }

    public function DeleteTransactionHistory(Request $request){
        $data = Transaction::where('id',$request->id)->delete();
        return redirect()->back()->with('success','Transaction Deleted Successfully');
    }
}
