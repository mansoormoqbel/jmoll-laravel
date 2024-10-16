


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
            <div class="card text-center" style="width: 70rem;" >
                <div class="card-header">
                  Edit Category
                </div> 
                <div class="row mb-3  " style="   margin: auto;">
                    <img src="<?php echo e(asset('Brand')); ?>/<?php echo e($Category->brand); ?>"  alt="<?php echo e($Category->brand); ?>" >
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form method="POST" action="<?php echo e(route('admin.categories.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($Category->id); ?>">
                            
                            
                            
                                <div class="row mb-3">
                                    <label for="main_category" class="col-md-4 col-form-label text-md-end"><?php echo e(__(' Main Category')); ?></label>

                                    <div class="col-md-6">
                                        <input id="main_category" type="text" class="form-control <?php $__errorArgs = ['main_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="main_category" value="<?php echo e($Category->main_category); ?>" required autocomplete="main_category" autofocus>

                                        <?php $__errorArgs = ['main_category'];
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
                                    <label for="sub_category" class="col-md-4 col-form-label text-md-end"><?php echo e(__(' Sub Category')); ?></label>

                                    <div class="col-md-6">
                                        <input id="sub_category" type="text" class="form-control <?php $__errorArgs = ['sub_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sub_category" value="<?php echo e($Category->sub_category); ?>" required autocomplete="sub_category" autofocus>

                                        <?php $__errorArgs = ['sub_category'];
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
                                    <label for="brand" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Brand')); ?></label>

                                    <div class="col-md-6">
                                        <input id="brand" type="file" class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="brand" value="<?php echo e($Category->brand); ?>"  autocomplete="brand" autofocus>

                                        <?php $__errorArgs = ['brand'];
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
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Update')); ?>

                                    </button>
                                    <a class="btn btn-dark" href="<?php echo e(route('admin.categories.index')); ?>">Back to Dashboard Category</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>