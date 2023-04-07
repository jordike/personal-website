@extends("layouts.main")

@section("title", __("pages/projects/create.title"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route("projects.store", [], false) }}">
                    @csrf
                    <h1>{{ __("Project aanmaken") }}</h1>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/projects/create.form.name") }}</label>
                        <input class="form-control" type="text" name="name" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">{{ __("pages/projects/create.form.description") }}</label>
                        <textarea class="form-control" name="description"></textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/create.form.programming-languages") }}</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/create.form.comma-seperated-list") }}</span>
                        <input class="form-control" type="text" name="programmingLanguages" />
                        @error("programmingLanguages")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/create.form.tools") }}</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/create.form.comma-seperated-list") }}</span>
                        <input class="form-control" type="text" name="tools" />
                        @error("tools")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __("pages/projects/create.form.links") }}</label>
                        <span class="form-label-subtitle text-muted">{{ __("pages/projects/create.form.comma-seperated-list") }}</span>
                        <input class="form-control" name="links" />
                        @error("links")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-plus"></i>
                            {{ __("pages/projects/create.form.create") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
