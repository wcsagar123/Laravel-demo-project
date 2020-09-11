@extends('layout')

@section('content')
<div class="title m-b-md">User List <a href="{{ URL::to('create-account') }}" class="btn btn-success">Add New</a></div>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Avtar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th colspan="2">Action</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
	  My Commnet addeded by yogesh
        @if( $user->image != '' )
        <td><img src='{{ asset("uploads/$user->image") }}' ></td>
        @else
        <td>No Image Yogesh 156</td>

        @endif 
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td><a href="{{ URL::to('userlist/edit',$user->id) }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ URL::to('userlist/delete',$user->id) }}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table> 
@endsection