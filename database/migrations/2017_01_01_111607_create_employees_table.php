<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('work_address');
            $table->string('work_mobile');
            $table->boolean('marital_status')->default(0);
            $table->string('bank_acc_num');

            $table->integer('job_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->integer('coach_id')->unsigned();
            $table->integer('department_id')->unsigned();



            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->foreign('manager_id')
                ->references('id')
                ->on('employees')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->foreign('coach_id')
                ->references('id')
                ->on('employees')
                ->onDelete(NULL)
                ->onUpdate('cascade');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
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
        Schema::dropIfExists('employees');
    }
}
