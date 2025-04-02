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
        Schema::connection('osano')->create('partner_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('partner_id');

            $table->string('name');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();

            $table->foreign('partner_id')
                ->references('id')
                ->on('partners')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('osano')->dropIfExists('partner_addresses');
    }
};
