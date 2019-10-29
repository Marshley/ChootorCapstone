{{-- HERE IS THE MAIN NAVBAR --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHOO-TOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png" type="image/png">
</head>
 
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="/home">WELCOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    @if( auth()->check() )

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            @if(auth()->user()->user_type == 'tutor')
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

        <li class="nav-item ">
                <a class="nav-link" aria-disabled="true" > Hi {{ auth()->user()->firstname }}!<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tutordashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/request">Requests</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Settings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/tutorprofile">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/tutorschedule">Schedule</a>
                </div>
              </li>
            <li class="nav-item">
                    <a class="nav-link " href="/logout">Logout</a>
                </li>
        </ul>
        @elseif(auth()->user()->user_type == 'tutee')
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
    
            <li class="nav-item ">
                    <a class="nav-link" aria-disabled="true">Hi {{ auth()->user()->firstname }}! <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tuteedashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/tuteeprofile">Profile</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link " href="/logout">Logout</a>
                </li>
            </ul>
            @elseif(auth()->user()->user_type == 'admin')
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
                <li class="nav-item ">
                        <a class="nav-link" aria-disabled="true">Hi {{ auth()->user()->firstname }}! <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admindashboard">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/subject">Subject</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/location">Location</a>
                            </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link " href="/logout">Logout</a>
                    </li>
                </ul>
        @endif
@else
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="/register">Register</a>
        </li>
    </ul>
</div>
@endif 
</div>
</nav>

<div class="container">
    @yield('content')
</div>
 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small fixed-bottom">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a> Company Name</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
 
</html>