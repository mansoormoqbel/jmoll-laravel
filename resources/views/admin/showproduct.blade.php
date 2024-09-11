        
@extends('layouts.admin')

@section('content')  
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($pp as $index => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($pp as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('Product/' . $image->photo_name) }}" class="d-block w-100" alt="{{$image->photo_name}}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon{{-- fas fa-fw fa-arrow-left --}}" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                
              
            </div>
            <div class="col-md-6">
                <h1 class="text-center">{{$products->name}}</h1>
                <p>Added on {{$products->created_date}} </p>
                <p> {{$products->category->main_category}} {{$products->category->sub_category}}</p>
                <p>Shop name:<span class="fs-3 text-warning text-opacity-75"> {{$products->shop->name}} </span></p>
                <p>Status: {{$products->status ==1?'In Stock' :'Out of Stock'}}</p>
                <h3 class="fs-3 text-warning text-opacity-75">{{$products->price}} JD</h3>
                <h3 class="fs-3 text-danger-emphasis text-opacity-75">{{$products->description}} </h3>
                <p>Made in: United States</p>
                <form action="{{ route('admin.shopcart.AddToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="Product_id" value="{{$products->id}}">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="qun" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2{{--  class="text-center" --}} >Comments</h2>
                <form action="{{route('admin.shopcart.addcomment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="Product_id" value="{{$products->id}}">
                   
                    {{-- start body --}}
                        <div class="row mb-0">
                            

                            <div class="col-md-6">
                                <textarea class="form-control" id="exampleFormControlTextarea1"  id="body" required  name="body" value="{{ old('body') }}" rows="3"  placeholder="Write your comment here"></textarea>
                                
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    {{-- end body --}}
                   
                   
                    {{--start submit --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Add Comment') }}
                                </button>
                                {{-- <a class="btn btn-dark" href="{{route('admin.comment.index')}}">Back to Dashboard Comment</a> --}}
                            </div>
                        </div>
                    {{--end submit --}}
                </form>
                <div class="mt-4 text-bg-secondary">
                    @foreach ($comments as $comment)
                    <div class="card mb-3 text-bg-secondary " style="max-width: 540px; height:120px">
                        <div class="row g-0">
                          <div class="col-md-2 ">
                            <img src="{{asset('images/'.$comment->user->profile_photo)}}" style="width: 80px ;height:80px" class="img-fluid  rounded-circle" alt="...">
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <h5 class="card-title">{{$comment->user->username}}</h5>
                              <p class="card-text">{{$comment->body}}</p>
                              <p class=" float-end card-text"><small class=" float-end {{-- text-body-secondary --}}">{{$comment->create_date}}</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <h4></h4>
                    <p></p>
                    @endforeach
                    
                    {{-- <h4>Good Product</h4>
                    <p>--</p> --}}
                </div>
            </div>
        </div>
    </div>
    
@endsection

{{-- 
    {  
        "id": 1,
        "name": "test product",
        "description": "product product product",
        "activation": 1,
        "price": "55.00",
        "country_made": "amman",
        "quantity": 5000,
        "status": 1,
        "created_date": "2024-09-04",
        "shop_id": 1,
        "catg_id": 1,
        "created_at": "2024-09-04T12:52:33.000000Z",
        "updated_at": "2024-09-04T12:52:33.000000Z",
        "shop": {
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
            "updated_at": "2024-09-04T12:51:21.000000Z"
        },
        "category": {
            "id": 1,
            "main_category": "testCategory",
            "sub_category": "testCategory",
            "brand": "1725454137.png",
            "created_at": "2024-09-04T12:48:57.000000Z",
            "updated_at": "2024-09-04T12:48:57.000000Z"
        },
        "productphoto": [
            {
                "id": 1,
                "photo_name": "1725454353_github.png",
                "product_id": 1,
                "created_at": "2024-09-04T12:52:33.000000Z",
                "updated_at": "2024-09-04T12:52:33.000000Z"
            }
        ]
    }
--}}

{{-- 

    "id": 2,
    "body": "BodyBodyBody",
    "product_id": 1,
    "user_id": 1,
    "create_date": "2024-09-05",
    "created_at": "2024-09-05T17:54:52.000000Z",
    "updated_at": "2024-09-05T17:54:52.000000Z",
    "product": {
        "id": 1,
        "name": "samah mall",
        "description": "product product product",
        "activation": 1,
        "price": "55.00",
        "country_made": "amman",
        "quantity": 5000,
        "status": 0,
        "created_date": "2024-09-07",
        "shop_id": 1,
        "catg_id": 1,
        "created_at": "2024-09-04T12:52:33.000000Z",
        "updated_at": "2024-09-07T14:33:29.000000Z"
    },
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
    }
    


--}}