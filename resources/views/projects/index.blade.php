@extends("layouts.main")

@section("title", "Projecten")

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/components/ListComponent.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/pages/ProjectsPage.css") }}" />
@endsection

@section("content")
    <div class="row justify-content-center" style="width: 100%">
        <div class="col-md-6">
            <div class="container">
                <h1 class="mb-3">
                    Projecten
                    @auth
                        @if (auth()->user()->isAdministrator())
                            <a class="btn btn-primary align-self-end" href="{{ route("projects.create") }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        @endif
                    @endauth
                </h1>

                @if (count($projects) == 0)
                    <span>Er zijn geen projecten opgeslagen in de database.</span>
                @else
                    @foreach ($projects as $project)
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <span class="vertical-line"></span>
                                <span class="circle">
                                    <span class="inner-circle"></span>
                                </span>
                            </div>
                            <div class="col-11">
                                <div class="container">
                                    <div class="list-item">
                                        <div class="list-item-header">
                                            <a href="{{ "#" . urlencode($project->name) }}" id="{{ urlencode($project->name) }}">
                                                <h5 class="list-item-title">
                                                    {{ $project->name }}
                                                </h5>
                                            </a>
                                        </div>
                                        <div class="list-item-body p-3">
                                            <div class="row">
                                                <div class="col-12 col-xl-7">
                                                    <p class="project-description">{{ $project->description }}</p>
                                                </div>
                                                <div class="col-12 col-xl-5">
                                                    @if ($project->programming_languages != null)
                                                        <div class="mb-3">
                                                            <h6 class="list-item-body-section-title">Programmeertalen</h6>
                                                            @foreach (explode(",", $project->programming_languages) as $programmingLanguage)
                                                                <div class="badge bg-secondary">
                                                                    {{ $programmingLanguage }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @if ($project->tools != null)
                                                        <div class="mb-3">
                                                            <h6 class="list-item-body-section-title">Hulpmiddelen</h6>
                                                            @foreach (explode(",", $project->tools) as $tool)
                                                                <div class="badge bg-secondary">
                                                                    {{ $tool }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @if ($project->links != null)
                                                        <div class="mb-3">
                                                            <h6 class="list-item-body-section-title">Links</h6>
                                                            <ul>
                                                                @foreach (explode(",", $project->links) as $link)
                                                                    <li><a href="{{ $link }}" target="_Blank">{{ $link }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-item-footer">
                                            @auth
                                                @if (auth()->user()->isAdministrator())
                                                    <a class="btn btn-link p-0" href="{{ route("projects.edit", [ "project" => $project ]) }}">
                                                        Bewerken
                                                    </a>
                                                    <span class="text-muted">|</span>
                                                    <form class="d-inline" method="POST" action="{{ route("projects.destroy", [ "project" => $project ]) }}">
                                                        @method("DELETE")
                                                        @csrf
                                                        <button class="btn btn-link p-0">
                                                            Verwijderen
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
