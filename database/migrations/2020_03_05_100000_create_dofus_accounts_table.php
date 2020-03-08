<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDofusAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dofus_accounts', function (Blueprint $table) {
            $table->unsignedInteger('Id')->unique();
            $table->unsignedInteger('Role')->default(1);
            $table->unsignedInteger('CharacterSlots')->default(5);
            $table->unsignedInteger('LastSelectedServerId')->nullable();
            $table->foreign('Id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dofus_accounts');
    }
}
