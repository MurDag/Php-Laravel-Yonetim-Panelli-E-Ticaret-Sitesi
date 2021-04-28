<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunfotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunfotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('urun_id');
            $table->string('urunfoto_resim');
            $table->integer('urunfoto_sira');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urunfotos');
    }
}
