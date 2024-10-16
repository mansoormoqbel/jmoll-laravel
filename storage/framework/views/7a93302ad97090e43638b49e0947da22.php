


<?php $__env->startSection('content'); ?>


<div class="container text-center">
    
    <div class="row">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <a href="<?php echo e(route('driver.getOrder',$order->id)); ?>" class="btn btn-primary btn-lg"> #<?php echo e($order->id); ?> Order </a>
            </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </div>
    
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.driver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/driver/order.blade.php ENDPATH**/ ?>