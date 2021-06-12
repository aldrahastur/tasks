<?php

namespace App\Providers;

use App\Models\Customer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * kriteas customization
         */

        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * kriteas customization
         */
        Paginator::useBootstrap();
        Cashier::useCustomerModel(Customer::class);
    }
}
