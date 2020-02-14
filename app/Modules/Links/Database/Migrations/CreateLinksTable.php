<?php

namespace WatchLater\Modules\Links\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
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
            'links', function (Blueprint $table) {
                $table->bigInteger('uid')->autoIncrement();
                $table->uuid('id')->unique();
                $table->string('url')->unique();
                $table->boolean('public')->default(false);
                $table->uuid('watchlist_id');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('watchlist_id')
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
        $this->schema->drop('links');
    }
}
