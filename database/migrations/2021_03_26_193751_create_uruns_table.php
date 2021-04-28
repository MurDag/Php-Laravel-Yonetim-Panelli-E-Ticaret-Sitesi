<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uruns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('kategori_id');
            $table->string('urun_ad');
            $table->string('urun_seourl');
            $table->text('urun_detay');
            $table->float('urun_fiyat',9,2);
            $table->string('urun_video');
            $table->string('urun_keyword');
            $table->integer('urun_stok');
            $table->enum('urun_onecikar',['0','1']);
            $table->enum('urun_durum',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uruns');
    }
}
