<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete(NULL)
                ->onUpdate('cascade');


            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('module_group');
    }
}
