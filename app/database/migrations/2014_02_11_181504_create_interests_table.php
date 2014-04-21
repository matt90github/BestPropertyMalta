<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('interests', function ($table) {

            $table->increments('interest_id');
            $table->unsignedInteger('interest_customerId');
            $table->foreign('interest_customerId')
                ->references('customer_id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('interest_propertyId');
            $table->foreign('interest_propertyId')
                ->references('property_id')->on('properties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('interests');
    }
}