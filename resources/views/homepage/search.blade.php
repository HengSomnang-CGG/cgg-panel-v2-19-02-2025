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
                                class="img-fluid object-fit-cover w-100" style="object-fit: cover;"></a>
                    </div>
                    <form action="{{ route('homepage.search') }}" method="GET" class="w-100 mt-md-1 mt-lg-3"
                        style="max-width: 700px;">
                        <div class="input-group rounded-pill shadow-sm overflow-hidden">

                            <input type="text" name="keyword" class="form-control border-0 bg-transparent"
                                placeholder="Search Google..." value="{{ request('keyword') }}" aria-label="Search Google">
                            <button type="submit" class="input-group-text bg-white border-0">
                                <i class="bi bi-search text-dark"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </header>
        </div>

        <div class="ms-lg-9 mt-4 px-3">
            {{-- Display total results --}}
            <p class="text-sm text-dark mt-3 mb-3">
                About {{ number_format($totalResults) }} results
            </p>

            {{-- Local DB Results --}}
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

            {{-- Google Results --}}
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

            {{-- Pagination --}}
            @if (count($googleResults))
                @include('homepage.components.search.pagination', [
                    'currentPage' => $currentPage,
                    'totalResults' => $totalResults,
                    'resultsPerPage' => $resultsPerPage,
                ])
            @endif
        </div>
        @include('homepage.footer')
    </div>
@endsection


<style>
    .custom-sticky-header {
        position: sticky;
        top: 0;
        z-index: 1030;
        background-color: white;
        /* Important: make sure it's not transparent */
    }
</style>
