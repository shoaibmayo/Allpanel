<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/image/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/swiffy-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/dataTables.bootstrap5.min.css') }}" />
    @yield('style')
</head>

<body>
@include('frontend.layouts.includs.header')
@include('frontend.layouts.includs.sidebar')
@yield('content')
@include('frontend.layouts.includs.footer')

<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/scroll-to-top.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
{{-- 
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap5.min.js"></script> --}}

@yield('javascript')
</body>
</html>