


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
            <a class="btn btn-primary" href="<?php echo e(route('admin.comment.create')); ?>">Add comment</a>
          
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">Body</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                
                <tbody>
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <th scope="row"> <?php echo e($comment->id); ?> </th>
                          <td><?php echo e($comment->body); ?></td>
                          <td><?php echo e($comment->user->username); ?></td>
                          <td><?php echo e($comment->product->name); ?></td>
                          
                          <td>
                            <a class="btn btn-success" href="<?php echo e(route('admin.comment.edit',$comment->id)); ?>" >Edit</a>
                            
                            <a  class="btn btn-danger" href="<?php echo e(route('admin.comment.destroy', $comment->id)); ?> "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-<?php echo e($comment->id); ?>').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-<?php echo e($comment->id); ?>" action="<?php echo e(route('admin.comment.destroy', $comment->id)); ?>" method="POST" style="display: none;">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('DELETE'); ?>
                              </form>
                          
                            
                           
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/comment/index.blade.php ENDPATH**/ ?>