<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfilePhoto;
use App\Models\User; 
use Illuminate\Support\Facades\File;

class ProfilePhotoController extends Controller
{
    public function index()  {
        $ProfilePhotos=ProfilePhoto::with('user')->get();
       
        return view('admin.profile.index',compact('ProfilePhotos')); 
    }
    public function create()
    { 
        $users=User::all();
        
        return view('admin.profile.create',compact('users'));  
    }
    public function store(Request $request)
    { 
       /*  return $request; */
        try {
            $profiles= Validator::make($request->all(), [
                
                
                'profile_name' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
                
            ]);
                if ($profiles->fails()) {
                    return redirect()->route('admin.profile.create')
                                ->withErrors($profiles)
                                ->withInput();
                }
               
                
                if ($request->has('profile_name')) {
                    $image=$request->file('profile_name');
                    
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('images'),$imageName);
        
                }
        
                $ProfilePhoto = new ProfilePhoto;
                $ProfilePhoto->photo_name=$imageName;
                $ProfilePhoto->user_id=$request->user;
                
        
                $ProfilePhoto->save();
                return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
                //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
            
    
            
        } catch (\Throwable $th) {
            return redirect()->route('admin.profile.index')->with(['error' => $th]);
        }
      
    }
    public function edit($id)
    {
        $ProfilePhoto = ProfilePhoto::Where('id',$id)->first();
        $users=User::all() /* Where('type_user','!=',3)->get() */ ;
       
        return view('admin.profile.edit',compact('ProfilePhoto','users'));
    }
    public function update(Request $request)
    {
        /* return $request; */
        $user = User::find($request->user);
        /* return $user; */
        $profile = ProfilePhoto::Where('id',$request->id)->first();
        /* return $customers; */
        $profiles= Validator::make($request->all(), [
                
                
            'profile_name' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            
        ]);
        
        if ($profiles->fails()) {
            return redirect()->route('admin.profile.edit',$request->id)
                        ->withErrors($profiles)
                        ->withInput();
        }
        if ($request->has('profile_name')) {
            $image=$request->file('profile_name');
            
            $imageName=time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);

        }
        $imagePath = public_path('images/' . $profile->photo_name);

        // التحقق من وجود الصورة وحذفها
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        

        // Update other fields

        
        $profile->photo_name= $imageName;
        $profile->user_id=$request->user;
        

        // Save the user
        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'User updated successfully.');
       
    }

    

    public function destroy($id) {
        // استرجاع السجل من قاعدة البيانات
        $record = ProfilePhoto::find($id);

        if ($record) {
            // تحديد مسار الصورة
            $imagePath = public_path('images/' . $record->photo_name);

            // التحقق من وجود الصورة وحذفها
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // حذف السجل من قاعدة البيانات
            $record->delete();
        }

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }

     /* if ($profiles->fails()) {
                    return redirect()->route('admin.profile.create')
                                ->withErrors($profiles)
                                ->withInput();
                }
                if ($request->hasFile('profile_name')) {
                    $image = $request->file('profile_name');
                    $imageName = time() . '.' . $image->extension();
                    $image->move(public_path('images'), $imageName);
                } else {
                    return redirect()->route('admin.profile.create')
                                        ->with(['error' => 'Profile image is required.'])
                                        ->withInput();
                } */
}
