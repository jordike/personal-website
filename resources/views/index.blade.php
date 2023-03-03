@extends("layouts.main")

@section("title", "Home")

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/HomePage.css") }}" />
@endsection

@section("content")
    <section id="introduction">
        <div class="container">
            <h1 id="name">Jordi Keijzers</h1>

            <div class="function-title">
                @for ($index = 0; $index < strlen(env("FUNCTION_TITLE")); $index++)
                    <span class="function-title-character">
                        {{ env("FUNCTION_TITLE")[$index] }}
                    </span>
                @endfor
            </div>
        </div>
    </section>

    <section class="info-section">
        <div class="container">
            <h2 class="section-title">Lorem ipsum</h2>
            <p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipiscing elit. Maecenas dapibus lorem ac lorem ornare, quis suscipit enim lobortis. Donec vitae felis et enim pulvinar tincidunt. Vestibulum at porttitor leo. Fusce aliquam orci sed lacinia mattis. Phasellus nec elit et turpis tristique ultrices. Praesent ut nibh scelerisque, tincidunt tellus sed, condimentum dui. Mauris vulputate laoreet orci eget congue. Quisque facilisis magna vitae dui laoreet pharetra. Donec in metus nec nulla luctus gravida. Donec vel vestibulum metus.</p>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque nec finibus nibh. In id mi ex. Sed sit amet hendrerit mi. Pellentesque magna leo, venenatis sed tempor at, semper gravida sapien. Phasellus maximus tempor semper. Aliquam porttitor sagittis finibus.</p>
            <p>Maecenas scelerisque, tellus vitae rhoncus vestibulum, elit magna aliquet nulla, et lacinia diam est quis ex. Morbi lobortis urna sed felis egestas scelerisque. Vivamus leo nisl, finibus eu odio ac, tempus malesuada arcu. Curabitur molestie metus at accumsan rutrum. Fusce quis eros maximus, cursus leo eget, posuere tortor. Donec a interdum diam. Fusce posuere velit eros, et molestie tellus dictum sed. Proin nisi sem, finibus eu tristique quis, tempus in est. Integer scelerisque dictum enim, in sagittis nunc accumsan et. Curabitur vehicula metus urna, ut mattis nisi vulputate non. Curabitur varius luctus vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut luctus, mauris quis eleifend tincidunt, ante ante congue mauris, eu condimentum odio orci eu nunc. Donec egestas non magna a vestibulum.</p>
            </p>
        </div>
    </section>

    <section class="info-section">
        <div class="container">
            <h2 class="section-title">Lorem ipsum</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus lorem ac lorem ornare, quis suscipit enim lobortis. Donec vitae felis et enim pulvinar tincidunt. Vestibulum at porttitor leo. Fusce aliquam orci sed lacinia mattis. Phasellus nec elit et turpis tristique ultrices. Praesent ut nibh scelerisque, tincidunt tellus sed, condimentum dui. Mauris vulputate laoreet orci eget congue. Quisque facilisis magna vitae dui laoreet pharetra. Donec in metus nec nulla luctus gravida. Donec vel vestibulum metus.</p>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque nec finibus nibh. In id mi ex. Sed sit amet hendrerit mi. Pellentesque magna leo, venenatis sed tempor at, semper gravida sapien. Phasellus maximus tempor semper. Aliquam porttitor sagittis finibus.</p>
            <p>Maecenas scelerisque, tellus vitae rhoncus vestibulum, elit magna aliquet nulla, et lacinia diam est quis ex. Morbi lobortis urna sed felis egestas scelerisque. Vivamus leo nisl, finibus eu odio ac, tempus malesuada arcu. Curabitur molestie metus at accumsan rutrum. Fusce quis eros maximus, cursus leo eget, posuere tortor. Donec a interdum diam. Fusce posuere velit eros, et molestie tellus dictum sed. Proin nisi sem, finibus eu tristique quis, tempus in est. Integer scelerisque dictum enim, in sagittis nunc accumsan et. Curabitur vehicula metus urna, ut mattis nisi vulputate non. Curabitur varius luctus vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut luctus, mauris quis eleifend tincidunt, ante ante congue mauris, eu condimentum odio orci eu nunc. Donec egestas non magna a vestibulum.</p>
            </p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container text-center">
            <h2>Contact</h2>
            <p>Wilt u contact met mij opnemen? Druk dan snel op de contact knop!</p>
            <a id="contact-button" class="btn btn-primary rounded-pill" href="{{ route("contact", [], false) }}">Contact</a>
        </div>
    </section>
@endsection
