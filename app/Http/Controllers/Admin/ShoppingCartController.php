<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Comments;
use App\Models\Shop;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
class ShoppingCartController extends Controller
{
    public function index() {
        $shops=Shop::with('user')->get();
       
        
        
        
        /* return $products; */
        return view('admin.shop',compact('shops')); 
    }
    public function ShowProducts($id)  {
        $products =Product::with('shop','category','productphoto')->where('shop_id',$id)->get();
        
        $user= Auth::user()->with('shoppingCart')->first();
            $x = $user->shoppingCart; 
            $cart_id=$x->id;


        $aa=CartItem::where('cart_id',$cart_id)->get();
        $q=$aa->count();
        session(['count' => $q]);
        return view('admin.shopproduct',compact('products')); 
    }

    public function AddToCart(Request $request){
        try {
            $qw= CartItem::where('product_id',$request->Product_id)->first();
            if($qw){
                return   redirect()->back()->with(['error' => 'لا يمكن الاضافة  ']);
            }
            $user= Auth::user()->with('shoppingCart')->first();
            $x = $user->shoppingCart; 
            $cart_id=$x->id;
            /* 'product_id', 'cart_id','quantity','added_date' */
            $cart_item = new CartItem;
            $cart_item->product_id= $request->Product_id;
            $cart_item->cart_id= $cart_id;
            $cart_item->quantity= $request->qun;
            $cart_item->added_date=Carbon::now();
            $cart_item->save();
            $aa=CartItem::where('cart_id',$cart_id)->get();
            $q=$aa->count();
            session(['count' => $q]);
            return   redirect()->back()->with(['success' => 'تم الاضافة  بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
       
        
    }
    public function show(string $id)
    {
        try {

            $products =Product::with('shop','category','productphoto')->where('id',$id)->first();
            $comments=Comments::with('product','user')->where('product_id',$products->id)->get();
            /* return $comments; */
            /*  return $products; */
            $pp= $products->productphoto;
            /* return $pp; */
            $user= Auth::user()->with('shoppingCart')->first();
            $x = $user->shoppingCart; 
            $cart_id=$x->id;
            
            $aa=CartItem::where('cart_id',$cart_id)->get();
            $q=$aa->count();
            session(['count' => $q]);
            
            return view('admin.showproduct',compact('products','pp','comments')); 

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
    public function addcomment(Request $request) {
        try {

            $user_id=Auth::user()->id;
            $comments= Validator::make($request->all(), [
                'body' => ['required', 'string', 'max:255'], 
            ]);
            if ($comments->fails()) {
                return redirect()->route('admin.shopcart.show')
                            ->withErrors($comments)
                            ->withInput();
            }
            $comment = new Comments;
            $comment->body = $request->body; 
            $comment->user_id = $user_id;
            $comment->product_id = $request->Product_id;
            $comment->create_date=Carbon::now();
            $comment->save();/* shopcart.show */

             return   redirect()->route('admin.shopcart.show',$request->Product_id)->with(['success' => 'تم الاضافة  بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->route('admin.shopcart.show',$request->Product_id)->with(['error' => $th->getMessage()]);
        }
    }
    public function showCart() {
        try {
            $user = Auth::user();

            // استرجاع عربة التسوق المرتبطة بالمستخدم
            $shoppingCart = $user->shoppingCart;
            
            // استرجاع عناصر العربة مع تحميل العلاقة بالمنتج والصور
            $cartItems = $shoppingCart->cartItems()->with('product.productphoto','product.category')->get();
           /*  return $cartItems; */
            return view('admin.showcart',compact('cartItems'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.shopcart.index')->with(['error' => $th->getMessage()]);
        }
        
       
        
    }
    public function DeleteCartItem($id) 
    {
        try {
            $CartItem= CartItem::find($id);
            $CartItem->delete();

            return redirect()->route('admin.shopcart.showCart')->with('error', 'product has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.shopcart.showCart')->with(['error' => $th->getMessage()]);
        }
    }
    public function ShowOrder()  {
        try {
            $user = Auth::user();

            // استرجاع عربة التسوق المرتبطة بالمستخدم
            $shoppingCart = $user->shoppingCart;
            
            // استرجاع عناصر العربة مع تحميل العلاقة بالمنتج والصور
            $cartItems = $shoppingCart->cartItems()->with('product.productphoto','product.category','product.shop')->get();
            /* return $cartItems; */
            $latitude=  $cartItems[0]->product->shop->latitude;
            $longitude=  $cartItems[0]->product->shop->longitude;
            /* longitude */
           $count =Count($cartItems);
           /* return $count; */
           $total=0;
            foreach ($cartItems as $cartitem ) {
                $total += $cartitem->quantity * $cartitem->product->price;
            }
            /* return $total; */
            return view('admin.showorder',compact('cartItems','total','count','latitude', 'longitude'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.shopcart.index')->with(['error' => $th->getMessage()]);
        }
        
    }
    public function checkorder(Request $request) {
        /* return $request; */

        $x=$request->total_price_products+$request->distance;
        $latitude= $request->latitude;
        $longitude= $request->longitude;
        $city= $request->city;
        $address= $request->address;
        $phone_number= $request->phone_number;
        $total_price_products= $request->total_price_products;
        $total_amount= $x;
        $delivery_price= $request->distance;
        $number_product= $request->number_product;
       
        session([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'city' => $city,
            'address' => $address,
            'phone_number' => $phone_number,
            'total_price_products' => $total_price_products,
            'total_amount' => $total_amount,
            'delivery_price' => $delivery_price,
            'number_product' => $number_product,
        ]);
        return view('admin.checkorder');
    }
    public function create_order(Request $request){
       
        try {

            $user = Auth::user();

            // استرجاع عربة التسوق المرتبطة بالمستخدم
            $shoppingCart = $user->shoppingCart;
            
            // استرجاع عناصر العربة مع تحميل العلاقة بالمنتج والصور
            $cartItems = $shoppingCart->cartItems()->with('product.productphoto','product.category','product.shop')->get();
            
             $x=$request->total_price_products+$request->distance;
         
            $phone_numbers= Validator::make($request->all(), [
               'phone_number' => ['required', 'string','min:10', 'max:15','regex:/^\d{10}$/'],
            ]);
            if ($phone_numbers->fails()) {
                return redirect()->route('admin.shopcart.ShowOrder')
                            ->withErrors($phone_numbers)
                            ->withInput();
            }
            
            $order = new Order;
            $order->user_id= $user->id;
            $order->latitude= $request->latitude;
            $order->longitude= $request->longitude;
            $order->city= $request->city;
            $order->address= $request->address;
            $order->phone_number= $request->phone_number;
            $order->total_price_products= $request->total_price_products;
            $order->total_amount= $request->total_amount;
            $order->delivery_price= $request->delivery_price;
            $order->number_product= $request->number_product;
            $order->date= now();
            $order->driver_id= null;
            $order->order_status= false;
            $order->save();
            foreach ($cartItems as $orderItem) {
                /* 'product_id', 'order_id','quantity','added_date' */
                $product = $orderItem->product;
                $orderItem1= OrderItem::create([
                    'order_id'=>$order->id,	
                    'quantity'=> $orderItem->quantity,
                    'added_date'=>now(),
                    'product_id'=>$product->id,
                    
                ]) ;
                
                $orderItem1->save();
            }
           CartItem::where('cart_id', $shoppingCart->id)->delete();
           return   redirect()->route('admin.shopcart.index')->with(['success' => 'تم الاضافة  بنجاح']); 
            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

}


