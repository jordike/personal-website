<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view("/", "index")->name("home");
Route::resource("/projects", ProjectsController::class)->names("projects");
Route::resource("/experience", ExperienceController::class)->names("experience");
Route::get("/curriculum-vitae", [CvController::class, "index"])->name("cv");
Route::get("/contact", [ContactController::class, "index"])->name("contact");

Route::controller(AccountController::class)->group(function() {
    Route::middleware("guest")->group(function() {
        Route::view("/login", "login")->name("login");
        Route::post("/login", "login")->name("login.post");
    });
    Route::middleware("auth")->group(function() {
        Route::get("/account/profile", "profile")->name("profile");

        Route::get("/logout", "logout")->name("logout");
    });
});

Route::controller(AdminController::class)->prefix("/admin")->group(function() {
    Route::get("/", "index")->name("admin");

    Route::get("dashboard", "dashboard")->name("admin.dashboard");

    Route::prefix("accounts")->group(function() {
        Route::get("view-accounts", "view_accounts")->name("admin.accounts.view-accounts");

        Route::view("create-account", "admin.accounts.create")->name("admin.accounts.create");
        Route::post("create-account", "create_account")->name("admin.accounts.create.post");

        Route::get("edit-account/{user}", "edit_account")->name("admin.accounts.edit");
        Route::post("edit-account", "handle_edit_account")->name("admin.accounts.edit.post");

        Route::get("delete-account/{user}", "delete_account")->name("admin.accounts.delete");
        Route::post("delete-account", "handle_delete_account")->name("admin.accounts.delete.post");
    });
});
