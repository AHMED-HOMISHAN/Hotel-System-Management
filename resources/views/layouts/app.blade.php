<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel Dashboard Template') }}</title>

    <!-- Css -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../resources') }}/img/favicon.png">
    {{-- <link rel="stylesheet" href="{{ asset('../resources') }}/plugins/fontawesome/css/fontawesome.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('../resources') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/css/feathericon.min.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/css/dropify.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('../resources') }}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('../resources') }}/css/style.css">

</head>

</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="{{route('dashboard.index')}}" class="logo"> <img src="{{ asset('images/StaffIdentity')}}/{{Auth::user()->image}}"
                        width="50" height="70" alt="logo"> <span class="logoclass">HOTEL</span> </a>
                <a href="{{route('dashboard.index')}}" class="logo logo-small"> <img src="{{ asset('images/StaffIdentity')}}/{{Auth::user()->image}}"
                        alt="Logo" width="30" height="30"> </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span
                            class="user-img"><img class="rounded-circle"
                                src="{{ asset('images/StaffIdentity')}}/{{Auth::user()->image}}" width="31"
                                alt="{{ Auth::user()->name }}"></span> </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm"> <img
                                    src="{{ asset('images/StaffIdentity')}}/{{Auth::user()->image}}" alt="User Image"
                                    class="avatar-img rounded-circle"> </div>
                            <div class="user-text">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p class="text-muted mb-0">{{ Auth::user()->type }}</p>
                            </div>
                        </div> <a class="dropdown-item" href="{{ route('dashboard.profile') }}">My Profile</a> <a class="dropdown-item"

                            href="{{ route('dashboard.logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="{{ URL::current() == route('dashboard.index') ? 'active' :'' }}"> <a href="{{ route('dashboard.index') }}"><i
                                    class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>
                        <li class=" {{ URL::current() == route('bookings.index') ? 'active' :'' }}">

                            <a class="submenu" href="{{ route('bookings.index') }}"><i class=" fas fa-suitcase"></i>
                                <span> Booking </span> </a>

                        </li>
                        <li class="{{ URL::current() == route('customers.index') ? 'active' :'' }}">

                            <a class="submenu" href="{{ route('customers.index') }}"><i class="fas fa-user"></i>
                                <span> Customers </span> </a>

                        </li>
                        <li class="{{ URL::current() == route('staffs.index') ? 'active' :'' }}">

                            <a class="submenu" href="{{ route('staffs.index') }}"><i class="fas fa-user"></i>
                                <span> Staffs </span> </a>

                        </li>
                        <li class="{{ URL::current() == route('rooms.index') ? 'active' :'' }}">

                            <a class="submenu" href="{{ route('rooms.index') }}"><i class="fas fa-key"></i> <span>
                                    Rooms </span></a>

                        </li>

                        <li class="{{ URL::current() == route('home.index') ? 'active' :'' }}">

                            <a class="submenu" href="{{ route('home.index') }}"><i class="fas fa-dollar-sign"></i> <span>
                                    Pricing </span></a>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('../resources') }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('../resources') }}/js/popper.min.js"></script>
    <script src="{{ asset('../resources') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('../resources') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('../resources') }}/plugins/datatables/datatables.min.js"></script>
	<script src="{{ asset('../resources') }}/js/dropify.js"></script>
	<script src="{{ asset('../resources') }}/js/moment.min.js"></script>
	<script src="{{ asset('../resources') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('../resources') }}/js/script.js"></script>

    <script type="text/javascript">
        $('#dataTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            $('#deletemodal #id').val(id);
        })

        $('#dataTable tbody').on('click', '#activateBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#activemodal #id').val(id);
        })

        $('#dataTable tbody').on('click', '#ToBtn', function(argument) {
            var id = $(this).attr("data-id");
            var type = $(this).attr("data-type");
            $('#Tomodal #id').val(id);
            $('#Tomodal #type').val(type);
        })


        $('.dropify').dropify();

    </script>
</body>

</html>
