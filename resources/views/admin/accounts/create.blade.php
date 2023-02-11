@extends("layouts.main")

@section("title", "Account aanmaken")

@section("scripts")
    <x-validation-scripts></x-validation-scripts>
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.create-account.post") }}">
                    @csrf
                    <h1>Account aanmaken</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Voornaam:</label>
                                <input class="form-control" type="text" name="firstName" />
                            </div>
                            <div class="col">
                                <label class="form-label">Achternaam:</label>
                                <input class="form-control" type="text" name="surname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">E-mail:</label>
                        <input class="form-control" type="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Telefoonnummer:</label>
                        <input class="form-control" type="text" name="phoneNumber" />
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">Wachtwoord:</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-pen"></i>
                        Aanmaken
                    </button>
                    <a class="btn btn-secondary" href="{{ route("admin") }}"">
                        Annuleren
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
