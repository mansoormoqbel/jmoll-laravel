
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
            <a class="btn btn-primary" href="{{route('admin.product.create')}}">Add product</a>
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
                            <a class="btn btn-success" href="{{route('admin.product.edit',$product->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.product.destroy', $product->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $product->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $product->id }}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            <a  class="btn btn-warning" href="{{route('admin.product.show',$product->id)}}">Show</a>
                            
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
{{-- 
{
  "id": 1,
  "name": "asasas",
  "description": "asassadasd",
  "activation": 0,
  "price": "2.22",
  "country_made": "amman",
  "quantity": 1000,
  "status": 0,
  "created_date": "2024-08-25",
  "shop_id": 33,
  "catg_id": 2,
  "created_at": "2024-08-25T14:52:43.000000Z",
  "updated_at": "2024-08-25T14:52:43.000000Z",
  "shop": {
      "id": 33,
      "name": "wwww",
      "Field": "wwww",
      "latitude": "51.51799516",
      "longitude": "-0.02113490",
      "city": "London",
      "address": "Hawgood Street, Bromley-by-Bow, Poplar, London Borough of Tower Hamlets, London, Greater London, England, E3 3RT, United Kingdom",
      "phone_number": "0788865214",
      "acception": 1,
      "created_date": "2024-08-25 00:00:00",
      "seller_id": 12,
      "catg_id": 2,
      "created_at": "2024-08-25T10:35:06.000000Z",
      "updated_at": "2024-08-25T10:35:55.000000Z"
  },
  "category": {
      "id": 2,
      "main_category": "asd",
      "sub_category": "asd",
      "brand": "1724305288.png",
      "created_at": "2024-08-22T05:41:28.000000Z",
      "updated_at": "2024-08-22T05:41:28.000000Z"
  }
}
   --}}