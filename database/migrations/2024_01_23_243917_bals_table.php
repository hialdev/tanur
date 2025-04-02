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
        Schema::connection('osano')->create('bals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_type_id');
            $table->uuid('purchase_order_id')->nullable();

            $table->string('code');
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_unpack')->default(0);
            
            $table->timestamps();

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->onDelete('restrict');

            $table->foreign('purchase_order_id')
                ->references('id')
                ->on('purchase_orders')
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
        Schema::connection('osano')->dropIfExists('bals');
    }
};
