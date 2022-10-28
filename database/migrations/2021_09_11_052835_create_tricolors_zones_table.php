<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTricolorsZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tricolors_zones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tricolors')->unsigned();
            $table->bigInteger('id_zones')->unsigned();

            $table->foreign('id_tricolors')->references('id')->on('tricolors')->onDelete('cascade');
            $table->foreign('id_zones')->references('id')->on('zones')->onDelete('cascade');
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
        Schema::dropIfExists('tricolors_zones');
    }
}
