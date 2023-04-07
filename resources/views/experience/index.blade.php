@extends("layouts.main")

@section("title", __("pages/experience/index.title"))

@section("styles")
    <link rel="stylesheet" href="{{ asset("css/components/ListComponent.css") }}" />
@endsection

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <div class="container">
                <h1 class="mb-3">{{ __("pages/experience/index.title") }}</h1>

                @if (count($experiences) == 0)
                    <span>{{ __("pages/experience/index.no-experience") }}</span>
                @else
                    @foreach ($experiences as $experience)
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
                                            <a href="#{{ Str::slug($experience->company_name) }}" id="{{ Str::slug($experience->company_name) }}">
                                                <h5 class="list-item-title">
                                                    {{ $experience->company_name }}
                                                </h5>
                                            </a>
                                        </div>
                                        <div class="list-item-body">
                                            <div class="functions">
                                                @foreach ($experience->functions as $function)
                                                    <div class="function">
                                                        <h6 class="list-item-body-section-title no-margin">
                                                            {{ $function->function_title }}
                                                        </h6>
                                                        <span class="function-time text-muted d-block mb-1">
                                                            {{ $function->formatDate($function->start_date) }}
                                                            {{ __("time.up-to-including") }}
                                                            @if ($function->end_date != null)
                                                                {{ $function->formatDate($function->end_date) }}
                                                            @else
                                                                {{ __("time.present") }}
                                                            @endif
                                                            <small class="ms-1 text-muted">({{ $function->formatElapsedTime() }})</small>
                                                        </span>
                                                        <span class="function-description">
                                                            {{ $function->description }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="list-item-footer">
                                            @if ($experience->company_website != null)
                                                <a href="{{ $experience->company_website }}" target="_blank">
                                                    <i class="fa-solid fa-earth"></i>
                                                    {{ __("pages/experience/index.website") }}
                                                </a>
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
