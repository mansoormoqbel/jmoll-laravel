
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
            <a class="btn btn-primary" href="{{route('admin.seller.create')}}">Add Seller</a>
           {{--  <button type="button" class="btn btn-primary">Add User</button> --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">User name</th>
                    <th scope="col">Type User</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                      <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->email}}</td>
                          <td>{{$user->username}}</td>
                          <td>User</td>
                          <td>
                            <a class="btn btn-success" href="{{route('admin.seller.edit',$user->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.seller.destroy', $user->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $user->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $user->id }}" action="{{ route('admin.seller.destroy', $user->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            <a  class="btn btn-warning" href="{{route('admin.seller.show',['id'=>$user->id])}}">Show</a>
                            @if ($user->status ==0)
                              <a  class="btn btn-info" href="{{route('admin.seller.changeStatus',$user->id)}}">not active</a>
                            @else
                              <a  class="btn btn-info" href="{{route('admin.seller.changeStatus',$user->id)}}">active</a>
                            @endif
                          </td>
                      </tr>  
                    @endforeach
                </tbody>
              </table>
              <a class="btn btn-dark" href="{{route('admin.dashboard')}}">Back to Dashboard Admin</a>
              
        </div>
    </div>
</div>
@endsection