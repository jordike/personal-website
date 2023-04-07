@extends("layouts.main")

@section("title", __("pages/login.title"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/LoginPage.css") }}" />
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-6">
                <x-status-message></x-status-message>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ __("pages/login.disclaimer") }}
                </div>
                <h1>{{ __("pages/login.title") }}</h1>
                <form method="POST" action="{{ route("login.post") }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/login.form.email") }}</label>
                        <input class="form-control" type="email" name="email" autocomplete="username" value="{{ old("email") }}" />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/login.form.password") }}</label>
                        <input class="form-control" type="password" name="password" autocomplete="current-password" />
                        @error("password")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input id="rememberMe" class="form-check-input" name="rememberMe" type="checkbox" />
                            <label class="form-label" for="rememberMe">{{ __("pages/login.form.remember-me") }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="login-submit" type="submit" class="w-100 btn btn-primary">
                            {{ __("pages/login.form.login") }}
                        </button>
                    </div>
                    <a class="link" href="{{ route("password.request") }}">
                        {{ __("pages/login.reset-password") }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
