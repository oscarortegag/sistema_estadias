<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('homePhone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->string('township')->nullable();
            $table->string('zip_code')->nullable();
            $table->unsignedInteger('kinship_id')->nullable();
            $table->string('name_family')->nullable();
            $table->string('homePhone_family')->nullable();
            $table->string('cellPhone_family')->nullable();
            $table->string('email_family')->nullable();
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
        Schema::dropIfExists('contact_students');
    }
}
