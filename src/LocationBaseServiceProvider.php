<?php

namespace Iyngaran\Location;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Iyngaran\Location\Facades\Location;
use Iyngaran\Location\Repositories\LocationRepository;
use Iyngaran\Location\Repositories\LocationRepositoryInterface;

class LocationBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    public function register()
    {
        $this->_registerRepositories();
        $this->commands(
            [
                Console\ProcessCommand::class
            ]
        );
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'iyngaran.location');

        $this->registerFacades();
        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            $this->webRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
        );
    }

    private function registerApiRoutes()
    {
        Route::group(
            $this->apiRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        }
        );
    }

    private function webRouteConfiguration()
    {
        return  [
            'prefix' => Location::path(),
            'middleware' => Location::middleware(),
            'namespace' => 'Iyngaran\Location\Http\Controllers'
        ];
    }

    private function apiRouteConfiguration()
    {
        return  [
            'prefix' => 'api/'.Location::path(),
            'middleware' => Location::middleware(),
            'namespace' => 'Iyngaran\Location\Http\Controllers\Api'

        ];
    }

    protected function registerPublishing()
    {
        $this->publishes(
            [
                __DIR__."/../config/iyngaran.category.php" => config_path('iyngaran.category.php')
            ], 'category-config'
        );
    }

    private function registerFacades()
    {
        $this->app->singleton(
            'Location', function ($app) {
            return new \Iyngaran\Location\Location();
        }
        );
    }

    private function _registerRepositories()
    {
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }
}