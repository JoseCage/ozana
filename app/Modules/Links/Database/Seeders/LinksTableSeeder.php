<?php

namespace WatchLater\Modules\Links\Database\Seeders;

use Illuminate\Database\Seeder;

use WatchLater\Modules\Links\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Link::class, 2)->create();

        $this->command->info('Links created sucessfully!');

    }
}
