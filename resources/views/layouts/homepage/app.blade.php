<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="creative tim, updivision, html dashboard, laravel, html css dashboard laravel, soft ui dashboard laravel, laravel soft ui dashboard, soft ui admin, laravel dashboard, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, soft ui dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, soft ui dashboard, soft ui laravel bootstrap 5 dashboard">
    <meta name="description"
        content="A free Laravel Dashboard featuring dozens of UI components &amp; basic Laravel CRUDs.">
    <meta itemprop="name" content="Soft UI Dashboard Laravel by Creative Tim &amp; UPDIVISION">
    <meta itemprop="description"
        content="A free Laravel Dashboard featuring dozens of UI components &amp; basic Laravel CRUDs.">
    <meta itemprop="image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg">
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Soft UI Dashboard Laravel by Creative Tim &amp; UPDIVISION">
    <meta name="twitter:description"
        content="A free Laravel Dashboard featuring dozens of UI components &amp; basic Laravel CRUDs.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg">
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Soft UI Dashboard Laravel by Creative Tim &amp; UPDIVISION">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://www.creative-tim.com/live/soft-ui-dashboard-laravel">
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg">
    <meta property="og:description"
        content="A free Laravel Dashboard featuring dozens of UI components &amp; basic Laravel CRUDs.">
    <meta property="og:site_name" content="Creative Tim">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/mainlogo.webp') }}"">
    <title>@yield('title', 'Carikami Search')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"crossorigin="anonymous">
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link id="pagestyle" href="{{asset('assets/css/soft-design-system.css')}}" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg  ps--active-y">
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/soft-design-system.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>
