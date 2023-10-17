<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_informations', function (Blueprint $table) {
            $table->id();
            $table->String('name'); 
            $table->String('phone');
            $table->String('provides');
            $table->String('district');
            $table->String('wards');
            $table->String('apartmentNumber'); 
            $table->String('StreetNames'); 
            $table->String('details');
            $table->date('date_order');
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
        Schema::dropIfExists('_delivery_informations');
    }
}
