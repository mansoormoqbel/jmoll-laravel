
@extends('layouts.seller')

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
            <a class="btn btn-primary" href="{{route('seller.createproduct',$shop_id)}}">Add product</a>
           {{--  <button type="button" class="btn btn-primary">Add User</button> --}}
            <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Product Name</th>
                    <th scope="col">Shop Name</th>
                    <th scope="col">Category Name </th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                      <tr>
                        
                          <th scope="row">{{$product->id}}</th>
                          <td>{{$product->name}}</td>
                          <td>{{$product->shop->name}}</td>
                          <td>{{$product->category->main_category}}/ {{$product->category->sub_category}} </td>
                          <td>
                            
                            
                            <a  class="btn btn-danger" href="{{route('seller.destroy', $product->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $product->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $product->id }}" action="{{ route('seller.destroy', $product->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                           
                            
                          </td>
                      </tr>  
                    @endforeach
                </tbody>
              </table>
              <a class="btn btn-dark" href="{{route('seller.dashboard')}}">Back to Dashboard seller</a>
              
        </div>
    </div>
</div>
@endsection
