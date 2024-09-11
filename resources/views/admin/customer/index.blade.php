
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
            <a class="btn btn-primary" href="{{route('admin.feedback.create')}}">Add Customer Service</a>
           {{--  <button type="button" class="btn btn-primary">Add User</button> --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Body</th>
                    <th scope="col">User Name </th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                      <tr>
                        
                          <th scope="row">{{$customer->id}}</th>
                          <td>{{$customer->subject}}</td>
                          <td>{{$customer->body}}</td>
                          <td>{{$customer->user->username}}</td>
                          <td>
                            <a class="btn btn-success" href="{{route('admin.feedback.edit',$customer->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.feedback.destroy', $customer->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $customer->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $customer->id }}" action="{{ route('admin.feedback.destroy', $customer->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            {{-- <a  class="btn btn-warning" href="{{route('admin.user.show',['id'=>$customer->id])}}">Show</a> --}}
                            
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