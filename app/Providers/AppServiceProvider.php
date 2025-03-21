<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Chia sẻ biến $company cho tất cả view
        View::composer('*', function ($view) {
            $company = CompanyProfile::first(); // Lấy thông tin công ty
            $view->with('company', $company);
        });
    }
}
