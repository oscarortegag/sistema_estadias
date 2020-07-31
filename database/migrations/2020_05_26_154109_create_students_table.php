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
            $table->increments('student_id');
            $table->unsignedInteger('id');
            $table->unsignedInteger('institution_id');
            $table->unsignedInteger('period_id');
            $table->string('name');            
            $table->string('lastName');
            $table->string('motherLastNames');         
            //$table->unsignedInteger('gender_id');
            $table->date('dateOfBirth');
            $table->string('enrollment');
            $table->unsignedInteger('quarter_id');
            //$table->unsignedInteger('group_id');
            //$table->unsignedInteger('shift_id');
            $table->string('socialSecurityNumber');
            $table->string('accidentInsurance')->nullable();
            $table->unsignedInteger('educativeProgram_id');
            $table->string('outOfTime',2)->nullable();
            $table->unsignedInteger('schoolOrigin_id');           
            $table->string('curp');
            $table->string('institutionalEmail');
            $table->year('incomeYear');
            //$table->unsignedInteger('degree_id');
            $table->unsignedInteger('modality_id');
            $table->string('officePhone')->nullable();             
            $table->string('cellPhone')->nullable();
            $table->string('personalEmail')->nullable();            
            $table->string('facebook')->nullable();
            $table->boolean('verified')->nullable();        
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
