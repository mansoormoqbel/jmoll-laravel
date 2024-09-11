
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
            <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Add Category</a>
           {{--  <button type="button" class="btn btn-primary">Add User</button> --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Main Category </th>
                    
                    <th scope="col">Sub Category </th>
                    <th scope="col">Brand </th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                      <tr>
                        
                          <th scope="row">{{$category->id}}</th>
                          <td>{{$category->main_category}}</td>
                          <td>{{$category->sub_category}}</td>
                          <td><img src="{{asset('Brand')}}/{{$category->brand}}" style="max-width:100px;" alt="{{$category->brand}}"></td>
                          
                          
                          <td>
                            <a class="btn btn-success" href="{{route('admin.categories.edit',$category->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.categories.destroy', $category->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $category->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                           
                            
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