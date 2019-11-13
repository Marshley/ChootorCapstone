{{-- HERE IS THE MAIN NAVBAR --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHOO-TOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link href="/css/sticky-footer.css" rel="stylesheet"> --}}
    <link rel="shortcut icon" href="../img/logo.png" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style>
    .navbar {
        color: white;
        background-color: #141945;
    }    
</style> 
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
            @if( auth()->check() )
            <a class="navbar-brand" aria-disabled="true" > Hi {{ auth()->user()->firstname }}!<span class="sr-only">(current)</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    @if(auth()->user()->user_type == 'tutee')
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                        <a class="nav-link fa fa-bell" style="color:white;" href="#" id="navbarDropdown" role="button" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (auth()->user()->notifications as $notification)
                            <a class="list-group-item" href="#">{{json_encode($notification->data, true)}}</a>
                            @endforeach
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tuteedashboard" style="color:white;">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/booked" style="color:white;">Booked</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/tuteeprofile" style="color:white;">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/logout" style="color:white;">Logout</a>
                </li>
                </ul>
                @elseif(auth()->user()->user_type == 'tutor')
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link fa fa-bell" style="color:white;" href="#" id="navbarDropdown" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($user->notifications as $notification)
                                <a class="list-group-item" href="/request">{{json_encode($notification->data, true)}}</a>
                                {{-- <div class="dropdown-divider"></div> --}}
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tutordashboard" style="color:white;">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/request" style="color:white;">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/workhistory" style="color:white;">Work History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/tutorprofile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/tutorschedule">Schedule</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                @elseif(auth()->user()->user_type == 'admin')
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/admindashboard"  style="color:white">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown" style="color:white">
                            <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/subject">Subject</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/location">Location</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                        </li>
                    </ul>
                @endif
            </div>
            @endif
            </nav>








<div class="container">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body> 
</html>