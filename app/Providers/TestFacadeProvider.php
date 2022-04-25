<?php

namespace App\Providers;

use App\Facades\Test1;
use App\Helpers\Test1Helper;
use Illuminate\Support\ServiceProvider;

class TestFacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        app()->singleton('test_facade' , function (){
            return new Test1Helper();
        });
        
    }
}
