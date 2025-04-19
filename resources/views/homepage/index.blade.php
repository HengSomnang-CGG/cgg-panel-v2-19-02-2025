@extends('layouts.homepage.app')
@section('title', 'Carikami Search')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@section('content')
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="text-center px-3" style="width: 100%; max-width: 720px;">
                <img src="{{ asset('assets/images/icons.webp') }}" class="img-fluid mb-4" alt="Smart Internet Logo"
                    loading="eager" style="max-width:272px" />

                <form action="{{ route('homepage.search') }}" method="GET">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-12 col-md">
                            <div class="position-relative">
                                <i class="bi bi-search position-absolute text-dark"
                                    style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
                                <input id="search" name="keyword" type="text"
                                    class="form-control ps-5 pe-5 py-3 rounded-pill shadow-sm w-100"
                                    placeholder="Search Google or type a URL" autofocus required />
                            </div>
                        </div>
                        <div class="col-12 col-md-auto text-center text-md-start mt-3">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <button type="submit" class="btn btn-light shadow-sm rounded-pill px-4">
                                    Search
                                </button>
                                <button type="button" class="btn btn-light shadow-sm rounded-pill px-4">
                                    I'm Feeling Lucky
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('homepage.footer')
    </div>
@endsection
