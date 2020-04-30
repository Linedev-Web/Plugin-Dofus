<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDofusServerscharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $is_Ok = true;
        Schema::create('dofus_serverscharacters', function (Blueprint $table) {
            
            $db = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?", ["symbioz_world"]);
            if (empty($db)) {
                $table->increments('Id');
                Schema::dropIfExists('dofus_banips');
                Schema::dropIfExists('dofus_worldservers');
                Schema::dropIfExists('dofus_accounts');
                Schema::dropIfExists('dofus_serverscharacters');
                
                plugins()->disable('dofus');
                throw new Exception("Please follow all steps here, then reinstall : https://github.com/AzuriomCommunity/Symbioz-2.38-AzuriomCompat");
                
                
            } else {
                $table->increments('Id');
                $table->unsignedInteger('CharacterId');
                $table->unsignedInteger('AccountId');
                $table->unsignedInteger('ServerId');
                $table->foreign('AccountId')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('CharacterId')->references('Id')->on('symbioz_world.characters');
                $table->foreign('ServerId')->references('Id')->on('dofus_worldservers');
                $table->timestamps(); 
            }
            
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
