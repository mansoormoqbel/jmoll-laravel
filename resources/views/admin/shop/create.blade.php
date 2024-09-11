
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
                  create Customer Service
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form id="shopForm" method="POST" action="{{ route('admin.shop.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Hidden input fields to store latitude and longitude -->
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            <input type="hidden" id="city" name="city">
                            <input type="hidden" id="address" name="address">
                            {{--subject --}}
                            {{-- 
                                "id": 1,
                                //"name": "hhhh",
                                //"Field": "hhhh",
                                //"latitude": "99.99999999",
                                //"longitude": "999.99999999",
                                //"city": "amman",
                                //"address": "jabal ",
                                //"phone_number": "0788865214",
                                //"acception": 0,
                                //"created_date": "2024-08-23 00:59:33",
                                "seller_id": 6,
                                "catg_id": 2,
                                "created_at": "2024-08-23T00:59:33.000000Z",
                                "updated_at": "2024-08-23T00:59:33.000000Z",
                                "user": {
                                    "id": 6,
                                    "username": "mansoormoqbel124",
                                    "first_name": "mansoor",
                                    "last_name": "moqbel",
                                    "phone_number": "0788865214",
                                    "profile_photo": "1722056947.jpeg",
                                    "status": 1,
                                    "type_user": 0,
                                    "email": "mansoormoqbel124@gmail.com",
                                    "email_verified_at": null,
                                    "created_at": "2024-07-26T18:31:42.000000Z",
                                    "updated_at": "2024-07-27T05:17:38.000000Z"
                                },
                                "category": {
                                    "id": 2,
                                    "main_category": "asd",
                                    "sub_category": "asd",
                                    "brand": "1724305288.png",
                                    "created_at": "2024-08-22T05:41:28.000000Z",
                                    "updated_at": "2024-08-22T05:41:28.000000Z"
                                }
                            --}}
                            {{-- Start Name Shop --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name Shop') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end Name Shop --}}
                            {{-- start phone_number --}}
                                <div class="row mb-3">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end phone_number --}}
                            {{-- user name --}}
                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end ">{{ __('User Name') }}</label>
                                    <div class="col-md-6">
                                        <select class=" form-select col-md-4 "  name="user">
                                            @foreach ($sellers as $seller)
                                            <option  value="{{$seller->id}}"> {{$seller->username}}  </option>
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
                            {{-- start validity_docs --}}
                                {{--  validity_docs--}}
                                <div class="row mb-3">
                                    <label for="validity_docs" class="col-md-4 col-form-label text-md-end">{{ __('Validity Docs') }}</label>

                                    <div class="col-md-6">
                                        <input id="validity_docs" type="file" class="form-control @error('validity_docs') is-invalid @enderror" multiple name="validity_docs[]" value="{{ old('validity_docs') }}" required autocomplete="validity_docs" autofocus>

                                        @error('validity_docs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{-- end validity_docs --}}
                            
                           
                            
                            
            
                           
            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sent') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{route('admin.shop.index')}}">Back to Dashboard Shop</a>
                                </div>
                            </div>
            
                        </form>
                          
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div id="map" style="height: 400px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

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