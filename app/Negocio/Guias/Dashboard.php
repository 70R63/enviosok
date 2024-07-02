<?php

namespace App\Negocio\Guias;

//GENERALES
use Log;
use Carbon\Carbon;
use DB;

//EXCEPTION
use Illuminate\Validation\ValidationException;

//MODELS
use App\Models\API\Rastreo_peticion;
use App\Models\API\Guia as mGuia;

//DTOS

//SINGLENTON

//NEGOCIO
use App\Negocio\Saldos\Saldos as nSaldos;

class Dashboard {

	private $response = array();

	/**
     * Se busca obtener el estatus de las guias asi como el promedio del saldo y el saldo actual 
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
     * @param array $data 
     * 
     * @var array $rastreoPeticion contiene los datos de los rastres ejucutados 
     * @var string $cp_d
     * @var array $body valores unicos par envio al LTD
     * @var string $canal valor que indentifica de donde se realiza la peticion
     * 
     * 
     * @return void 
     */

    public function resumenGuias (array $data){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $nSaldos = new  nSaldos();
        $saldoActual = $nSaldos->porEmpresa($data['empresa_id']);

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $totalGuias = mGuia::totales($data['empresa_id'])->count();

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $mGuias = mGuia::resumenGuias($data['empresa_id'])->get()->toArray();
        $graficasTotales = array();

        //cjhs Validar usabilidad
        $transito=1;
        foreach ($mGuias as $key => $guia) {
        	Log::info($guia);

        	$totalesEjex[]=$guia['nombre'];
        	$totalesContador[]=$guia['contador'];
        	switch ($guia['nombre']) {
        		case 'TRANSITO':
        			$transito= $guia['contador'];
        			break;
        		case 'ENTREGADO':
        			$entregadas= $guia['contador'];
        			break;
        		case 'CREADA':
        			$creadas= $guia['contador'];
        			break;
        		default:
        			// code...
        			break;
        	}
        }

        Log::info(print_r($mGuias,true));

        $response['guias']['creadas']=$creadas;
        $response['guias']['transito']=$transito;
        $response['guias']['entregadas']=$entregadas;
        $response['guias']['canceladas']=0;
        $response['saldo']['promedio'] = "100.87";
		$response['saldo']['actual'] = $saldoActual;
		$response['graficasTotales']['ejex']= $totalesEjex;
		$response['graficasTotales']['contador']= $totalesContador;
        $this->response = $response;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }


    public function getResponse(){
        return $this->response;
    }

}