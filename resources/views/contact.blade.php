@extends("layouts.main")

@section("title", __("Contact"))

@section("content")
    @if (isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("contact.send", [], false) }}">
                    @csrf
                    <div class="form-group">
                        <h1>{{ __("Contact") }}</h1>
                        <p>
                            {{ __("Wilt u contact met mij opnemen? Laat dan vrijblijvend uw bericht hieronder achter, en ik zal zo spoedig mogelijk contact met u opnemen!") }}
                        </p>
                        <small class="text-muted">
                            {{ __("De gegevens die u hier achterlaat worden enkel gebruikt om contact met u op te nemen. Ze worden niet in de database opgeslagen of verwerkt.") }}
                        </small>
                    </div>
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
                    <button class="btn btn-primary" type="submit">
                        {{ __("Versturen") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
