<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('kategori_ad');
            $table->integer('kategori_ust')->nullable();
            $table->string('kategori_seourl')->nullable();
            $table->integer('kategori_sira');
            $table->enum('kategori_durum',['1','0']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
