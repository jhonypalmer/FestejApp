<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_evento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->integer('minimo_idade');
            $table->timestamps();
        });

        Schema::table('evento', function (Blueprint $table) {
            $table->foreign('tipo_evento_id', 'tipo_evento_foreign')->on('tipo_evento')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento', function (Blueprint $table) {
            $table->dropForeign('tipo_evento_foreign');
        });

        Schema::drop('tipo_evento');
    }
}
