<?php

namespace WatchLater\Modules\WatchLists\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTypesTable extends Migration
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
            'movie_types', function (Blueprint $table) {
                $table->bigInteger('uid')->autoIncrement();
                $table->uuid('id')->unique();
                $table->string('name');
                $table->string('display_name');
                $table->text('description')->nullable();
                $table->string('icon', 20);
                $table->timestamps();
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
        $this->schema->drop('movie_types');
    }
}
