@extends("layouts.main")

@section("title", __("Ervaring bewerken"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/ExperiencePage.css") }}" />
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @livewire("experience-form", [
                    "id" => $experience->id,
                    "method" => "PUT",
                    "title" => __("Bewerken")
                ])
            </div>
        </div>
    </div>
@endsection
