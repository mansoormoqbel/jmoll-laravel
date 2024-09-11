


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
            <a class="btn btn-primary" href="<?php echo e(route('admin.product.create')); ?>">Add product</a>
           
            <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Product Name</th>
                    <th scope="col">Shop Name</th>
                    <th scope="col">Category Name </th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        
                          <th scope="row"><?php echo e($product->id); ?></th>
                          <td><?php echo e($product->name); ?></td>
                          <td><?php echo e($product->shop->name); ?></td>
                          <td><?php echo e($product->category->main_category); ?>/ <?php echo e($product->category->sub_category); ?> </td>
                          <td>
                            <a class="btn btn-success" href="<?php echo e(route('admin.product.edit',$product->id)); ?>" >Edit</a>
                            
                            <a  class="btn btn-danger" href="<?php echo e(route('admin.product.destroy', $product->id)); ?> "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-<?php echo e($product->id); ?>').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-<?php echo e($product->id); ?>" action="<?php echo e(route('admin.product.destroy', $product->id)); ?>" method="POST" style="display: none;">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('DELETE'); ?>
                              </form>
                          
                            <a  class="btn btn-warning" href="<?php echo e(route('admin.product.show',$product->id)); ?>">Show</a>
                            
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/product/index.blade.php ENDPATH**/ ?>