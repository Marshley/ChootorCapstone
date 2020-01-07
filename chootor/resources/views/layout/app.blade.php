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
<!-- link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    
</head>
<style>
    .navbar {
        color: #d35400;
        /* background-color: black; */
        /* opacity: .05; */
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
                {{-- <li class="nav-item dropdown">
                        <a class="nav-link fa fa-bell" style="color:#d35400;" href="#" id="navbarDropdown" role="button" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (auth()->user()->notifications as $notification)
                            <a class="list-group-item" href="/booked">{{json_encode($notification->data, true)}}</a>
                            @endforeach
                        </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/tuteedashboard" style="color:#d35400;">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/booked" style="color:#d35400;">Booked</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link " href="/feedback" style="color:#d35400;">Feedback</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link " href="/tuteeprofile" style="color:#d35400;">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/tnotifications" style="color:#d35400;">Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/logout" style="color:#d35400;">Logout</a>
                </li>
                </ul>
                @elseif(auth()->user()->user_type == 'tutor')
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link fa fa-bell" style="color:#d35400;" href="#" id="navbarDropdown" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($user->notifications as $notification)
                                <a class="list-group-item" href="/request">{{json_encode($notification->data, true)}}</a>
                                @endforeach
                            </div>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/tutordashboard" style="color:#d35400;">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/request" style="color:#d35400;">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/workhistory" style="color:#d35400;">Work History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:#d35400;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/tutorprofile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/tutorschedule">Schedule</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/notifications">Notification</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                @elseif(auth()->user()->user_type == 'admin')
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/admindashboard"  style="color:#d35400">Dashboard</a>
                        </li>
                        {{-- <li class="nav-item">
                                <a class="nav-link" href="/list"  style="color:#d35400">List</a>
                            </li> --}}
                        <li class="nav-item dropdown" style="color:#d35400">
                            <a class="nav-link dropdown-toggle" style="color:#d35400" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/subject">Subject</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/location">Location</a>
                                    <div class="dropdown-divider"></div>                                    
                                    <a class="dropdown-item" href="/course">Course</a>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
                <script type="text/javascript">
                  var path = "{{ route('autocomplete') }}";
                  $('input.typeahead').typeahead({
                      source:  function (query, process) {
                      return $.get(path, { query: query }, function (data) {
                              return process(data);
                          });
                      }
                  });
                </script>
</body> 
</html>