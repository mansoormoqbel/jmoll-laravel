        


<?php $__env->startSection('content'); ?>  
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-indicators">
                            <?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index == 0 ? 'active' : ''); ?>" aria-current="<?php echo e($index == 0 ? 'true' : 'false'); ?>" aria-label="Slide <?php echo e($index + 1); ?>"></button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $pp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                                    <img src="<?php echo e(asset('Product/' . $image->photo_name)); ?>" class="d-block w-100" alt="<?php echo e($image->photo_name); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                
              
            </div>
            <div class="col-md-6">
                <h1 class="text-center"><?php echo e($products->name); ?></h1>
                <p>Added on <?php echo e($products->created_date); ?> </p>
                <p> <?php echo e($products->category->main_category); ?> <?php echo e($products->category->sub_category); ?></p>
                <p>Shop name:<span class="fs-3 text-warning text-opacity-75"> <?php echo e($products->shop->name); ?> </span></p>
                <p>Status: <?php echo e($products->status ==1?'In Stock' :'Out of Stock'); ?></p>
                <h3 class="fs-3 text-warning text-opacity-75"><?php echo e($products->price); ?> JD</h3>
                <h3 class="fs-3 text-danger-emphasis text-opacity-75"><?php echo e($products->description); ?> </h3>
                <p>Made in: United States</p>
                <form action="<?php echo e(route('admin.shopcart.AddToCart')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="Product_id" value="<?php echo e($products->id); ?>">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="qun" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 >Comments</h2>
                <form action="<?php echo e(route('admin.shopcart.addcomment')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="Product_id" value="<?php echo e($products->id); ?>">
                   
                    
                        <div class="row mb-0">
                            

                            <div class="col-md-6">
                                <textarea class="form-control" id="exampleFormControlTextarea1"  id="body" required  name="body" value="<?php echo e(old('body')); ?>" rows="3"  placeholder="Write your comment here"></textarea>
                                
                                <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    
                   
                   
                    
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    <?php echo e(__('Add Comment')); ?>

                                </button>
                                
                            </div>
                        </div>
                    
                </form>
                <div class="mt-4 text-bg-secondary">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3 text-bg-secondary " style="max-width: 540px; height:120px">
                        <div class="row g-0">
                          <div class="col-md-2 ">
                            <img src="<?php echo e(asset('images/'.$comment->user->profile_photo)); ?>" style="width: 80px ;height:80px" class="img-fluid  rounded-circle" alt="...">
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo e($comment->user->username); ?></h5>
                              <p class="card-text"><?php echo e($comment->body); ?></p>
                              <p class=" float-end card-text"><small class=" float-end "><?php echo e($comment->create_date); ?></small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <h4></h4>
                    <p></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/showproduct.blade.php ENDPATH**/ ?>