<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('equipment_categories_id');
            $table->unsignedInteger('equipment_locations_id');
            $table->string('item_name');
            $table->string('item_description');
            $table->string('model_no');
            $table->string('serial_no');
            $table->string('property_no');
            $table->date('ac_date');
            $table->integer('unit_cost');
            $table->integer('status');
            $table->string('res_personnel');
            $table->string('remarks');
            $table->date('last_pm');
            $table->date('next_pm');
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
        Schema::dropIfExists('equipment');
    }
}
