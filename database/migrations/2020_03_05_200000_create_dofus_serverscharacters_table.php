<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDofusServerscharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dofus_serverscharacters', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('CharacterId');
            $table->unsignedInteger('AccountId');
            $table->unsignedInteger('ServerId');
            $table->foreign('AccountId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ServerId')->references('Id')->on('dofus_worldservers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dofus_serverscharacters');
    }
}
