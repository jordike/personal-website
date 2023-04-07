@extends("layouts.main")

@section("title", __("pages/projects/edit.title"))

@section("content")
    <x-status-message></x-status-message>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("projects.update", [ "project" => $project ], false) }}">
                    @method("PUT")
                    @csrf
                    <h1>{{ __("pages/projects/edit.title") }}</h1>
                    <input type="hidden" name="id" value="{{ $project->id }}" />
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/projects/edit.form.name") }}</label>
                        <input class="form-control" type="text" name="name" value="{{ $project->name }}" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/projects/edit.form.description") }}</label>
                        <textarea class="form-control" name="description">{{ $project->description }}</textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/edit.form.programming-languages") }}</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/edit.form.comma-seperated-list") }}</span>
                        <input class="form-control" type="text" name="programmingLanguages" value="{{ $project->programmingLanguages }}" />
                        @error("programmingLanguages")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/edit.form.tools") }}</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/edit.form.comma-seperated-list") }}</span>
                        <input class="form-control" type="text" name="tools" value="{{ $project->tools }}" />
                        @error("tools")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/edit.form.links") }}:</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/edit.form.comma-seperated-list") }}</span>
                        <input class="form-control" name="links" value="{{ $project->links }}" />
                        @error("links")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-pen"></i>
                            {{ __("pages/projects/edit.form.save") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
