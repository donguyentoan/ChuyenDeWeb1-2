<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInforPayMentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inforpayments', function (Blueprint $table) {
            $table->id();
            $table->String('madonhang');
            $table->Double('sotien');
            $table->String('noidung');
            $table->String('maphanhoi');  
            $table->String('magiaodich'); 
            $table->String('manganhang'); 
            $table->Date('thoigian'); 
            $table->String('ketqua'); 
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
        Schema::dropIfExists('_infor_pay_ments');
    }
}
