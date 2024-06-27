<?php
namespace App\Negocio\Finanzas;

//GENERAL
use Carbon\Carbon;
use Log;
use DB;

//modelos
use App\Models\User;
use App\Models\Empresa;

//Negocio


//DTO


class DatosFiscales {
 
 	private $numeroDeSolicitud = 0;
 	private $constancias = null;

	function __construct($numeroDeSolicitud) {
        $this->numeroDeSolicitud = $numeroDeSolicitud;
    }

	/**
     * Se busca obtener los datos complemtarias para la constancia fiscal toman do como base el registro de empressa
     * 
     * @author Javier Hernandez
     * @copyright 2024 XpertaMexico
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtener
     * 
     * @throws \LogicException
     *
     * @param array $parametros eseseses
     * 
     * @var int 
     * @var App\Negocio\Fedex_tarifas $fedexTarifa
     * @var string $cp 
     * @var string $cp_d
     * @var array $body valores unicos par envio al LTD
     * @var string $canal valor que indentifica de donde se realiza la peticion
     * 
     * 
     * @return void
     */

	public function constancias(){

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud); 

	 	$this->constancias = User::select("empresas.id", "empresas.rfc", "domicilios.cp", "domicilios.calle", "domicilios.colonia", "domicilios.municipio_alcaldia", "domicilios.estado"
            ,"constancia_fiscals.razon_social"
            ,DB::raw("(CASE constancia_fiscals.facturacion_automatica WHEN 1 THEN 'SI' WHEN 2 THEN 'NO' ELSE 'NO' END) as facturacion_automatica")
            ,DB::raw("(CASE constancia_fiscals.id WHEN count(constancia_fiscals.id)>0 THEN 'SI' ELSE 'NO' END) as csf_completo")
            )
            ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
            ->join('domicilios', 'domicilios.modelo_id', '=', 'users.id')
            ->leftjoin('constancia_fiscals', 'constancia_fiscals.empresa_id', '=', 'empresas.id')
            ->where("empresas.id", auth()->user()->empresa_id)
            ->get()
            ;

	 	Log::debug("$this->numeroDeSolicitud ".print_r($this->constancias,true));

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud); 

	}

	public function getConstancias(){
		return $this->constancias;
	}

}