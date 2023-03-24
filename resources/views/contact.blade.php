@extends("layouts.main")

@section("title", __("Contact"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("/css/pages/ContactPage.css") }}">
@endsection

@section("content")
    @if (isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>
                    {{ __("Contact") }}
                </h1>
                <div id="contactMethods" class="row justify-content-center">
                    <div class="col-12 col-md">
                        <div id="contact-form">
                            <form method="POST" action="{{ route("contact.send", [], false) }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("Naam") }}:</label>
                                    <input class="form-control" type="text" name="name" />
                                    @error("name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("E-mail") }}:</label>
                                    <input class="form-control" type="email" name="email" />
                                    @error("email")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("Onderwerp") }}:</label>
                                    <input class="form-control" type="text" name="subject" />
                                    @error("subject")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("Bericht") }}:</label>
                                    <textarea class="form-control" name="body"></textarea>
                                    @error("body")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <small class="text-muted d-block mb-3">
                                    Uw gegevens worden niet opgeslagen.
                                </small>
                                <button class="btn btn-primary" type="submit">
                                    {{ __("Versturen") }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <div class="ms-md-3 row">
                            <div class="col-12">
                                <div class="contact-option">
                                    <h5 class="contact-option-title">E-mail</h5>
                                    <a class="link mb-2 contact-option-content" href="mailto:{{ env("EMAIL_ADDRESS") }}">
                                        {{ env("EMAIL_ADDRESS") }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="contact-option">
                                    <h5 class="contact-option-title">LinkedIn</h5>
                                    <a class="link mb-2 contact-option-content" href="https://www.linkedin.com/in/jordi-keijzers-891486208">
                                        Jordi Keijzers
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="contact-option">
                                    <h5 class="contact-option-title">GitHub</h5>
                                    <a class="link mb-2 contact-option-content" href="https://www.github.com/jordike">
                                        @@jordike
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
