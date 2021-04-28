<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparisDetaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis_detays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('siparis_id');
            $table->integer('urun_id');
            $table->float('urun_fiyat',9,2);
            $table->integer('urun_adet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparis_detays');
    }
}
