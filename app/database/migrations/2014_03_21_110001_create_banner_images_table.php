<?php

use Illuminate\Database\Migrations\Migration;

class CreateBannerImagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_images', function($table) {
            $table->increments('banner_image_id');
            $table->string('banner_image_name');
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
        Schema::drop('banner_images');
    }

}
