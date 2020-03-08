<?php

namespace Ozana\Modules\WatchLists\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;
use Ozana\Modules\WatchLists\Database\Migrations\CreateMovieTypesTable;
use Ozana\Modules\WatchLists\Database\Migrations\CreateWatchListsTable;
use Ozana\Modules\WatchLists\Database\Migrations\CreateChannelsTable;
use Ozana\Modules\WatchLists\Database\Migrations\CreateMoviesTable;
use Ozana\Modules\WatchLists\Database\Migrations\CreateMovieWatchListTable;
use Ozana\Modules\WatchLists\Database\Factories\WatchListFactory;
use Ozana\Modules\Users\Database\Seeders\WatchListsTableSeeder;

class WatchListServiceProvider extends ServiceProvider
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
                CreateMovieTypesTable::class,
                CreateChannelsTable::class,
                CreateMoviesTable::class,
                CreateWatchListsTable::class,
                CreateMovieWatchListTable::class
            ]
        );
    }

    public function registerFactories()
    {
         (new WatchListFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders(
            [
            WatchListsTableSeeder::class
            ]
        );
    }
}
