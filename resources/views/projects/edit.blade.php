@extends("layouts.main")

@section("title", __("Project bewerken"))

@section("content")
    <x-status-message></x-status-message>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("projects.update", [ "project" => $project ], false) }}">
                    @method("PUT")
                    @csrf
                    <h1>{{ __("Project bewerken") }}</h1>
                    <input type="hidden" name="id" value="{{ $project->id }}" />
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Naam") }}:</label>
                        <input class="form-control" type="text" name="name" value="{{ $project->name }}" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("Omschrijving") }}:</label>
                        <textarea class="form-control" name="description">{{ $project->description }}</textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Programmeertalen") }}:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" type="text" name="programmingLanguages" value="{{ $project->programmingLanguages }}" />
                        @error("programmingLanguages")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("Hulpmiddelen") }}:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" type="text" name="tools" value="{{ $project->tools }}" />
                        @error("tools")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Links:</label>
                        <span class="form-label-subtitle text-muted">{{ __("Dit is een lijst gescheiden door komma's.") }}</span>
                        <input class="form-control" name="links" value="{{ $project->links }}" />
                        @error("links")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("Bewerken") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
