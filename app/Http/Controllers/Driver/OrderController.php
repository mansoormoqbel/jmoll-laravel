<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Driverinfo;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()  {
        $user_id= Auth::user()->id;
        $driver_id= Driverinfo::where('user_id',$user_id)->first();
        $orders = Order::with('user','orderItem.product.shop')->where('driver_id',$driver_id->id)->get();
        //return $order;

       return view('driver.order',compact('orders'));
     
        /* 
            $orders = Order::whereHas('orderItem.product', function ($query) use ($id) {
                $query->where('shop_id', $id);
            })->where('order_status',0)->where('driver_id',"!=" , NULL)->with('orderItem.product','driverinfo.user','user')->get();
        */
    }
    public function getOrder($id) {
        $user_id= Auth::user()->id;
        $driver_id= Driverinfo::where('user_id',$user_id)->first();
        //return $driver_id;
        $order_id= $id;
        $order = Order::with('user','orderItem.product.shop')->where('id',$order_id)->first();
        
        
        
        $shop=$order->orderItem->first()->product->shop;
       
        return view('driver.getOrder',compact('order','shop','driver_id'));
    }
}

/* 
    [
        {
        "id": 2,
        "user_id": 1,
        "latitude": "31.95377857",
        "longitude": "35.92132627",
        "city": "Amman",
        "address": "185, Prince Mohammad Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
        "phone_number": "0788865214",
        "total_price_products": "5.80",
        "delivery_price": "1.50",
        "total_amount": "7.30",
        "number_product": 1,
        "order_status": 0,
        "date": "2024-09-15",
        "driver_id": 1,
        "created_at": "2024-09-15T19:39:12.000000Z",
        "updated_at": "2024-09-15T19:39:12.000000Z",
        "user": {
            "id": 1,
            "username": "admin",
            "first_name": "mansoor",
            "last_name": "moqbel",
            "phone_number": "0788865214",
            "profile_photo": "1725453692.png",
            "status": 1,
            "type_user": 3,
            "email": "admin@admin.com",
            "email_verified_at": null,
            "created_at": "2024-09-04T12:41:34.000000Z",
            "updated_at": "2024-09-04T12:41:34.000000Z"
        },
        "order_item": [
            {
            "id": 3,
            "product_id": 8,
            "order_id": 2,
            "quantity": 4,
            "added_date": "2024-09-15",
            "created_at": "2024-09-15T19:39:12.000000Z",
            "updated_at": "2024-09-15T19:39:12.000000Z",
            "product": {
                "id": 8,
                "name": "لبن اليوم",
                "description": "كيلو  لبن اليوم",
                "activation": 1,
                "price": "1.45",
                "country_made": "الاردن",
                "quantity": 40,
                "status": 1,
                "created_date": "2024-09-15",
                "shop_id": 2,
                "catg_id": 5,
                "created_at": "2024-09-15T19:32:17.000000Z",
                "updated_at": "2024-09-15T19:32:37.000000Z",
                "shop": {
                "id": 2,
                "name": "mansoor Dile",
                "Field": "mansoor Dile",
                "latitude": "31.94944962",
                "longitude": "35.92226752",
                "city": "Amman",
                "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
                "phone_number": "0788886521",
                "acception": 1,
                "created_date": "2024-09-10 00:00:00",
                "seller_id": 3,
                "catg_id": 1,
                "created_at": "2024-09-10T21:39:08.000000Z",
                "updated_at": "2024-09-10T21:39:08.000000Z"
                }
            }
            }
        ]
        },
        {
        "id": 3,
        "user_id": 1,
        "latitude": "31.95377857",
        "longitude": "35.92132627",
        "city": "Amman",
        "address": "185, Prince Mohammad Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
        "phone_number": "0788865214",
        "total_price_products": "5.80",
        "delivery_price": "1.50",
        "total_amount": "7.30",
        "number_product": 1,
        "order_status": 0,
        "date": "2024-09-15",
        "driver_id": 1,
        "created_at": "2024-09-15T19:39:14.000000Z",
        "updated_at": "2024-09-15T19:39:14.000000Z",
        "user": {
            "id": 1,
            "username": "admin",
            "first_name": "mansoor",
            "last_name": "moqbel",
            "phone_number": "0788865214",
            "profile_photo": "1725453692.png",
            "status": 1,
            "type_user": 3,
            "email": "admin@admin.com",
            "email_verified_at": null,
            "created_at": "2024-09-04T12:41:34.000000Z",
            "updated_at": "2024-09-04T12:41:34.000000Z"
        },
        "order_item": []
        },
        {
        "id": 4,
        "user_id": 1,
        "latitude": "31.95028289",
        "longitude": "35.92372953",
        "city": "Amman",
        "address": "Embassy of Saudi Arabia, Al-Bayhaqi Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
        "phone_number": "0788865214",
        "total_price_products": "2.50",
        "delivery_price": "1.50",
        "total_amount": "4.00",
        "number_product": 1,
        "order_status": 0,
        "date": "2024-09-16",
        "driver_id": 1,
        "created_at": "2024-09-16T05:09:16.000000Z",
        "updated_at": "2024-09-21T18:53:17.000000Z",
        "user": {
            "id": 1,
            "username": "admin",
            "first_name": "mansoor",
            "last_name": "moqbel",
            "phone_number": "0788865214",
            "profile_photo": "1725453692.png",
            "status": 1,
            "type_user": 3,
            "email": "admin@admin.com",
            "email_verified_at": null,
            "created_at": "2024-09-04T12:41:34.000000Z",
            "updated_at": "2024-09-04T12:41:34.000000Z"
        },
        "order_item": [
            {
            "id": 4,
            "product_id": 9,
            "order_id": 4,
            "quantity": 2,
            "added_date": "2024-09-16",
            "created_at": "2024-09-16T05:09:16.000000Z",
            "updated_at": "2024-09-16T05:09:16.000000Z",
            "product": {
                "id": 9,
                "name": "لبن المراعي",
                "description": "كيلو لبن المراعي",
                "activation": 1,
                "price": "1.25",
                "country_made": "الاردن",
                "quantity": 40,
                "status": 1,
                "created_date": "2024-09-16",
                "shop_id": 2,
                "catg_id": 5,
                "created_at": "2024-09-16T05:05:11.000000Z",
                "updated_at": "2024-09-16T05:05:11.000000Z",
                "shop": {
                "id": 2,
                "name": "mansoor Dile",
                "Field": "mansoor Dile",
                "latitude": "31.94944962",
                "longitude": "35.92226752",
                "city": "Amman",
                "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
                "phone_number": "0788886521",
                "acception": 1,
                "created_date": "2024-09-10 00:00:00",
                "seller_id": 3,
                "catg_id": 1,
                "created_at": "2024-09-10T21:39:08.000000Z",
                "updated_at": "2024-09-10T21:39:08.000000Z"
                }
            }
            }
        ]
        },
        {
        "id": 5,
        "user_id": 1,
        "latitude": "31.94513421",
        "longitude": "35.92904806",
        "city": "Amman",
        "address": "Prince Al-Hasan Street, الياسمين, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11110, Jordan",
        "phone_number": "0788865214",
        "total_price_products": "29.50",
        "delivery_price": "1.50",
        "total_amount": "31.00",
        "number_product": 2,
        "order_status": 1,
        "date": "2024-09-17",
        "driver_id": 1,
        "created_at": "2024-09-17T17:43:41.000000Z",
        "updated_at": "2024-09-20T20:01:16.000000Z",
        "user": {
            "id": 1,
            "username": "admin",
            "first_name": "mansoor",
            "last_name": "moqbel",
            "phone_number": "0788865214",
            "profile_photo": "1725453692.png",
            "status": 1,
            "type_user": 3,
            "email": "admin@admin.com",
            "email_verified_at": null,
            "created_at": "2024-09-04T12:41:34.000000Z",
            "updated_at": "2024-09-04T12:41:34.000000Z"
        },
        "order_item": [
            {
            "id": 5,
            "product_id": 9,
            "order_id": 5,
            "quantity": 12,
            "added_date": "2024-09-17",
            "created_at": "2024-09-17T17:43:42.000000Z",
            "updated_at": "2024-09-17T17:43:42.000000Z",
            "product": {
                "id": 9,
                "name": "لبن المراعي",
                "description": "كيلو لبن المراعي",
                "activation": 1,
                "price": "1.25",
                "country_made": "الاردن",
                "quantity": 40,
                "status": 1,
                "created_date": "2024-09-16",
                "shop_id": 2,
                "catg_id": 5,
                "created_at": "2024-09-16T05:05:11.000000Z",
                "updated_at": "2024-09-16T05:05:11.000000Z",
                "shop": {
                "id": 2,
                "name": "mansoor Dile",
                "Field": "mansoor Dile",
                "latitude": "31.94944962",
                "longitude": "35.92226752",
                "city": "Amman",
                "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
                "phone_number": "0788886521",
                "acception": 1,
                "created_date": "2024-09-10 00:00:00",
                "seller_id": 3,
                "catg_id": 1,
                "created_at": "2024-09-10T21:39:08.000000Z",
                "updated_at": "2024-09-10T21:39:08.000000Z"
                }
            }
            },
            {
            "id": 6,
            "product_id": 8,
            "order_id": 5,
            "quantity": 10,
            "added_date": "2024-09-17",
            "created_at": "2024-09-17T17:43:42.000000Z",
            "updated_at": "2024-09-17T17:43:42.000000Z",
            "product": {
                "id": 8,
                "name": "لبن اليوم",
                "description": "كيلو  لبن اليوم",
                "activation": 1,
                "price": "1.45",
                "country_made": "الاردن",
                "quantity": 40,
                "status": 1,
                "created_date": "2024-09-15",
                "shop_id": 2,
                "catg_id": 5,
                "created_at": "2024-09-15T19:32:17.000000Z",
                "updated_at": "2024-09-15T19:32:37.000000Z",
                "shop": {
                "id": 2,
                "name": "mansoor Dile",
                "Field": "mansoor Dile",
                "latitude": "31.94944962",
                "longitude": "35.92226752",
                "city": "Amman",
                "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
                "phone_number": "0788886521",
                "acception": 1,
                "created_date": "2024-09-10 00:00:00",
                "seller_id": 3,
                "catg_id": 1,
                "created_at": "2024-09-10T21:39:08.000000Z",
                "updated_at": "2024-09-10T21:39:08.000000Z"
                }
            }
            }
        ]
        }
    ]

*/


