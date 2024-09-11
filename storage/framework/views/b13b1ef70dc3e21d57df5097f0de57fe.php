


<?php $__env->startSection('content'); ?>

    <div class="container text-center p-5">
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
            <div class="col">
                <div class="card text-bg-primary p-5 mb-3" style="max-width: 18rem;">
                    <a class=" text-bg-primary " href="<?php echo e(route('seller.create')); ?>">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"><i class="fas fa-plus-circle fa-fw"></i></h5>
                            <h5 class="card-title text-uppercase">create shop</h5>
                        
                        </div>
                    </a>
                </div>
            </div>
            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($shop->acception==1): ?>
                    
                    <div class="col">
                        <div class="card text-bg-primary  mb-3" style="max-width: 18rem;">
                           
                            <div class="card-body">
                            <h5 class="card-title"><?php echo e($shop->name); ?></h5>
                            <p class="card-text"> <?php echo e($shop->acception==1? 'Accept':'Unaccept'); ?>  </p>
                            <p class="card-text"> <?php echo e($shop->category->main_category); ?>  <?php echo e($shop->category->sub_category); ?>  </p>
                            <p class="card-text">  <?php echo e($shop->product->count()); ?> Product </p>
                            
                            <a class="link-offset-2 link-underline link-light" href="<?php echo e(route('seller.showShop',$shop->id)); ?>"><i class="fas fa-angle-down fa-fw"></i></a>
                            </div>
                        </div>
                    </div>
                
                <?php endif; ?>
               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
         
        </div>
      </div>

   
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/seller/dashboard.blade.php ENDPATH**/ ?>