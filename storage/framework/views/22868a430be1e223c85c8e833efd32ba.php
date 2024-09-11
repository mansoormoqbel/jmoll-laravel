


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
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
        <div class="col-md-8">
            <form method="POST" action="<?php echo e(route('admin.comment.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                
                    <div class="row mb-3">
                        <label for="body" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Body')); ?></label>

                        <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1"  id="body" required  name="body" value="<?php echo e(old('body')); ?>" rows="3"></textarea>
                            
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
                
                
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end "><?php echo e(__('User Name')); ?></label>
                        <div class="col-md-6">
                            <select class=" form-select col-md-4 "  name="user">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($user->id); ?>"> <?php echo e($user->username); ?>  </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                        
                    </div>
                
                
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end "><?php echo e(__('Product Name')); ?></label>
                        <div class="col-md-6">
                            <select class=" form-select col-md-4 "  name="product">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($product->id); ?>"> <?php echo e($product->name); ?>  </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                        
                    </div>
                
                
                

               
                
                
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Register')); ?>

                            </button>
                            <a class="btn btn-dark" href="<?php echo e(route('admin.comment.index')); ?>">Back to Dashboard Comment</a>
                        </div>
                    </div>
                

            </form>
              
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/comment/create.blade.php ENDPATH**/ ?>