<?php

namespace App\Providers;

use App\Facades\Rest\RestClass;
use Illuminate\Support\ServiceProvider;

class RestFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('restClass',function(){
            return new RestClass;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
