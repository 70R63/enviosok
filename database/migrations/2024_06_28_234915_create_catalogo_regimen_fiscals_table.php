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
        Schema::create('catalogo_regimen_fiscals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estatus')->default(1);
            $table->unsignedInteger('empresa_id')->nullable(false)->default(1);

            $table->unsignedInteger('regimen_fiscal_id')->nullable(false)->default(1);
            $table->unsignedTinyInteger('tipo_persona')->nullable(false)->default(1);
            $table->string("descripcion")->nullable(false)->default("Descripcion"); 
        });

        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\CatalogosSistema\CatalogoRegimenFiscalSeeder',
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
        Schema::dropIfExists('catalogo_regimen_fiscals');
    }
};
