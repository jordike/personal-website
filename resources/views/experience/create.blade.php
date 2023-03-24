@extends("layouts.main")

@section("title", __("Ervaring aanmaken"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/ExperiencePage.css") }}" />
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                @livewire("experience-form", [
                    "method" => "POST",
                    "title" => __("Aanmaken")
                ])
            </div>
        </div>
    </div>
@endsection
