@extends("layouts.main")

@section("title", __("Account aanmaken"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.users.store", [], false) }}">
                    @csrf
                    <h1>{{ __("Account aanmaken") }}</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("Voornaam") }}:</label>
                                <input class="form-control" type="text" name="firstName" />
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("Achternaam") }}:</label>
                                <input class="form-control" type="text" name="surname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("E-mail") }}:</label>
                        <input class="form-control" type="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Telefoonnummer") }}:</label>
                        <input class="form-control" type="text" name="phoneNumber" />
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Wachtwoord") }}:</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-pen"></i>
                        {{ __("Aanmaken") }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route("admin.users.index", [], false) }}"">
                        {{ __("Annuleren") }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
