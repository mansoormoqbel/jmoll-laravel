


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
            <a class="btn btn-primary" href="<?php echo e(route('admin.admin.create')); ?>">Add Admin</a>
           
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">User name</th>
                    <th scope="col">Type User</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <th scope="row"><?php echo e($user->id); ?></th>
                          <td><?php echo e($user->email); ?></td>
                          <td><?php echo e($user->username); ?></td>
                          <td>Admin</td>
                          <td>
                            <a class="btn btn-success" href="<?php echo e(route('admin.admin.edit',$user->id)); ?>" >Edit</a>
                            
                            <a  class="btn btn-danger" href="<?php echo e(route('admin.admin.destroy', $user->id)); ?> "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-<?php echo e($user->id); ?>').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('admin.admin.destroy', $user->id)); ?>" method="POST" style="display: none;">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('DELETE'); ?>
                              </form>
                          
                            <a  class="btn btn-warning" href="<?php echo e(route('admin.admin.show',['id'=>$user->id])); ?>">Show</a>
                            <?php if($user->status ==0): ?>
                              <a  class="btn btn-info" href="<?php echo e(route('admin.admin.changeStatus',$user->id)); ?>">not active</a>
                            <?php else: ?>
                              <a  class="btn btn-info" href="<?php echo e(route('admin.admin.changeStatus',$user->id)); ?>">active</a>
                            <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/admin/index.blade.php ENDPATH**/ ?>