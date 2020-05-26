<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enrollment');
            $table->unsignedInteger('id_period');
            $table->unsignedInteger('id_educative_program');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('name');
            $table->string('curp');
            $table->string('email');
            $table->string('alternateEmail');
            $table->string('cellPhone');
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
        Schema::dropIfExists('students');
    }
}
