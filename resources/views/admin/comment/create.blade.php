
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
            <form method="POST" action="{{ route('admin.comment.store') }}" enctype="multipart/form-data">
                @csrf
                
                {{-- start body --}}
                    <div class="row mb-3">
                        <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Body') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1"  id="body" required  name="body" value="{{ old('body') }}" rows="3"></textarea>
                            
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{-- end body --}}
                {{--start user name --}}
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
                {{-- end user name --}}
                {{--start product name --}}
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end ">{{ __('Product Name') }}</label>
                        <div class="col-md-6">
                            <select class=" form-select col-md-4 "  name="product">
                                @foreach ($products as $product)
                                <option  value="{{$product->id}}"> {{$product->name}}  </option>
                                @endforeach
                                
                            </select>
                        </div>
                        
                    </div>
                {{-- end product name --}}
                
                

               
                
                {{--start submit --}}
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                            <a class="btn btn-dark" href="{{route('admin.comment.index')}}">Back to Dashboard Comment</a>
                        </div>
                    </div>
                {{--end submit --}}

            </form>
              
        </div>
    </div>
</div>
@endsection