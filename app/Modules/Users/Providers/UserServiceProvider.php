<?php

namespace Ozana\Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use Ozana\Modules\Users\Database\Migrations\CreateUsersTable;
use Ozana\Modules\Users\Database\Migrations\CreatePasswordResetsTable;
use Ozana\Modules\Users\Database\Seeders\UsersTableSeeder;
use Ozana\Modules\Users\Database\Factories\UserFactory;

class UserServiceProvider extends ServiceProvider
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
                CreateUsersTable::class,
                CreatePasswordResetsTable::class
            ]
        );
    }

    public function registerFactories()
    {
        (new UserFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders(
            [
            UsersTableSeeder::class
            ]
        );
    }
}
