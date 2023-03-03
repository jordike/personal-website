@props(["id", "title"])

<section class="mb-4">
    <h3 class="mb-3">
        {{ __($title) }}
        <a class="btn btn-primary ms-1 rounded-pill" href="{{ route("$id.create", [], false) }}">
            <i class="fa-solid fa-plus"></i>
        </a>
    </h3>
    {{ $slot }}
</section>
