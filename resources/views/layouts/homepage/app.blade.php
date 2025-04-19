<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/mainlogo.webp') }}">
    <title>@yield('title', 'Carikami Search')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        crossorigin="anonymous">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/soft-design-system.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Default light theme -->
    <link id="theme-style" href="{{ asset('css/light.css') }}" rel="stylesheet">

</head>

<body class="g-sidenav-show">
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ps--active-y">
        @yield('content')
    </main>

    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/soft-design-system.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let savedTheme = localStorage.getItem('theme');
            if (!savedTheme) {
                savedTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            document.body.classList.add(savedTheme);
            document.getElementById('theme-style').setAttribute('href', `{{ asset('css/${savedTheme}.css') }}`);
            localStorage.setItem('theme', savedTheme);
            updateIcons(savedTheme); // <--- make sure to update icons initially

            const toggleThemeButton = document.getElementById('toggle-theme');
            toggleThemeButton.addEventListener('click', function() {
                const currentTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                document.body.classList.remove(currentTheme);
                document.body.classList.add(newTheme);

                document.getElementById('theme-style').setAttribute('href',
                    `{{ asset('css/${newTheme}.css') }}`);
                localStorage.setItem('theme', newTheme);

                updateIcons(newTheme);
            });

            function updateIcons(theme) {
                const themeIcon = document.getElementById('theme-icon');
                const searchIcon = document.getElementById('search-icon');

                if (themeIcon) {
                    themeIcon.className = `bi ${theme === 'dark' ? 'bi-sun' : 'bi-moon'} text-lg`;
                }
                if (searchIcon) {
                    searchIcon.className =
                        `bi ${theme === 'dark' ? 'bi-search-heart' : 'bi-search'} position-absolute description-text`;
                }
            }
        });
    </script>

</body>

</html>
