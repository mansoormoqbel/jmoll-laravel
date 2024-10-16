
@extends('layouts.driver')

@section('content')


<div class="container text-center">
    
    <div class="row">
        @foreach ($orders as $order)
            <div class="col">
                <a href="{{route('driver.getOrder',$order->id)}}" class="btn btn-primary btn-lg"> #{{$order->id}} Order </a>
            </div>
        
        @endforeach
      
    </div>
    
</div>



{{-- <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Accordion Item #1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="container text-center">
                    <div>Order Details</div>
                    <div class="row">
                      <div class="col">
                       
                      </div>
                      <div class="col">
                        2 of 2
                      </div>
                    </div>
                    
                </div>
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
    
</div> --}}
@endsection