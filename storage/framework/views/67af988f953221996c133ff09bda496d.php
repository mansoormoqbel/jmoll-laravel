


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            
            
            <h2 class="card-title">Product Name : <?php echo e($product->name); ?> </h2>
            <h5 class="card-text"> Product Description:<?php echo e($product->description); ?> </h5>
            <h5 class="card-text"> Product Price:<?php echo e($product->price); ?> </h5>
            <h5 class="card-text"> Product Country Made:<?php echo e($product->country_made); ?> </h5>
            <h5 class="card-text"> Product Quantity:<?php echo e($product->quantity); ?> </h5>
            
            <h5 class="card-text"> Status :<?php echo e($product->status?"Available":"Not available"); ?> </h5>
            <h5 class="card-text"> Activation :<?php echo e($product->activation?"Active":"Inactive"); ?> </h5>
          
        </div>
        <div class="col">
            <h2 class="card-title"> Shop Name : <?php echo e($product->shop->name); ?> </h2>
            <h5 class="card-text"> Shop Address : <?php echo e($product->shop->address); ?> </h5>
            <p class="card-text"> Shop Phone  <?php echo e($product->shop->phone_number); ?> </p>
        </div>
        <div class="col">
            <h2 class="card-title">Main Category : <?php echo e($product->category->main_category); ?> </h2>
            <h5 class="card-text">Sub Category : <?php echo e($product->category->sub_category); ?> </h5>
            
        </div>
        <div class="row">
            <h1>Word Document Display</h1>
        </div>
        <div class="row">
            <?php $__currentLoopData = $productphoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">     
                    <img src="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>" alt="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>">
                    
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>">Download Word Document</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div id="map" style="height: 400px;"></div>
        <a class="btn btn-dark" href="<?php echo e(route('admin.product.index')); ?>">Back to Dashboard Product</a>
    </div>
</div>
   
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/product/show.blade.php ENDPATH**/ ?>