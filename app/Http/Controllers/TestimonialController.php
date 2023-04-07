<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize("perform-admin-task", auth()->user());

        return view("testimonials.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "reviewerName" => [ "required" ],
            "reviewerFunction" => [ "nullable" ],
            "content" => [ "required", "min:4" ],
            "reviewedOn" => [ "required", "date" ]
        ]);

        $testimonial = new Testimonial;
        $testimonial->reviewer_name = $request->reviewerName;
        $testimonial->reviewer_function = $request->reviewerFunction;
        $testimonial->content = $request->content;
        $testimonial->reviewed_on = $request->reviewedOn;
        $testimonial->save();

        return redirect()
            ->route("home")
            ->with("success", __("status-messages/testimonials.created"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize("perform-admin-task", auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $testimonial = Testimonial::find($id);

        return view("testimonials.edit", [
            "testimonial" => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "reviewerName" => [ "required" ],
            "reviewerFunction" => [ "nullable" ],
            "content" => [ "required", "min:4" ],
            "reviewedOn" => [ "required", "date" ]
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->reviewer_name = $request->reviewerName;
        $testimonial->reviewer_function = $request->reviewerFunction;
        $testimonial->content = $request->content;
        $testimonial->reviewed_on = $request->reviewedOn;
        $testimonial->update();

        return redirect()
            ->route("home")
            ->with("success", __("status-messages/testimonials.edited"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect()
            ->route("home")
            ->with("success", __("status-messages/testimonials.destroyed"));
    }
}
