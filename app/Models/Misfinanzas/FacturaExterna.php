<?php

namespace App\Models\Misfinanzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaExterna extends Model
{
    use HasFactory;

    protected $fillable = ['estatus', 'uuid', 'rfcProvCertif', 'noCertificado', 'fecha', 'ruta_pdf', 'ruta_xml', 'pago_id', 'empresa_id'];
}
