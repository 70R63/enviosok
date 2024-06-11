<?php
namespace App\Negocio\Guias;

use Log;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use GuzzleHttp\Client;

//MODELS

//DTOS
use App\Dto\Guias\Facturacion as dtoFacturacion;

//NEGOCIO

class FacturacionCFDI {

	private $response = null;
	private $mensaje = array();
	private $errors = array();
	public $estatus = true;

	/**
     * genera un token par acceso al porta de factuacion
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Negocio\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtenerToken
     * 
     * @throws \LogicException
     *
     * @param 
     * 
     * @var string $uri La uri que se usara para obtener el token
     * @var GuzzleHttp\Client $client Clse apra uso de ptriciones para la APi 
     * @var array $formQuery Valores que se enviaran para autenticar
     * @var array $headers Cabeceras de la peticion 
     * @var array $parametros Valores de array para la peticion
     * @var array $response Respuesta de la peticion 
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    public function obtenerToken(){

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$uri = "https://testapi.facturoporti.com.mx/token/crear";
    	$formQuery = [
    				'Usuario' => "pruebastimbrado",
                	'Password' => "@Notiene1",
            ];

        $headers = [
            'accept' => 'application/json'
        ];

        $parametros = [
            'headers'=> $headers
            ,'query' => $formQuery
        ];

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$client = new Client();
    	$response = $client->request('GET', $uri, $parametros);

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->response = json_decode($response->getBody()->getContents());
    	Log::debug(print_r($this->response ,true));
    }



    /**
     * genera un token par acceso al porta de factuacion
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Negocio\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion crear
     * 
     * @throws \LogicException
     *
     * @param array $data Valores de toda la peticion de crear guia
     * 
     * @var string $uri La uri que se usara para obtener el token
     * @var GuzzleHttp\Client $client Clse apra uso de ptriciones para la APi 
     * @var array $formQuery Valores que se enviaran para autenticar
     * @var array $headers Cabeceras de la peticion 
     * @var array $parametros Valores de array para la peticion
     * @var array $response Respuesta de la peticion 
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    public function crear($data){

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$uri = "https://testapi.facturoporti.com.mx/servicios/timbrar/json";
    	$token = "eyJhbGciOiJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzA0L3htbGRzaWctbW9yZSNobWFjLXNoYTI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoialYrdVVUYmtWNmUxRmNZb2cvNWtGQT09IiwibmJmIjoxNzE3OTcxMjY2LCJleHAiOjE3MjA1NjMyNjYsImlzcyI6IlNjYWZhbmRyYVNlcnZpY2lvcyIsImF1ZCI6IlNjYWZhbmRyYSBTZXJ2aWNpb3MiLCJJZEVtcHJlc2EiOiJqVit1VVRia1Y2ZTFGY1lvZy81a0ZBPT0iLCJJZFVzdWFyaW8iOiJidXlaYzFMWUl5VURaSGhGR3NqaGdRPT0ifQ.GCJ1ANqplj0N63bwKybEp-Blc1riG3UufKMUJIGBMc4";
        $authorization = sprintf("Bearer %s",$token);

        $headers = [
            'Authorization' => $authorization,
            'accept' => 'application/json',
    		'content-type' => 'application/*+json',
        ];

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $dtoFacturacion = new dtoFacturacion();
        $dtoFacturacion->parsear($data);
        $body = $dtoFacturacion->getData();

        #Log::debug($body);
        #Log::debug(json_encode($body));
        $parametros = [
            'headers'=> $headers,
            'body'	=> json_encode($body),
        ];

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$client = new Client();
    	$response = $client->request('POST', $uri, $parametros);

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->response = json_decode($response->getBody()->getContents());
    	#Log::debug(print_r($this->response ,true));

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->validaResponse();
    }


    /**
     * genera un token par acceso al porta de factuacion
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Negocio\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion crear
     * 
     * @throws \LogicException
     *
     * @param array $data Valores de toda la peticion de crear guia
     * 
     * @var string $uri La uri que se usara para obtener el token
     * @var GuzzleHttp\Client $client Clse apra uso de ptriciones para la APi 
     * @var array $formQuery Valores que se enviaran para autenticar
     * @var array $headers Cabeceras de la peticion 
     * @var array $parametros Valores de array para la peticion
     * @var array $response Respuesta de la peticion 
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    private function validaResponse(){
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    	if ($this->response->estatus->codigo === "000") {
    		$this->mensaje = $this->response->estatus->descripcion;
    	} else {
    		$this->errors[]= $this->response->estatus->informacionTecnica;
    		$this->estatus = false;
    	}

    	

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    }

    public function getResponse(){
        return $this->response;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function getErrors(){
        return $this->errors;
    }

};