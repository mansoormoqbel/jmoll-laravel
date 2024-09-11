
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
        <div class="col-md-8{{-- d-flex justify-content-center align-items-center vh-400 --}}">
            <form method="POST" action="{{ route('admin.comment.update') }}" enctype="multipart/form-data" {{-- class="p-4 border rounded" --}}>
                @csrf

               
                <input type="hidden" name="id" value="{{$comments->id}}">
                {{-- start body --}}
                    <div class="row mb-3">
                        <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Body') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1"  id="body" required  name="body"  rows="3">{{$comments->body}}</textarea>
                            
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
                                <option {{$comments->user_id == $user->id ? 'selected': '' }}  value="{{$user->id}}"> {{$user->username}}  </option>
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
                                <option  {{$comments->product_id == $product->id?'selected': '' }} value="{{$product->id}}"> {{$product->name}}  </option>
                                @endforeach
                                
                            </select>
                        </div>
                        
                    </div>
                {{-- end product name --}}
                
                {{-- start submit --}}
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <a class="btn btn-dark" href="{{route('admin.comment.index')}}">Back to Dashboard Comment</a>
                        </div>
                    </div>
                {{-- end submit --}}

            </form>
              
        </div>
    </div>
</div>
@endsection