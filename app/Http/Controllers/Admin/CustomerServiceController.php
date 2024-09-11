<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerService;
use App\Models\User; 

class CustomerServiceController extends Controller
{
    
    public function index(){
      
        $customers=CustomerService::with('user')->get();
       
        return view('admin.customer.index',compact('customers'));  
    }
    public function create()
    { 
        $users=User::Where('type_user','!=',3)->get();
        
        return view('admin.customer.create',compact('users'));  
    }
    public function store(Request $request)
    {
       

       $users= Validator::make($request->all(), [
        'subject' => ['required', 'string', 'max:255'],
        'body' => ['required', 'string', 'max:255'],
        
        
        ]);
        if ($users->fails()) {
            return redirect()->route('admin.feedback.create')
                        ->withErrors($users)
                        ->withInput();
        }
        $customer=new CustomerService;
        $customer->subject=$request->subject;
        $customer->body=$request->body;
        $customer->user_id=$request->user;
        $customer->save();
        return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
    }
    public function edit($id)
    {
        $customer = CustomerService::Where('id',$id)->first();
        $users=User:: Where('type_user','!=',3)->get() ;
       
        return view('admin.customer.edit',compact('customer','users'));
    }
    public function update(Request $request)
    {
        /* return $request; */
        $user = User::find($request->user);
        /* return $user; */
        $customers = CustomerService::Where('id',$request->id)->first();
        /* return $customers; */
        $customer= Validator::make($request->all(), [
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            
            
        ]);
        
        if ($customer->fails()) {
            return redirect()->route('admin.feedback.edit',$request->id)
                        ->withErrors($customer)
                        ->withInput();
        }
        

        

        // Update other fields
        $customers->subject=$request->subject;
        $customers->body=$request->body;
        $customers->user_id=$request->user;
        

        // Save the user
        $customers->save();

        return redirect()->route('admin.feedback.index')->with('success', 'User updated successfully.');
       
    }
    public function destroy($id)
    {
        /* return $id; */
        try {
            $customer= CustomerService::Where('id',$id)->first();
            /* return $user; */
            $customer->delete();

            return redirect()->route('admin.feedback.index')->with('error', 'Customer Service has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
    }
}
