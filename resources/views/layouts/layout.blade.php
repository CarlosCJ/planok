<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="PlanOk 2023">
{{--    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' 'unsafe-eval'; script-src * 'unsafe-inline' 'unsafe-eval'; connect-src * 'unsafe-inline'; img-src * data: blob: 'unsafe-inline'; frame-src *; style-src * 'unsafe-inline';" />--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- JS jquery-->
{{--    <script src="{{ asset('js/jquery-3-7-0.min.js') }}"></script>--}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- SweetAlert jquery-->
{{--    <script src="{{ asset('js/sweetalert2.js') }}"></script>--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.header')

        @section('content')

        @show
    </div>

    @section('scriptJS')

    @show

</body>
</html>
