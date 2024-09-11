
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
                  Edit profile Photo
                </div> 
                <div class="row mb-3  " style="   margin: auto;">
                    <img src="{{asset('images')}}/{{$ProfilePhoto->photo_name}}"  alt="{{$ProfilePhoto->photo_name}}" >
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$ProfilePhoto->id}}">
                            
                            {{-- profile_photo --}}
                            <div class="row mb-3">
                                <label for="profile_name" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="profile_name" type="file" class="form-control @error('profile_name') is-invalid @enderror" name="profile_name" value="{{$ProfilePhoto->photo_name}}" required autocomplete="profile_name" autofocus>

                                    @error('profile_name')
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
                                        <option >select on user</option>
                                        @foreach ($users as $user)
                                        <option  {{$ProfilePhoto->user_id ==$user->id? 'selected': '' }} value="{{$user->id}}"> {{$user->username}}  </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                            </div>
                            
                            

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a class="btn btn-dark" href="{{route('admin.feedback.index')}}">Back to Dashboard Customer Service</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
    </div>
</div>
@endsection