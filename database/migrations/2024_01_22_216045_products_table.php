<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('osano')->create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('image')->nullable();
            $table->string('code');
            $table->string('name');
            $table->string('slug')->unique();
            $table->bigInteger('height')->nullable();
            $table->bigInteger('width')->nullable();
            $table->text('description')->nullable();
            
            $table->uuid('unit_id');
            $table->decimal('price_per_unit', 15, 2)->nullable();

            $table->uuid('product_type_id')->nullable();
            $table->timestamps();

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('restrict');

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
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
        Schema::connection('osano')->dropIfExists('products');
    }
};
