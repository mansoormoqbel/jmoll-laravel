


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
            <a class="btn btn-primary" href="<?php echo e(route('admin.driverinfo.create')); ?>">Add  Driver Info</a>
          
            <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">User name</th>
                    <th scope="col">Car Model</th>
                    <th scope="col">Car Make</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $driverinfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driverinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <th scope="row"> <?php echo e($driverinfo->id); ?> </th>
                          <td><?php echo e($driverinfo->user->username); ?></td>
                          <td><?php echo e($driverinfo->car_model); ?></td>
                          <td><?php echo e($driverinfo->car_make); ?></td>
                          
                          <td>
                            <a class="btn btn-success" href="<?php echo e(route('admin.driverinfo.edit',$driverinfo->id)); ?>" >Edit</a>
                            
                            <a  class="btn btn-danger" href="<?php echo e(route('admin.driverinfo.destroy', $driverinfo->id)); ?> "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-<?php echo e($driverinfo->id); ?>').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-<?php echo e($driverinfo->id); ?>" action="<?php echo e(route('admin.driverinfo.destroy', $driverinfo->id)); ?>" method="POST" style="display: none;">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('DELETE'); ?>
                              </form>
                          
                            <a  class="btn btn-warning" href="<?php echo e(route('admin.driverinfo.show',['id'=>$driverinfo->id])); ?>">Show</a>
                           
                          </td>
                      </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <a class="btn btn-dark" href="<?php echo e(route('admin.dashboard')); ?>">Back to Dashboard Admin</a>
              
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/driverinfo/index.blade.php ENDPATH**/ ?>