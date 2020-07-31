<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsibleLinking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsible_linkings', function (Blueprint $table) {
            $table->increments('responsibleLinking_id');
            $table->string('nameResponsible');
            $table->string('responsiblePosition');
            $table->string('responsibleEmail');
            $table->string('responsiblePhone')->nullable();
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
        Schema::dropIfExists('responsible_linkings');
    }
}
