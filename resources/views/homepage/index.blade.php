@extends('layouts.homepage.app')

@section('title', 'Masuk Search')

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
                <img src="{{ asset('assets/img/logo.webp') }}" class="img-fluid mb-4" alt="Smart Internet Logo"
                    loading="eager" style="max-width:272px" />

                <!-- Search form -->
                <form action="{{ route('homepage.search') }}" method="GET">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-12 col-md">
                            <div class="input-container">
                                <!-- Search icon (SVG) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="black" >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 6.65a7.5 7.5 0 010 10.6z" />
                                </svg>
                                <input id="search" name="keyword" type="text" placeholder="Masukan keyword yang ingin anda cari"
                                    class="text-center bg-transparent">
                            </div>
                        </div>
                        <div class="col-12 col-md-auto text-center text-md-start mt-3">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <button type="submit" class="custom-button  bg-transparent btn-light ">
                                    Cari Sekarang
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer
            class="text-center pb-5 d-flex flex-column flex-md-row justify-content-center align-items-center gap-2 gap-md-5">

            <a href="{{ route('homepage.privacy') }}" class="textlink">Kebijakan Privasi</a>
            <a href="{{ route('homepage.notice') }}" class="textlink">Peringatan Penggunaan</a>
        </footer>
    </div>
@endsection

<!-- Updated Theme Styles -->
<style>
    .input-container {
        display: flex;
        align-items: center;
        border: 1px solid black;
        border-radius: 8px;
        padding: 8px 14px;
        max-width: 500px;
        margin: 0 auto;
    }

    @media(min-width: 1024px) {
        .input-container {
            max-width: 900px;

        }
        .input-container input {
            text-align: start !important;
        }
    }

    .input-container svg {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .input-container input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 1.25rem;
        font-style: italic;
    }


    .custom-button {
        display: inline-block;
        padding: 5px 49px;
        font-weight: bold;
        font-size: 16px;
        color: black;
        background-color: white;
        border: 1px solid black;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .custom-button:hover {
        background-color: #f0f0f0;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .btn {
        text-transform: capitalize !important;
    }

    .theme-toggle {
        position: fixed;
        top: 15px;
        right: 0;
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
