


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
                <form method="POST" action="<?php echo e(route('admin.product.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    
                    
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
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($product->name); ?>" required autocomplete="name" autofocus>
        
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
                                <textarea class="form-control" id="exampleFormControlTextarea1"  id="description"  name="description"  rows="3"> <?php echo e($product->description); ?> </textarea>
                                
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
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e($product->price); ?>" required autocomplete="price" autofocus>
        
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
unset($__errorArgs, $__bag); ?>" name="country_made" value="<?php echo e($product->country_made); ?>" required autocomplete="country_made" autofocus>
        
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
unset($__errorArgs, $__bag); ?>" name="quantity" value="<?php echo e($product->quantity); ?>" required autocomplete="quantity" autofocus>
        
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
                    
                    
                        <div class="row mb-3">
                            <label for="shop" class="col-md-4 col-form-label text-md-end "><?php echo e(__('Shop Name')); ?></label>
                            <div class="col-md-6">
                                <select class=" form-select col-md-4 "  name="shop">
                                    <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php echo e($shop->id == $product->shop_id?'selected': ''); ?> value="<?php echo e($shop->id); ?>"> <?php echo e($shop->name); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                            </div>
                            
                        </div>
                    
                    
                        <div class="row mb-3">
                            <label for="sub_category" class="col-md-4 col-form-label text-md-end "><?php echo e(__('Sub Category')); ?></label>
                            <div class="col-md-6">
                                <select class=" form-select col-md-4 "  name="sub_category">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php echo e($category->id == $product->catg_id?'selected': ''); ?> value="<?php echo e($category->id); ?>"> <?php echo e($category->sub_category); ?>  </option>
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
unset($__errorArgs, $__bag); ?>" multiple name="productphoto[]" value="<?php echo e(old('productphoto')); ?>"  autocomplete="productphoto" autofocus>

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
                    
                    
                        <div class="row mb-3 ">
                            <div class=" col-md-6   ">
                                <input class="form-check-input" <?php echo e($product->status?"checked":""); ?> type="checkbox" value="1" name="status" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Status
                                </label>
                            </div>
                        </div>
                    
                    
                        <div class="row mb-3 ">
                            <div class=" col-md-6">
                                <input class="form-check-input" <?php echo e($product->activation?"checked":""); ?>   type="checkbox" value="1" name="activation" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Activation
                                </label>
                            </div>
                        </div>
                    
               
                    
                    

                    
                    
                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Update')); ?>

                            </button>
                            <a class="btn btn-dark" href="<?php echo e(route('admin.product.index')); ?>">Back to Dashboard Shop</a>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <h1>Word Document Display</h1>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $productphoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card" style="width: 18rem;">
                            <img  class="card-img-top" src="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>" alt="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>">
                            <div class="card-body">
                                
                                
                                <h5 class="card-title">This browser does not support viewing Word documents. Please download the document to view it:</h5>
                                 <a href="<?php echo e(asset('Product')); ?>/<?php echo e($doc->photo_name); ?>">Download Word Document</a>
                            </div>
                        </div>
                        
                    
                   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
            </div>
        </div>
    </div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        
        <script>

            var latitude,longitude,city,address;
            latitude= document.getElementById('latitude').value;
            longitude= document.getElementById('longitude').value;
            city= document.getElementById('city').value;
            address= document.getElementById('address').value;
            
            var map = L.map('map').setView([latitude, longitude], 13);
            
                // Add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            L.marker([latitude, longitude])
            .addTo(map)
            .bindPopup(`<b>${city}</b><br>${address}`);
            var marker = null; // No marker initially

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                // If a marker exists, remove it
                if (marker) {
                    map.removeLayer(marker);
                }

                // Create a new marker and add it to the map
                marker = L.marker([lat, lng]).addTo(map);

                // Perform reverse geocoding
                        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                            .then(response => response.json())
                            .then(data => {
                                // Extract city and address
                                var city = data.address.city || data.address.town || data.address.village;
                                var address = data.display_name;

                                // Display city and address
                                alert(`City: ${city}\nAddress: ${address}`);

                                // Update hidden input fields
                                document.getElementById('latitude').value = lat;
                                document.getElementById('longitude').value = lng;
                                document.getElementById('city').value = city;
                                document.getElementById('address').value = address;
                            })
                            .catch(error => {
                                console.error('Error fetching location:', error);
                            });
                    });

               

            


        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>