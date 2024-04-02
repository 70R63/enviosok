<?php

namespace App\Negocio\Guias;

//GENERALES
use Log;
use Carbon\Carbon;

//EXCEPTION
use Illuminate\Validation\ValidationException;

//MODELS
use App\Models\API\Rastreo_peticion;

//DTOS

//SINGLENTON

//NEGOCIO

class Rastreo {

	private $rastreoPeticion = array();

    /**
     * Se Busca Ontener el historial de rastreo de las LTD configuradas en el sistema
     * 
     * @author Javier Hernandez
     * @copyright 2024-2024 Envios OK
     * @package App\Models\API
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion 
     * 
     * @throws 
     *
     * @param array $parametros eseseses
     * 
     * @var array $rastreoPeticion contiene los datos de los rastres ejucutados 
     * @var string $cp_d
     * @var array $body valores unicos par envio al LTD
     * @var string $canal valor que indentifica de donde se realiza la peticion
     * 
     * 
     * @return void 
     */

    public function peticionesHistorial (){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $rastreoPeticionLtd = Rastreo_peticion::where('completado',1)
                    ->get()
                    ->toArray()
                ;

        $this->rastreoPeticion= $rastreoPeticionLtd ;           
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }

    public function getRastreoPeticion(){
        return $this->rastreoPeticion ;
    }

}//Finclass