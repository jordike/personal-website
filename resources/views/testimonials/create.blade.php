@extends("layouts.main")

@section("title", __("pages/testimonials/create.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <form method="POST" action="{{ route("testimonials.store") }}">
                @csrf
                <h1>{{ __("pages/testimonials/create.title") }}</h1>
                <div class="form-group">
                    <label for="reviewerName">{{ __("pages/testimonials/create.form.reviewer.name") }}</label>
                    <input class="form-control required-input" type="text" name="reviewerName" value="{{ old("reviewerName") }}" />
                    @error("reviewerName")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewerFunction">{{ __("pages/testimonials/create.form.reviewer.function") }}</label>
                    <input class="form-control" type="text" name="reviewerFunction" value="{{ old("reviewerFunction") }}" />
                    @error("reviewerFunction")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">{{ __("pages/testimonials/create.form.testimonial") }}</label>
                    <textarea class="form-control required-input" name="content">{{ old("content") }}</textarea>
                    @error("content")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewedOn">{{ __("pages/testimonials/create.form.date") }}</label>
                    <input class="form-control required-input" type="date" name="reviewedOn" value="{{ old("reviewedOn") }}" />
                    @error("reviewedOn")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        {{ __("pages/testimonials/create.form.submit") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
