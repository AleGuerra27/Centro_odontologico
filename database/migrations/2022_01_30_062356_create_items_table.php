<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->string('name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('internal_id', 30)->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_code_gs1')->nullable();

            $table->string('unit_type_id');
            $table->string('currency_type_id');
            $table->decimal('sale_unit_price', 12, 2);
            $table->decimal('purchase_unit_price', 12, 2)->default(0);

            $table->boolean('has_isc')->default(false);
            $table->string('system_isc_type_id')->nullable();
            $table->decimal('percentage_isc', 12, 2)->default(0);
            $table->decimal('suggested_price', 12, 2)->default(0);
            $table->boolean('has_igv')->default(true);

            $table->string('sale_affectation_igv_type_id');
            $table->string('purchase_affectation_igv_type_id');

            $table->decimal('stock', 12, 2)->default(0);
            $table->decimal('stock_min', 12, 2)->default(0);

            $table->json('attributes')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->date('date_of_due')->nullable();
            $table->string('model', 100)->nullable();
            $table->boolean('has_plastic_bag_taxes')->default(false);
            $table->decimal('amount_plastic_bag_taxes', 6, 2)->default(0.1);
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->timestamps();

            $table->foreign('unit_type_id')->references('id')->on('unit_types');
            $table->foreign('currency_type_id')->references('id')->on('currency_types');
            $table->foreign('sale_affectation_igv_type_id')->references('id')->on('affectation_igv_types');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('purchase_affectation_igv_type_id')->references('id')->on('affectation_igv_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
