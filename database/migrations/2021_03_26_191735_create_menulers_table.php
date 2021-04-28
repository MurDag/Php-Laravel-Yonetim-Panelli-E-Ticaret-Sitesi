<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('menu_ust')->nullable();
            $table->string('menu_ad');
            $table->text('menu_detay');
            $table->string('menu_url');
            $table->integer('menu_sira');
            $table->string('menu_seourl');
            $table->enum('menu_durum',['1','0']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
