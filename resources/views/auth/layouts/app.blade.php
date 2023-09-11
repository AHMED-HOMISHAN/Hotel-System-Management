<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
<body class="rtl">
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('../resources') }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('../resources') }}/js/popper.min.js"></script>
    <script src="{{ asset('../resources') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('../resources') }}/plugins/datatables/datatables.min.js"></script>
	<script src="{{ asset('../resources') }}/js/moment.min.js"></script>
	<script src="{{ asset('../resources') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('../resources') }}/js/script.js"></script>

</body>
</html>
