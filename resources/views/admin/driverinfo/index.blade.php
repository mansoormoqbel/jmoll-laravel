
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            <a class="btn btn-primary" href="{{route('admin.driverinfo.create')}}">Add  Driver Info</a>
          
            <table class="table">
                <thead>
                  {{--  'user_id', 'car_model', 'car_make', 'birth_date', 'car_year_made', 
        'car_number', 'car_color', 'personal_identity_file', 'driving_license_file', 
        'car_license_file', 'availability', 'acception' --}}
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">User name</th>
                    <th scope="col">Car Model</th>
                    <th scope="col">Car Make</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($driverinfos as $driverinfo)
                      <tr>
                          <th scope="row"> {{$driverinfo->id }} </th>
                          <td>{{$driverinfo->user->username}}</td>
                          <td>{{$driverinfo->car_model}}</td>
                          <td>{{$driverinfo->car_make}}</td>
                          
                          <td>
                            <a class="btn btn-success" href="{{route('admin.driverinfo.edit',$driverinfo->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.driverinfo.destroy', $driverinfo->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $driverinfo->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $driverinfo->id }}" action="{{ route('admin.driverinfo.destroy', $driverinfo->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            <a  class="btn btn-warning" href="{{route('admin.driverinfo.show',['id'=>$driverinfo->id])}}">Show</a>
                           
                          </td>
                      </tr>  
                    @endforeach
                </tbody>
              </table>
              <a class="btn btn-dark" href="{{route('admin.dashboard')}}">Back to Dashboard Admin</a>
              
        </div>
    </div>
</div>
@endsection