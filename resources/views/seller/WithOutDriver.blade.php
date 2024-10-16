@extends('layouts.seller')

@section('content')
<div class="container">
    <nav class="navbar bg-body-tertiary d-flex justify-content-center">
        <div class="container-fluid justify-content-center">
            <a href="{{route('seller.TakenByDriver',$shop_id)}}" class="btn btn-outline-primary  me-2"> Taken By Driver</a>
            <a href="{{route('seller.WithOutDriver',$shop_id)}}" class="btn btn-primary me-2"> With Out Driver</a>
            <a href="{{route('seller.OrderDone',$shop_id)}}" class="btn btn-outline-primary me-2"> Order Done</a>
          
        </div>
    </nav>
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
    
    <div class="row">
        @foreach ($orders as $order)
            <div class="col">
                <div class="card  mb-3" style="max-width: 18rem;">
                    <h2 class="card-header text-bg-primary text-center a" > #{{$order->id}} Order  </h2>
                       
                        <div class="card-body text-center">
                        
                            <p class="card-text">
                                {{ $order->orderItem->count() }} product
                            </p>
                            
                            <p class="card-text"> customer : {{$order->user->username}} </p>
                            
                            <p  class="card-text" > Driver :  </p>
                            
                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser({{$order->id}})" data-bs-target="#viewUser"
                                class="btn btn-primary btn-min-width  mr-1 mb-1">view product
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="selectid({{$order->id}})" data-bs-target="#SelectDriver"
                                class="btn btn-primary btn-min-width  mr-1 mb-1">Select Driver
                            </a>
                        </div>
                    
                </div>
            </div>
        @endforeach
        <div class="col"></div>
        <div class="col"></div>
       
    </div>
    
</div>
<!-- Button trigger modal -->
  
    <!-- start view user with ajax  -->
        <!-- Modal -->
        <div class="modal fade" id="viewUser"  tabindex="-2" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 22rem;">
                            
                            <ol id="productList"></ol> <!-- قائمة المنتجات -->
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="submit" class="btn btn-primary">Save </button> --}}
                        </div>
                                
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- end view user with ajax  -->
    <!-- start view user with ajax  -->
        <!-- Modal -->
        <div class="modal fade" id="SelectDriver"  tabindex="-2" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 22rem;">
                            
                            <form action="{{route('seller.editDriver')}}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" id="order-input" value="">
                                <select class="form-select"name="Dirver" id="Driver" size="2" aria-label="Size 3 select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->user->username}} </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-secondary" >Edit Driver</button>
                                
                            </form>
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="submit" class="btn btn-primary">Save </button> --}}
                        </div>
                                
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- end view user with ajax  -->
 
@endsection
@section('script')
   
    <script>
        function selectid(id) {
            //const orderId = document.getElementById('order-id').textContent.trim().substring(1); // إزالة "#" من بداية النص
            const orderId=id;
            console.log(orderId);
            // وضع القيمة في حقل الإدخال المخفي
            document.getElementById('order-input').value = orderId;
        }    
        
        function viewUser(id) {
            const url = '/seller/GetProduct/' + id;
            console.log('Request URL:', url);
            
            $.get(url, function(data, status, xhr) {
                console.log(data); // Log the entire data object
                console.log("order "+ data.data.order_item);
                
                 
                    if (data.data.order_item && Array.isArray(data.data.order_item)) {
                        $('#productList').empty();
                        data.data.order_item.forEach(item => {
                            // Check if item and product are defined
                            if (item && item.product) {
                                const productName = item.product.name; // Accessing product name
                                const quantity = item.quantity; // Accessing quantity

                                $('#productList').append(`
                                    <li>
                                        <strong>Product Name:</strong> ${productName} 
                                        <strong>Quantity:</strong> ${quantity}
                                    </li>
                                    
                                `);
                            } else {
                                console.error('Item or product information is missing:', item);
                            }
                        });
                    } else {
                        console.error('order_item is not defined or not an array:', data);
                        $('#productList').append('<div>No products found.</div>');
                    } 
               
                $('#viewUser').modal('show');
            }); 
        }
    </script>
@endsection
