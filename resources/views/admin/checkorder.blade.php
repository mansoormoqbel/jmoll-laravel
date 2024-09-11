@extends('layouts.admin')

@section('content')
    <div class="container mt-4" style="width: 50rem;height:50rem">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Confirmation Order</h3>
            </div>
            <div class="card-body">
                {{-- 
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
                            
                --}}
                
                
                <p class="card-text">Total Price Of the Products is : <strong>{{session('total_price_products')}} JD</strong> </p>
                <p class="card-text">The Delivery Price is : <strong>{{session('delivery_price')}} JD</strong> </p>
                <p class="card-text">The Total Amount for Order is : <strong class="text-danger">{{session('total_amount')}} JD</strong> </p>
                <p class="card-text">Are you Sure to Complete the Order?</p>
                <form id="shopForm" method="POST" action="{{ route('admin.shopcart.create_order') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input fields to store latitude and longitude -->
                    
                    <input type="hidden" id="latitude" name="latitude" value="{{session('latitude')}}">
                    <input type="hidden" id="longitude" name="longitude" value="{{session('longitude')}}">
                    <input type="hidden" id="city" name="city" value="{{session('city')}}">
                    <input type="hidden" id="address" name="address" value="{{session('address')}}">
                    <input type="hidden" id="phone_number" name="phone_number" value="{{session('phone_number')}}">
                    <input type="hidden" id="total_price_products" name="total_price_products" value="{{session('total_price_products')}}">
                    <input type="hidden" id="total_amount" name="total_amount" value="{{session('total_amount')}}">
                    <input type="hidden" id="delivery_price" name="delivery_price" value="{{session('delivery_price')}}">
                    <input type="hidden" id="number_product" name="number_product" value="{{session('number_product')}}">
                    

                    
                    
                   
                    <button class="btn btn-success mr-2">Complete</button>
                    <a  class="btn btn-danger" href="{{route('admin.shopcart.ShowOrder')}}">Cancel</a>
                    {{-- <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                           
                            
                        </div>
                    </div> --}}
                   
                </form>
                {{-- <button class="btn btn-success mr-2">Complete</button>
                <button class="btn btn-danger">Cancel</button> --}}
            </div>
            
        </div>
        
    </div>
@endsection