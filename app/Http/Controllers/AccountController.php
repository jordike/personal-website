<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => [ "required", "email" ],
            "password" => "required"
        ]);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $request->rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended(route("home"));
        }

        return redirect()
            ->route("login")
            ->with("error", __("status-messages/account.auth.email_or_password_incorrect"))
            ->withInput($request->all());
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");
    }

    public function profile()
    {
        return view("accounts.profile", [
            "account" => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            "firstName" => "nullable",
            "surname" => "nullable",
            "email" => [ "required", "email" ],
            "phoneNumber" => "nullable",
            "newPassword" => [ "nullable", Password::default() ],
            "confirmPassword" => "same:newPassword"
        ]);

        $user = auth()->user();
        $user->first_name = $request->firstName;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->name = $user->email;

        if ($request->password != null && $request->confirmPassword != null && $request->password === $request->confirmPassword) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect()
            ->refresh()
            ->with("success", __("status-messages/account.account.edited"));
    }

    public function resendVerifyEmail()
    {
        auth()->user()->SendEmailVerificationNotification();

        return redirect()
            ->back()
            ->with("success", __("status-messages/account.email.mail-sent"));
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()
            ->route("profile")
            ->with("success", __("status-messages/account.mail.verified"));
    }
}
