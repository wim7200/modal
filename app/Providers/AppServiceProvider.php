<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        // Model::preventLazyLoading(!app()->isProduction());
        Schema::defaultStringLength(125);

        // geeft problemen bij installatie, niet als het loopt...


        /*config([
            'global' => Setting::all([
            'name','value'
            ])
        ->keyBy('name') // key every setting by its name
        ->transform(function ($setting) {
            return $setting->value; // return only the value
        })
        ->toArray() // make it an array
    ]);*/


    }
}
