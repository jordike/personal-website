<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
            Notification::route("mail", env("ADMIN_EMAIL"))
                ->notify(new ContactNotification($request->name, $request->email, $request->subject, $request->body));
        }

        return redirect()
            ->route("contact")
            ->with("success", __("status-messages/contact.sent"));
    }
}
