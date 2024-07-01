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
        Schema::create('catalogo_uso_cfdis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estatus')->default(1);

            $table->string("clave")->nullable(false)->default("000");
            $table->string("descripcion")->nullable(false)->default("Descripcion");
            $table->unsignedTinyInteger('tipo_persona')->nullable(false)->default(1);

        });

        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\CatalogosSistema\CatalogoUsoCfdiSeeder',
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
        Schema::dropIfExists('catalogo_uso_cfdis');
    }
};
