<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('empleados_id');
            $table->string('CODCC');
            $table->string('NOMBRECOSTOS');
            $table->integer('CEDULA');
            $table->string('NOMBRE');
            $table->string('APELLIDO');
            $table->string('TELEFONO');
            $table->string('DIRECCION');
            $table->date('FECNAC');
            $table->string('EMPRESA');
            $table->string('EMAIL');
            $table->string('SEXO');
            $table->string('ARL');
            $table->string('EPS');
            $table->string('contactoempresa');

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
        Schema::dropIfExists('empleados');
    }
}
