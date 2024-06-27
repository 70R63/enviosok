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
        Schema::create('constancia_fiscals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estatus')->default(1);
            $table->unsignedInteger('empresa_id')->nullable(false)->default(1);

            $table->string("razon_social")->nullable(false)->default("razon_social"); 
            $table->string("regimen_fiscal")->nullable(false)->default("regimen_fiscal");
            $table->string("uso_cfdi")->nullable(false)->default("uso_cfdi");
            $table->string("ruta_csf_pdf")->nullable(false)->default("ruta_csf_pdf");
            
            $table->unsignedTinyInteger('facturacion_automatica')->nullable(false)->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constancia_fiscals');
    }
};
