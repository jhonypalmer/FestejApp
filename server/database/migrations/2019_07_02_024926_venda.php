<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Venda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('valor');
            $table->date('data');
            $table->time('hora');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('evento_id')->on('evento')->references('id');
            $table->foreign('usuario_id')->on('usuario')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('venda');
    }
}
