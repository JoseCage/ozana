<?php

namespace WatchLater\Modules\Links\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use WatchLater\Modules\Links\Database\Migrations\CreateLinksTable;

use WatchLater\Modules\Links\Database\Factories\LinkFactory;

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
                CreateLinksTable::class
            ]
        );
    }

    public function registerFactories()
    {
         (new LinkFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders([
            //
        ]);
    }
}
