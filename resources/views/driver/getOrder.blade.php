
@extends('layouts.driver')

@section('content')


<div class="container text-center">
        <label class="switch">
            <input type="checkbox"  {{ $driver_id->availability == 1 ? 'checked' : '' }} >
            <span class="slider round"></span>
        </label>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                # {{$order->id}} order Details 
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   
                     {{--  "car_license_file": "123123123",
  "availability": 1, --}}
                    {{-- <div>driver_id</div> --}}
                    <div class="container ">
                        <div>Order Details</div>
                        <div class="row">
                            <div class="col">
                                <h1>Shop Details</h1>
                                <hr>
                                <p> {{$shop->name}} </p>
                                <p> {{$order->number_product}} </p>
                                <p> {{$shop->phone_number}} </p>
                                <p> {{$shop->address}} </p>
                                <input type="hidden" name="latitude"  id="latitude" value="{{$shop->latitude}}" >
                                <input type="hidden" name="longitude"  id="longitude" value="{{$shop->longitude}}" >
                                <input type="hidden" name="city" id="city" value="{{$shop->city}}">
                                <input type="hidden" name="address" id="address" value="{{$shop->address}}">
                                <div id="map" style="width:400px;height: 400px;"></div>
                            </div>
                            <div class="col">
                                <h1>Customer Details</h1>
                                <hr>
                                <p> {{$order->user->username}} </p>
                                <p>  </p>
                                <p> {{$order->phone_number}} </p>
                                <p> {{$order->address}} </p>
                                
                                <input type="hidden" name="latitude1"  id="latitude1" value="{{$order->latitude}}" >
                                <input type="hidden" name="longitude1"  id="longitude1" value="{{$order->longitude}}" >
                                <input type="hidden" name="city1" id="city1" value="{{$order->city}}">
                                <input type="hidden" name="address1" id="address1" value="{{$order->address}}">
                                <div id="map1" style="width:400px;height: 400px;"></div>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
    
</div>



{{--
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Accordion Item #1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="container text-center">
                    <div>Order Details</div>
                    <div class="row">
                      <div class="col">
                       
                      </div>
                      <div class="col">
                        2 of 2
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Accordion Item #2
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
      </div>
    </div>
    
</div> --}}

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
{{-- latitude, longitude,city,address --}}
<script>

    var latitude,longitude,city,address,latitude1,longitude1,city1,address1;
    latitude= document.getElementById('latitude').value;
    longitude= document.getElementById('longitude').value;
    city= document.getElementById('city').value;
    address= document.getElementById('address').value;
    latitude1= document.getElementById('latitude1').value;
    longitude1= document.getElementById('longitude1').value;
    city1= document.getElementById('city1').value;
    address1= document.getElementById('address1').value;
    var map = L.map('map').setView([latitude, longitude], 13);
    var map1 = L.map('map1').setView([latitude1, longitude1], 13);
    
        // Add the OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);
    L.marker([latitude, longitude])
        .addTo(map)
        .bindPopup(`<b>${city}</b><br>${address}`);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
    }).addTo(map1);
    L.marker([latitude1, longitude1])
        .addTo(map1)
        .bindPopup(`<b>${city1}</b><br>${address1}`);

    

   

       

    


</script>
@endsection