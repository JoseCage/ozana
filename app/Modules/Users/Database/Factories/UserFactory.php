<?php

namespace WatchLater\Modules\Users\Database\Factories;

use WatchLater\Support\Database\ModelFactory;

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
class UserFactory extends ModelFactory
{
    protected $model = User::class;

    protected function fields()
    {
        static $password;

        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'username' => strtolower($this->faker->userName()),
            'phone' => $this->faker->phoneNumber,
            'avatar' => $this->faker->image,
            //'country_id' => factory(Country::class)->make()->id,
            //'bi' => ''
            'password' => $password ?: $password = bcrypt('secret'),
            'remember_token' => \Str::random(10),
        ];
    }
}
