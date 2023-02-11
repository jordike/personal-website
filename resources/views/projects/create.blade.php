@extends("layouts.main")

@section("scripts")
    <x-validation-scripts />
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="#">
                    <h1>Project aanmaken</h1>
                    <div class="form-group">
                        <label class="form-label required-input">Naam:</label>
                        <input class="form-control" type="text" name="name" />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">Omschrijving:</label>
                        <textarea class="form-control" asp-for="description"></textarea>
                        @error("description")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" asp-for="ProgrammingLanguages"></label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" type="text" asp-for="ProgrammingLanguages" />
                        <span class="text-danger" asp-validation-for="ProgrammingLanguages"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" asp-for="Tools"></label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" type="text" asp-for="Tools" />
                        <span class="text-danger" asp-validation-for="Tools"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" asp-for="Links"></label>
                        <span class="form-label-subtitle text-muted">Dit is een lijst gescheiden door komma's.</span>
                        <input class="form-control" asp-for="Links" />
                        <span class="text-danger" asp-validation-for="Links"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-plus"></i>
                            Aanmaken
                        </button>
                        <a class="btn btn-secondary" asp-controller="Projects" asp-action="Index">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
