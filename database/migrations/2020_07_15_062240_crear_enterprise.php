<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEnterprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('enterprise_id');
            $table->string('companyName');
            $table->string('businessName')->nullable();
            $table->string('companyPhone',20)->nullable();
            $table->string('representativeName');
            $table->string('representativePosition');
            $table->string('businessAdvisorName');
            $table->string('businessAdvisorEmail');
            $table->string('businessAdvisorPhone',20)->nullable();
            $table->string('businessContactName')->nullable();
            $table->string('businessContactEmail')->nullable();
            $table->string('businessContactPhone',20)->nullable();
            $table->date('importDate');                             
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
        Schema::dropIfExists('enterprise');
    }
}
