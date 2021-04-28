<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('banka_ad');
            $table->string('banka_iban');
            $table->integer('kullanici_id');
            $table->enum('banka_durum',['1','0']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankas');
    }
}
