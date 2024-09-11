
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 28rem;">
                <img src="{{asset('images')}}/{{$user->profile_photo}}" class="card-img-top" {{-- style="max-width:100px;" --}} alt="{{$user->profile_photo}}">
                {{-- <img src="" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h3  class="card-title">User Name  : {{$user->username}}</h3>
                    <h5 class="card-text" >First Name : {{$user->first_name}}  </h5>
                    <h5 class="card-text" >Last Name : {{$user->last_name}}  </h5>
                    
                    <p class="card-text">Phone Number : {{$user->phone_number}} </p>
                    <p class="card-text">Email : {{$user->email}} </p>
                     <a class="btn btn-dark" href="{{route('admin.seller.index')}}">Back to Dashboard User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection