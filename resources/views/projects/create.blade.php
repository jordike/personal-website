@extends("layouts.main")

@section("title", __("Project aanmaken"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("projects.store", [], false) }}">
                    @csrf
                    <h1>{{ __("Project aanmaken") }}</h1>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Naam") }}:</label>
                        <input class="form-control" type="text" name="name" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Omschrijving") }}:</label>
                        <textarea class="form-control" name="description"></textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Programmeertalen") }}:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" type="text" name="programmingLanguages" />
                        @error("programmingLanguages")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hulpmiddelen:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" type="text" name="tools" />
                        @error("tools")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Links") }}:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" name="links" />
                        @error("links")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-plus"></i>
                            {{ __("Aanmaken") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
