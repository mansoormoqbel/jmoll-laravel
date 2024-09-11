@extends('layouts.admin')

@section('content')
<div class="row">
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
    <div class="col">
        <a class="btn btn-dark mb-3" href="{{route('admin.shopcart.showCart')}}"> <i class="{{-- carousel-control-prev-icon --}}fas fa-fw fa-arrow-left" aria-hidden="true"></i> Revert Order</a>
        <table class="table">
            <thead>
              <tr>
                
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">price</th>
                
                <th scope="col">Added Date</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartitem)
                <tr>
                   
                    <td>
                        {{$cartitem->product->name}}
                       
                    </td>
                    <td> {{$cartitem->quantity}}  </td>
                    <td> {{$cartitem->product->price}} </td>
                    
                    
                    <td> {{$cartitem->added_date}}  </td>
                    
                    
                  </tr>
                @endforeach

              
              
            </tbody>
        </table>
        <p>Total Products Price: {{$total}} JD</p>
        <a class="btn btn-dark mb-3" href="{{route('admin.shopcart.test')}}"> <i class="fas fa-fw fa-arrow-left" aria-hidden="true"></i> test Order</a>
        <div class="container">
            <div class="card text-center">
                <div class="card-body">
                    <form id="shopForm" method="POST" action="{{ route('admin.shopcart.checkorder') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden input fields to store latitude and longitude -->
                        <input type="hidden" id="number_product" name="number_product" value="{{$count}}">
                        <input type="hidden" id="total_price_products" name="total_price_products" value="{{$total}}">
                        <input type="hidden" id="latitude1" name="latitude1" value="{{$latitude}}">
                        <input type="hidden" id="longitude1" name="longitude1" value="{{$longitude}}" >
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" id="distance" name="distance">
                        <input type="hidden" id="city" name="city">
                        <input type="hidden" id="address" name="address">
                        
                        {{-- phone_number --}}
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label{{--  text-md-end --}}">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        {{-- phone_number --}}
                        <div style="display: flex;justify-content: center;align-items: center;">
                            <div id="map"   style=" height: 400px;width:400px;margin: 0 auto; "></div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Create Order') }}
                                </button>
                                
                            </div>
                        </div>
                       
                    </form>
                  
                </div>
            </div>
        </div>
        
          
        
    </div>
    
</div>



    <!-- Leaflet JS -->
    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geometryutil/0.5.0/leaflet.geometryutil.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var abc1,abc2;
        abc1=document.getElementById('latitude1').value;
        abc2=document.getElementById('longitude1').value;
        /* console.log(abc1,abc2) */
        var map = L.map('map').setView([31.950802292708598, 35.927258143635065], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        var marker = null; // No marker initially

        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // If a marker exists, remove it
            if (marker) {
                map.removeLayer(marker);
            }

            // Create a new marker and add it to the map
            marker = L.marker([lat, lng]).addTo(map);
            var pointA = L.latLng(abc1, abc2);
            var pointB = L.latLng(lat,lng);

            L.marker(pointA).addTo(map).bindPopup('Point A').openPopup();
            L.marker(pointB).addTo(map).bindPopup('Point B').openPopup();

            // حساب المسافة بين النقطتين
            var distance = map.distance(pointA, pointB);

            var x = (distance / 1000).toFixed(2);
            var deliveryPrice;
            if (x <= 5) {
                deliveryPrice = 1.5;
            } else {
                deliveryPrice = 1.5 + (x - 5) * 0.25;
            }
            
           /*  alert('المسافة بين النقطتين: ' + (distance / 1000).toFixed(2) + ' كم'); */
            // Perform reverse geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    // Extract city and address
                    var city = data.address.city || data.address.town || data.address.village;
                    var address = data.display_name;

                    // Display city and address
                    alert(`City: ${city}\nAddress: ${address}`);

                    // Update hidden input fields
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                    document.getElementById('city').value = city;
                    document.getElementById('address').value = address;
                    document.getElementById('distance').value = deliveryPrice;
                })
                .catch(error => {
                    console.error('Error fetching location:', error);
                });
        });

        document.getElementById('shopForm').addEventListener('submit', function(event) {
            var latitude = document.getElementById('latitude').value;
            var longitude = document.getElementById('longitude').value;

            if (!latitude || !longitude) {
                event.preventDefault(); // Stop form submission
                alert('Please select a location on the map before submitting the form.');
            }
        });
    </script>


@endsection
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
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
    </div>


--}}

{{-- 
    cartitem->product->productphoto[0]->photo_name
    cartitem->product->price
    cartitem->product->category->main_category
    cartitem->product->category->sub_category
    cartitem->quantity
    added_date
        {
            "id": 1,
            "product_id": 1,
            "cart_id": 4,
            "quantity": 1,
            "added_date": "2024-09-07",
            "created_at": "2024-09-07T09:24:44.000000Z",
            "updated_at": "2024-09-07T09:24:44.000000Z",
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
                "updated_at": "2024-09-07T14:33:29.000000Z",
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
        },
        {
            "id": 2,
            "product_id": 2,
            "cart_id": 4,
            "quantity": 2,
            "added_date": "2024-09-07",
            "created_at": "2024-09-07T09:34:19.000000Z",
            "updated_at": "2024-09-07T09:34:19.000000Z",
            "product": {
                "id": 2,
                "name": "test product2",
                "description": "product2 product2",
                "activation": 1,
                "price": "55.00",
                "country_made": "amman",
                "quantity": 5000,
                "status": 1,
                "created_date": "2024-09-06",
                "shop_id": 1,
                "catg_id": 1,
                "created_at": "2024-09-06T17:27:53.000000Z",
                "updated_at": "2024-09-06T17:27:53.000000Z",
                "productphoto": [
                    {
                        "id": 2,
                        "photo_name": "1725643673_product-img-5.jpg",
                        "product_id": 2,
                        "created_at": "2024-09-06T17:27:53.000000Z",
                        "updated_at": "2024-09-06T17:27:53.000000Z"
                    },
                    {
                        "id": 3,
                        "photo_name": "1725643673_product-img-6.jpg",
                        "product_id": 2,
                        "created_at": "2024-09-06T17:27:53.000000Z",
                        "updated_at": "2024-09-06T17:27:53.000000Z"
                    }
                ]
            }
        }

--}}


