<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Localizacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rua', 255);
            $table->string('bairro', 255);
            $table->string('complemento', 255);
            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->on('evento')->references('id');
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
        Schema::drop('localizacao');
    }
}
