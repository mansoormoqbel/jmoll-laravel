@extends('layouts.admin')

@section('content')
<div class="row">
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
    <div class="col">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">price</th>
                <th scope="col">category</th>
                <th scope="col">Added Date</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartitem)
                <tr>
                    <th class="text-center m-8" scope="row">
                        <a   href="{{route('admin.shopcart.DeleteCartItem', $cartitem->id)}} "onclick="event.preventDefault(); 
                            document.getElementById('delete-form-{{ $cartitem->id }}').submit();">
                            <i class="fas fa-trash fa-fw"></i>  
                        </a>
                        <form id="delete-form-{{ $cartitem->id }}" action="{{ route('admin.shopcart.DeleteCartItem', $cartitem->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                       {{--  <a href="http://"><i class="fas fa-trash fa-fw"></i></a> --}}
                    </th>
                    <td>
                        <div class="card text-center" style="width: 8rem;">
                            <img src="{{asset('Product/'.$cartitem->product->productphoto[0]->photo_name)}}" class=" img-fluid text-center  " style="width: 60px;height:60px;text-align:center" alt="...">
                            <div class="card-body">
                              <h5 class="card-title"> {{$cartitem->product->name}} </h5>
                              
                            </div>
                          </div>
                    </td>
                    <td> {{$cartitem->product->price}} </td>
                    
                    <td> {{$cartitem->product->category->main_category}}  {{$cartitem->product->category->sub_category}}</td>
                    <td> {{$cartitem->added_date}}  </td>
                    <td> {{$cartitem->quantity}}  </td>
                    
                  </tr>
                @endforeach

              
              
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('admin.shopcart.ShowOrder')}}">Add To Order</a>
    </div>
    {{-- <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              
            </tbody>
        </table>
    </div> --}}
    
</div>




@endsection
{{-- 
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Accordion Item #1
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Accordion Item #2
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
            </div>
        </div>
    </div>


--}}

{{-- 
cartitem->product->productphoto[0]->photo_name
cartitem->product->price
cartitem->product->category->main_category
cartitem->product->category->sub_category
cartitem->quantity
added_date
    {
        "id": 1,
        "product_id": 1,
        "cart_id": 4,
        "quantity": 1,
        "added_date": "2024-09-07",
        "created_at": "2024-09-07T09:24:44.000000Z",
        "updated_at": "2024-09-07T09:24:44.000000Z",
        "product": {
            "id": 1,
            "name": "samah mall",
            "description": "product product product",
            "activation": 1,
            "price": "55.00",
            "country_made": "amman",
            "quantity": 5000,
            "status": 0,
            "created_date": "2024-09-07",
            "shop_id": 1,
            "catg_id": 1,
            "created_at": "2024-09-04T12:52:33.000000Z",
            "updated_at": "2024-09-07T14:33:29.000000Z",
            "productphoto": [
                {
                    "id": 1,
                    "photo_name": "1725454353_github.png",
                    "product_id": 1,
                    "created_at": "2024-09-04T12:52:33.000000Z",
                    "updated_at": "2024-09-04T12:52:33.000000Z"
                }
            ]
        }
    },
    {
        "id": 2,
        "product_id": 2,
        "cart_id": 4,
        "quantity": 2,
        "added_date": "2024-09-07",
        "created_at": "2024-09-07T09:34:19.000000Z",
        "updated_at": "2024-09-07T09:34:19.000000Z",
        "product": {
            "id": 2,
            "name": "test product2",
            "description": "product2 product2",
            "activation": 1,
            "price": "55.00",
            "country_made": "amman",
            "quantity": 5000,
            "status": 1,
            "created_date": "2024-09-06",
            "shop_id": 1,
            "catg_id": 1,
            "created_at": "2024-09-06T17:27:53.000000Z",
            "updated_at": "2024-09-06T17:27:53.000000Z",
            "productphoto": [
                {
                    "id": 2,
                    "photo_name": "1725643673_product-img-5.jpg",
                    "product_id": 2,
                    "created_at": "2024-09-06T17:27:53.000000Z",
                    "updated_at": "2024-09-06T17:27:53.000000Z"
                },
                {
                    "id": 3,
                    "photo_name": "1725643673_product-img-6.jpg",
                    "product_id": 2,
                    "created_at": "2024-09-06T17:27:53.000000Z",
                    "updated_at": "2024-09-06T17:27:53.000000Z"
                }
            ]
        }
    }

--}}


