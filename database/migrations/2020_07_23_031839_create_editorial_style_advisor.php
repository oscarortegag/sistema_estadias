<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialStyleAdvisor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorial_stylies', function (Blueprint $table) {
            $table->increments('editorialAdvisor_id');
            $table->string('nameEditorialAdvisor');
            $table->string('editorialPosition');             
            $table->string('editorialAdvisorEmail');
            $table->string('editorialAdvisorPhone')->nullable();
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
        Schema::dropIfExists('editorial_stylies');
    }
}
