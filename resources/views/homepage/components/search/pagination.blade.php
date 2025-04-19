@php
    $totalPages = ceil($totalResults / $resultsPerPage);
    $startPage = max(1, $currentPage - ($currentPage % 4 === 0 ? 4 : $currentPage % 4));
    $query = request()->except('page');
@endphp

<div class="d-flex flex-column  align-items-center gap-1 text-center" style="max-width: 48rem;">
    {{-- Display total results --}}
    {{-- Google-style Pagination --}}
    <div class="d-flex align-items-center fs-3 fw-normal justify-content-center  justify-content-xl-start">
        <span class="text-google">G</span>

        @for ($i = 0; $i < min(9, $totalPages - $startPage + 1); $i++)
            @php $pageNum = $startPage + $i; @endphp
            <a href="{{ request()->url() . '?' . http_build_query(array_merge($query, ['page' => $pageNum])) }}"
                class="text-decoration-none {{ $currentPage == $pageNum ? 'text-danger' : 'text-warning' }}">
                o
            </a>
        @endfor

        <span class="text-primary">g</span>
        <span class="text-success">l</span>
        <span class="text-danger">e</span>
    </div>

    {{-- Numbered Pagination --}}
    <div class="d-flex align-items-center">
        {{-- Previous Button --}}
        <a href="{{ $currentPage > 1 ? request()->url() . '?' . http_build_query(array_merge($query, ['page' => $currentPage - 1])) : '#' }}"
            class="btn btn-link  text-google text-decoration-none {{ $currentPage === 1 ? 'disabled opacity-50' : '' }}">
            Previous
        </a>

        {{-- Page Numbers --}}
        <div class="d-flex align-items-center">
            @for ($i = 0; $i < min(8, $totalPages - $startPage + 1); $i++)
                @php $pageNum = $startPage + $i; @endphp
                <a href="{{ request()->url() . '?' . http_build_query(array_merge($query, ['page' => $pageNum])) }}"
                    class="btn btn-link px-1 text-decoration-none {{ $pageNum == $currentPage ? 'fw-bold text-dark disabled' : 'text-google' }}">
                    {{ $pageNum }}
                </a>
            @endfor
        </div>

        {{-- Next Button --}}
        <a href="{{ $currentPage < $totalPages ? request()->url() . '?' . http_build_query(array_merge($query, ['page' => $currentPage + 1])) : '#' }}"
            class="btn btn-link  text-google text-decoration-none {{ $currentPage === $totalPages ? 'disabled opacity-50' : '' }}">
            Next
        </a>
    </div>
</div>

<style>
    .text-google {
        color: #4285f4;
    }
    .btn-link:hover {
        color: #4285f4 !important;
    }
</style>
