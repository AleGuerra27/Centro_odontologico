<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->date('date')->unique();
            $table->decimal('purchase', 13, 3);
            $table->decimal('purchase_original', 13, 3)->after('date');
            $table->decimal('sale', 13, 3);
            $table->decimal('sale_original', 13, 3)->after('date');
            $table->date('date_original');
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
        Schema::dropIfExists('exchange_rates');
    }
}
