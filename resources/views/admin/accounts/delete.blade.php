@extends("layouts.admin")

@section("title", "Verwijder account")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("admin.accounts.delete.post") }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $account->id }}" />
                    <h1>Account verwijderen</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Voornaam:</label>
                                <input class="form-control" type="text" value="{{ $account->first_name }}" disabled />
                            </div>
                            <div class="col">
                                <label class="form-label">Achternaam:</label>
                                <input class="form-control" type="text" value="{{ $account->surname }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">E-mail:</label>
                        <input class="form-control" type="email" value="{{ $account->email }}" disabled />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Telefoonnummer:</label>
                        <input class="form-control" type="text" value="{{ $account->phone_number }}" disabled />
                    </div>
                    <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i>
                        Verwijderen
                    </button>
                    <a class="btn btn-secondary" href="{{ route("admin.accounts.view-accounts") }}"">
                        Annuleren
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