/* 

{
  "id": 5,
  "user_id": 1,
  "latitude": "31.94513421",
  "longitude": "35.92904806",
  "city": "Amman",
  "address": "Prince Al-Hasan Street, الياسمين, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11110, Jordan",
  "phone_number": "0788865214",
  "total_price_products": "29.50",
  "delivery_price": "1.50",
  "total_amount": "31.00",
  "number_product": 2,
  "order_status": 1,
  "date": "2024-09-17",
  "driver_id": 1,
  "created_at": "2024-09-17T17:43:41.000000Z",
  "updated_at": "2024-09-20T20:01:16.000000Z",
  "user": {
    "id": 1,
    "username": "admin",
    "first_name": "mansoor",
    "last_name": "moqbel",
    "phone_number": "0788865214",
    "profile_photo": "1725453692.png",
    "status": 1,
    "type_user": 3,
    "email": "admin@admin.com",
    "email_verified_at": null,
    "created_at": "2024-09-04T12:41:34.000000Z",
    "updated_at": "2024-09-04T12:41:34.000000Z"
  },
  "order_item": [
    {
      "id": 5,
      "product_id": 9,
      "order_id": 5,
      "quantity": 12,
      "added_date": "2024-09-17",
      "created_at": "2024-09-17T17:43:42.000000Z",
      "updated_at": "2024-09-17T17:43:42.000000Z",
      "product": {
        "id": 9,
        "name": "لبن المراعي",
        "description": "كيلو لبن المراعي",
        "activation": 1,
        "price": "1.25",
        "country_made": "الاردن",
        "quantity": 40,
        "status": 1,
        "created_date": "2024-09-16",
        "shop_id": 2,
        "catg_id": 5,
        "created_at": "2024-09-16T05:05:11.000000Z",
        "updated_at": "2024-09-16T05:05:11.000000Z",
        "shop": {
          "id": 2,
          "name": "mansoor Dile",
          "Field": "mansoor Dile",
          "latitude": "31.94944962",
          "longitude": "35.92226752",
          "city": "Amman",
          "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
          "phone_number": "0788886521",
          "acception": 1,
          "created_date": "2024-09-10 00:00:00",
          "seller_id": 3,
          "catg_id": 1,
          "created_at": "2024-09-10T21:39:08.000000Z",
          "updated_at": "2024-09-10T21:39:08.000000Z"
        }
      }
    },
    {
      "id": 6,
      "product_id": 8,
      "order_id": 5,
      "quantity": 10,
      "added_date": "2024-09-17",
      "created_at": "2024-09-17T17:43:42.000000Z",
      "updated_at": "2024-09-17T17:43:42.000000Z",
      "product": {
        "id": 8,
        "name": "لبن اليوم",
        "description": "كيلو  لبن اليوم",
        "activation": 1,
        "price": "1.45",
        "country_made": "الاردن",
        "quantity": 40,
        "status": 1,
        "created_date": "2024-09-15",
        "shop_id": 2,
        "catg_id": 5,
        "created_at": "2024-09-15T19:32:17.000000Z",
        "updated_at": "2024-09-15T19:32:37.000000Z",
        "shop": {
          "id": 2,
          "name": "mansoor Dile",
          "Field": "mansoor Dile",
          "latitude": "31.94944962",
          "longitude": "35.92226752",
          "city": "Amman",
          "address": "10, Qasim Malhas Street, Jabal Amman, منطقة المدينة, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11118, Jordan",
          "phone_number": "0788886521",
          "acception": 1,
          "created_date": "2024-09-10 00:00:00",
          "seller_id": 3,
          "catg_id": 1,
          "created_at": "2024-09-10T21:39:08.000000Z",
          "updated_at": "2024-09-10T21:39:08.000000Z"
        }
      }
    }
  ]
}

*/