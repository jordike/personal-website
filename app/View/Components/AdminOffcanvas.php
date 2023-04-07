<?php

namespace App\View\Components;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\View\Component;

class AdminOffcanvas extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $projects = Project::all();
        $experiences = Experience::all();
        $testimonials = Testimonial::all();

        return view("components.admin-offcanvas", [
            "projects" => $projects,
            "experiences" => $experiences,
            "testimonials" => $testimonials
        ]);
    }
}
