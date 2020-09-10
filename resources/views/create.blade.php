@extends('layout')

@section('content')
<div class="title m-b-md">Create Account</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="@if(isset($user) && $user->email != ''){{ URL::to('userlist/update',$user->id) }}@else{{ URL::to('createsubmit')}}@endif" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name"  value="@if(isset($user) && $user->name != ''){{$user->name}}@endif">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" placeholder="Enter email" id="email" name="email"  value="@if(isset($user) && $user->email != ''){{ $user->email}}@endif">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd"  value="@if(isset($user) && $user->password != ''){{$user->password}}@endif">
  </div>
  <div class="form-group">
    <label>Image:</label>
    <input type="file" name="image">
    @if(isset($user) && $user->image != '')<img src='{{ asset("uploads/$user->image") }}' class="img-responsive" >@endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection