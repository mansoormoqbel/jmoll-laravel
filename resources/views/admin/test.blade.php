@extends('layouts.admin')

@section('content')  

<div id="map"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geometryutil/0.5.0/leaflet.geometryutil.min.js"></script>
<script>
    // إنشاء الخريطة
    var map = L.map('map').setView([31.9539, 35.9106], 13); // إحداثيات عمان، الأردن

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // إضافة نقطتين على الخريطة
    var pointA = L.latLng(31.9539, 35.9106);
    var pointB = L.latLng(31.9639, 35.9206);

    L.marker(pointA).addTo(map).bindPopup('Point A').openPopup();
    L.marker(pointB).addTo(map).bindPopup('Point B').openPopup();

    // حساب المسافة بين النقطتين
    var distance = map.distance(pointA, pointB);
    alert('المسافة بين النقطتين: ' + (distance / 1000).toFixed(2) + ' كم');
</script>


@endsection