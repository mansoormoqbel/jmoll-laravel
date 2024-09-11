
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
            <form method="POST" action="{{ route('admin.driverinfo.store') }}" enctype="multipart/form-data">
                @csrf
                
                {{--start car_model --}}
                    <div class="row mb-3">
                        <label for="car_model" class="col-md-4 col-form-label text-md-end">{{ __('Car Model') }}</label>

                        <div class="col-md-6">
                            <input id="car_model" type="text" class="form-control @error('car_model') is-invalid @enderror" name="car_model" value="{{ old('car_model') }}" required autocomplete="car_model" autofocus>

                            @error('car_model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end car_model --}}
                {{--start car_make --}}
                    <div class="row mb-3">
                        <label for="car_make" class="col-md-4 col-form-label text-md-end">{{ __('Car Make') }}</label>

                        <div class="col-md-6">
                            <input id="car_make" type="text" class="form-control @error('car_make') is-invalid @enderror" name="car_make" value="{{ old('car_make') }}" required autocomplete="car_make" autofocus>
                            
                            @error('car_make')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end car_make --}}
                {{--start birth_date --}}
                    <div class="row mb-3">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                        <div class="col-md-6">
                           
                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                            
                            @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end birth_date --}}
                {{--start car_year_made --}}
                    <div class="row mb-3">
                        <label for="car_year_made" class="col-md-4 col-form-label text-md-end">{{ __('car_year_made ') }}</label>

                        <div class="col-md-6">
                        
                            <input id="car_year_made" type="date" class="form-control @error('car_year_made') is-invalid @enderror" name="car_year_made" value="{{ old('car_year_made') }}" required autocomplete="car_year_made" autofocus>
                            
                            @error('car_year_made')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end car_year_made --}}
                {{--start car_number --}}
                    <div class="row mb-3">
                        <label for="car_number" class="col-md-4 col-form-label text-md-end">{{ __('Car Number') }}</label>

                        <div class="col-md-6">
                            <input id="car_number" type="text" class="form-control @error('car_number') is-invalid @enderror" name="car_number" value="{{ old('car_number') }}" required autocomplete="car_number" autofocus>
                            
                            @error('car_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end car_number --}}
                {{--start car_color --}}
                    <div class="row mb-3">
                        <label for="car_color" class="col-md-4 col-form-label text-md-end">{{ __(' car_color') }}</label>

                        <div class="col-md-6">
                            <input id="car_color" type="text" class="form-control @error('car_color') is-invalid @enderror" name="car_color" value="{{ old('car_color') }}" required autocomplete="car_color" autofocus>
                            
                            @error('car_color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{--end car_color --}}
                {{-- start personal_identity_file --}}
                    <div class="row mb-3">
                        <label for="personal_identity_file" class="col-md-4 col-form-label text-md-end">{{ __('personal_identity_file') }}</label>

                        <div class="col-md-6">
                            <input id="personal_identity_file" type="file" class="form-control @error('personal_identity_file') is-invalid @enderror" name="personal_identity_file" value="{{ old('personal_identity_file') }}" required autocomplete="personal_identity_file" autofocus>

                            @error('personal_identity_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{-- end personal_identity_file --}}
                {{-- start driving_license_file --}}
                    <div class="row mb-3">
                        <label for="driving_license_file" class="col-md-4 col-form-label text-md-end">{{ __('driving_license_file') }}</label>

                        <div class="col-md-6">
                            <input id="driving_license_file" type="file" class="form-control @error('driving_license_file') is-invalid @enderror" name="driving_license_file" value="{{ old('driving_license_file') }}" required autocomplete="driving_license_file" autofocus>

                            @error('driving_license_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{-- end driving_license_file --}}
                {{-- start car_license_file --}}
                    <div class="row mb-3">
                        <label for="car_license_file" class="col-md-4 col-form-label text-md-end">{{ __('car_license_file') }}</label>

                        <div class="col-md-6">
                            <input id="car_license_file" type="file" class="form-control @error('car_license_file') is-invalid @enderror" name="car_license_file" value="{{ old('car_license_file') }}" required autocomplete="car_license_file" autofocus>

                            @error('car_license_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{-- end car_license_file --}}
                {{-- start availability --}}
                    <div class="row mb-3 {{-- form-group --}}">

                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox"    value="1" name="availability" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Availability
                            </label>
                        </div>
                    </div>
                {{-- end availability --}}
                {{-- start acception --}}
                    <div class="row mb-3 {{-- form-group --}}">
                        <div class="form-check col-md-6">
                            <input class="form-check-input"  type="checkbox" value="1" name="acception" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Acception
                            </label>
                        </div>
                    </div>
                {{-- end acception --}}
                {{-- user name --}}
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end ">{{ __('User Name') }}</label>
                    <div class="col-md-6">
                        <select class=" form-select col-md-4 "  name="user">
                            @foreach ($users as $user)
                            <option  value="{{$user->id}}"> {{$user->username}}  </option>
                            @endforeach
                            
                        </select>
                    </div>
                    
                </div>
                
                

               
                
                {{--start submit --}}
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                        <a class="btn btn-dark" href="{{route('admin.driverinfo.index')}}">Back to Dashboard Driver Info</a>
                    </div>
                </div>
                {{--end submit --}}

            </form>
              
        </div>
    </div>
</div>
@endsection