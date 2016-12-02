<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Agent\ServiceAgent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ServiceAgent', function ($app) {
            return new ServiceAgent(new \GuzzleHttp\Client(), env('ES_HOST'), env('ES_PORT'));
        });
    }
}
