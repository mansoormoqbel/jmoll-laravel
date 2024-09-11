
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            
            
            <h2 class="card-title">Product Name : {{$product->name}} </h2>
            <h5 class="card-text"> Product Description:{{$product->description}} </h5>
            <h5 class="card-text"> Product Price:{{$product->price}} </h5>
            <h5 class="card-text"> Product Country Made:{{$product->country_made}} </h5>
            <h5 class="card-text"> Product Quantity:{{$product->quantity}} </h5>
            
            <h5 class="card-text"> Status :{{$product->status?"Available":"Not available"}} </h5>
            <h5 class="card-text"> Activation :{{$product->activation?"Active":"Inactive"}} </h5>
          {{-- latitude, longitude,city,address --}}
        </div>
        <div class="col">
            <h2 class="card-title"> Shop Name : {{$product->shop->name}} </h2>
            <h5 class="card-text"> Shop Address : {{$product->shop->address}} </h5>
            <p class="card-text"> Shop Phone  {{$product->shop->phone_number}} </p>
        </div>
        <div class="col">
            <h2 class="card-title">Main Category : {{$product->category->main_category}} </h2>
            <h5 class="card-text">Sub Category : {{$product->category->sub_category}} </h5>
            
        </div>
        <div class="row">
            <h1>Word Document Display</h1>
        </div>
        <div class="row">
            @foreach($productphoto as $doc)
                <div class="col">     
                    <img src="{{asset('Product')}}/{{$doc->photo_name}}" alt="{{asset('Product')}}/{{$doc->photo_name}}">
                    
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('Product')}}/{{$doc->photo_name}}">Download Word Document</a>
                </div>
            @endforeach
        </div>
        <div id="map" style="height: 400px;"></div>
        <a class="btn btn-dark" href="{{route('admin.product.index')}}">Back to Dashboard Product</a>
    </div>
</div>
   
    

@endsection

