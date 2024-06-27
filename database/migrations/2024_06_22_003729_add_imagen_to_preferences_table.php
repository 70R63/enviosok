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
        Schema::table('mp_preferences', function (Blueprint $table) {
            $table->string('imagen')->nullable()->default("Ruta Imagen");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mp_preferences', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
};
