<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta description="Google Dashboard">
    <title>@yield('title', 'Masuk Dashboard')</title>
    <!-- Additional Styles -->
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  crossorigin="anonymous">


    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    {{-- <link rel="icon"   href="{{ asset('assets/img/favicon.webp?v1') }}" /> --}}
    <link rel="icon" type="image/webp" href="{{ asset('assets/img/favicon.webp') }}">
    @stack('styles')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    {{-- @include('layouts.auth.footer') --}}

            <!-- Core -->
            <script src="../assets/js/core/popper.min.js"></script>
            <script src="../assets/js/core/bootstrap.min.js"></script>

            {{-- plugins --}}
            <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

            <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>

            <!-- Theme JS -->
            <script src="../assets/js/soft-design-system.js"></script>
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</html>
