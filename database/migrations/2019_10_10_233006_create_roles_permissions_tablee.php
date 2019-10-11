<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTablee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permission', function (Blueprint $table) {
           $table->bigInteger('role_id')->unsigned()->index();
           $table->bigInteger('permission_id')->unsigned()->index();

           $table->foreign('role_id')->references('id')->on('roles');
           $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permission');
    }
}
