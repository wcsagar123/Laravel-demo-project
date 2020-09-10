@extends('layout')

@section('content')
<div class="title m-b-md">Login Page</div>
<form action="loginsubmit" method="post">
@csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection