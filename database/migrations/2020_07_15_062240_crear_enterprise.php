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
            $table->string('companyName',45);
            $table->string('businessName',45)->nullable();
            $table->string('companyPhone',20)->nullable();
            $table->string('representativeName',150);
            $table->string('representativePosition',150);
            $table->string('businessAdvisorName',150);
            $table->string('businessAdvisorEmail',150);
            $table->string('businessAdvisorPhone',20)->nullable();
            $table->string('businessContactName',150);
            $table->string('businessContactEmail',150);
            $table->string('businessContactPhone',20)->nullable();                                
            $table->softDeletes();
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
        Schema::dropIfExists('enterprise');
    }
}
