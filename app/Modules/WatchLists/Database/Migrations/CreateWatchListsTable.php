<?php

namespace WatchLater\Modules\WatchLists\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchListsTable extends Migration
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
            'watchlists', function (Blueprint $table) {
                $table->bigInteger('uid')->autoIncrement();
                $table->uuid('id')->unique();
                $table->string('name');
                $table->text('description')->nullable();
                $table->uuid('user_id');
                $table->boolean('public')->default(false);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
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
        $this->schema->drop('watchlists');
    }
}
