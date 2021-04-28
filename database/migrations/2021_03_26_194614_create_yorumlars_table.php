<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYorumlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yorumlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('kullanici_id');
            $table->integer('urun_id');
            $table->text('yorum_detay');
            $table->enum('yorum_onay',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yorumlars');
    }
}
