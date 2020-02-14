<?php

namespace WatchLater\Modules\WatchLists\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieWatchListTable extends Migration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create(
            'movie_watch_list', function (Blueprint $table) {
                $table->bigInteger('uid')->autoIncrement();
                $table->uuid('id')->unique();
                $table->dateTime('watch_date');
                $table->uuid('movie_id');
                $table->uuid('channel_id')->nullable();
                $table->uuid('watch_list_id');
                $table->timestamps();

                $table->foreign('movie_id')
                    ->references('id')
                    ->on('movies');
                $table->foreign('channel_id')
                    ->references('id')
                    ->on('channels');
                $table->foreign('watch_list_id')
                    ->references('id')
                    ->on('watchlists');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('movie_watch_list');
    }
}
