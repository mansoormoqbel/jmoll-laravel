


<?php $__env->startSection('content'); ?>


<div class="container text-center">
        <label class="switch">
            <input type="checkbox"  <?php echo e($driver_id->availability == 1 ? 'checked' : ''); ?> >
            <span class="slider round"></span>
        </label>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                # <?php echo e($order->id); ?> order Details 
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   
                     
                    
                    <div class="container ">
                        <div>Order Details</div>
                        <div class="row">
                            <div class="col">
                                <h1>Shop Details</h1>
                                <hr>
                                <p> <?php echo e($shop->name); ?> </p>
                                <p> <?php echo e($order->number_product); ?> </p>
                                <p> <?php echo e($shop->phone_number); ?> </p>
                                <p> <?php echo e($shop->address); ?> </p>
                                <input type="hidden" name="latitude"  id="latitude" value="<?php echo e($shop->latitude); ?>" >
                                <input type="hidden" name="longitude"  id="longitude" value="<?php echo e($shop->longitude); ?>" >
                                <input type="hidden" name="city" id="city" value="<?php echo e($shop->city); ?>">
                                <input type="hidden" name="address" id="address" value="<?php echo e($shop->address); ?>">
                                <div id="map" style="width:400px;height: 400px;"></div>
                            </div>
                            <div class="col">
                                <h1>Customer Details</h1>
                                <hr>
                                <p> <?php echo e($order->user->username); ?> </p>
                                <p>  </p>
                                <p> <?php echo e($order->phone_number); ?> </p>
                                <p> <?php echo e($order->address); ?> </p>
                                
                                <input type="hidden" name="latitude1"  id="latitude1" value="<?php echo e($order->latitude); ?>" >
                                <input type="hidden" name="longitude1"  id="longitude1" value="<?php echo e($order->longitude); ?>" >
                                <input type="hidden" name="city1" id="city1" value="<?php echo e($order->city); ?>">
                                <input type="hidden" name="address1" id="address1" value="<?php echo e($order->address); ?>">
                                <div id="map1" style="width:400px;height: 400px;"></div>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
    
</div>





<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>

    var latitude,longitude,city,address,latitude1,longitude1,city1,address1;
    latitude= document.getElementById('latitude').value;
    longitude= document.getElementById('longitude').value;
    city= document.getElementById('city').value;
    address= document.getElementById('address').value;
    latitude1= document.getElementById('latitude1').value;
    longitude1= document.getElementById('longitude1').value;
    city1= document.getElementById('city1').value;
    address1= document.getElementById('address1').value;
    var map = L.map('map').setView([latitude, longitude], 13);
    var map1 = L.map('map1').setView([latitude1, longitude1], 13);
    
        // Add the OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);
    L.marker([latitude, longitude])
        .addTo(map)
        .bindPopup(`<b>${city}</b><br>${address}`);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
    }).addTo(map1);
    L.marker([latitude1, longitude1])
        .addTo(map1)
        .bindPopup(`<b>${city1}</b><br>${address1}`);

    

   

       

    


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.driver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/driver/getOrder.blade.php ENDPATH**/ ?>