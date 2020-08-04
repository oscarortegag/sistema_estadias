<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficialDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_documents', function (Blueprint $table) {
            $table->increments('oficialDocument_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('enterprise_id');
            $table->string('representativeName');
            $table->string('representativePosition');
            $table->string('companyName');
            $table->string('businessAdvisor');
            $table->string('nameRectorUniversity');
            $table->date('presentationDate');
            $table->date('releaseDate');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('hoursStay',5);
            $table->unsignedInteger('academicDirector_id');
            $table->unsignedInteger('academicAdvisor_id');
            $table->unsignedInteger('editorialAdvisor_id');
            $table->unsignedInteger('responsibleLinking_id');
            $table->text('project')->nullable();
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
        Schema::dropIfExists('official_documents');
    }
}
