<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickAndDropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_and_drops', function (Blueprint $table) {
            $table->string('location_type');
            $table->string('company_name');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('country');
            $table->string('post_code');
            $table->string('contact_number');
            $table->string('reference_number');
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
        Schema::dropIfExists('pick_and_drops');
    }
}
