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
        Schema::create('factura_externas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estatus')->default(1);

            $table->string("uuid")->nullable(false)->default("uuid");
            $table->string("rfcProvCertif")->nullable(false)->default("rfcProvCertif");
            $table->string("noCertificado")->nullable(false)->default("noCertificado");
            $table->string("fecha")->nullable(false)->default("uuid");
            $table->string("ruta_pdf")->nullable(false)->default("uuid");
            $table->string("ruta_xml")->nullable(false)->default("uuid");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_externas');
    }
};
