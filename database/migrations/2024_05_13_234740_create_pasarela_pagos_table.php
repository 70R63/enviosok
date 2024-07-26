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
        Schema::create('mp_preferences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->boolean('estatus')->default(1);

            $table->bigInteger('client_id');
            $table->unsignedInteger('collector_id');
            $table->string('currency_id');
            $table->string('title');
            $table->string('id_preference');
            $table->string('init_point');
            $table->unsignedInteger('unit_price');
            $table->unsignedInteger('quantity');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_preferences');
    }
};
