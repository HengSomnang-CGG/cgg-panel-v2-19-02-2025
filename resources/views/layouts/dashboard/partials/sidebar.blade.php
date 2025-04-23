<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white"
    id="sidenav-main">
    <div class="sidenav-header d-flex justify-content-center align-items-center">
        <a class="align-items-center d-flex m-0" href="/panel">
            <img loading="lazy" src="{{ asset('assets/img/logo.webp') }}" class="navbar-brand-img img-fluid" alt="..." style="max-width: 200px;">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @php
                $sidebarItems = config('sidebar');
                $userRole = auth()->check() ? auth()->user()->role : null; // Get the current user's role
            @endphp

            @foreach ($sidebarItems as $item)
                @if (in_array($userRole, $item['roles']))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                            href="{{ route($item['route']) }}">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                {!! $item['icon'] !!}
                            </div>
                            <span class="nav-link-text ms-1">{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>