
@extends('layouts.seller')

@section('content')

    <div class="container text-center p-5">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
       
        <div class="row">
            <div class="col">
                <div class="card text-bg-primary p-5 mb-3" style="max-width: 18rem;">
                    <a class=" text-bg-primary " href="{{route('seller.create')}}">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"><i class="fas fa-plus-circle fa-fw"></i></h5>
                            <h5 class="card-title text-uppercase">create shop</h5>
                        
                        </div>
                    </a>
                </div>
            </div>
            @foreach ($shops as $shop)
                @if ($shop->acception==1)
                    
                    <div class="col">
                        <div class="card text-bg-primary  mb-3" style="max-width: 18rem;">
                           
                            <div class="card-body">
                            <h5 class="card-title">{{$shop->name}}</h5>
                            <p class="card-text"> {{$shop->acception==1? 'Accept':'Unaccept' }}  </p>
                            <p class="card-text"> {{$shop->category->main_category }}  {{$shop->category->sub_category}}  </p>
                            <p class="card-text">  {{$shop->product->count();}} Product </p>
                            
                            <a class="link-offset-2 link-underline link-light" href="{{route('seller.showShop',$shop->id)}}"><i class="fas fa-angle-down fa-fw"></i></a>
                            </div>
                        </div>
                    </div>
                {{-- 
                    @else     
                        <div class="col">
                            <div class="card text-bg-primary  mb-3" style="max-width: 18rem;">
                            
                                <div class="card-body">
                                <h5 class="card-title">{{$shop->name}}</h5>
                                <p class="card-text"> {{$shop->acception==1? 'Accept':'Unaccept' }}  </p>
                                <p class="card-text"> {{$shop->category->main_category }}  {{$shop->category->sub_category}}  </p>
                                <p class="card-text">  {{$shop->product->count();}} Product </p>
                                <i class="fas fa-angle-down fa-fw"></i>
                                </div>
                            </div>
                        </div> 
                --}}
                @endif
               
            @endforeach
          
         
        </div>
      </div>

   
    
@endsection

{{-- 

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


--}}