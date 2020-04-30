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
                Schema::dropIfExists('dofus_banips');
                Schema::dropIfExists('dofus_worldservers');
                Schema::dropIfExists('dofus_accounts');
                $is_Ok = false;
                
                
            } else {
                $table->increments('Id');
                $table->integer('CharacterId');
                $table->unsignedInteger('AccountId');
                $table->unsignedInteger('ServerId');
                $table->foreign('AccountId')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('CharacterId')->references('Id')->on('symbioz_world.characters');
                $table->foreign('ServerId')->references('Id')->on('dofus_worldservers');
                $table->timestamps();
            }
            
        });

        if(!$is_Ok){
            Schema::dropIfExists('dofus_serverscharacters');
            abort(500, trans('dofus::messages.fail-install'));
        }
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
