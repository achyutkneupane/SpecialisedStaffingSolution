<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('isEmployee', function () {
            return auth()->user()->role == "employee";
        });
        Blade::if('isManager', function () {
            return auth()->user()->role == "manager";
        });
        Blade::if('isCustomer', function () {
            return auth()->user()->role == "customer";
        });
        Blade::if('isCustomerOrManager', function () {
            return auth()->user()->role == "customer" || auth()->user()->role == "manager";
        });
        Blade::if('isEmployeeOrManager', function () {
            return auth()->user()->role == "employee" || auth()->user()->role == "manager";
        });
    }
}
