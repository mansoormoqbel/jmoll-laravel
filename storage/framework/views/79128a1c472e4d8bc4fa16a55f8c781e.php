

<?php $__env->startSection('content'); ?>
<div class="row">
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
    <div class="col">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">price</th>
                <th scope="col">category</th>
                <th scope="col">Added Date</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-center m-8" scope="row">
                        <a   href="<?php echo e(route('admin.shopcart.DeleteCartItem', $cartitem->id)); ?> "onclick="event.preventDefault(); 
                            document.getElementById('delete-form-<?php echo e($cartitem->id); ?>').submit();">
                            <i class="fas fa-trash fa-fw"></i>  
                        </a>
                        <form id="delete-form-<?php echo e($cartitem->id); ?>" action="<?php echo e(route('admin.shopcart.DeleteCartItem', $cartitem->id)); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                       
                    </th>
                    <td>
                        <div class="card text-center" style="width: 8rem;">
                            <img src="<?php echo e(asset('Product/'.$cartitem->product->productphoto[0]->photo_name)); ?>" class=" img-fluid text-center  " style="width: 60px;height:60px;text-align:center" alt="...">
                            <div class="card-body">
                              <h5 class="card-title"> <?php echo e($cartitem->product->name); ?> </h5>
                              
                            </div>
                          </div>
                    </td>
                    <td> <?php echo e($cartitem->product->price); ?> </td>
                    
                    <td> <?php echo e($cartitem->product->category->main_category); ?>  <?php echo e($cartitem->product->category->sub_category); ?></td>
                    <td> <?php echo e($cartitem->added_date); ?>  </td>
                    <td> <?php echo e($cartitem->quantity); ?>  </td>
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
              
            </tbody>
        </table>
        <a class="btn btn-primary" href="<?php echo e(route('admin.shopcart.ShowOrder')); ?>">Add To Order</a>
    </div>
    
    
</div>




<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/showcart.blade.php ENDPATH**/ ?>