@extends("layouts.main")

@section("title", "Testimonial bewerken")

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <form method="POST" action="{{ route("testimonials.update", $testimonial) }}">
                @csrf
                @method("PUT")
                <h1>Testimonial bewerken</h1>
                <div class="form-group">
                    <label for="reviewerName">Recesent naam:</label>
                    <input class="form-control required-input" type="text" name="reviewerName" value="{{ $testimonial->reviewer_name }}" />
                    @error("reviewerName")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewerFunction">Recesent functie:</label>
                    <input class="form-control" type="text" name="reviewerFunction" value="{{ $testimonial->reviewer_function }}" />
                    @error("reviewerFunction")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Testimonial:</label>
                    <textarea class="form-control required-input" name="content">{{ $testimonial->content }}</textarea>
                    @error("content")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewedOn">Testimonial datum:</label>
                    <input class="form-control required-input" type="date" name="reviewedOn" value="{{ $testimonial->reviewed_on }}" />
                    @error("reviewedOn")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        Aanmaken
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
