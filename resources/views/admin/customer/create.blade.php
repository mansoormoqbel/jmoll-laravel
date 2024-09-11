
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
                        <form method="POST" action="{{ route('admin.feedback.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{--subject --}}
                           
                            <div class="row mb-3">
                                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>
            
                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
            
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{--'body', --}}
                            <div class="row mb-3">
                                <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Body') }}</label>
            
                                <div class="col-md-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"  id="body"  name="body" value="{{ old('body') }}" rows="3"></textarea>
                                    
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- first_name --}}
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end ">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <select class=" form-select col-md-4 "  name="user">
                                        @foreach ($users as $user)
                                        <option  value="{{$user->id}}"> {{$user->username}}  </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                            </div>
                            
                            
            
                           
            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sent') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{route('admin.feedback.index')}}">Back to Dashboard User</a>
                                </div>
                            </div>
            
                        </form>
                          
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection