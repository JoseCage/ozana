<?php

namespace WatchLater\Modules\WatchLists\Database\Factories;

use WatchLater\Support\Database\ModelFactory;

use WatchLater\Modules\WatchLists\WatchList;

/*
|--------------------------------------------------------------------------
| User Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class WatchListFactory extends ModelFactory
{
    protected $model = WatchList::class;

    protected function fields()
    {
        static $password;

        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name(),
            //'instagram_handler' => strtolower($this->faker->userName()),
            'user_if' => factory(User::class)->make()->id
        ];
    }
}
