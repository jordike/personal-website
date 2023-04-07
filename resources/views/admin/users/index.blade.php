@extends("layouts.main")

@section("title", __("pages/admin/users/index.title"))

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
        @include("components.status-message")
        <h1 class="mb-2">
            <span class="me-3">{{ __("pages/admin/users/index.title") }}</span>
            <a class="btn btn-primary rounded-pill" href="{{ route("admin.users.create", [], false) }}">
                <i class="fa-solid fa-plus"></i>
            </a>
        </h1>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>{{ __("pages/admin/users/index.table-header.id") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.first-name") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.surname") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.email") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.phone-number") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.created-at") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.last-edited") }}</th>
                    <th>{{ __("pages/admin/users/index.table-header.administrator") }}</th>
                    <th class="no-sort"></th>
                    <th class="no-sort"></th>
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
                        <td class="text-center align-middle h5">
                            @if ($account->administrator)
                                <i class="fa-solid fa-check text-success"></i>
                            @else
                                <i class="fa-solid fa-x text-danger"></i>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-secondary rounded-pill" type="button" href="{{ route("admin.users.edit", $account, false) }}">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            @if (auth()->user()->id != $account->id)
                                <div class="d-flex justify-content-center">
                                    <form method="POST" action="{{ route("admin.users.destroy", $account, false) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger rounded-pill" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
