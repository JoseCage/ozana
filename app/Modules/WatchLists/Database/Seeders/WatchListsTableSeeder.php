<?php

namespace WatchLater\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;

class WatchListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(WatchList::class, 5)->create();

        $this->command->info('WatchList created sucessfully!');

    }
}
