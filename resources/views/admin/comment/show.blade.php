
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col{{-- -md-4 --}}">
            <h3  class="card-title">User Name  : {{$DriverInfo->user->username}}</h3>
            <h5 class="card-text" >First Name : {{$DriverInfo->user->first_name}}  </h5>
            <h5 class="card-text" >Last Name : {{$DriverInfo->user->last_name}}  </h5>
            
            <p class="card-text">Phone Number : {{$DriverInfo->user->phone_number}} </p>
            <p class="card-text">Email : {{$DriverInfo->user->email}} </p>  
        </div>
        <div class="col{{-- -md-4 --}}">
            <h3  class="card-title">car model : {{$DriverInfo->car_model}}</h3>
            <h5 class="card-text" >car make : {{$DriverInfo->car_make}}  </h5>
            <h5 class="card-text" >birth date : {{$DriverInfo->birth_date}}  </h5>
            
            <p class="card-text">car year made : {{$DriverInfo->car_year_made}} </p>
            <p class="card-text">car number : {{$DriverInfo->car_number}} </p>
            <p class="card-text">car color : {{$DriverInfo->car_color}} </p>
            <p class="card-text">availability : {{$DriverInfo->availability?"yes":"no"}} </p>
            <p class="card-text">acception : {{$DriverInfo->acception?"yse":"no"}} </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col">
            {{-- start PIFs --}}
                @if ($PIFs== 'docx' || $PIFs== 'doc')
                    <h1>Word Document Display</h1>
                    {{-- DriverInfo --}}
                    <iframe src="https://docs.google.com/gview?url={{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}&embedded=true" width="100%" height="400px">
                       {{--  This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}">Download Word Document</a> --}}
                    </iframe>
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}">Download Word Document</a>
                @elseif($PIFs== 'pdf')
                    <h1>PDF Display</h1>
                    <iframe src="{{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}" width="100%" height="400px">
                       
                    </iframe>
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}">Download PDF</a>
                @else
                    <img src="{{asset('PIF')}}/{{$DriverInfo->personal_identity_file}}" class="card-img-top"  alt="{{$DriverInfo->personal_identity_file}}">
                @endif
            {{-- end PIFs  --}}
        </div>
        <div class="col">
            {{-- start DIFs--}}
                @if ($DIFs== 'docx' || $DIFs== 'doc')
                    <h1>Word Document Display</h1>
                    {{-- DriverInfo --}}
                    <iframe src="https://docs.google.com/gview?url={{asset('DIF')}}/{{$DriverInfo->driving_license_file}}&embedded=true" width="100%" height="400px">
                       
                    </iframe>
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('DIF')}}/{{$DriverInfo->driving_license_file}}">Download Word Document</a>
                @elseif($DIFs== 'pdf')
                    <h1>PDF Display</h1>
                    <iframe src="{{asset('DIF')}}/{{$DriverInfo->driving_license_file}}" width="100%" height="400px">
                       
                    </iframe>
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{asset('DIF')}}/{{$DriverInfo->driving_license_file}}">Download PDF</a>
                @else
                    <img src="{{asset('DIF')}}/{{$DriverInfo->driving_license_file}}" class="card-img-top"  alt="{{$DriverInfo->driving_license_file}}">
                @endif
            {{-- end DIFs --}}
        </div>
        <div class="col">
            {{-- start CIFs--}}
                @if ($CIFs== 'docx' || $CIFs== 'doc')

                    <h1>Word Document Display</h1>
                    
                    <iframe src="https://docs.google.com/gview?url={{asset('CIF')}}/{{$DriverInfo->car_license_file}}&embedded=true" width="100%" height="400px">
                        
                    </iframe>
                    This browser does not support viewing Word documents. Please download the document to view it: <a href="{{asset('CIF')}}/{{$DriverInfo->car_license_file}}">Download Word Document</a>
                    </hr>
                @elseif($CIFs== 'pdf')
                    <h1>PDF Display</h1>
                    <iframe src="{{asset('CIF')}}/{{$DriverInfo->car_license_file}}" width="100%" height="400px">
                        This browser does not support PDFs. Please download the PDF to view it: <a href="{{asset('CIF')}}/{{$DriverInfo->car_license_file}}">Download PDF</a>
                    </iframe>
                    </hr>
                @else
                    <img src="{{asset('CIF')}}/{{$DriverInfo->car_license_file}}" class="card-img-top"  alt="{{$DriverInfo->car_license_file}}">
                @endif
            {{-- end CIFs --}}
        </div>
        <a class="btn btn-dark  justify-content-center" href="{{route('admin.driverinfo.index')}}">Back to Dashboard Driver Info</a>
    </div>

    
</div>
@endsection
    {{-- 
        ='DriverInfo','PIFs','DIFs','CIFs'
        /*
            "id": 4,
            "user_id": 11,
            "car_model": "asd",
            "car_make": "asd",
            "birth_date": "2024-08-21",
            "car_year_made": "2024-08-21",
            "car_number": "555445",
            "car_color": "red",
            "personal_identity_file": "1724193511.docx",
            "driving_license_file": "1724193511.docx",
            "car_license_file": "1724193511.docx",
            "availability": 1,
            "acception": 1,
            "created_at": "2024-08-20T22:38:31.000000Z",
            "updated_at": "2024-08-20T22:38:31.000000Z",
            "user": {
                "id": 11,
                "username": "Driver1",
                "first_name": "Driver1",
                "last_name": "Driver1",
                "phone_number": "0788865214",
                "profile_photo": "1724150416.jpg",
                "status": 0,
                "type_user": 1,
                "email": "driver@driver.com",
                "email_verified_at": null,
                "created_at": "2024-08-20T10:40:16.000000Z",
                "updated_at": "2024-08-20T10:40:16.000000Z" 
            }
                
        
        */

    --}}