<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('offers', function ($table) {

            $table->increments('offer_id');
            $table->decimal('offer_value', '10','2');
            $table->unsignedInteger('offer_propertyId');
            $table->foreign('offer_propertyId')
                ->references('property_id')->on('properties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('offer_buyerId');
            $table->foreign('offer_buyerId')
                ->references('customer_id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('offer_statusId');
            $table->foreign('offer_statusId')
                ->references('offer_status_id')->on('offer_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('offer_isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('offers');
    }
}