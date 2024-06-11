<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        VerifyEmail::toMailUsing(function ($notifiable , $url){
            return (new MailMessage())->subject('تایید ایمیل')->view('auth.verify-email-notification', compact('url'));
        });
    }
}
