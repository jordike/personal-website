@extends("layouts.main")

@section("title", __("pages/experience/edit.title"))

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
                    "title" => __("pages/experience/edit.component-header")
                ])
            </div>
        </div>
    </div>
@endsection
