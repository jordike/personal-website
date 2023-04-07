<button id="admin-offcanvas-toggle" class="btn btn-primary rounded-pill shadow-lg" data-bs-toggle="offcanvas" data-bs-target="#admin-offcanvas">
    <i class="fa-solid fa-hammer"></i>
</button>

<div id="admin-offcanvas" class="offcanvas offcanvas-start text-bg-dark" data-bs-scroll="true">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title mb-3">
            {{ __("components/admin-offcanvas.title") }}
        </h3>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <x-admin.offcanvas-section id="projects" title="projects">
            @if ($projects->count() == 0)
                <p class="text-muted">
                    {{ __("components/admin-offcanvas.empty", [ "section" => strtolower(__("components/offcanvas-section.titles.projects")) ]) }}
                </p>
            @else
                @foreach ($projects as $project)
                    <x-admin.offcanvas-row id="projects" :item="$project" :name="$project->name"></x-admin.offcanvas-row>
                @endforeach
            @endif
        </x-admin.offcanvas-section>
        <x-admin.offcanvas-section id="experience" title="experience">
            @if ($experiences->count() == 0)
                <p class="text-muted">
                    {{ __("components/admin-offcanvas.empty", [ "section" => strtolower(__("components/offcanvas-section.titles.experience")) ]) }}
                </p>
            @else
                @foreach ($experiences as $experience)
                    <x-admin.offcanvas-row id="experience" :item="$experience" :name="$experience->company_name"></x-admin.offcanvas-row>
                @endforeach
            @endif
        </x-admin.offcanvas-section>
        <x-admin.offcanvas-section id="testimonials" title="testimonials">
            @if ($testimonials->count() == 0)
                <p class="text-muted">
                    {{ __("components/admin-offcanvas.empty", [ "section" => strtolower(__("components/offcanvas-section.titles.testimonials")) ]) }}
                </p>
            @else
                @foreach ($testimonials as $testimonial)
                    <x-admin.offcanvas-row id="testimonials" :item="$testimonial" :name="$testimonial->reviewer_name"></x-admin.offcanvas-row>
                @endforeach
            @endif
        </x-admin.offcanvas-section>
    </div>
</div>
