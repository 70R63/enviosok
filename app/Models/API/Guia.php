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
        
        $query->select('guias.id','rastreo_estatus',DB::raw('count(rastreo_estatus) contador'), 'nombre')
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

    public function scopeTotales ($query, $empresa_id){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $query->select('id')
                ->where('empresa_id',$empresa_id)            
                //->offset(0)->limit(10)
                ;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        return $query;

    }
}
