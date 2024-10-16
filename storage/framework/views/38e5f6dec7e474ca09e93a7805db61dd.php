

<?php $__env->startSection('content'); ?>
<div class="container">
    <nav class="navbar bg-body-tertiary d-flex justify-content-center">
        <div class="container-fluid justify-content-center">
            <a href="<?php echo e(route('seller.TakenByDriver',$shop_id)); ?>" class="btn btn-outline-primary  me-2"> Taken By Driver</a>
            <a href="<?php echo e(route('seller.WithOutDriver',$shop_id)); ?>" class="btn btn-outline-primary me-2"> With Out Driver</a>
            <a href="<?php echo e(route('seller.OrderDone',$shop_id)); ?>" class="btn btn-primary me-2"> Order Done</a>
          
        </div>
    </nav>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="row">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card  mb-3" style="max-width: 18rem;">
                    <h2 class="card-header text-bg-primary text-center"> #<?php echo e($order->id); ?> Order  </h2>
                       
                        <div class="card-body text-center">
                        
                            <p class="card-text">
                                <?php echo e($order->orderItem->count()); ?> product
                            </p>
                            
                            <p class="card-text"> customer : <?php echo e($order->user->username); ?> </p>
                            
                            <p  class="card-text" > Driver : <?php echo e($order->driverinfo->user->username); ?> </p>
                            
                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser(<?php echo e($order->id); ?>)" data-bs-target="#viewUser"
                                class="btn btn-primary btn-min-width  mr-1 mb-1">view product
                            </a>
                           
                        </div>
                    
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            
                        </div>
                                
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- end view user with ajax  -->
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   
    <script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/seller/order.blade.php ENDPATH**/ ?>