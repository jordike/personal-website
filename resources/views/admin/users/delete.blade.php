@extends("layouts.main")

@section("title", __("Account verwijderen"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.users.destroy", $account, false) }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $account->id }}" />
                    <h1>{{ __("Account verwijderen") }}</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">{{ __("Voornaam") }}:</label>
                                <input class="form-control" type="text" value="{{ $account->first_name }}" disabled />
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __("Achternaam") }}:</label>
                                <input class="form-control" type="text" value="{{ $account->surname }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("E-mail") }}:</label>
                        <input class="form-control" type="email" value="{{ $account->email }}" disabled />
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Telefoonnummer") }}:</label>
                        <input class="form-control" type="text" value="{{ $account->phone_number }}" disabled />
                    </div>
                    <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i>
                        {{ __("Verwijderen") }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route("admin.users.index", [], false) }}"">
                        {{ __("Annuleren") }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
