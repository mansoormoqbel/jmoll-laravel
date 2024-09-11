
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
            <div class="card text-center" style="width: 70rem;" >
                <div class="card-header">
                  Edit Category
                </div> 
                <div class="row mb-3  " style="   margin: auto;">
                    <img src="{{asset('Brand')}}/{{$Category->brand}}"  alt="{{$Category->brand}}" >
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('admin.categories.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$Category->id}}">
                            
                            
                            {{-- start main_category --}}
                                <div class="row mb-3">
                                    <label for="main_category" class="col-md-4 col-form-label text-md-end">{{ __(' Main Category') }}</label>

                                    <div class="col-md-6">
                                        <input id="main_category" type="text" class="form-control @error('main_category') is-invalid @enderror" name="main_category" value="{{ $Category->main_category }}" required autocomplete="main_category" autofocus>

                                        @error('main_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{--end main_category --}}
                            {{-- start sub_category --}}
                                <div class="row mb-3">
                                    <label for="sub_category" class="col-md-4 col-form-label text-md-end">{{ __(' Sub Category') }}</label>

                                    <div class="col-md-6">
                                        <input id="sub_category" type="text" class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" value="{{ $Category->sub_category }}" required autocomplete="sub_category" autofocus>

                                        @error('sub_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{--end sub_category --}}
                            {{--start brand --}}
                                <div class="row mb-3">
                                    <label for="brand" class="col-md-4 col-form-label text-md-end">{{ __('Brand') }}</label>

                                    <div class="col-md-6">
                                        <input id="brand" type="file" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $Category->brand }}"  autocomplete="brand" autofocus>

                                        @error('brand')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            {{--end brand --}}
                            
                            

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{route('admin.categories.index')}}">Back to Dashboard Category</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
    </div>
</div>
@endsection