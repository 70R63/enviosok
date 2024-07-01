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
        Schema::create('catalogo_persona_fiscals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estatus')->default(1);

            $table->string("descripcion")->nullable(false)->default("Descripcion");
        });

        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\CatalogosSistema\CatalogoPersonaFiscalSeeder',
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
        Schema::dropIfExists('catalogo_persona_fiscals');
    }
};
