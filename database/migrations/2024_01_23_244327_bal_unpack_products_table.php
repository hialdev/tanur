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
        Schema::connection('osano')->create('bal_unpack_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->uuid('bal_unpack_id');

            $table->integer('qty');
            $table->text('description')->nullable();
            
            $table->timestamps();

            $table->foreign('bal_unpack_id')
                ->references('id')
                ->on('bal_unpacks')
                ->onDelete('restrict');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::connection('osano')->dropIfExists('bal_unpack_products');
    }
};
