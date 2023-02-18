@extends("layouts.admin")

@section("title", "Accountoverzicht")

@section("styles")
    <link rel="stylesheet" href="{{ asset("lib/datatables/datatables.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/pages/AccountsPage.css") }}" />
@endsection

@section("scripts")
    <script src="{{ asset("lib/datatables/datatables.js") }}"></script>
    <script src="{{ asset("js/pages/accounts.js") }}"></script>
@endsection

@section("content")
    <div class="container">
        <h1 class="mb-2">
            <span class="me-3">Accountoverzicht</span>
            <a class="btn btn-primary" href="{{ route("admin.accounts.create") }}">
                <i class="fa-solid fa-plus"></i>
                Account aanmaken
            </a>
        </h1>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>E-mail</th>
                    <th>Telefoonnummer</th>
                    <th>Aangemaakt</th>
                    <th>Laatst bewerkt</th>
                    <td class="no-sort"></td>
                    <td class="no-sort"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->first_name }}</td>
                        <td>{{ $account->surname }}</td>
                        <td><a href="mailto:{{ $account->email }}">{{ $account->email }}</a></td>
                        <td><a href="tel:{{ $account->phone_number }}">{{ $account->phone_number }}</a></td>
                        <td>{{ $account->created_at }}</td>
                        <td>{{ $account->updated_at }}</td>
                        <td class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-secondary" type="button" href="{{ route("admin.accounts.edit", [ "user" => $account ]) }}">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            @if (auth()->user()->id != $account->id)
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-danger" type="button" href="{{ route("admin.accounts.delete", [ "user" => $account ]) }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
