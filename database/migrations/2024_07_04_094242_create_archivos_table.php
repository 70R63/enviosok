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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('Nombre del archivo');
            $table->string('descripcion')->nullable()->comment('Descripción del archivo');
            $table->string('codigo')->comment('Pemrite crear una identificación o agrupamiento de archivos');
            $table->string('extension')->comment('Permite identificar el tipo de archivo');
            $table->string('peso')->comment('Permite almacenar el peso en megabytes del archivo');
            $table->string('ruta')->comment('Permite generar una ruta de almacenamiento del archivo');
            $table->nullableMorphs('entidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos');
    }
};
