<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('siparis_no');
            $table->integer('kullanici_id');
            $table->float('siparis_toplam',9,2);
            $table->string('siparis_tip');
            $table->string('siparis_banka');
            $table->enum('siparis_odeme',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sipariss');
    }
}
