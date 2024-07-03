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
        Schema::table('factura_externas', function (Blueprint $table) {
            
            $table->unsignedTinyInteger('pago_id')->nullable(false)->default(1);
            $table->unsignedTinyInteger('empresa_id')->nullable(false)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factura_externas', function (Blueprint $table) {
            $table->dropColumn('pago_id');
            $table->dropColumn('empresa_id');
        });
    }
};
