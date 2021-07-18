<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackegeServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packege_service_details', function (Blueprint $table) {
            $table->id();
            $table->string('package_type');
            $table->string('service_type');
            $table->string('collection_date');
            $table->string('collection_time');
            $table->string('dimensions_unit');
            $table->string('quantity');
            $table->enum('loading',   ['driver required to load',   'goods will be loaded']);
            $table->enum('unloading', ['driver required to unload', 'goods will be unloaded']);
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight_unit');
            $table->string('weight');
            $table->string('quotation_price');
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
        Schema::dropIfExists('packege_service_details');
    }
}
