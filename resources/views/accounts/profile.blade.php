@extends("layouts.main")

@section("title", __("Mijn profiel"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                <form method="POST" action="{{ route("profile.edit", [], false) }}">
                    @method("PUT")
                    @csrf
                    <x-status-message></x-status-message>
                    <h1>{{ __("Mijn profiel") }}</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("Voornaam") }}:</label>
                                <input class="form-control" type="text" name="firstName" value="{{ $account->first_name }}" />
                                @error("firstName")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("Achternaam") }}:</label>
                                <input class="form-control" type="text" name="surname" value="{{ $account->surname }}" />
                                @error("surname")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("E-mail") }}:</label>
                        <input class="form-control" type="email" name="email" value="{{ $account->email }}" />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">{{ __("Telefoonnummer") }}:</label>
                        <input class="form-control" type="tel" name="phoneNumber" value="{{ $account->phone_number }}" />
                        @error("phoneNumber")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4>{{ __("Wachtwoord veranderen") }}</h4>
                        <div class="form-group">
                            <label class="form-label">{{ __("Huidig wachtwoord") }}</label>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">{{ __("Wachtwoord") }}:</label>
                                    <input class="form-control" type="password" name="password" />
                                    @error("password")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label">{{ __("Bevestig wachtwoord") }}:</label>
                                    <input class="form-control" type="password" name="confirmPassword" />
                                    @error("confirmPassword")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("Opslaan") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
