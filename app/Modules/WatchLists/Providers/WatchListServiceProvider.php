<?php

namespace WatchLater\Modules\WatchLists\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;
use WatchLater\Modules\WatchLists\Database\Migrations\CreateMovieTypesTable;
use WatchLater\Modules\WatchLists\Database\Migrations\CreateWatchListsTable;
use WatchLater\Modules\WatchLists\Database\Migrations\CreateChannelsTable;
use WatchLater\Modules\WatchLists\Database\Migrations\CreateMoviesTable;
use WatchLater\Modules\WatchLists\Database\Migrations\CreateMovieWatchListTable;
use WatchLater\Modules\WatchLists\Database\Factories\WatchListFactory;
use WatchLater\Modules\Users\Database\Seeders\WatchListsTableSeeder;

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
