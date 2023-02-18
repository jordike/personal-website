<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function dashboard() {
        return view("admin.dashboard");
    }

    public function view_accounts() {
        $accounts = User::all();

        return view("admin.accounts.view-accounts", [
            "accounts" => $accounts
        ]);
    }

    public function create_account(Request $request) {
        $request->validate([
            "email" => [ "email", "unique:users", "required" ],
            "password" => [ "min:4", "required" ]
        ]);

        $account = new User;
        $account->name = $request->email;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->first_name = $request->firstName;
        $account->surname = $request->surname;
        $account->phone_number = $request->phoneNumber;
        $account->save();

        return redirect()
            ->refresh()
            ->with("message", "account.created");
    }

    public function edit_account(User $user) {
        return view("admin.accounts.edit", [
            "account" => $user
        ]);
    }

    public function handle_edit_account(Request $request) {
        $request->validate([
            "id" => "required",
            "email" => [ "email", "required" ],
            "phoneNumber" => [ "nullable" ],
            "password" => [ "nullable", Password::defaults() ],
            "confirmPassword" => [ "same:password" ]
        ]);

        $account = User::find($request->id);

        $account->name = $request->email;
        $account->email = $request->email;
        $account->first_name = $request->firstName;
        $account->surname = $request->surname;
        $account->phone_number = $request->phoneNumber;

        if ($request->has("password") && $request->has("confirmPassword") && $request->password === $request->confirmPassword) {
            $account->password = Hash::make($request->password);
        }

        $account->update();

        session()->flash("message", "admin.account-editted");

        return redirect()->route("admin.accounts.view-accounts");
    }

    public function delete_account(User $user) {
        return view("admin.accounts.delete", [
            "account" => $user
        ]);
    }

    public function handle_delete_account(Request $request) {
        $account = User::find($request->id);
        $account->delete();

        session()->flash("message", "admin.accounts.deleted");

        return redirect()->route("admin.accounts.view-accounts");
    }
}
