<?php

namespace App\Http\Controllers;

use App\Notifications\ContactNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required|max:20",
            "body" => "required"
        ]);

        if (auth()->check()) {
            $user = auth()->user();
            $user->notify(new ContactNotification($request->name, $request->email, $request->subject, $request->body));
        }

        return redirect()
            ->route("contact")
            ->with("message", "Email sent");
    }
}
