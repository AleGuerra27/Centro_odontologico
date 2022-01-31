<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dentist_id');
            $table->date('fecha');
            $table->time('InicioMañana');
            $table->time('FinMañana');
            $table->time('InicioTarde');
            $table->time('FinTarde');
            $table->string('description');
            $table->integer('estado')->default(0);
            $table->timestamps();

            $table->foreign('dentist_id')->references('id')->on('dentists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
