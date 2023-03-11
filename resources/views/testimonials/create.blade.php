@extends("layouts.main")

@section("title", "Testimonial aanmaken")

@section("content")
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <form method="POST" action="{{ route("testimonials.store") }}">
                @csrf
                <h1>Testimonial aanmaken</h1>
                <div class="form-group">
                    <label for="reviewerName">Recesent naam:</label>
                    <input class="form-control required-input" type="text" name="reviewerName" value="{{ old("reviewerName") }}" />
                    @error("reviewerName")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewerFunction">Recesent functie:</label>
                    <input class="form-control" type="text" name="reviewerFunction" value="{{ old("reviewerFunction") }}" />
                    @error("reviewerFunction")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Testimonial:</label>
                    <textarea class="form-control required-input" name="content">{{ old("content") }}</textarea>
                    @error("content")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reviewedOn">Testimonial datum:</label>
                    <input class="form-control required-input" type="date" name="reviewedOn" value="{{ old("reviewedOn") }}" />
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
