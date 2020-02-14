<?php

namespace WatchLater\Modules\WatchLists\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
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
            'movies', function (Blueprint $table) {
                $table->bigInteger('uid')->autoIncrement();
                $table->uuid('id')->unique();
                $table->string('title');
                $table->text('short_sinopse')->nullable();
                $table->text('sinopse')->nullable();
                $table->string('image')->nullable();
                $table->date('release_date')->nullable();
                $table->uuid('movie_type_id');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('movie_type_id')
                    ->references('id')
                    ->on('movie_types');
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
        $this->schema->drop('movies');
    }
}
