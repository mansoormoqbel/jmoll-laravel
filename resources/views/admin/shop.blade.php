@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
            <!-- Header-->
                <header class="bg-dark py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="text-center text-white">
                            <h1 class="display-4 fw-bolder">Shop in style</h1>
                            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                        </div>
                    </div>
                </header>
            {{--  Header --}}
            <!-- Section-->
                <section class="py-5">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            @foreach ($products as $product)
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product image-->
                                        <img class="card-img-top" src="{{asset('Product/'.$product->productphoto[0]->photo_name)}}" alt="..." />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder"> {{$product->name}} </h5>
                                                <!-- Product price-->
                                            {{$product->price}}
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.shopcart.AddToCart') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="{{-- text-center col-auto --}} form-control-sm">
                                                    <input type="hidden" name="Product_id" value="{{$product->id}}">
                                                    <input type="number" name="qun" id="qun" min="1" required>
                                                </div>
                                            </div>
                                        
                                            
                                            <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center">
                                                    <button type="submit" {{-- class="btn btn-primary" --}}class="btn btn-outline-dark mt-auto">
                                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                                    </button>
                                                {{--  <a class="btn btn-outline-dark mt-auto" href=""></a> --}}
                                                    <a class="btn btn-outline-dark mt-auto" href="{{route('admin.shopcart.show',$product->id)}}"><i class="fas fa-fw fa-share"></i></a>
                                                </div>
                                            </div>

                                        </form>
                                        <!-- Product actions-->
                                        {{-- <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center">
                                                <a class="btn btn-outline-dark mt-auto" href="{{ route('admin.shopcart.AddtoCart') }}"><i class="fas fa-fw fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark mt-auto" href="#"><i class="fas fa-fw fa-share"></i></a>
                                            </div>
                                        </div> --}}
                                        <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            

                            
                            
                        </div>
                    </div>
                </section>
            {{--  Section--}}

                {{-- 
                    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                --}}


            {{--  Section--}}
              
              
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
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Sale badge-->
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">Special Item</h5>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <div class="fas fa-fw fa-star"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                    </div>
                    <!-- Product price-->
                    <span class="text-muted text-decoration-line-through">$20.00</span>
                    $18.00
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
            </div>
        </div>
    </div>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Sale badge-->
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">Sale Item</h5>
                    <!-- Product price-->
                    <span class="text-muted text-decoration-line-through">$50.00</span>
                    $25.00
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
            </div>
        </div>
    </div>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">Popular Item</h5>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                    </div>
                    <!-- Product price-->
                    $40.00
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
            </div>
        </div>
    </div>

--}}