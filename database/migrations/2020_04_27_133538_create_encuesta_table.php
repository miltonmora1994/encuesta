<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->id('empleados_id');
            $table->string('Covid19');
            $table->boolean('pregunta1'); 
            $table->string('pregunta1_resp')->nullable();
            $table->boolean('pregunta2');
            $table->string('pregunta2_resp')->nullable();
            $table->boolean('pregunta3');
            $table->string('pregunta3_resp')->nullable();
            $table->boolean('pregunta4');
            $table->string('pregunta4_resp')->nullable();
            $table->boolean('pregunta5');
            $table->string('pregunta5_resp')->nullable();
            $table->boolean('pregunta6');
            $table->string('pregunta6_resp')->nullable();
            $table->boolean('pregunta7');
            $table->string('pregunta7_resp')->nullable();
            $table->boolean('pregunta8');
            $table->string('pregunta8_resp')->nullable();
            $table->boolean('pregunta9');
            $table->string('pregunta9_resp')->nullable();
            $table->boolean('pregunta10');
            $table->string('pregunta10_resp')->nullable();
            $table->boolean('pregunta11');
            $table->string('pregunta11_resp')->nullable();
            $table->boolean('pregunta12');
            $table->string('pregunta12_resp')->nullable();
            $table->boolean('pregunta13');
            $table->string('pregunta13_resp')->nullable();
            $table->string('pregunta14');
            $table->string('pregunta15');
            $table->string('tipotrabajo')->nullable();
            $table->string('subtipopresencial')->nullable();
            $table->string('transporte')->nullable();
            $table->string('companeros');








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
        Schema::dropIfExists('encuesta');
    }
}
