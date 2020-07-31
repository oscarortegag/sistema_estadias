<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducativeProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educativeProgram', function (Blueprint $table) {
            $table->increments('educativeProgram_id');
            $table->string('shortName');
            $table->string('displayName');
            $table->string('area');
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
        Schema::dropIfExists('educativeProgram');
    }
}
