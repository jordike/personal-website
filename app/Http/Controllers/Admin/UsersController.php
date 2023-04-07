<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::all();

        return view("admin.users.index", [
            "accounts" => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize("perform-admin-task", auth()->user());

        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        Gate::authorize("perform-admin-task", auth()->user());

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
        $account->administrator = $request->administrator == true;
        $account->save();

        event(new Registered($account));

        return redirect()
            ->refresh()
            ->with("message", __("status-messages/users.user.created"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back(301);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        return view("admin.users.edit", [
            "account" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $request->validate([
            "id" => "required",
            "email" => [ "email", "required" ],
            "phoneNumber" => [ "nullable" ],
            "password" => [ "nullable", Password::defaults() ],
            "confirmPassword" => [ "same:password" ]
        ]);

        $user->name = $request->email;
        $user->email = $request->email;
        $user->first_name = $request->firstName;
        $user->surname = $request->surname;
        $user->phone_number = $request->phoneNumber;
        $user->administrator = $request->administrator == true;

        if ($request->password != null && $request->confirmPassword != null && $request->password === $request->confirmPassword) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect()
            ->route("admin.users.index")
            ->with("success", __("status-messages/users.user.edited"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize("perform-admin-task", auth()->user());

        $user->notifications()->delete();
        $user->delete();

        return redirect()
            ->route("admin.users.index")
            ->with("success", __("status-messages/users.user.deleted"));
    }
}
