<?php

namespace App\Providers;

use App\Api\OneFoodApi;
use App\Helpers\OneFoodApiFinder;
use App\Helpers\ProductApiSaver;
use App\Helpers\ProductFinder;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * TODO remove nested dependencies
         */
        $this->app->singleton(ProductFinder::class, function ($app) {
            return new ProductFinder((new OneFoodApiFinder((new OneFoodApi()))));
        });

        $this->app->singleton(ProductApiSaver::class, function ($app) {
            return new ProductApiSaver((new OneFoodApi()));
        });
    }
}