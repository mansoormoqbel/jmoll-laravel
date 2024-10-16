<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shop;
use App\Models\DriverInfo;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;

use App\Models\Order;
use App\Models\OrderItem;
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
    /* start  create Shop */
    public function create()
    {
        $usera= Auth::user();
        
       $categories=Category::all();
       return view('seller.create',compact('categories'));
        
    }
    /*  end create shop */
    /* start  store Shop */
    public function store(Request $request)
    {
        
        try {
            
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
    /* end  store Shop */

    public function showShop($id)  {
        $shop = Shop::with('category')->where('id',$id)->first();
        $product= count(Product::where('shop_id',$id)->where('status',1)->get());
       
        return view('seller.shop',compact('shop','product'));
    }
    /* start show product */
    public function product($id)  {
        $shop_id=$id;
        $products = Product::with('shop','category','productphoto')->where('shop_id',$id)->where('status',1)->get();
       /*  return $products; */
        
        
        return view('seller.product.index',compact('products','shop_id'));
    }
    public function createproduct($id)  {
        $shop_id=$id;
        $categories=Category::all();
        return view('seller.product.create',compact('shop_id','categories'));
    }
    public function storeproduct(Request $request)
    {
        /* return $request; */
        try {

            
           
            $products= Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'price' => ['required',/* 'decimal:3,2' */'numeric'],
                'country_made' => ['required', 'string', 'max:255'],
                'quantity' => ['required', 'numeric'],
                'productphoto.*' => [ 'mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
               
                
            ]);
            if ($products->fails()) {
                /* return redirect()->route('admin.product.create')->with($products); */
                return redirect()->route('seller.createproduct',$request->shop_id)
                            ->withErrors($products)
                            ->withInput();
            }
           
            
        
            $product=new Product;
            $product->name=$request->name;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->country_made=$request->country_made;
            $product->quantity=$request->quantity;
            
            $product->created_date=date('Y-m-d');
            $request->status?$product->status=1:$product->status=0;
            $request->activation?$product->activation=1:$product->activation=0;
            $product->shop_id=$request->shop_id;
            $product->catg_id=$request->sub_category;
           

            $product->save();
             
            // Add validity documents
            if($request->hasFile('productphoto')){
                foreach ($request->file('productphoto') as $file) {
                   
                       
            
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('Product/' ),$filename);
                       
                        ProductPhoto::create([
                        'photo_name' => $filename,
                        'product_id' => $product->id,
                    ]);
                } 
            }/* seller.product */
            return   redirect()->route('seller.product',$request->shop_id)->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('seller.createproduct',$request->shop_id)->with(['error' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        
        try {
            $Product= Product::with('productphoto')->Where('id',$id)->first();
            
            
            $productphoto = $Product->productphoto;
              
            if (!is_null($productphoto)) {
                //return $productphoto;
                foreach ($productphoto as $file) {
                    $imagePath = public_path('Product/' . $file->photo_name);
                    
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            }
           
            $Product->delete();

            return redirect()->route('seller.dashboard')->with('success', 'Product has been delete successfully!');
            
        } catch (\Throwable $th) {
           return $th;
        }
    }
    public function  TakenByDriver($id)  {
        $shop_id=$id;
        
        $orders = Order::whereHas('orderItem.product', function ($query) use ($id) {
            $query->where('shop_id', $id);
        })->where('order_status',0)->where('driver_id',"!=" , NULL)->with('orderItem.product','driverinfo.user','user')->get();
         
       
        
       /*  return $orders; */

        return view('seller.TakenByDriver',compact('orders','shop_id'));
       
    }
    public function  WithOutDriver($id)  {
        $shop_id=$id;
        $users=DriverInfo::with('user')->get();
        $orders = Order::whereHas('orderItem.product', function ($query) use ($id) {
            $query->where('shop_id', $id);
        })->where('order_status',0)->where('driver_id', NULL)->with('orderItem.product','driverinfo.user','user')->get();
        /*  return $users; */
       
        
       /*  return $orders; */

        return view('seller.WithOutDriver',compact('orders','shop_id','users'));
       
    }
    public function  OrderDone($id)  {
        $shop_id=$id;
        $orders = Order::whereHas('orderItem.product', function ($query) use ($id) {
            $query->where('shop_id', $id);
        })->where('order_status',1)->with('orderItem.product','driverinfo.user')->get();
        /* return $orders;
 */
        return view('seller.order',compact('orders','shop_id'));
       
    }
    public function GetProduct($id){
        
        $orders= Order::with('orderItem.product')->where('id',$id)->first();
       
        return response()->json(['data' => $orders]);
        
    }
    public function OrderStatus($id){
        $order= Order::where('id',$id)->first();
        $order->order_status=1;
        $order->save();
        return redirect()->back()->with(['success'=>'order done success']);
    }
    public function editDriver(Request $request) {
       
        $order = Order::where('id',$request->order_id)->first();
        $order->driver_id=$request->Dirver;
        $order->save();
       
       return redirect()->back();
        
        
    }


}
