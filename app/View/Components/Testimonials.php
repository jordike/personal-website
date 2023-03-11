<?php

namespace App\View\Components;

use App\Models\Testimonial;
use Illuminate\View\Component;

class Testimonials extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $testimonials = Testimonial::all();

        return view('components.testimonials', [
            "testimonials" => $testimonials
        ]);
    }
}
