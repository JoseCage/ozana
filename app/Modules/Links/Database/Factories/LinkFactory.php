<?php

namespace WatchLater\Modules\Links\Database\Factories;

use WatchLater\Support\Database\ModelFactory;

use WatchLater\Modules\Links\Link;
use WatchLater\Modules\WatchLists\WatchList;

/*
|--------------------------------------------------------------------------
| Link Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class LinkFactory extends ModelFactory
{
    protected $model = Link::class;

    protected function fields()
    {

        return [
            'id' => $this->faker->uuid,
            'url' => config('app.url') . '/link?list=' . $this->faker->uuid,// . str_random('50')
            'public' => array_random([true, false]),
            'watchlist_id' => factory(WatchList::class)->create()->id
        ];
    }
}
