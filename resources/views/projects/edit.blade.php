@extends("layouts.admin")

@section("title", "Project bewerken")

@section("scripts")
    <x-validation-scripts></x-validation-scripts>
@endsection

@section("content")
    <x-status-message></x-status-message>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("projects.update", [ "project" => $project ]) }}">
                    @method("PUT")
                    @csrf
                    <h1>Project bewerken</h1>
                    <input type="hidden" name="id" value="{{ $project->id }}" />
                    <div class="form-group">
                        <label class="form-label required-input">Naam:</label>
                        <input class="form-control" type="text" name="name" value="{{ $project->name }}" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">Omschrijving:</label>
                        <textarea class="form-control" name="description">{{ $project->description }}</textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Programmeertalen:</label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" type="text" name="programmingLanguages" value="{{ $project->programmingLanguages }}" />
                        @error("programmingLanguages")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hulpmiddelen:</label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" type="text" name="tools" value="{{ $project->tools }}" />
                        @error("tools")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Links:</label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" name="links" value="{{ $project->links }}" />
                        @error("links")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            Bewerken
                        </button>
                        <a class="btn btn-secondary" href="{{ route("projects.index") }}">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
