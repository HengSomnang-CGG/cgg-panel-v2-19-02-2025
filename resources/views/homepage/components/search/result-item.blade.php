@props([
    'title' => '',
    'description' => '',
    'website_name' => '',
    'domain' => '',
    'image_icon' => '',
    'source' => '',
])

@php
    use Illuminate\Support\Str;

    $link = Str::startsWith($domain, ['http://', 'https://']) ? $domain : 'https://' . $domain;
@endphp


<div style="max-width: 700px;">
    <div class="d-flex align-items-center gap-2 text-sm">
        <div class="position-relative flex-shrink-0" style="width: 1.5rem; height:1.5rem;">
            <img loading="lazy" width="50" height="50" class="img-fluid" style="border-radius: 9999px" src="{{ $image_icon ?? '' }}" alt="Favicon">
        </div>
        <div class="d-flex flex-column text-body description-text" style="font-size: 12px;">
            <div class="description-text">{{ $source }}</div>
            <span class="description-text">{{ $link }}</span>
        </div>
    </div>
    <div class="mt-2">
        <a href="{{ $link }}" class="text-decoration-none" >
            <div class="h5 link-underline-opacity-0 link-underline-opacity-100-hover text-link">
                {{ $title }}
            </div>
        </a>
        <p class="small description-text">{{ $description }}</p>
    </div>
</div>

<style>
    .text-link {
        color: rgb(26 13 171 / var(--tw-text-opacity, 1));
        text-decoration: none;
        transition: color 0.3s;
    }

    .text-link:hover {
        text-decoration: underline;
    }

    .description-text{
        font-size: 16px;
    }

    /* Theme-based adjustments */
    body.dark .text-link {
        color: #8ab4f8; /* lighter blue for dark background */
    }

    body.dark .description-text {
        color: #ccc;
    }

    body.dark .text-body {
        color: #aaa;
    }

    body.light .description-text,
    body.light .text-body {
        color: #333;
    }
</style>
