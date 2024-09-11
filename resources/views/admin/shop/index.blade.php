
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
            <a class="btn btn-primary" href="{{route('admin.shop.create')}}">Add Shop</a>
           {{--  <button type="button" class="btn btn-primary">Add User</button> --}}
            <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Seller Name</th>
                    <th scope="col">Category Name </th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                      <tr>
                        
                          <th scope="row">{{$shop->id}}</th>
                          <td>{{$shop->name}}</td>
                          <td>{{$shop->user->username}}</td>
                          <td>{{$shop->category->main_category}}/ {{$shop->category->sub_category}} </td>
                          <td>
                            <a class="btn btn-success" href="{{route('admin.shop.edit',$shop->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.shop.destroy', $shop->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $shop->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $shop->id }}" action="{{ route('admin.shop.destroy', $shop->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            <a  class="btn btn-warning" href="{{route('admin.shop.show',$shop->id)}}">Show</a>
                            
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