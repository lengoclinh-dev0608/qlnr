<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    <!-- {{--Styles css common--}} -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <!-- AdminLTE -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/fontawesome/css/all.min.css') }}" rel="stylesheet">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>

<body>
    @include('partial.header')

    @yield('content')

    @include('partial.footer')

    {{--Scripts js common--}}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    {{--Scripts link to file or js custom--}}
    @yield('scripts')
</body>



</html>