<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->date('birthdate');
            $table->enum('gender', ['m', 'f']);
            $table->foreignId('department_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedTinyInteger('position');
            $table->unsignedTinyInteger('payment_type');
            $table->unsignedTinyInteger('payment_value');
            $table->unsignedTinyInteger('hour_per_month')->default(0);
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
