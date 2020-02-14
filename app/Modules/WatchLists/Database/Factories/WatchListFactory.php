<?php

namespace WatchLater\Modules\WatchLists\Database\Factories;

use WatchLater\Support\Database\ModelFactory;

use WatchLater\Modules\WatchLists\WatchList;
use WatchLater\Modules\Users\User;

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
            'name' => $this->faker->text(15),
            'user_id' => factory(User::class)->create()->id,
            'public' => array_random([true, false])
        ];
    }
}
