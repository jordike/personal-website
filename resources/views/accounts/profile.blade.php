@extends("layouts.main")

@section("title", __("pages/accounts/profile.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                <form method="POST" action="{{ route("profile.edit", [], false) }}">
                    @method("PUT")
                    @csrf
                    <x-status-message></x-status-message>
                    <h1>{{ __("pages/accounts/profile.title") }}</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("pages/accounts/profile.form.first-name") }}</label>
                                <input class="form-control" type="text" name="firstName" value="{{ $account->first_name }}" />
                                @error("firstName")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("pages/accounts/profile.form.surname") }}</label>
                                <input class="form-control" type="text" name="surname" value="{{ $account->surname }}" />
                                @error("surname")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/accounts/profile.form.email") }}:</label>
                        <input class="form-control" type="email" name="email" value="{{ $account->email }}" />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">{{ __("pages/accounts/profile.form.phone-number") }}:</label>
                        <input class="form-control" type="tel" name="phoneNumber" value="{{ $account->phone_number }}" />
                        @error("phoneNumber")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4>{{ __("pages/accounts/profile.form.password.label") }}</h4>
                        <div class="form-group">
                            <label class="form-label">{{ __("pages/accounts/profile.form.password.current-password") }}</label>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">{{ __("pages/accounts/profile.form.password.password") }}</label>
                                    <input class="form-control" type="password" name="password" />
                                    @error("password")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label">{{ __("pages/accounts/profile.form.password.confirm-password") }}</label>
                                    <input class="form-control" type="password" name="confirmPassword" />
                                    @error("confirmPassword")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("pages/accounts/profile.form.save") }}
                        </button>
                        @if ($account->email_verified_at == null)
                            <a class="btn btn-secondary" href="{{ route("verification.notice") }}">
                                <i class="fa-solid fa-envelope"></i>
                                {{ __("pages/accounts/profile.form.verify-email") }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
