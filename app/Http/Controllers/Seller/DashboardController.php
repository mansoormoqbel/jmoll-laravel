<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shop;
use App\Models\User;
use App\Models\Category;
use App\Models\ShopValidity;
use App\Models\ShopValidityDocs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class DashboardController extends Controller
{
    public function index()  {
        $user= Auth::user()->id;
       
        $shops = Shop::with('category','product')->where('seller_id',$user)->get();
    
        return view('seller.dashboard',compact('user','shops'));
    }
    public function logout(Request $request)
    {
       /*  return "www"; */
        Auth::logout();
      

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/ ');
    }
    public function create()
    {
        $usera= Auth::user();
        /* return $usera;
       $sellers=User::where('type_user',2)->get(); */
       $categories=Category::all();
       return view('seller.create',compact(/* 'sellers', */'categories'));
        
    }
    public function store(Request $request)
    {
        /* return $request; */
        try {
            /* return date('Y-m-d'); */
            $usera= Auth::user()->id;
            $shops= Validator::make($request->all(), [
                
                'body' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'latitude' => ['required', 'numeric'],
                'longitude' => ['required', 'numeric'],
                'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
                'validity_docs.*' => [ 'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc' ,'max:2048'],
               
                
            ]);
            if ($shops->fails()) {
                return redirect()->route('seller.create')
                            ->withErrors($shops)
                            ->withInput();
            }
            $we=Shop::where('seller_id',$usera)->get();
            $x=count($we);
            if($x>=4){
                redirect()->route('seller.dashboard')->with(['error' => 'can not be add Shop your have 4 shop']);
            }
               
            
        
            $shop=new Shop;
            $shop->name=$request->name;
            $shop->Field=$request->name;
            $shop->latitude=$request->latitude;
            $shop->longitude=$request->longitude;
            $shop->city=$request->city;
            $shop->address=$request->address;
            $shop->phone_number=$request->phone_number;
            $shop->acception=0;
            $shop->created_date=date('Y-m-d');
            
            $shop->seller_id=$usera;
            $shop->catg_id=$request->sub_category;
           

            $shop->save();
             $validity = new ShopValidity;
             $validity->body= $request->body;
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
            return   redirect()->route('seller.dashboard')->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('seller.create')->with(['error' => $th]);
        }
    }
    public function showShop($id)  {
        $shop = Shop::where('id',$id)->get();
        return $shop;
    }
}
