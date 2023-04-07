@extends("layouts.main")

@section("title", __("pages/accounts/verify-email.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                @include("components.status-message")
                <h1>{{ __("pages/accounts/verify-email.title") }}</h1>
                <p>{{ __("pages/accounts/verify-email.description") }}</p>
                <form method="POST" action="{{ route("verification.resend-mail") }}">
                    @csrf
                    <button class="btn btn-primary me-1">
                        {{ __("pages/accounts/verify-email.button") }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route("profile") }}">
                        {{ __("pages/accounts/verify-email.go-back") }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
