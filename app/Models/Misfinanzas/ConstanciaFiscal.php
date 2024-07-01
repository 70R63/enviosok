<?php

namespace App\Models\Misfinanzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class ConstanciaFiscal extends Model
{
    use HasFactory;


    protected $fillable = ['empresa_id', 'razon_social', 'regimen_fiscal', 'uso_cfdi','ruta_csf_pdf', 'facturacio_automatica'];
}
