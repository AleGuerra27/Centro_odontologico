<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->increments('id');
            $table->time('Mañana');
            $table->time('Tarde');
            $table->unsignedInteger('day_id');
            $table->integer('estado')->default(1);
            $table->timestamps();

            $table->foreign('day_id')->references('id')->on('days');
        });
        DB::table('hours')->insert([
            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '1'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '1'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '1'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '1'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '1'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '1'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '1'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '1'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '1'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '1'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '1'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '1'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '1'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '1'],

            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '2'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '2'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '2'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '2'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '2'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '2'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '2'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '2'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '2'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '2'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '2'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '2'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '2'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '2'],
            
            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '3'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '3'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '3'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '3'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '3'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '3'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '3'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '3'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '3'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '3'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '3'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '3'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '3'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '3'],

            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '4'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '4'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '4'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '4'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '4'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '4'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '4'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '4'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '4'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '4'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '4'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '4'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '4'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '4'],

            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '5'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '5'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '5'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '5'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '5'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '5'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '5'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '5'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '5'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '5'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '5'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '5'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '5'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '5'],

            ['Mañana' => '6:00', 'Tarde' => '1:00','day_id' => '6'],
            ['Mañana' => '6:30', 'Tarde' => '1:30','day_id' => '6'],
            ['Mañana' => '7:00', 'Tarde' => '2:00','day_id' => '6'],
            ['Mañana' => '7:30', 'Tarde' => '2:30','day_id' => '6'],
            ['Mañana' => '8:00', 'Tarde' => '3:00','day_id' => '6'],
            ['Mañana' => '8:30', 'Tarde' => '3:30','day_id' => '6'],
            ['Mañana' => '9:00', 'Tarde' => '4:00','day_id' => '6'],
            ['Mañana' => '9:30', 'Tarde' => '4:30','day_id' => '6'],
            ['Mañana' => '10:00', 'Tarde' => '5:00','day_id' => '6'],
            ['Mañana' => '10:30', 'Tarde' => '5:30','day_id' => '6'],
            ['Mañana' => '11:00', 'Tarde' => '6:00','day_id' => '6'],
            ['Mañana' => '11:30', 'Tarde' => '6:30','day_id' => '6'],
            ['Mañana' => '12:00', 'Tarde' => '7:00','day_id' => '6'],
            ['Mañana' => '12:30', 'Tarde' => '7:30','day_id' => '6'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
}
