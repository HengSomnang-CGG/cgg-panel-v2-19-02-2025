@extends('layouts.homepage.app')
@section('title', request('keyword') ? 'Carikami - ' . request('keyword') : 'Carikami Search')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@section('content')
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div class="d-flex flex-column custom-sticky-header" style="z-index: 1000; opacity: 0.95;">
            {{-- Header --}}
            <header class="mt-1">
                <div class="d-flex flex-column flex-sm-row align-items-center w-100 px-3">
                    <div class="position-relative mt-4 mb-sm-0 me-3" style="width:150px; height:55px;">
                        <a href="/">
                            <img loading="lazy" src="{{ asset('assets/images/icons.webp') }}" alt="Smart Internet"
                                class="img-fluid object-fit-cover w-100" style="object-fit: cover;">
                        </a>

                    </div>
                    <form action="{{ route('homepage.search') }}" method="GET" class="w-100 mt-md-1 mt-lg-3"
                        style="max-width: 700px;">
                        <div class="row ">
                            <div class="col-12 col-md-9">
                                <div class="input-group rounded-pill shadow-sm overflow-hidden">
                                    <input type="text" name="keyword" class="form-control border-0"
                                        placeholder="{{ session('theme', 'light') === 'dark' ? 'Search Google in dark mode...' : 'Search Google...' }}"
                                        value="{{ request('keyword') }}" aria-label="Search Google">
                                    <button type="submit" class="input-group-text description-text border-0 btn-light">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <button id="toggle-theme"
                                    class="btn btn-light shadow-sm rounded-pill px-4 d-flex align-items-center gap-2">
                                    <i id="theme-icon" class="bi bi-sun text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </header>
        </div>

        <div class="ms-lg-9 mt-4 px-3">
            <p class=" mt-3 mb-3 description-text">
                About {{ number_format($totalResults) }} results
            </p>

            @if ($localResults->count())
                @foreach ($localResults as $item)
                    @include('homepage.components.search.result-item', [
                        'title' => $item->title,
                        'website_name' => $item->website_name,
                        'description' => $item->description,
                        'image_icon' => $item->image_icon,
                        'domain' => $item->domain,
                        'source' => $item->website_name,
                    ])
                @endforeach
            @endif

            @if (count($googleResults))
                @foreach ($googleResults as $result)
                    @include('homepage.components.search.result-item', [
                        'title' => $result['title'] ?? 'No Title Available',
                        'website_name' => $result['link'] ?? 'No Link Available',
                        'description' => $result['snippet'] ?? 'No Description Available',
                        'image_icon' => $result['favicon'] ?? 'default-favicon.png', // Provide a default favicon path
                        'domain' => $result['domain'] ?? 'No Domain Available',
                        'source' => $result['source'] ?? 'Unknown Source',
                    ])
                @endforeach
            @endif

            @if (!$localResults->count() && !count($googleResults))
                <p class="text-muted">No results found for "{{ $keyword }}".</p>
            @endif

            @if (count($googleResults))
                @include('homepage.components.search.pagination', [
                    'currentPage' => $currentPage,
                    'totalResults' => $totalResults,
                    'resultsPerPage' => $resultsPerPage,
                ])
            @endif
        </div>
    </div>
@endsection
<style>
    .custom-sticky-header {
        position: sticky;
        top: 0;
        z-index: 1030;
        transition: background-color 0.3s ease;
    }

    #toggle-theme {
        position: absolute;
        top: 18%;
        right: 4%;
    }

    @media (min-width: 1024px) {
        #toggle-theme {
            top: 26%;
            right: 18%;
        }
    }

    @media(min-width:1280px) {
        #toggle-theme {
            top: 27%;
        right: 51%;
        }
    }
</style>
