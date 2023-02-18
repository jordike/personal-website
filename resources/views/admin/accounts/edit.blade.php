@extends("layouts.admin")

@section("title", "Account aanmaken")

@section("scripts")
    <x-validation-scripts></x-validation-scripts>
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.accounts.edit.post") }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $account->id }}" />
                    <h1>Account bewerken</h1>
                    <section class="form-group">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Voornaam:</label>
                                    <input class="form-control" type="text" name="firstName" value="{{ $account->first_name }}" />
                                    @error("firstName")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label">Achternaam:</label>
                                    <input class="form-control" type="text" name="surname" value="{{ $account->surname }}" />
                                    @error("surname")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label required-input">E-mail:</label>
                            <input class="form-control" type="email" name="email" value="{{ $account->email }}" />
                            @error("email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefoonnummer:</label>
                            <input class="form-control" type="text" name="phoneNumber" value="{{ $account->phone_number }}" />
                            @error("phoneNumber")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                    <section class="form-group">
                        <h4>Wachtwoord aanpassen</h4>
                        <div class="row">
                            <div class="col">
                                <label class="form-label required-input">Wachtwoord:</label>
                                <input class="form-control" type="password" name="password" />
                                @error("password")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label required-input">Bevestig wachtwoord:</label>
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
                            Aanmaken
                        </button>
                        <a class="btn btn-secondary" href="{{ route("admin.accounts.view-accounts") }}"">
                            Annuleren
                        </a>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection
