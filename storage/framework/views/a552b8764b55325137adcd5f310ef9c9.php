


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
            <div class="card text-center">
                <div class="card-header">
                  create product
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form id="shopForm" method="POST" action="<?php echo e(route('seller.storeproduct')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <input type="hidden" name="shop_id" value="<?php echo e($shop_id); ?>">
                            
                            
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__( 'Product Name ')); ?></label>
                
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                
                                        <?php $__errorArgs = ['name'];
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
                                    <label for="description" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Description')); ?></label>
                
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="exampleFormControlTextarea1"  id="description"  name="description" value="<?php echo e(old('description')); ?>" rows="3"></textarea>
                                        
                                        <?php $__errorArgs = ['description'];
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
                                    <label for="price" class="col-md-4 col-form-label text-md-end"><?php echo e(__( 'Price ')); ?></label>
                
                                    <div class="col-md-6">
                                        <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e(old('price')); ?>" required autocomplete="price" autofocus>
                
                                        <?php $__errorArgs = ['price'];
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
                                    <label for="country_made" class="col-md-4 col-form-label text-md-end"><?php echo e(__( 'Country Made ')); ?></label>
                
                                    <div class="col-md-6">
                                        <input id="country_made" type="text" class="form-control <?php $__errorArgs = ['country_made'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country_made" value="<?php echo e(old('country_made')); ?>" required autocomplete="country_made" autofocus>
                
                                        <?php $__errorArgs = ['country_made'];
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
                                    <label for="quantity" class="col-md-4 col-form-label text-md-end"><?php echo e(__( 'Quantity ')); ?></label>
                
                                    <div class="col-md-6">
                                        <input id="quantity" type="text" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="quantity" value="<?php echo e(old('quantity')); ?>" required autocomplete="quantity" autofocus>
                
                                        <?php $__errorArgs = ['quantity'];
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
                            
                           
                            
                                <div class="row mb-6">
                                    <label for="sub_category" class="col-md-4 col-form-label text-md-end "><?php echo e(__('Sub Category')); ?></label>
                                    <div class="col-md-6">
                                        <select class=" form-select col-md-4 "  name="sub_category">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($category->id); ?>"> <?php echo e($category->sub_category); ?>  </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                            
                            
                                
                                <div class="row mb-3">
                                    <label for="productphoto" class="col-md-4 col-form-label text-md-end"><?php echo e(__('productphoto')); ?></label>

                                    <div class="col-md-6">
                                        <input id="productphoto" type="file" class="form-control <?php $__errorArgs = ['productphoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple name="productphoto[]" value="<?php echo e(old('productphoto')); ?>" required autocomplete="productphoto" autofocus>

                                        <?php $__errorArgs = ['productphoto'];
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
                                        <?php echo e(__('Sent')); ?>

                                    </button>
                                    <a class="btn btn-dark" href="<?php echo e(route('admin.product.index')); ?>">Back to Dashboard Product</a>
                                </div>
                            </div>
            
                        </form>
                          
                    </div>
                </div>
            </div>
        
    </div>
</div>


   

    
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/seller/product/create.blade.php ENDPATH**/ ?>