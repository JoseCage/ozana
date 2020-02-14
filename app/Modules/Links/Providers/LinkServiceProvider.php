<?php

namespace WatchLater\Modules\Links\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

class LinkServiceProvider extends ServiceProvider
{
    use LaravelMigrator;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    public function registerMigrations()
    {
        $this->migrations(
            [
                //
            ]
        );
    }

    public function registerFactories()
    {
         (new ClassFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders([
            //
        ]);
    }
}
