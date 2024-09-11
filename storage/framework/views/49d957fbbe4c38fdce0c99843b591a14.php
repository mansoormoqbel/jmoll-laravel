


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
                <form method="POST" action="<?php echo e(route('admin.shop.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($shops->id); ?>">
                    
                    <!-- Hidden input fields to store latitude and longitude -->
                    <input type="hidden" id="latitude" name="latitude" value="<?php echo e($shops->latitude); ?>">
                    <input type="hidden" id="longitude" name="longitude"  value="<?php echo e($shops->longitude); ?>">
                    <input type="hidden" id="city" name="city"  value="<?php echo e($shops->city); ?>">
                    <input type="hidden" id="address" name="address"  value="<?php echo e($shops->address); ?>">
                    
                    
                    
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Name Shop')); ?></label>
        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value=" <?php echo e($shops->name); ?> " required autocomplete="name" autofocus>
        
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
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Phone Number')); ?></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_number" value="<?php echo e($shops->phone_number); ?>" required autocomplete="phone_number" autofocus>

                                <?php $__errorArgs = ['phone_number'];
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
                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($shops->seller_id == $seller->id?'selected': ''); ?> value="<?php echo e($seller->id); ?>"> <?php echo e($seller->username); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                            </div>
                            
                        </div>

                       
                    
                    
                        <div class="row mb-3">
                            <label for="sub_category" class="col-md-4 col-form-label text-md-end "><?php echo e(__('Sub Category')); ?></label>
                            <div class="col-md-6">
                                <select class=" form-select col-md-4 "  name="sub_category">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option   <?php echo e($shops->catg_id == $category->id?'selected': ''); ?> value="<?php echo e($category->id); ?>"> <?php echo e($category->sub_category); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                            </div>
                            
                        </div>
                    
                    
                        
                        <div class="row mb-3">
                            <label for="validity_docs" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Validity Docs')); ?></label>

                            <div class="col-md-6">
                                <input id="validity_docs" type="file" class="form-control <?php $__errorArgs = ['validity_docs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple name="validity_docs[]" value="<?php echo e(old('validity_docs')); ?>"  autocomplete="validity_docs" autofocus>

                                <?php $__errorArgs = ['validity_docs'];
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
                                <input class="form-check-input" <?php echo e($shops->acception?"checked":""); ?> type="checkbox" value="1" name="acception" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Acception
                                </label>
                            </div>
                        </div>
                    
                
                    
                    <div id="map" style="height: 400px;"></div>
                    
                    

                    
                    
                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Update')); ?>

                            </button>
                            <a class="btn btn-dark" href="<?php echo e(route('admin.shop.index')); ?>">Back to Dashboard Shop</a>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <h1>Word Document Display</h1>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $validityDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">     
                            <iframe src="https://docs.google.com/gview?url=<?php echo e(asset('field')); ?>/<?php echo e($doc->filename); ?>&embedded=true" width="100%" height="400px">
                            
                            </iframe>
                            This browser does not support viewing Word documents. Please download the document to view it: <a href="<?php echo e(asset('field')); ?>/<?php echo e($doc->filename); ?>">Download Word Document</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/shop/edit.blade.php ENDPATH**/ ?>