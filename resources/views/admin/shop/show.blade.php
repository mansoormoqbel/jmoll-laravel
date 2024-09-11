
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            
            <h2 class="card-title"> {{$shops->name}} </h2>
            <h5 class="card-text">{{$shops->phone_number}} </h5>
            <span id="latitude" class="visually-hidden"> {{$shops->latitude}}</span>
            <span id="longitude" class="visually-hidden"> {{$shops->longitude}}</span>
            <span id="city" class="visually-hidden"> {{$shops->city}}</span>
            <span id="address" class="visually-hidden"> {{$shops->address}}</span>
            <h5 class="card-text">{{$shops->acception?"acceptable":"inacceptable"}} </h5>
          {{-- latitude, longitude,city,address --}}
        </div>
        <div class="col">
            <h2 class="card-title"> {{$shops->user->username}} </h2>
            <h5 class="card-text">{{$shops->user->email}} </h5>
            <p class="card-text">{{$shops->user->phone_number}} </p>
        </div>
        <div class="col">
            <h2 class="card-title"> {{$shops->category->main_category}} </h2>
            <h5 class="card-text">{{$shops->category->sub_category}} </h5>
            
        </div>
        <div class="row">
            <h1>Word Document Display</h1>
        </div>
        <div class="row">
            @foreach($validityDocs as $doc)
                <div class="col">     
                    <iframe src="https://docs.google.com/gview?url={{asset('field')}}/{{$doc->filename}}&embedded=true" width="100%" height="400px">
                    
                    </iframe>
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('field')}}/{{$doc->filename}}">Download Word Document</a>
                </div>
            @endforeach
        </div>
        <div id="map" style="height: 400px;"></div>
        <a class="btn btn-dark" href="{{route('admin.shop.index')}}">Back to Dashboard User</a>
    </div>
</div>
   
    

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    {{-- latitude, longitude,city,address --}}
    <script>
        
            var latitude,longitude,city,address;
            latitude= document.getElementById('latitude').innerText;
            longitude= document.getElementById('longitude').innerText;
            city= document.getElementById('city').innerText;
            address= document.getElementById('address').innerText;
            
            var map = L.map('map').setView([latitude, longitude], 13);
            
                // Add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            L.marker([latitude, longitude])
            .addTo(map)
            .bindPopup(`<b>${city}</b><br>${address}`);

     
          

       
    </script>
@endsection

