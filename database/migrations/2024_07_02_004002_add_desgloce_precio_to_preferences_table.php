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
            $table->float('costo', 8,2)->default(0);
            $table->float('costo_iva', 6,2)->default(0);
            
        });

        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\Misfinanzas\MpPreferenceSeeder',
            '--force' => true 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mp_preferences', function (Blueprint $table) {
            $table->dropColumn('costo');
            $table->dropColumn('costo_iva');
        });
    }
};
