<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Category;
use App\Models\ShopValidity;
use App\Models\ShopValidityDocs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class ShopController extends Controller
{
    public function index() /* : view */ {
        $shops = Shop::with('user','category')->get();
       /*  return $shop; */
        return view('admin.shop.index',compact('shops'));
    }
    public function create()
    {
       $sellers=User::where('type_user',2)->get();
       $categories=Category::all();
       return view('admin.shop.create',compact('sellers','categories'));
        
    }
    public function store(Request $request)
    {
        /* return $request; */
        try {
            /* return date('Y-m-d'); */
           
            $shops= Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'latitude' => ['required', 'numeric'],
                'longitude' => ['required', 'numeric'],
                'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
                'validity_docs.*' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
               
                
            ]);
            if ($shops->fails()) {
                return redirect()->route('admin.shop.create')
                            ->withErrors($shops)
                            ->withInput();
            }
               
            
        
            $shop=new Shop;
            $shop->name=$request->name;
            $shop->Field=$request->name;
            $shop->latitude=$request->latitude;
            $shop->longitude=$request->longitude;
            $shop->city=$request->city;
            $shop->address=$request->address;
            $shop->phone_number=$request->phone_number;
            $shop->acception=1;
            $shop->created_date=date('Y-m-d');
            
            $shop->seller_id=$request->user;
            $shop->catg_id=$request->sub_category;
           

            $shop->save();
             $validity = new ShopValidity;
             $validity->body= $shop->Field;
             $validity->shop_id = $shop->id;
            
            $validity->save();
            // Add validity documents
            if($request->hasFile('validity_docs')){
                foreach ($request->file('validity_docs') as $file) {
                   
                       
            
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('field/' . $validity->bady),$filename);
                       
                    ShopValidityDocs::create([
                        'filename' => $filename,
                        'validity_id' => $validity->id,
                    ]);
                } 
            }
            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('admin.shop.create')->with(['error' => $th]);
        }
    }
    public function show(string $id)
    {
        $shops = Shop::with('user','category','validityDocs')->find($id);
        
        $validityDocs = $shops->validityDocs;
        
        
        return view('admin.shop.show',compact('shops','validityDocs'));

    }
    public function edit(string $id)
    {
        $shops = Shop::with('user','category')->find($id);
        $sellers=User::where('type_user',2)->get();
        $categories=Category::all();
        $validityDocs = $shops->validityDocs;
       
        return view('admin.shop.edit',compact('shops','sellers','categories','validityDocs'));
    }
    public function update(Request $request)
    {
        /* return $request; */
        
        $shop = Shop::find($request->id);
        
        /* return $user; */
        try {
           
           
            $shops= Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'latitude' => ['required', 'numeric'],
                'longitude' => ['required', 'numeric'],
                'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
                'validity_docs.*' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
               
                
            ]);
            if ($shops->fails()) {
                return redirect()->route('admin.shop.edit')
                            ->withErrors($shops)
                            ->withInput();
            }
               
            /* start update shop */
                $shop->name=$request->name;
                $shop->Field=$request->name;
                $shop->latitude=$request->latitude;
                $shop->longitude=$request->longitude;
                $shop->city=$request->city;
                $shop->address=$request->address;
                $shop->phone_number=$request->phone_number;
                $request->acception?$shop->acception=1:$shop->acception=0;
                
                $shop->created_date=date('Y-m-d');
                
                $shop->seller_id=$request->user;
                $shop->catg_id=$request->sub_category;
            /* end update shop */

            $shop->save();
            $validity=$shop->validity;
            /* return $x; */
            $validityDocs = $validity->docs;
            // Delete the old files if they exist
            if($request->hasFile('validity_docs')){

            
                if ($validityDocs->isNotEmpty()) {
                    foreach ($validityDocs as $doc) {
                        $filePath = public_path('field/' . $doc->filename);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        // Optionally, delete the record from the database
                        $doc->delete();
                    }
                }

            // Save the new files
            
                foreach ($request->file('validity_docs') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('field/' ), $filename);

                    // Create new ShopValidityDocs record
                    ShopValidityDocs::create([
                        'validity_id' => $validity->id,
                        'filename' => $filename,
                    ]);
                }
            }
          

            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('admin.shop.edit')->with(['error' => $th]);
        }
        
       
    }


    public function destroy($id)
    {
        
        try {
            $Shop= Shop::with('validityDocs')->Where('id',$id)->first();
            
            
            $validityDocs = $Shop->validityDocs;
              
            if (!is_null($validityDocs)) {
                foreach ($validityDocs as $file) {
                    $imagePath = public_path('field/' . $file->filename);
                    
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            }
           
            $Shop->delete();

            return redirect()->route('admin.shop.index')->with('success', 'shop has been delete successfully!');
            
        } catch (\Throwable $th) {
           return $th;
        }
    }

}
