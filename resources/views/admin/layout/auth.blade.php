<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

  
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin/home') }}">
                    <img src="{{asset('img/Xtreme_Auto_Worx_logo.png')}}" style="max-height: 30px" alt="">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{url('/admin/home')}}"> Admin</a></li>                   
                    &nbsp;
 
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{url('/employee/home')}}"> Employee Page</a></li>                   
                    &nbsp;
 
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @auth('admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="">Edit Profile</a></li>
                                <li>
                                    <a href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @auth('admin')
    <div class="admin-nav">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <a href="{{url('/admin/jobs')}}" class="btn btn-default btn-lg">Jobs</a>
                </div>
                <div class="col-md-2">
                    
                    <a href="{{url('/admin/vehicles')}}" class="btn btn-default btn-lg">Vehicles</a>
                </div>
                <div class="col-md-2">
                    
                    <a href="{{url('/admin/employees')}}" class="btn btn-default btn-lg">Employees</a>
                </div>
                 <div class="col-md-2">
                    
                    <a href="{{url('/admin/customers')}}" class="btn btn-default btn-lg">Customers</a>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @include('admin.messages')

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    @yield('scripts')
</body>
</html>
