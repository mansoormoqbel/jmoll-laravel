


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
            <form method="POST" action="<?php echo e(route('admin.driverinfo.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                
                    <div class="row mb-3">
                        <label for="car_model" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Car Model')); ?></label>

                        <div class="col-md-6">
                            <input id="car_model" type="text" class="form-control <?php $__errorArgs = ['car_model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_model" value="<?php echo e(old('car_model')); ?>" required autocomplete="car_model" autofocus>

                            <?php $__errorArgs = ['car_model'];
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
                        <label for="car_make" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Car Make')); ?></label>

                        <div class="col-md-6">
                            <input id="car_make" type="text" class="form-control <?php $__errorArgs = ['car_make'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_make" value="<?php echo e(old('car_make')); ?>" required autocomplete="car_make" autofocus>
                            
                            <?php $__errorArgs = ['car_make'];
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
                        <label for="birth_date" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Birth Date')); ?></label>

                        <div class="col-md-6">
                           
                            <input id="birth_date" type="date" class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="birth_date" value="<?php echo e(old('birth_date')); ?>" required autocomplete="birth_date" autofocus>
                            
                            <?php $__errorArgs = ['birth_date'];
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
                        <label for="car_year_made" class="col-md-4 col-form-label text-md-end"><?php echo e(__('car_year_made ')); ?></label>

                        <div class="col-md-6">
                        
                            <input id="car_year_made" type="date" class="form-control <?php $__errorArgs = ['car_year_made'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_year_made" value="<?php echo e(old('car_year_made')); ?>" required autocomplete="car_year_made" autofocus>
                            
                            <?php $__errorArgs = ['car_year_made'];
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
                        <label for="car_number" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Car Number')); ?></label>

                        <div class="col-md-6">
                            <input id="car_number" type="text" class="form-control <?php $__errorArgs = ['car_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_number" value="<?php echo e(old('car_number')); ?>" required autocomplete="car_number" autofocus>
                            
                            <?php $__errorArgs = ['car_number'];
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
                        <label for="car_color" class="col-md-4 col-form-label text-md-end"><?php echo e(__(' car_color')); ?></label>

                        <div class="col-md-6">
                            <input id="car_color" type="text" class="form-control <?php $__errorArgs = ['car_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_color" value="<?php echo e(old('car_color')); ?>" required autocomplete="car_color" autofocus>
                            
                            <?php $__errorArgs = ['car_color'];
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
                        <label for="personal_identity_file" class="col-md-4 col-form-label text-md-end"><?php echo e(__('personal_identity_file')); ?></label>

                        <div class="col-md-6">
                            <input id="personal_identity_file" type="file" class="form-control <?php $__errorArgs = ['personal_identity_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="personal_identity_file" value="<?php echo e(old('personal_identity_file')); ?>" required autocomplete="personal_identity_file" autofocus>

                            <?php $__errorArgs = ['personal_identity_file'];
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
                        <label for="driving_license_file" class="col-md-4 col-form-label text-md-end"><?php echo e(__('driving_license_file')); ?></label>

                        <div class="col-md-6">
                            <input id="driving_license_file" type="file" class="form-control <?php $__errorArgs = ['driving_license_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="driving_license_file" value="<?php echo e(old('driving_license_file')); ?>" required autocomplete="driving_license_file" autofocus>

                            <?php $__errorArgs = ['driving_license_file'];
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
                        <label for="car_license_file" class="col-md-4 col-form-label text-md-end"><?php echo e(__('car_license_file')); ?></label>

                        <div class="col-md-6">
                            <input id="car_license_file" type="file" class="form-control <?php $__errorArgs = ['car_license_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_license_file" value="<?php echo e(old('car_license_file')); ?>" required autocomplete="car_license_file" autofocus>

                            <?php $__errorArgs = ['car_license_file'];
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
                
                
                    <div class="row mb-3 ">

                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox"    value="1" name="availability" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Availability
                            </label>
                        </div>
                    </div>
                
                
                    <div class="row mb-3 ">
                        <div class="form-check col-md-6">
                            <input class="form-check-input"  type="checkbox" value="1" name="acception" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Acception
                            </label>
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
                
                

               
                
                
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Register')); ?>

                        </button>
                        <a class="btn btn-dark" href="<?php echo e(route('admin.driverinfo.index')); ?>">Back to Dashboard Driver Info</a>
                    </div>
                </div>
                

            </form>
              
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/driverinfo/create.blade.php ENDPATH**/ ?>