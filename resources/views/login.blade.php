@extends("layouts.main")

@section("title", "Inloggen")

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/LoginPage.css") }}" />
@endsection

@section("scripts")
    <x-validation-scripts></x-validation-scripts>
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-6">
                <x-status-message></x-status-message>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    U kunt niet zelf een account aanmaken. Deze worden, indien noodzakelijk, enkel door de beheerder aangemaakt.
                </div>
                <h1>Login</h1>
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">E-mail:</label>
                        <input class="form-control" type="email" name="email" autocomplete="username" value="{{ old("username") }}" />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Wachtwoord:</label>
                        <input class="form-control" type="password" name="password" autocomplete="current-password" />
                        @error("password")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input class="form-check-input" name="rememberMe" type="checkbox" value="{{ old("rememberMe") }}" />
                            <label class="form-label">Blijf ingelogd</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="login-submit" type="submit" class="w-100 btn btn-primary">
                            Inloggen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
