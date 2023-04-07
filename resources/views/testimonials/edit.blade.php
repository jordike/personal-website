@extends("layouts.main")

@section("title", __("pages/testimonials/edit.title"))

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <form method="POST" action="{{ route("testimonials.update", $testimonial) }}">
                @csrf
                @method("PUT")
                <h1>{{ __("pages/testimonials/edit.title") }}</h1>
                <div class="form-group">
                    <label for="reviewerName">{{ __("pages/testimonials/edit.form.reviewer.name") }}</label>
                    <input class="form-control required-input" type="text" name="reviewerName" value="{{ $testimonial->reviewer_name }}" />
                    @error("reviewerName")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewerFunction">{{ __("pages/testimonials/edit.form.reviewer.function") }}</label>
                    <input class="form-control" type="text" name="reviewerFunction" value="{{ $testimonial->reviewer_function }}" />
                    @error("reviewerFunction")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">{{ __("pages/testimonials/edit.form.testimonial") }}</label>
                    <textarea class="form-control required-input" name="content">{{ $testimonial->content }}</textarea>
                    @error("content")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewedOn">{{ __("pages/testimonials/edit.form.date") }}</label>
                    <input class="form-control required-input" type="date" name="reviewedOn" value="{{ $testimonial->reviewed_on }}" />
                    @error("reviewedOn")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        {{ __("pages/testimonials/edit.form.submit") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
