@extends('layouts.homepage.app')

@section('title', 'Carikami Search')

<!-- Include the Bootstrap Icons stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@section('content')
    <div class="theme-toggle btn ">
        <input type="checkbox" id="themeSwitch" hidden />
        <label for="themeSwitch" class="toggle-label">
            <span class="toggle-icon sun">☀️</span>
            <span class="toggle-icon moon">🌙</span>
            <span class="toggle-slider"></span>
        </label>
    </div>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="text-center px-3" style="width: 100%; max-width: 720px;">
                <img src="{{ asset('assets/images/icons.webp') }}" class="img-fluid mb-4" alt="Smart Internet Logo"
                    loading="eager" style="max-width:272px" />

                <!-- Search form -->
                <form action="{{ route('homepage.search') }}" method="GET">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-12 col-md">
                            <div class="position-relative">
                                <i class="bi bi-search position-absolute description-text"
                                    style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
                                <input id="search" name="keyword" type="text"
                                    class="form-control ps-5 pe-5 py-3 rounded-pill shadow-sm w-100"
                                    placeholder="Search Google or type a URL" autofocus required />
                            </div>
                        </div>
                        <div class="col-12 col-md-auto text-center text-md-start mt-3">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <button type="submit" class="btn btn-light shadow-sm rounded-pill px-4">
                                    Temukan
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="text-center pb-12 d-flex justify-content-center mx-auto gap-5">
           <a href="{{route('homepage.privacy')}}"  class="textlink">Kebijakan Privasi</a>
           <a href="{{route('homepage.notice')}}"  class="textlink">Peringatan Penggunaan</a>
        </footer>
    </div>
@endsection

<!-- Updated Theme Styles -->
<style>
   .theme-toggle {
    position: fixed;
    top: 15px;
    right:0;
    z-index: 1000;
    box-shadow: none;
    box-shadow: 0 0 0 !important;
}

@media (min-width: 1024px) {
    top: 59px;
    right: 44px;
}
@media (min-width: 1600px) {
    top: 59px;
    right: 60px;
}
    .toggle-label {
        cursor: pointer;
        width: 60px;
        height: 30px;
        background-color: #ccc;
        border-radius: 999px;
        position: relative;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .toggle-slider {
        position: absolute;
        top: 3px;
        left: 3px;
        width: 24px;
        height: 24px;
        background-color: #fff;
        border-radius: 50%;
        transition: transform 0.3s ease;
        z-index: 2;
    }

    .toggle-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        z-index: 1;
        transition: opacity 0.3s ease;
    }

    .toggle-icon.sun {
        left: 35px;
        opacity: 1;
    }

    .toggle-icon.moon {
        right: 33px;
        opacity: 0;
    }

    #themeSwitch:checked+.toggle-label {
        background-color: #444;
    }

    #themeSwitch:checked+.toggle-label .toggle-slider {
        transform: translateX(30px);
    }

    #themeSwitch:checked+.toggle-label .sun {
        opacity: 0;
    }

    #themeSwitch:checked+.toggle-label .moon {
        opacity: 1;
    }

    /* Theme styling */
    body.light-mode {
        background-color: #f0f2f5;
        color: #000;
    }

    body.dark-mode {
        background-color: #1e1e2f;
        color: #fff;
    }

    body.dark-mode input,
    body.dark-mode .form-control,
    body.dark-mode button {
        background-color: #333;
        color: #fff;
        border-color: #444;
    }

    footer {
        display: flex;
        justify-content: center;
        text-align: center;
        gap: 5px;
        padding-bottom: 12px;
        margin: auto;

    }
</style>


