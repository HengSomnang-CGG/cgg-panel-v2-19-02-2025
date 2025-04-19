@props(
    [
        'title' => '',
        'description' => '',
        'website_name' => '',
        'domain' => '',
        'image_icon' => '',
        'source' => '',
    ]
)

<div style="max-width: 700px;">
    <div class="d-flex align-items-center gap-2 text-sm">
        <div class="position-relative flex-shrink-0" style="width: 1.5rem; height:1.5rem;">
            <img loading="lazy" width="50" height="50" class="img-fluid" style="border-radius: 9999px" src="{{ $image_icon ?? '' }}" alt="Favicon">
        </div>
        <div class="d-flex flex-column text-dark" style="font-size: 12px;">
            <div>{{ $source }}</div>
            <span>{{ $domain }}</span>
        </div>
    </div>
    <div class="mt-2">
        <a href="{{ $website_name }}" class="text-decoration-none ">
            <div class="h5 link-underline-opacity-0 link-underline-opacity-100-hover text-link" style="    font-family: Arial, sans-serif;
    font-size: 20px;
    font-weight: 400;">
                {{ $title }}
            </div>
        </a>
        <p class="small">{{ $description }}</p>
    </div>
</div>

<style>
    .text-link {
        color: rgb(26 13 171 / var(--tw-text-opacity, 1));
        text-decoration: none;
    }

    .text-link:hover {
        text-decoration: underline;
    }
</style>
