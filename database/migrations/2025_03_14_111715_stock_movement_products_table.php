<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('osano')->create('stock_movement_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('movement_id');
            $table->uuid('product_id');
            $table->boolean('is_meteran')->default(0);
            $table->uuid('stock_id')->nullable(); // Satuan
            $table->uuid('stock_meter_id')->nullable(); // Meteran
            $table->decimal('length', 12, 2)->nullable();
            $table->bigInteger('qty')->nullable();

            $table->timestamps();

            $table->foreign('movement_id')
                ->references('id')
                ->on('stock_movements')
                ->onDelete('restrict');
                
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict');

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks')
                ->onDelete('restrict');
            
            $table->foreign('stock_meter_id')
                ->references('id')
                ->on('stock_meters')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
