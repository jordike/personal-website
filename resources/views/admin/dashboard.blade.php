@extends("layouts.main")

@section("title", __("pages/admin/dashboard.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="container">
                <x-status-message></x-status-message>
                <h1 class="mb-3">{{ __("pages/admin/dashboard.title") }}</h1>
            </div>
        </div>
    </div>
@endsection
