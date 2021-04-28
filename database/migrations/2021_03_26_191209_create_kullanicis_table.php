<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKullanicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanicis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('kullanici_resim')->nullable();
            $table->string('kullanici_tc');
            $table->string('kullanici_ad');
            $table->string('kullanici_soyad');
            $table->string('kullanici_mail');
            $table->string('kullanici_gsm');
            $table->string('kullanici_password');
            $table->string('kullanici_adres');
            $table->string('kullanici_il');
            $table->string('kullanici_ilce');
            $table->string('kullanici_unvan');
            $table->string('kullanici_yetki');
            $table->enum('kullanici_durum',['1','0']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanicis');
    }
}
