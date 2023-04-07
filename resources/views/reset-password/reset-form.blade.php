@extends("layouts.main")

@section("title", __("pages/reset-password/reset-form.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                @include("components.status-message")
                <form method="POST" action="{{ route("password.update", $token) }}">
                    @csrf
                    <h1>{{ __("pages/reset-password/reset-form.title") }}</h1>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label class="form-label" for="email">{{ __("pages/reset-password/reset-form.form.email") }}</label>
                        <input class="form-control" id="email" type="email" name="email" />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="password">{{ __("pages/reset-password/reset-form.form.password") }}</label>
                                <input class="form-control" id="password" type="password" name="password" />
                                @error("password")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" for="passwordConfirmation">{{ __("pages/reset-password/reset-form.form.confirm-password") }}</label>
                                <input class="form-control" id="passwordConfirmation" type="password" name="password_confirmation" />
                                @error("password_confirmation")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">{{ __("pages/reset-password/reset-form.form.submit") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
