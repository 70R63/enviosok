<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

//General
use Log;
use DB;

class Guia extends Model
{
    use HasFactory;



    /**
     * Realiza la consulta de guias pendientes de entrega.
     *
     * @param    $query
     * @param  Integer $ltdId
     * 
     * @return $query
     */

    public function scopePendienteEntrega($query, $ltdId) {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->select('id','ltd_id', 'tracking_number')
                ->where('ltd_id',$ltdId)            
                ->whereIN('rastreo_estatus',array(1,2,3,6))
                //->offset(0)->limit(10)
                ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;
   }


   /**
     * Se busca obtener el estatus de las guias y contabilizar el estatus por empresa
     * 
     * @author Javier Hernandez
     * @copyright 2024-2024 Envios OK
     * @package App\Models\API
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion resumenGuias
     * 
     * @throws 
     *
     * @param $query
     * @param int $empresa_id
     * 
     * @var 
     * 
     * 
     * @return void 
     */

    public function scopeResumenGuias ($query, $empresa_id){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->select('guias.id','rastreo_estatus',DB::raw('count(rastreo_estatus) contador'), 'rastreo_estatus.nombre',
            )
                ->where('empresa_id',$empresa_id)
                ->join('rastreo_estatus', 'rastreo_estatus.id', '=', 'guias.rastreo_estatus')            
                ->groupBy('rastreo_estatus')
                //->offset(0)->limit(10)
                ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;

    }


    /**
     * Se busca obtener el estatus de las guias y contabilizar el estatus por empresa
     * 
     * @author Javier Hernandez
     * @copyright 2024-2024 Envios OK
     * @package App\Models\API
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion resumenGuias
     * 
     * @throws 
     *
     * @param $query
     * @param int $empresa_id
     * 
     * @var 
     * 
     * 
     * @return void 
     */

    public function scopeCostoPromedioMesActual ($query){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->select(DB::raw('COUNT(1) as guias_count, (SUM(costo_base)/count(1)) as costo_base_promedio')
            )
            ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;

    }

    public function scopeSelecUsoLtd($query) {
      Log::info(__CLASS__." ".__FUNCTION__);

      return $query->select("guias.id", "cfg_ltds.nombre",
            DB::raw("COUNT(1) guias_cantidad"),DB::raw(" upper(MONTHNAME(`guias`.`created_at`)) mes"),
        )->join("cfg_ltds", "cfg_ltds.id","=","guias.ltd_id")
      ;
    }

    public function scopeEmpresaUsuario ($query){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->where('empresa_id',auth()->user()->empresa_id)            
                ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;

    }

    public function scopeActivas ($query){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->where('guias.estatus',1)            
                ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;

    }

    public function scopeAgruparLtd ($query){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $query->groupBy('cfg_ltds.id');
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return $query;

    }

    public function scopeUltimosTresMeses ($query){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $query->groupBy( DB::raw("DATE_FORMAT(`guias`.`created_at`, '%Y-%m')"));
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return $query;

    }
}
