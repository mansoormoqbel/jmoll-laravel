

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-bg-primary text-center"> <?php echo e($shop->name); ?>  </div>
                <div class="card-body">
                  
                  <p  style="font-size:10px;"  ><?php echo e($shop->address); ?></p><hr>
                  <h5 class="card-title"></h5>
                  <p class="card-text"> <?php echo e($shop->category->main_category); ?> & <?php echo e($shop->category->sub_category); ?> </p><hr>
                  <p class="card-text"> Number of products:<?php echo e($product>0?$product:0); ?> </p></hr>
                  <p  class="card-text" > <?php echo e($shop->created_date); ?> </p>
                  
                </div>
            </div>
        </div>
        <div class="col">
            <a href="<?php echo e(route('seller.product',$shop->id)); ?>" class="btn btn-primary fs-3 p-2 m-2">Product</a>
            <a href="<?php echo e(route('seller.TakenByDriver',$shop->id)); ?>" class="btn btn-primary fs-3 p-2 m-2">Order </a>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/seller/shop.blade.php ENDPATH**/ ?>