<?php

namespace WatchLater\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use WatchLater\Modules\WatchLists\WatchList;

class WatchListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(WatchList::class, 2)->create();

        $this->command->info('WatchList created sucessfully!');

    }
}
