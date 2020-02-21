<?php

namespace WatchLater\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;

use WatchLater\Modules\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(User::class, 10)->create(
            [
                'password' => bcrypt('secret'),
            ]
        );

        $this->command->info('Users created sucessfully!');

    }
}
