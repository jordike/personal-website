<div id="testimonials" class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 justify-content-center">
    @if (count($testimonials) > 0)
        @foreach ($testimonials as $testimonial)
            <div class="col testimonial">
                <div class="testimonial-body shadow-sm">
                    <div class="testimonial-header">
                        <i class="fa-solid fa-quote-left testimonial-quote"></i>
                    </div>
                    <div class="testimonial-content">
                        {{ $testimonial["content"] }}
                    </div>
                    <div class="testimonial-footer text-muted">
                        {{ $testimonial["reviewer_name"] }}@if ($testimonial["reviewer_function"] != null), {{ $testimonial["reviewer_function"] }} @endif
                        {{-- <span class="float-end">{{ date_create($testimonial["reviewed_on"])->format("Y") }}</span> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-muted text-center">
            {{ __("pages/homepage.no-testimonials") }}
        </p>
    @endif
</div>
