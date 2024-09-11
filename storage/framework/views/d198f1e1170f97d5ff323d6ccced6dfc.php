

<?php $__env->startSection('content'); ?>
    <div class="container mt-4" style="width: 50rem;height:50rem">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Confirmation Order</h3>
            </div>
            <div class="card-body">
                
                
                
                <p class="card-text">Total Price Of the Products is : <strong><?php echo e(session('total_price_products')); ?> JD</strong> </p>
                <p class="card-text">The Delivery Price is : <strong><?php echo e(session('delivery_price')); ?> JD</strong> </p>
                <p class="card-text">The Total Amount for Order is : <strong class="text-danger"><?php echo e(session('total_amount')); ?> JD</strong> </p>
                <p class="card-text">Are you Sure to Complete the Order?</p>
                <form id="shopForm" method="POST" action="<?php echo e(route('admin.shopcart.create_order')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <!-- Hidden input fields to store latitude and longitude -->
                    
                    <input type="hidden" id="latitude" name="latitude" value="<?php echo e(session('latitude')); ?>">
                    <input type="hidden" id="longitude" name="longitude" value="<?php echo e(session('longitude')); ?>">
                    <input type="hidden" id="city" name="city" value="<?php echo e(session('city')); ?>">
                    <input type="hidden" id="address" name="address" value="<?php echo e(session('address')); ?>">
                    <input type="hidden" id="phone_number" name="phone_number" value="<?php echo e(session('phone_number')); ?>">
                    <input type="hidden" id="total_price_products" name="total_price_products" value="<?php echo e(session('total_price_products')); ?>">
                    <input type="hidden" id="total_amount" name="total_amount" value="<?php echo e(session('total_amount')); ?>">
                    <input type="hidden" id="delivery_price" name="delivery_price" value="<?php echo e(session('delivery_price')); ?>">
                    <input type="hidden" id="number_product" name="number_product" value="<?php echo e(session('number_product')); ?>">
                    

                    
                    
                   
                    <button class="btn btn-success mr-2">Complete</button>
                    <a  class="btn btn-danger" href="<?php echo e(route('admin.shopcart.ShowOrder')); ?>">Cancel</a>
                    
                   
                </form>
                
            </div>
            
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/checkorder.blade.php ENDPATH**/ ?>