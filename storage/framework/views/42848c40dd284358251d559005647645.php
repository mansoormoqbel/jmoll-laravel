

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
        <a class="btn btn-dark mb-3" href="<?php echo e(route('admin.shopcart.showCart')); ?>"> <i class="fas fa-fw fa-arrow-left" aria-hidden="true"></i> Revert Order</a>
        <table class="table">
            <thead>
              <tr>
                
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">price</th>
                
                <th scope="col">Added Date</th>
               
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   
                    <td>
                        <?php echo e($cartitem->product->name); ?>

                       
                    </td>
                    <td> <?php echo e($cartitem->quantity); ?>  </td>
                    <td> <?php echo e($cartitem->product->price); ?> </td>
                    
                    
                    <td> <?php echo e($cartitem->added_date); ?>  </td>
                    
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
              
            </tbody>
        </table>
        <p>Total Products Price: <?php echo e($total); ?> JD</p>
        <a class="btn btn-dark mb-3" href="<?php echo e(route('admin.shopcart.test')); ?>"> <i class="fas fa-fw fa-arrow-left" aria-hidden="true"></i> test Order</a>
        <div class="container">
            <div class="card text-center">
                <div class="card-body">
                    <form id="shopForm" method="POST" action="<?php echo e(route('admin.shopcart.checkorder')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- Hidden input fields to store latitude and longitude -->
                        <input type="hidden" id="number_product" name="number_product" value="<?php echo e($count); ?>">
                        <input type="hidden" id="total_price_products" name="total_price_products" value="<?php echo e($total); ?>">
                        <input type="hidden" id="latitude1" name="latitude1" value="<?php echo e($latitude); ?>">
                        <input type="hidden" id="longitude1" name="longitude1" value="<?php echo e($longitude); ?>" >
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" id="distance" name="distance">
                        <input type="hidden" id="city" name="city">
                        <input type="hidden" id="address" name="address">
                        
                        
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label"><?php echo e(__('Phone Number')); ?></label>

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
                        
                        <div style="display: flex;justify-content: center;align-items: center;">
                            <div id="map"   style=" height: 400px;width:400px;margin: 0 auto; "></div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <?php echo e(__('Create Order')); ?>

                                </button>
                                
                            </div>
                        </div>
                       
                    </form>
                  
                </div>
            </div>
        </div>
        
          
        
    </div>
    
</div>



    <!-- Leaflet JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geometryutil/0.5.0/leaflet.geometryutil.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var abc1,abc2;
        abc1=document.getElementById('latitude1').value;
        abc2=document.getElementById('longitude1').value;
        /* console.log(abc1,abc2) */
        var map = L.map('map').setView([31.950802292708598, 35.927258143635065], 13);

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
            var pointA = L.latLng(abc1, abc2);
            var pointB = L.latLng(lat,lng);

            L.marker(pointA).addTo(map).bindPopup('Point A').openPopup();
            L.marker(pointB).addTo(map).bindPopup('Point B').openPopup();

            // حساب المسافة بين النقطتين
            var distance = map.distance(pointA, pointB);

            var x = (distance / 1000).toFixed(2);
            var deliveryPrice;
            if (x <= 5) {
                deliveryPrice = 1.5;
            } else {
                deliveryPrice = 1.5 + (x - 5) * 0.25;
            }
            
           /*  alert('المسافة بين النقطتين: ' + (distance / 1000).toFixed(2) + ' كم'); */
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
                    document.getElementById('distance').value = deliveryPrice;
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






<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/showorder.blade.php ENDPATH**/ ?>