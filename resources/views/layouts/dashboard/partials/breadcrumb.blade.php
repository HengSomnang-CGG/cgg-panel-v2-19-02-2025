<!-- resources/views/partials/breadcrumb.blade.php -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        @php
            $segments = request()->segments();
        @endphp
        @foreach ($segments as $key => $segment)
            @php
                $segment = ($segment === 'panel') ? 'HomePage' : $segment;
            @endphp
            <li class="breadcrumb-item text-sm {{ $loop->last ? 'text-dark active' : '' }} text-capitalize">
                @if (!$loop->last)
                    <a class="opacity-5 text-dark" href="{{ url(implode('/', array_slice($segments, 0, $key + 1))) }}">
                        {{ ucfirst($segment) }}
                    </a>
                @else
                    {{ ucfirst($segment) }}
                @endif
            </li>
        @endforeach
    </ol>
    @php
        $lastSegment = last($segments) === 'panel' ? 'HomePage' : last($segments);
    @endphp
    {{-- <h6 class="font-weight-bolder mb-0 text-capitalize">
        {{ ucfirst($lastSegment ?? 'HomePage') }}
    </h6> --}}
</nav>
