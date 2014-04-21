<?php

use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function($table) {
            $table->increments('image_id');
            $table->string('image_name');
            $table->unsignedInteger('image_propertyId');
            $table->foreign('image_propertyId')
                ->references('property_id')->on('properties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->tinyInteger('image_isPrimary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }

}
