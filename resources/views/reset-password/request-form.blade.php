@extends("layouts.main")

@section("title", __("pages/reset-password/request-form.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                @include("components.status-message")
                <form method="POST" action="{{ route("password.email") }}">
                    @csrf
                    <h1>{{ __("pages/reset-password/request-form.title") }}</h1>
                    <div class="form-group">
                        <label for="email">{{ __("pages/reset-password/request-form.form.email") }}</label>
                        <input id="email" class="form-control" type="email" name="email">
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">
                        {{ __("pages/reset-password/request-form.form.submit") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
