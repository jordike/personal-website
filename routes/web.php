<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Auth\Notifications\ResetPassword;
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

Route::middleware([ "locale" ])->group(function() {
    Route::view("/", "index")->name("home");
    Route::resource("/projects", ProjectsController::class)->names("projects");
    Route::resource("/experience", ExperienceController::class)->names("experience");
    Route::resource("/testimonials", TestimonialController::class)->names("testimonials");
    // Route::get("/curriculum-vitae", [CvController::class, "index"])->name("cv");
    Route::get("/contact", [ContactController::class, "index"])->name("contact");
    Route::post("/contact", [ContactController::class, "store"])->name("contact.send");

    Route::get("/locale/{locale}", LocaleController::class)->name("locale");

    Route::get("/reset-password", [ ResetPasswordController::class, "showForm" ])->name("password.request");
    Route::post("/reset-password", [ ResetPasswordController::class, "sendLink" ])->name("password.email");
    Route::get("/reset-password/{token}", [ ResetPasswordController::class, "choosePassword" ])->name("password.reset");
    Route::post("/reset-password/reset", [ ResetPasswordController::class, "resetPassword" ])->name("password.update");

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
            Route::prefix("account/verify-email")->group(function() {
                Route::view("/", "accounts.verify-email")->name("verification.notice");
                Route::post("/", "resendVerifyEmail")->name("verification.resend-mail");
                Route::get("/{id}/{hash}", "verifyEmail")->name("verification.verify");
            });
            Route::get("/logout", "logout")->name("logout");
        });
    });

    Route::controller(AdminController::class)->prefix("/admin")->middleware("admin-only")->group(function() {
        Route::get("/", "index")->name("admin");
        Route::get("dashboard", "dashboard")->name("admin.dashboard");
        Route::resource("users", UsersController::class)->names("admin.users");
    });
});
