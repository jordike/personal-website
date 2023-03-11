<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

Route::middleware([ "locale", "verify-email" ])->group(function() {
    Route::view("/", "index")->name("home");
    Route::resource("/projects", ProjectsController::class)->names("projects");
    Route::resource("/experience", ExperienceController::class)->names("experience");
    Route::resource("/testimonials", TestimonialController::class)->names("testimonials");
    // Route::get("/curriculum-vitae", [CvController::class, "index"])->name("cv");
    Route::get("/contact", [ContactController::class, "index"])->name("contact");
    Route::post("/contact", [ContactController::class, "store"])->name("contact.send");

    Route::get("/locale/{locale}", LocaleController::class)->name("locale");

    Route::controller(AccountController::class)->group(function() {
        Route::middleware("guest")->group(function() {
            Route::view("/login", "login")->name("login");
            Route::post("/login", "login")->name("login.post");
        });
        Route::middleware("auth")->group(function() {
            Route::prefix("account")->group(function() {
                Route::get("profile", "profile")->name("profile");
                Route::put("profile", "update")->name("profile.edit");
            });
            Route::get("/logout", "logout")->name("logout");
        });
        Route::get("/account/verify-email", "verifyEmail")->name("verify-email");
    });

    Route::controller(AdminController::class)->prefix("/admin")->middleware("admin-only")->group(function() {
        Route::get("/", "index")->name("admin");
        Route::get("dashboard", "dashboard")->name("admin.dashboard");
        Route::resource("users", UsersController::class)->names("admin.users");
    });
});
