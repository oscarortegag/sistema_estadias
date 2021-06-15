<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->increments('egresados_id');
            $table->string('apellido_paterno',50);
            $table->string('apellido_materno', 50);
            $table->string('nombre', 50);
            $table->unsignedInteger('period_id');
            $table->string('carrera');
            $table->string('correo_electronico', 50);
            $table->string('numero_telefono', 20);
            $table->string('año_egreso');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresados');
    }
}
