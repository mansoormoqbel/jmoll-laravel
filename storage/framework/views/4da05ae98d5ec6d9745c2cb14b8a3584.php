

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
            <!-- Header-->
                <header class="bg-dark py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="text-center text-white">
                            <h1 class="display-4 fw-bolder">Shop in style</h1>
                            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                        </div>
                    </div>
                </header>
            
            <!-- Section-->
                <section class="py-5">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                           

                             
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Product image-->
                                            <img class="card-img-top" src="<?php echo e(asset('Product/'.$product->productphoto[0]->photo_name)); ?>" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder"> <?php echo e($product->name); ?> </h5>
                                                    <!-- Product price-->
                                                <?php echo e($product->price); ?>

                                                </div>
                                            </div>
                                            <form action="<?php echo e(route('admin.shopcart.AddToCart')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class=" form-control-sm">
                                                        <input type="hidden" name="Product_id" value="<?php echo e($product->id); ?>">
                                                        <input type="number" name="qun" id="qun" min="1" required>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-outline-dark mt-auto">
                                                            <i class="fas fa-fw fa-shopping-cart"></i>
                                                        </button>
                                                
                                                        <a class="btn btn-outline-dark mt-auto" href="<?php echo e(route('admin.shopcart.show',$product->id)); ?>"><i class="fas fa-fw fa-share"></i></a>
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- Product actions-->
                                        
                                            <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                            
                            
                        </div>
                    </div>
                </section>
            

                


            
              
              
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/shopproduct.blade.php ENDPATH**/ ?>