@extends("layouts.main")

@section("title", __("pages/admin/users/create.title"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.users.store", [], false) }}">
                    @csrf
                    <h1>{{ __("pages/admin/users/create.title") }}</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("pages/admin/users/create.form.first-name") }}</label>
                                <input class="form-control" type="text" name="firstName" />
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("pages/admin/users/create.form.surname") }}</label>
                                <input class="form-control" type="text" name="surname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/admin/users/create.form.email") }}</label>
                        <input class="form-control" type="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/admin/users/create.form.phone-number") }}</label>
                        <input class="form-control" type="text" name="phoneNumber" />
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/admin/users/create.form.password") }}</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="form-group">
                        <h4>{{ __("pages/admin/users/create.permissions.label") }}</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="administrator" id="administrator" />
                                    <label class="form-check-label" for="administrator">{{ __("pages/admin/users/create.permissions.administrator") }}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-pen"></i>
                        {{ __("pages/admin/users/create.create") }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route("admin.users.index", [], false) }}"">
                        {{ __("pages/admin/users/create.cancel") }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
