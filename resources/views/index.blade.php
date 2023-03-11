@extends("layouts.main")

@section("title", "Home")

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/HomePage.css") }}" />
@endsection

@section("content")
    <section id="introduction" class="mb-3">
        <div class="container">
            <h1 id="name">Jordi Keijzers</h1>

            <div class="function-title">
                @for ($index = 0; $index < strlen(env("FUNCTION_TITLE")); $index++)
                    <span class="function-title-character">{{ trim(env("FUNCTION_TITLE")[$index]) }}</span>
                @endfor
            </div>
        </div>
    </section>

    <section class="info-section" style="height: fit-content">
        <div class="container">
            <h2 class="section-title">
                {{ __("Over mij") }}
            </h2>
            <div id="about-me-row" class="row">
                <div class="col-12 col-lg-8">
                    {!! Str::markdown(__("homepage.about_me")) !!}
                </div>
                <div class="col-12 col-md ms-md-3">
                    <div id="portrait"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="info-section mb-5">
        <div class="container">
            <h2 class="section-title mb-3">
                {{ __("Testimonials") }}
            </h2>
            <x-testimonials class="mb-5"></x-testimonials>
        </div>
    </section>

    <section class="contact-section">
        <div class="container text-center">
            <h2>
                {{ __("Contact") }}
            </h2>
            <p>
                {{ __("Wilt u contact met mij opnemen? Druk dan snel op de contact knop!") }}
            </p>
            <a id="contact-button" class="btn btn-primary rounded-pill" href="{{ route("contact", [], false) }}">
                {{ __("Contact") }}
            </a>
        </div>
    </section>
@endsection
