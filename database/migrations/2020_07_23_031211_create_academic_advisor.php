<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicAdvisor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_advisers', function (Blueprint $table) {
            $table->increments('academicAdvisor_id');
            $table->string('nameAcademicAdvisor');
            $table->string('academicPosition');            
            $table->string('academicAdvisorEmail');
            $table->string('advisorPhone')->nullable();
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
        Schema::dropIfExists('academic_advisers');
    }
}
