<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::controller(AuthController::class)->group(function() {
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
    Route::get("create-account", "index")->name("admin.create-account");
    Route::post("create-account", "create_account")->name("admin.create-account.post");
});
