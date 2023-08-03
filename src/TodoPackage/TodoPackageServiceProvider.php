<?php

namespace Shibly\TodoPackage;

use Illuminate\Support\ServiceProvider;
use Shibly\TodoPackage\Models\Todo;

class TodoPackageServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Publish the package config file to the Laravel application config folder
        $this->publishes([
            __DIR__ . '/../TodoPackage/config/todo-package.php' => config_path('todo-package.php'),
        ], 'config');

        // Load the package routes
        $this->loadRoutesFrom(__DIR__ . '/../TodoPackage/routes.php');

        // Publish the package views to the Laravel application resources/views folder
        $this->publishes([
            __DIR__ . '/../TodoPackage/resources/views' => resource_path('views/vendor/todo-package'),
        ], 'views');

        // Publish the package migration to the Laravel application database/migrations folder
        $this->publishes([
            __DIR__ . '/../TodoPackage/database/migrations' => database_path('migrations'),
        ], 'migrations');
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../TodoPackage/config/todo-package.php', 'todo-package');
        $this->app->bind('todo', function () {
            return new Todo;
        });
    }

}