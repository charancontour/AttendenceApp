<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlySalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('month');
            $table->integer('employee_id')->unsigned();
            $table->integer('present_days')->unsigned();
            $table->integer('total_working_days')->unsigned();
            $table->double('basic_salary');
            $table->double('deduction');
            $table->double('net_salary');
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_salaries');
    }
}
