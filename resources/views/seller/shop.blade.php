@extends('layouts.seller')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-bg-primary text-center"> {{$shop->name}}  </div>
                <div class="card-body">
                  
                  <p {{-- class="fs-6" --}} style="font-size:10px;"  >{{$shop->address}}</p><hr>
                  <h5 class="card-title"></h5>{{-- <hr> --}}
                  <p class="card-text"> {{$shop->category->main_category}} & {{$shop->category->sub_category}} </p><hr>
                  <p class="card-text"> Number of products:{{$product>0?$product:0}} </p></hr>
                  <p  class="card-text" > {{$shop->created_date}} </p>
                  
                </div>
            </div>
        </div>
        <div class="col">
            <a href="{{route('seller.product',$shop->id)}}" class="btn btn-primary fs-3 p-2 m-2">Product</a>
            <a href="{{route('seller.TakenByDriver',$shop->id)}}" class="btn btn-primary fs-3 p-2 m-2">Order </a>
        </div>
    </div>
    
</div>
@endsection
{{--
    {
        "id": 1,
        "name": "test shop",
        "Field": "test shop",
        "latitude": "31.93189802",
        "longitude": "35.94391088",
        "city": "Amman",
        "address": "Abu Obaidah Al-Thaqafi Street, العوده, منطقة اليرموك, Amman, Amman Sub-District, Amman Qasabah District, Amman, 11152, Jordan",
        "phone_number": "0788865214",
        "acception": 1,
        "created_date": "2024-09-04 00:00:00",
        "seller_id": 3,
        "catg_id": 1,
        "created_at": "2024-09-04T12:51:21.000000Z",
        "updated_at": "2024-09-04T12:51:21.000000Z",
        "category": {
            "id": 1,
            "main_category": "testCategory",
            "sub_category": "testCategory",
            "brand": "1725454137.png",
            "created_at": "2024-09-04T12:48:57.000000Z",
            "updated_at": "2024-09-04T12:48:57.000000Z"
        }
    }
 --}}