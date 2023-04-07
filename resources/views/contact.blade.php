@extends("layouts.main")

@section("title", __("pages/contact.title"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("/css/pages/ContactPage.css") }}">
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include("components.status-message")
                <h1>
                    {{ __("pages/contact.title") }}
                </h1>
                <div id="contactMethods" class="row justify-content-center">
                    <div class="col-12 col-md">
                        <div id="contact-form">
                            <form method="POST" action="{{ route("contact.send", [], false) }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("pages/contact.form.name") }}:</label>
                                    <input class="form-control" type="text" name="name" />
                                    @error("name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("pages/contact.form.email") }}:</label>
                                    <input class="form-control" type="email" name="email" />
                                    @error("email")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("pages/contact.form.subject") }}:</label>
                                    <input class="form-control" type="text" name="subject" />
                                    @error("subject")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label required-input">{{ __("pages/contact.form.body") }}:</label>
                                    <textarea class="form-control" name="body"></textarea>
                                    @error("body")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    {{ __("pages/contact.form.send") }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <div class="ms-md-3 row">
                            <div class="col-12">
                                <div class="contact-option">
                                    <h5 class="contact-option-title">{{ __("pages/contact.form.email") }}</h5>
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
