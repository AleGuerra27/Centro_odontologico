<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Description');
            $table->timestamps();
        });
        DB::table('days')->insert([
            ['Description' => 'Lunes'],
            ['Description' => 'Martes'],
            ['Description' => 'Miércoles'],
            ['Description' => 'Jueves'],
            ['Description' => 'Viernes'],
            ['Description' => 'Sábado'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
