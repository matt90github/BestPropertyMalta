<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('pages', function ($table) {

            $table->increments('page_id');
            $table->string('page_title');
            $table->longText('page_content');
            $table->boolean('page_isPublished')->default(true);
            $table->boolean('page_isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('pages');
    }
}