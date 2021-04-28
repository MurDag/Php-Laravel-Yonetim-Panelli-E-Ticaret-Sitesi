<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ayar_logo');
            $table->string('ayar_url');
            $table->string('ayar_title');
            $table->string('ayar_description');
            $table->string('ayar_keywords');
            $table->string('ayar_author');
            $table->string('ayar_tel');
            $table->string('ayar_gsm');
            $table->string('ayar_faks');
            $table->string('ayar_mail');
            $table->string('ayar_ilce');
            $table->string('ayar_il');
            $table->string('ayar_adres');
            $table->string('ayar_mesai');
            $table->string('ayar_maps');
            $table->string('ayar_analystic');
            $table->string('ayar_zopim');
            $table->string('ayar_facebook');
            $table->string('ayar_twitter');
            $table->string('ayar_google');
            $table->string('ayar_youtube');
            $table->string('ayar_smtphost');
            $table->string('ayar_smtpuser');
            $table->string('ayar_smtppassword');
            $table->string('ayar_smtpport');
            $table->enum('ayar_bakim',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayars');
    }
}
