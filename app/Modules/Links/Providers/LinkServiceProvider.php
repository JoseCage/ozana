<?php

namespace Ozana\Modules\Links\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use Ozana\Modules\Links\Database\Migrations\CreateLinksTable;

use Ozana\Modules\Links\Database\Factories\LinkFactory;
use Ozana\Modules\Links\Database\Seeders\LinksTableSeeder;

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
        $this->seeders(
            [
            LinksTableSeeder::class
            ]
        );
    }
}
