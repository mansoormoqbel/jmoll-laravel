<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index()  {
        $products=Product::with('shop','category','productphoto')->get();
        
        /* return $products; */
         return view('admin.product.index',compact('products'));
    }
    public function create()  {
        $products=Product::with('shop','category','productphoto')->get();
        $shops=Shop::all();
        $categories=Category::all();

        
        /* return $products; */
         return view('admin.product.create',compact('products','shops','categories'));
    }
    public function store(Request $request)
    {
       /*  return $request; */
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
                return redirect()->route('admin.product.create')
                            ->withErrors($products)
                            ->withInput();
            }
           /*  return $products; */
            /* 
                return date('Y-m-d'); 

                "_token": "WThZnrhnqOyc204xCu757gc9E7UBNOOsDN0hl5d4",
                "name": "milk alyoum",
                "description": "asdasdasd",
                "price": "1.25",
                "country_made": "jordan",
                "quantity": "1000",
                "shop": "33",
                "sub_category": "2",
                "productphoto": [
                    {},
                    {}
                    'name',
                    'description',
                    
                    'price',
                    'country_made',
                    'quantity',

                    'status',
                    'created_date',
                    'shop_id',
                    'catg_id',
                    'activation',
                ]
            
            */ 
            
        
            $product=new Product;
            $product->name=$request->name;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->country_made=$request->country_made;
            $product->quantity=$request->quantity;
            
            $product->created_date=date('Y-m-d');
            $request->status?$product->status=1:$product->status=0;
            $request->activation?$product->activation=1:$product->activation=0;
            $product->shop_id=$request->shop;
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
            }
            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.create')->with(['error' => $th->getMessage()]);
        }
    }
   
    public function show($id) {
       
        try {
            $product=Product::with('shop','category','productphoto')->where('id',$id)->first();
            
            $productphoto = $product->productphoto;
            /* return $productphoto; */
            return view('admin.product.show',compact('product','productphoto'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.index')->with(['error' => $th->getMessage()]);
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

            return redirect()->route('admin.product.index')->with('success', 'Product has been delete successfully!');
            
        } catch (\Throwable $th) {
           return $th;
        }
    }
    public function edit(string $id)
    { 
        try {

            $product= Product::with('shop','category')->where('id',$id)->first();
            /* return $product; */
            $shops=Shop::all();
            $categories=Category::all();
            $productphoto = $product->productphoto;
            /* return $productphoto; */
           
            return view('admin.product.edit',compact('product','shops','categories','productphoto'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.index')->with(['error' => $th->getMessage()]);
        }
        
    }
    public function update(Request $request)
    {
        
        try {
            $product = Product::find($request->id);
            $products= Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'price' => ['required',/* 'decimal:3,2' */'numeric'],
                'country_made' => ['required', 'string', 'max:255'],
                'quantity' => ['required', 'numeric'],
                'productphoto.*' => [ 'mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
               
                
            ]);
           
            if ($products->fails()) {
                return redirect()->route('admin.product.edit')
                            ->withErrors($products)
                            ->withInput();
            }
               
                /* start update product */
                    $product->name=$request->name;
                    $product->description=$request->description;
                    $product->price=$request->price;
                    $product->country_made=$request->country_made;
                    $product->quantity=$request->quantity;
                    
                    $product->created_date=date('Y-m-d');
                    $request->status?$product->status=1:$product->status=0;
                    $request->activation?$product->activation=1:$product->activation=0;
                    $product->shop_id=$request->shop;
                    $product->catg_id=$request->sub_category;
                /* start update product */
                
            

                $product->save();
                /* 
                    if($request->hasFile('productphoto')){
                        foreach ($request->file('productphoto') as $file) {
                        
                            
                    
                                $filename = time() . '_' . $file->getClientOriginalName();
                                $file->move(public_path('Product/' ),$filename);
                            
                                ProductPhoto::create([
                                'photo_name' => $filename,
                                'product_id' => $product->id,
                            ]);
                        } 
                    }
                    $validity=$shop->validity;
                
                    $validityDocs = $validity->docs;
                */
            // Delete the old files if they exist
            $productphoto = $product->productphoto;
            if($request->hasFile('productphoto')){

            
                if ($productphoto->isNotEmpty()) {
                    foreach ($productphoto as $doc) {
                        $filePath = public_path('Product/' . $doc->photo_name);
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        // Optionally, delete the record from the database
                        $doc->delete();
                    }
                }

            // Save the new files
            
                foreach ($request->file('productphoto') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('Product/' ), $filename);

                    // Create new ShopValidityDocs record
                    ProductPhoto::create([
                        'photo_name' => $filename,
                        'product_id' => $product->id,
                    ]);
                    
                }
            }
          

            return   redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
            //return redirect()->route('admin.user.index')->with(['success' => 'تم الحفظ بنجاح']);
        

            
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.edit')->with(['error' => $th->getMessage()]);
            /* return redirect()->route('admin.shop.edit')->with(['error' => $th]); */
        }
        
       
    }

}
/*  Available
Not available
Active
Inactive
    "id": 2,
    "name": "milk alyoum",
    "description": "asdasdasdasd",
    "activation": 0,
    "price": "1.25",
    "country_made": "jordan",
    "quantity": 1000,
    "status": 0,
    "created_date": "2024-08-25",
    "shop_id": 33,
    "catg_id": 2,
    "created_at": "2024-08-25T21:53:16.000000Z",
    "updated_at": "2024-08-25T21:53:16.000000Z",
    "shop": {
        "id": 33,
        "name": "wwww",
        "Field": "wwww",
        "latitude": "51.51799516",
        "longitude": "-0.02113490",
        "city": "London",
        "address": "Hawgood Street, Bromley-by-Bow, Poplar, London Borough of Tower Hamlets, London, Greater London, England, E3 3RT, United Kingdom",
        "phone_number": "0788865214",
        "acception": 1,
        "created_date": "2024-08-25 00:00:00",
        "seller_id": 12,
        "catg_id": 2,
        "created_at": "2024-08-25T10:35:06.000000Z",
        "updated_at": "2024-08-25T10:35:55.000000Z"
    },
    "category": {
        "id": 2,
        "main_category": "asd",
        "sub_category": "asd",
        "brand": "1724305288.png",
        "created_at": "2024-08-22T05:41:28.000000Z",
        "updated_at": "2024-08-22T05:41:28.000000Z"
    },
    "productphoto": [
        {
            "id": 2,
            "photo_name": "1724622796_Screenshot 2024-08-17 120947.png",
            "product_id": 2,
            "created_at": "2024-08-25T21:53:16.000000Z",
            "updated_at": "2024-08-25T21:53:16.000000Z"
        },
        {
            "id": 3,
            "photo_name": "1724622796_Screenshot 2024-08-17 123624.png",
            "product_id": 2,
            "created_at": "2024-08-25T21:53:16.000000Z",
            "updated_at": "2024-08-25T21:53:16.000000Z"
        }
    ]
*/
