
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
            <div class="card text-center">
                <div class="card-header">
                  create product
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form id="shopForm" method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            
                            
                            {{-- Start product Name  --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __( 'Product Name ') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end product Name --}}
                            {{-- start description  --}}
                                <div class="row mb-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="exampleFormControlTextarea1"  id="description"  name="description" value="{{ old('description') }}" rows="3"></textarea>
                                        
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end description  --}}
                            {{-- Start price  --}}
                                <div class="row mb-3">
                                    <label for="price" class="col-md-4 col-form-label text-md-end">{{ __( 'Price ') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end price --}}
                            {{-- Start country_made  --}}
                                <div class="row mb-3">
                                    <label for="country_made" class="col-md-4 col-form-label text-md-end">{{ __( 'Country Made ') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="country_made" type="text" class="form-control @error('country_made') is-invalid @enderror" name="country_made" value="{{ old('country_made') }}" required autocomplete="country_made" autofocus>
                
                                        @error('country_made')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end country_made --}}
                            {{-- Start quantity  --}}
                                <div class="row mb-3">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __( 'Quantity ') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end quantity --}}
                            {{-- user name --}}
                                <div class="row mb-3">
                                    <label for="shop" class="col-md-4 col-form-label text-md-end ">{{ __('Shop Name') }}</label>
                                    <div class="col-md-6">
                                        <select class=" form-select col-md-4 "  name="shop">
                                            @foreach ($shops as $shop)
                                            <option  value="{{$shop->id}}"> {{$shop->name}}  </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                            {{-- end user name --}}
                            {{-- start sub_category --}}
                                <div class="row mb-3">
                                    <label for="sub_category" class="col-md-4 col-form-label text-md-end ">{{ __('Sub Category') }}</label>
                                    <div class="col-md-6">
                                        <select class=" form-select col-md-4 "  name="sub_category">
                                            @foreach ($categories as $category)
                                            <option  value="{{$category->id}}"> {{$category->sub_category}}  </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                            {{-- end sub_category --}}
                            {{-- start productphoto --}}
                                {{--  productphoto--}}
                                <div class="row mb-3">
                                    <label for="productphoto" class="col-md-4 col-form-label text-md-end">{{ __('productphoto') }}</label>

                                    <div class="col-md-6">
                                        <input id="productphoto" type="file" class="form-control @error('productphoto') is-invalid @enderror" multiple name="productphoto[]" value="{{ old('productphoto') }}" required autocomplete="productphoto" autofocus>

                                        @error('productphoto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end productphoto --}}
                            {{-- start status --}}
                                <div class="row mb-3 ">
                                    <div class="{{-- form-check --}} col-md-6 {{-- form-control --}} {{-- text-md-end --}} ">
                                        <input class="form-check-input"  type="checkbox" value="1" name="status" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Status
                                        </label>
                                    </div>
                                </div>
                            {{-- end status --}}
                            {{-- start activation --}}
                                <div class="row mb-3 ">
                                    <div class="{{-- form-check --}} col-md-6{{--  form-control text-md-end  --}}">
                                        <input class="form-check-input"  type="checkbox" value="1" name="activation" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Activation
                                        </label>
                                    </div>
                                </div>
                            {{-- end activation --}}
                           
                            
                           
                            
                            
            
                           
                                
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sent') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{route('admin.product.index')}}">Back to Dashboard Product</a>
                                </div>
                            </div>
            
                        </form>
                          
                    </div>
                </div>
            </div>
        
    </div>
</div>


   

    
@endsection

{{--
        "id": 1,
        "name": "asasas",
        "description": "asassadasd",
        "price": "2.22",
        "country_made": "amman",
        "quantity": 1000,
        "status": 0,
        "activation": 0,
        "created_date": "2024-08-25",
        "shop_id": 33,
        "catg_id": 2,
        "created_at": "2024-08-25T14:52:43.000000Z",
        "updated_at": "2024-08-25T14:52:43.000000Z",
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
                "id": 1,
                "photo_name": "asasas",
                "product_id": 1,
                "created_at": "2024-08-25T17:58:49.000000Z",
                "updated_at": "2024-08-25T17:58:49.000000Z"
            }
        ] 
--}}

