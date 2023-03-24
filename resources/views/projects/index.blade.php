@extends("layouts.main")

@section("title", __("Projecten"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/components/ListComponent.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/pages/ProjectsPage.css") }}" />
@endsection

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container">
                <h1 class="mb-3 text-center text-sm-start">{{ __("Projecten") }}</h1>
                @if (count($projects) == 0)
                    <span>{{ __("Er zijn geen projecten opgeslagen in de database.") }}</span>
                @else
                    @foreach ($projects as $project)
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <span class="vertical-line"></span>
                                <span class="circle">
                                    <span class="inner-circle"></span>
                                </span>
                            </div>
                            <div class="col-12 col-md-11">
                                <div class="container">
                                    <div class="list-item">
                                        <div class="list-item-header">
                                            <a href="{{ "#" . Str::slug($project->name) }}" id="{{ Str::slug($project->name) }}">
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
                                                            <h6 class="list-item-body-section-title">
                                                                {{ __("Programmeertalen") }}
                                                            </h6>
                                                            @foreach (explode(",", $project->programming_languages) as $programmingLanguage)
                                                                <div class="badge bg-secondary">
                                                                    {{ $programmingLanguage }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @if ($project->tools != null)
                                                        <div class="mb-3">
                                                            <h6 class="list-item-body-section-title">
                                                                {{ __("Hulpmiddelen") }}
                                                            </h6>
                                                            @foreach (explode(",", $project->tools) as $tool)
                                                                <div class="badge bg-secondary">
                                                                    {{ $tool }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-item-footer">
                                            @if ($project->links != null)
                                                @foreach (explode(",", $project->links) as $link)
                                                    <a class="me-2 d-block d-sm-inline mb-1 mb-sm-0" href="{{ $link }}" target="_blank">
                                                        <i class="fa-solid fa-earth"></i>
                                                        {{ $link }}
                                                    </a>
                                                @endforeach
                                            @endif
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
