@extends("layouts.main")

@section("title", __("Account bewerken"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.users.update", $account, false) }}">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="id" value="{{ $account->id }}" />
                    <h1>{{ __("Account bewerken") }}</h1>
                    <section class="form-group">
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
                            <label class="form-label required-input">{{ __("E-mail") }}:</label>
                            <input class="form-control" type="email" name="email" value="{{ $account->email }}" />
                            @error("email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{ __("Telefoonnummer") }}:</label>
                            <input class="form-control" type="text" name="phoneNumber" value="{{ $account->phone_number }}" />
                            @error("phoneNumber")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                    <section class="form-group">
                        <h4>{{ __("Wachtwoord veranderen") }}</h4>
                        <div class="row">
                            <div class="col">
                                <label class="form-label required-input">{{ __("Wachtwoord") }}:</label>
                                <input class="form-control" type="password" name="password" />
                                @error("password")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label required-input">{{ __("Bevestig wachtwoord") }}:</label>
                                <input class="form-control" type="password" name="confirmPassword" />
                                @error("confirmPassword")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </section>
                    <section class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("Aanmaken") }}
                        </button>
                        <a class="btn btn-secondary" href="{{ route("admin.users.index", [], false) }}">
                            {{ __("Annuleren") }}
                        </a>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection
