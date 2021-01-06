<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use  App\Repositories\Interfaces\CategoryInterface;
use  App\Repositories\Repo\CategoryReponsitory;

use  App\Repositories\Interfaces\CityInterface;
use  App\Repositories\Repo\CityReponsitory;

use  App\Repositories\Interfaces\BrandInterface;
use  App\Repositories\Repo\BrandReponsitory;

use  App\Repositories\Interfaces\ColorInterface;
use  App\Repositories\Repo\ColorReponsitory;

use  App\Repositories\Interfaces\TagInterface;
use  App\Repositories\Repo\TagReponsitory;

use  App\Repositories\Interfaces\PostInterface;
use  App\Repositories\Repo\PostReponsitory;

use  App\Repositories\Interfaces\ProductInterface;
use  App\Repositories\Repo\ProductReponsitory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //đăng kí repositories
        $this->app->bind(
            CategoryInterface::class, 
            CategoryReponsitory::class
         );
        $this->app->bind(
            CityInterface::class, 
            CityReponsitory::class
        );
        $this->app->bind(
            BrandInterface::class, 
            BrandReponsitory::class
        );
        $this->app->bind(
            ColorInterface::class, 
            ColorReponsitory::class
        );
        $this->app->bind(
            TagInterface::class, 
            TagReponsitory::class
        );
        $this->app->bind(
            PostInterface::class, 
            PostReponsitory::class
        );
        $this->app->bind(
            ProductInterface::class, 
            ProductReponsitory::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
