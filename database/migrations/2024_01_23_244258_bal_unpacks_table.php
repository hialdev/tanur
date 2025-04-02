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
        Schema::connection('osano')->create('bal_unpacks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('bal_id')->nullable();
            $table->uuid('user_id')->nullable();

            $table->text('image')->nullable();
            $table->text('description')->nullable();
            
            $table->timestamps();

            $table->foreign('bal_id')
                ->references('id')
                ->on('bals')
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
        Schema::connection('osano')->dropIfExists('bal_unpacks');
    }
};
