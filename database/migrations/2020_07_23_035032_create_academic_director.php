<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicDirector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_directors', function (Blueprint $table) {
            $table->increments('academicDirector_id');
            $table->unsignedInteger('academicDivision_id');
            $table->string('nameDirector');
            $table->unsignedInteger('gender_id');
            $table->string('nameEmail');
            $table->string('directorPhone')->nullable();
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
        Schema::dropIfExists('academicdirectors');
    }
}
