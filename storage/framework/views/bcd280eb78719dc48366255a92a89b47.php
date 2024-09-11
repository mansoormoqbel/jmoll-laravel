


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
                  create Customer Service
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <form id="shopForm" method="POST" action="<?php echo e(route('admin.shop.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <!-- Hidden input fields to store latitude and longitude -->
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            <input type="hidden" id="city" name="city">
                            <input type="hidden" id="address" name="address">
                            
                            
                            
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
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Phone Number')); ?></label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required autocomplete="phone_number" autofocus>

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
                                            <option  value="<?php echo e($seller->id); ?>"> <?php echo e($seller->username); ?>  </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                            
                            
                                <div class="row mb-3">
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
                                    <label for="validity_docs" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Validity Docs')); ?></label>

                                    <div class="col-md-6">
                                        <input id="validity_docs" type="file" class="form-control <?php $__errorArgs = ['validity_docs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple name="validity_docs[]" value="<?php echo e(old('validity_docs')); ?>" required autocomplete="validity_docs" autofocus>

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
                            
                            
                           
                            
                            
            
                           
            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Sent')); ?>

                                    </button>
                                    <a class="btn btn-dark" href="<?php echo e(route('admin.shop.index')); ?>">Back to Dashboard Shop</a>
                                </div>
                            </div>
            
                        </form>
                          
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div id="map" style="height: 400px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

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

        document.getElementById('shopForm').addEventListener('submit', function(event) {
            var latitude = document.getElementById('latitude').value;
            var longitude = document.getElementById('longitude').value;

            if (!latitude || !longitude) {
                event.preventDefault(); // Stop form submission
                alert('Please select a location on the map before submitting the form.');
            }
        });
    </script>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/shop/create.blade.php ENDPATH**/ ?>