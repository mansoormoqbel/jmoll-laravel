
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
            <a class="btn btn-primary" href="{{route('admin.comment.create')}}">Add comment</a>
          
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">Body</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($comments as $comment)
                      <tr>
                          <th scope="row"> {{$comment->id }} </th>
                          <td>{{$comment->body}}</td>
                          <td>{{$comment->user->username}}</td>
                          <td>{{$comment->product->name}}</td>
                          
                          <td>
                            <a class="btn btn-success" href="{{route('admin.comment.edit',$comment->id)}}" >Edit</a>
                            
                            <a  class="btn btn-danger" href="{{route('admin.comment.destroy', $comment->id)}} "onclick="event.preventDefault(); 
                                      document.getElementById('delete-form-{{ $comment->id }}').submit();">
                              Delete  
                            </a>
                              <form id="delete-form-{{ $comment->id }}" action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                          
                            
                           
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