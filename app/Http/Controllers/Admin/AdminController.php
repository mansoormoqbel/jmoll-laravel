<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\ShoppingCart;


class AdminController extends Controller
{
   

    public function index(){
        $users=User::Where('type_user',3)->get();
        return view('admin.admin.index',compact('users'));  
    }
    public function create()
    {
        return view('admin.admin.create');
    }
    public function store(Request $request)
    {
        try {
            $users= Validator::make($request->all(), [
                'username' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
                'profile_photo' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
                if ($users->fails()) {
                    return redirect()->route('admin.admin.create')
                                ->withErrors($users)
                                ->withInput();
                    }
           
                
                if ($request->has('profile_photo')) {
                    $image=$request->file('profile_photo');
                    
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('images'),$imageName);
        
                }
        
                $user=new User;
                $user->username=$request->username;
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->phone_number=$request->phone_number;
                $user->profile_photo=$imageName;
                $user->email=$request->email;
                $user->status=0;
                $user->type_user=3;
                $user->password=Hash::make($request->password);
        
                $user->save();
                //use App\Models\ShoppingCart;
                $ShoppingCart = new ShoppingCart;
                $ShoppingCart->user_id = $user->id;
                $ShoppingCart->name = $user->username;
                $ShoppingCart->save();
                return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
                //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
            
    
            
        } catch (\Throwable $th) {
            return redirect()->route('admin.admin.index')->with(['error' => $th]);
        }
      
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::Where('id',$id)->first();
        /* return $user; */
        return view('admin.admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        /* return $user; */
        $users= Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
            'profile_photo' => [ 'nullable','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id],
            
        ]);
        if ($users->fails()) {
            return redirect()->route('admin.admin.edit',$request->id)
                        ->withErrors($users)
                        ->withInput();
        }
        

        // Handle the file upload
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->profile_photo = $filename;
        }

        // Update other fields
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');

        // Save the user
        $user->save();

        return redirect()->route('admin.admin.index')->with('success', 'User updated successfully.');
       
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       /*  return $id; */
       $user = User::Where('id',$id)->first();
        
      /*  return $user; */
       return view('admin.admin.show',compact('user'));
    }
    public function changeStatus($id)
    {
        try {
            $user = User::find($id);
            
            //return response()->json([ 'status'=>1,'user'=>$user, 'success'=>'User Has Been Change Successfully!']);
            if (!$user){
               /*  return ()->json(['status'=>0,'error'=>'User not find']); */
                return redirect()->route('admin.admin.index')->with(['error' => 'User not find']);
            }
           $status =  $user -> status  == 0 ? 1 : 0;
           //return response()->json([ 'status'=>1,'user'=>$status, 'success'=>'User Has Been Change Successfully!']);
            $user->status = $status;
            $user->save();
           //$user -> update(['status' =>$status ]);
            /* return response()->json([ 'status'=>1,'user'=>$user, 'success'=>'User Has Been Change Successfully!']); */

            return redirect()->route('admin.admin.index')->with(['success' => ' User Has Been Change Successfully!']);

        } catch (\Exception $ex) {
           /*  return response()->json(['status'=>0,'error'=>'Something went wrong, please try again later']); */
            
            return redirect()->route('admin.admin.index')->with(['error' => 'Something went wrong, please try again later']);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /* return $id; */
        try {
            $user= User::Where('id',$id)->first();
            /* return $user; */
            $user->delete();

            return redirect()->route('admin.admin.index')->with('error', 'User has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
    }
}
