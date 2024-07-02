<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\EmpresaEmpresas;

use Log;
use DB;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['rfc', 'email'];

    /**
     * Agraga a la consulta los casos de negocio.
     *
     *
    */

    protected static function boot()
    {

        parent::boot();
        static::addGlobalScope('estatus_empresa', function (Builder $builder) {
            $builder->where('empresas.estatus', '1');

            /*
            $empresaId =  isset(auth()->user()->empresa_id)  ? auth()->user()->empresa_id : 2 ;
            $empresas = EmpresaEmpresas::where('id',$empresaId)
                ->pluck('empresa_id')->toArray();
            $builder->whereIN('id',$empresas);
            */

        });
    }

    public function scopeBase($query) {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query->select("empresas.id", "empresas.rfc", "empresas.email", "domicilios.cp", "domicilios.calle", "domicilios.colonia", "domicilios.municipio_alcaldia", "domicilios.estado", "domicilios.no_exterior", "domicilios.no_interior"
            ,"constancia_fiscals.razon_social","constancia_fiscals.ruta_csf_pdf","constancia_fiscals.regimen_fiscal","constancia_fiscals.uso_cfdi"
            ,DB::raw("(CASE constancia_fiscals.facturacion_automatica WHEN 1 THEN 'SI' WHEN 2 THEN 'NO' ELSE 'NO' END) as facturacion_automatica")
            ,DB::raw("(CASE WHEN constancia_fiscals.id IS NULL THEN 'NO' ELSE 'SI' END) as csf_completo")
            )
            ->join('users', 'users.empresa_id', '=', 'empresas.id')
            ->join('domicilios', 'domicilios.modelo_id', '=', 'users.id')
            ->leftjoin('constancia_fiscals', 'constancia_fiscals.empresa_id', '=', 'empresas.id')
            ;           
   }
}
