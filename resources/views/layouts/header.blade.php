<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.ico')}}"/>
    <link href="{{ asset('/body/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/body/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{ asset('/body/demo/demo.css')}}../assets/" rel="stylesheet" /> --}}
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ asset('/images/3.gif')}}") 50% 50% no-repeat rgb(249,249,249) ;
            opacity: .8;
            background-size:200px 120px;
        }
    </style>
</head>
<body>
    <div id = "myDiv" style="display:none;" class="loader"></div>
    <div id="app">
        <div class="wrapper ">
            <div class="sidebar" data-color="white" data-active-color="danger">
                <!--
                    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
                -->
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                        <div class="logo-image-small">
                            <img class="avatar border-gray" src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.auth()->user()->employee_info()->id.'.png'}}">
                        </div>
                    </a>
                    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                        {{auth()->user()->employee_info()->first_name}}
                        <!-- <div class="logo-image-big">
                            <img src="../assets/img/logo-big.png">
                        </div> -->
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li @if($header == "Dashboard") class="active" @endif>
                            <a href="{{ url('/') }}" onclick='show()'>
                                <i class="nc-icon nc-bank"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li  @if($header == "Open Issue") class="active" @endif>
                            <a href="" onclick='show()'>
                                <i class="nc-icon nc-align-center"></i>
                                <p>Open Issue</p>
                            </a>
                        </li>
                        <li @if($header == "For Audit") class="active" @endif>
                            <a href="" onclick='show()'>
                                <i class="nc-icon nc-settings"></i>
                                <p>For Audit</p>
                            </a>
                        </li>
                        <li @if($header == "Users") class="active" @endif>
                            <a href="{{ url('/users') }}" onclick='show()'> 
                                <i class="nc-icon nc-single-02"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#">{{$header}}</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link dropdown-toggle" href="#" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nc-icon nc-single-02"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">Account</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="account">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#profile" data-toggle="profle">Change Password</a>
                                        <a class="dropdown-item"  href="{{ route('logout') }}"  onclick="logout(); show();">Logout</a>
                                    </div>
                                    <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                @include('change_password')
                @yield('content')
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        function show() {
            document.getElementById("myDiv").style.display="block";
        }
        function logout(){
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
        function check() {
            if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Match';
                document.getElementById('submit').disabled = false;
            } 
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Not Match';
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
    <script src="{{ asset('/body/js/core/jquery.min.js')}}"></script>
    <script src="{{ asset('/body/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('/body/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/body/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    <script src="{{ asset('/body/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('/body/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/body/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    {{-- <script src="{{ asset('/body/js/plugins/perfect-scrollbar.jquery.min.js')}}../assets/demo/demo.js"></script> --}}
    
</body>
</html>
