@extends("layouts.main")

@section("title", __("pages/admin/users/edit.title"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.users.update", $account, false) }}">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="id" value="{{ $account->id }}" />
                    <h1>{{ __("pages/admin/users/edit.title") }}</h1>
                    <section class="form-group">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">{{ __("pages/admin/users/edit.form.first-name") }}</label>
                                    <input class="form-control" type="text" name="firstName" value="{{ $account->first_name }}" />
                                    @error("firstName")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label">{{ __("pages/admin/users/edit.form.surname") }}</label>
                                    <input class="form-control" type="text" name="surname" value="{{ $account->surname }}" />
                                    @error("surname")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label required-input">{{ __("pages/admin/users/edit.form.email") }}</label>
                            <input class="form-control" type="email" name="email" value="{{ $account->email }}" />
                            @error("email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{ __("pages/admin/users/edit.form.phone-number") }}</label>
                            <input class="form-control" type="text" name="phoneNumber" value="{{ $account->phone_number }}" />
                            @error("phoneNumber")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                    <section class="form-group">
                        <h4>{{ __("pages/admin/users/edit.form.password.label") }}</h4>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("pages/admin/users/edit.form.password.password") }}</label>
                                <input class="form-control" type="password" name="password" />
                                @error("password")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("pages/admin/users/edit.form.password.confirm-password") }}</label>
                                <input class="form-control" type="password" name="confirmPassword" />
                                @error("confirmPassword")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </section>
                    <section class="form-group">
                        <h4>{{ __("pages/admin/users/edit.form.permissions.label") }}</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="administrator" id="administrator" @if ($account->administrator) checked @endif />
                                    <label class="form-check-label" for="administrator">{{ __("pages/admin/users/edit.form.permissions.administrator") }}</label>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <section class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("pages/admin/users/edit.form.save") }}
                        </button>
                        <a class="btn btn-secondary" href="{{ route("admin.users.index", [], false) }}">
                            {{ __("pages/admin/users/edit.form.cancel") }}
                        </a>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection
