<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakkimizdasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hakkimizdas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('hakkimizda_baslik');
            $table->text('hakkimizda_icerik');
            $table->string('hakkimizda_video');
            $table->string('hakkimizda_vizyon');
            $table->string('hakkimizda_misyon');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hakkimizdas');
    }
}
