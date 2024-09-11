


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            
            <h2 class="card-title"> <?php echo e($shops->name); ?> </h2>
            <h5 class="card-text"><?php echo e($shops->phone_number); ?> </h5>
            <span id="latitude" class="visually-hidden"> <?php echo e($shops->latitude); ?></span>
            <span id="longitude" class="visually-hidden"> <?php echo e($shops->longitude); ?></span>
            <span id="city" class="visually-hidden"> <?php echo e($shops->city); ?></span>
            <span id="address" class="visually-hidden"> <?php echo e($shops->address); ?></span>
            <h5 class="card-text"><?php echo e($shops->acception?"acceptable":"inacceptable"); ?> </h5>
          
        </div>
        <div class="col">
            <h2 class="card-title"> <?php echo e($shops->user->username); ?> </h2>
            <h5 class="card-text"><?php echo e($shops->user->email); ?> </h5>
            <p class="card-text"><?php echo e($shops->user->phone_number); ?> </p>
        </div>
        <div class="col">
            <h2 class="card-title"> <?php echo e($shops->category->main_category); ?> </h2>
            <h5 class="card-text"><?php echo e($shops->category->sub_category); ?> </h5>
            
        </div>
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
        <div id="map" style="height: 400px;"></div>
        <a class="btn btn-dark" href="<?php echo e(route('admin.shop.index')); ?>">Back to Dashboard User</a>
    </div>
</div>
   
    

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <script>
        
            var latitude,longitude,city,address;
            latitude= document.getElementById('latitude').innerText;
            longitude= document.getElementById('longitude').innerText;
            city= document.getElementById('city').innerText;
            address= document.getElementById('address').innerText;
            
            var map = L.map('map').setView([latitude, longitude], 13);
            
                // Add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            L.marker([latitude, longitude])
            .addTo(map)
            .bindPopup(`<b>${city}</b><br>${address}`);

     
          

       
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-app1\resources\views/admin/shop/show.blade.php ENDPATH**/ ?>