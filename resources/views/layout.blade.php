<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
    	<!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body>
        <div class="position-ref full-height">
          <div class="header"> @section('header')
          	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
              <!-- Brand -->
              <a class="navbar-brand" href="#">Navbar</a>
            
              <!-- Toggler/collapsibe Button -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <!-- Navbar links -->
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                 
                  @if(session()->get('logData'))
                   <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('userlist') }}">UserList</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('logout') }}">Logout</a>
                  </li>                  
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('create-account') }}">Create Account</a>
                  </li>
                  @endif
                  
                </ul>
              </div>
            </nav>
            @show </div>
          <div class="content"> @section('content')
          @show </div>
          <div class="footer navbar bg-dark"> @section('footer')
            <div>Footer Part</div>
            @show </div>
        </div>
	</body>
</html>
