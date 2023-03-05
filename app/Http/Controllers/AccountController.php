<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $request->rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended(route("home"));
        }

        session()->flash("error", "account.email_or_password_incorrect");

        return redirect()
            ->route("login")
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

        session()->flash("success", "account.editted");

        return redirect()->refresh();
    }
}
