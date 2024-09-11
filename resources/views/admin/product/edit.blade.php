
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
            <div class="col-md-8">
                <form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    
                    {{-- Start product Name  --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __( 'Product Name ') }}</label>
        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>
        
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
                                <textarea class="form-control" id="exampleFormControlTextarea1"  id="description"  name="description"  rows="3"> {{$product->description}} </textarea>
                                
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
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>
        
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
                                <input id="country_made" type="text" class="form-control @error('country_made') is-invalid @enderror" name="country_made" value="{{ $product->country_made }}" required autocomplete="country_made" autofocus>
        
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
                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity }}" required autocomplete="quantity" autofocus>
        
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
                                    <option  {{$shop->id == $product->shop_id?'selected': '' }} value="{{$shop->id}}"> {{$shop->name}}  </option>
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
                                    <option  {{$category->id == $product->catg_id?'selected': '' }} value="{{$category->id}}"> {{$category->sub_category}}  </option>
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
                                <input id="productphoto" type="file" class="form-control @error('productphoto') is-invalid @enderror" multiple name="productphoto[]" value="{{ old('productphoto') }}"  autocomplete="productphoto" autofocus>

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
                                <input class="form-check-input" {{$product->status?"checked":""}} type="checkbox" value="1" name="status" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Status
                                </label>
                            </div>
                        </div>
                    {{-- end status --}}
                    {{-- start activation --}}
                        <div class="row mb-3 ">
                            <div class="{{-- form-check --}} col-md-6{{--  form-control text-md-end  --}}">
                                <input class="form-check-input" {{$product->activation?"checked":""}}   type="checkbox" value="1" name="activation" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Activation
                                </label>
                            </div>
                        </div>
                    {{-- end activation --}}
               
                    
                    

                    
                    
                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <a class="btn btn-dark" href="{{route('admin.product.index')}}">Back to Dashboard Shop</a>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <h1>Word Document Display</h1>
                </div>
                <div class="row">
                    @foreach($productphoto as $doc)
                        <div class="card" style="width: 18rem;">
                            <img  class="card-img-top" src="{{asset('Product')}}/{{$doc->photo_name}}" alt="{{asset('Product')}}/{{$doc->photo_name}}">
                            <div class="card-body">
                                {{-- <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                <h5 class="card-title">This browser does not support viewing Word documents. Please download the document to view it:</h5>
                                 <a href="{{asset('Product')}}/{{$doc->photo_name}}">Download Word Document</a>
                            </div>
                        </div>
                        
                    
                   
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        {{-- latitude, longitude,city,address --}}
        <script>

            var latitude,longitude,city,address;
            latitude= document.getElementById('latitude').value;
            longitude= document.getElementById('longitude').value;
            city= document.getElementById('city').value;
            address= document.getElementById('address').value;
            
            var map = L.map('map').setView([latitude, longitude], 13);
            
                // Add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            L.marker([latitude, longitude])
            .addTo(map)
            .bindPopup(`<b>${city}</b><br>${address}`);
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

               

            


        </script>
@endsection