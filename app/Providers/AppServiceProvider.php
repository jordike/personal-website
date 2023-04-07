<?php

namespace App\Providers;

use App\Http\Middleware\EmailVerification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Password::defaults(function() {
            return Password::min(4)
                ->letters()
                ->numbers()
                ->mixedCase()
                ->symbols();
        });

        VerifyEmail::toMailUsing(function(object $notifiable, string $url) {
            return (new EmailVerification($url))->toMail($notifiable);
        });
    }
}
