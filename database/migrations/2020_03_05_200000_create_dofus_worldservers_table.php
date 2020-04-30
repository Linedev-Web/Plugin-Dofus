<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDofusWorldserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dofus_worldservers', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Name');
            $table->unsignedInteger('Type');
            $table->string('Host');
            $table->unsignedInteger('Port');
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
        Schema::dropIfExists('dofus_worldservers');
    }
}
