<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Category; 


class CategoriesController extends Controller
{
    public function index(){
      
        $categories=Category::all();
       
        return view('admin.categories.index',compact('categories'));  
    }
    public function create()
    { 
        return view('admin.categories.create');  
    }
    public function store(Request $request)
    { 
       /*  return $request; */
        try {
                $categories= Validator::make($request->all(), [
                    
                    'main_category' => ['required', 'string', 'max:255'],
                    'sub_category' => ['required', 'string', 'max:255'],
                    
                    'brand' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
                
                    
                ]);
                if ($categories->fails()) {
                    return redirect()->route('admin.categories.create')
                                ->withErrors($categories)
                                ->withInput();
                }
               
                
                if ($request->has('brand')) {
                    $image=$request->file('brand');
                    
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('Brand'),$imageName);
        
                }
        
                $Category = new Category;
                $Category->main_category=$request->main_category;
                $Category->sub_category=$request->sub_category;
                $Category->brand=$imageName;
               
        
                $Category->save();
                return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
                //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
            
    
            
        } catch (\Throwable $th) {
            return redirect()->route('admin.categories.create')->with(['error' => $th]);
        }
      
    }
    public function edit($id)
    {
        $Category = Category::Where('id',$id)->first();
        //$users=User::all() /* Where('type_user','!=',3)->get() */ ;
       
        return view('admin.categories.edit',compact('Category'));
    }
    public function update(Request $request)
    {
        /* return $request; */
       
        /* return $user; */
        $Category = Category::Where('id',$request->id)->first();
        /* return $customers; */
        $categories= Validator::make($request->all(), [
                
                
             
            'main_category' => ['required', 'string', 'max:255'],
            'sub_category' => ['required', 'string', 'max:255'],
            
            'brand' => [ 'image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            
        ]);
        
        if ($categories->fails()) {
            return redirect()->route('admin.categories.edit',$request->id)
                        ->withErrors($categories)
                        ->withInput();
        }
        
        $imagePath = public_path('Brand/' . $Category->brand);

        // التحقق من وجود الصورة وحذفها
        
        if($request->has('brand')){
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            if ($request->has('brand')) {
                $image=$request->file('brand');
                $imageName=time().'.'.$image->extension();
                $image->move(public_path('Brand'),$imageName);
            }
        }
        

        

        // Update other fields
        $Category->main_category=$request->main_category;
        $Category->sub_category=$request->sub_category;
        if($request->has('brand')){
            $Category->brand=$imageName;
        }
       /*  $Category->brand=$imageName; */
       

        $Category->save();
        
        

        return redirect()->route('admin.categories.index')->with('success', 'User updated successfully.');
       
    }
    public function destroy($id) {
        // استرجاع السجل من قاعدة البيانات
        $record = Category::find($id);
        if ($record) {
            // تحديد مسار الصورة
           
            $Brand = public_path('Brand/' . $record->brand);
            // التحقق من وجود الصورة وحذفها
            if (File::exists($Brand)) {
                File::delete($Brand);
            }
            

            // حذف السجل من قاعدة البيانات
            $record->delete();
        }
        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }

}
