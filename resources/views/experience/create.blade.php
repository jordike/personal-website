@extends("layouts.main")

@section("title", __("Ervaring aanmaken"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/pages/ExperiencePage.css") }}" />
@endsection

@section("scripts")
    <script src="{{ asset("js/pages/experience.js") }}"></script>
    <script>
        window.addEventListener("load", () => {
            addNewFunction();
        });
    </script>
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("experience.store", [], false) }}">
                    @csrf
                    <h1>{{ __("Ervaring aanmaken") }}</h1>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Bedrijfsnaam") }}:</label>
                        <input class="form-control" type="text" name="companyName" />
                        @error("companyName")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Bedrijfswebsite") }}:</label>
                        <input class="form-control" type="url" name="companyWebsite" />
                        @error("companyWebsite")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="functions">
                        <h2>
                            {{ __("Functie(s)") }}
                            <button class="btn btn-primary" type="button" onclick="addNewFunction()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </h2>
                        <div id="functions"></div>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        {{ __("Aanmaken") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
