<?php
namespace App\Negocio\Finanzas;

//GENERAL
use Carbon\Carbon;
use Log;
use DB;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

//MODELS
use App\Models\Saldos\Pagos;
use App\Models\Misfinanzas\FacturaExterna as mFacturaExterna;

//Negocio


//DTO
use App\Dto\Misfinanzas\FacturaExterna as dtoFacturaExterna;

//EXCEPCIONES
use Illuminate\Validation\ValidationException;


class FacturaExterna {
 
 	private $numeroDeSolicitud = 0;
 	private $response = null;
	private $mensaje = array();
	private $errors = array();
	public $estatus = false;
 	

	function __construct($numeroDeSolicitud) {
        $this->numeroDeSolicitud = $numeroDeSolicitud;
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
        $dtoFacturaExterna = new dtoFacturaExterna($this->numeroDeSolicitud);
        $dtoFacturaExterna->parsear($data);
        $body = $dtoFacturaExterna->getData();

        Log::debug($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__." ".json_encode($body));
        
        $parametros = [
            'headers'=> $headers,
            'body'	=> json_encode($body),
        ];

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$client = new Client();
    	$response = $client->request('POST', $uri, $parametros);

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->response = json_decode($response->getBody()->getContents());
    	Log::debug(print_r($this->response ,true));

    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->validaResponse($data);
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
     * @since 1.0.0 Primera version de la funcion validaResponse
     * 
     * @throws \LogicException
     *
     * @param array $data Valores de toda la peticion de crear guia
     * 
     * @var string $uri La uri que se usara para obtener el token
     * @var GuzzleHttp\Client $client Clse apra uso de ptriciones para la APi 
  
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    private function validaResponse($data){
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    	if ($this->response->estatus->codigo === "000") {
    		$this->mensaje[] = $this->response->estatus->descripcion;
    		$this->mensaje[] = sprintf("UUID = '%s'",$this->response->cfdiTimbrado->respuesta->uuid);

    		$this->estatus = true;
    	} else {
    		
    		$this->mensaje[]= sprintf("Referencia:%s - Fecha de la solicitud: %s",$data['referencia'],$this->response->estatus->fecha);

    		$this->mensaje[]= sprintf("%s-%s",$this->response->estatus->codigo, $this->response->estatus->informacionTecnica);
    		
    	}

    
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    }

    /**
     * Funcion para actualizar el estado de campo facturado 
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Negocio\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion actualizaPagoFacturado
     * 
     * @throws \LogicException
     *
     * @param int $pago_id Id delpago qeu se solicitop facturar
     * 
     * @var string $uri La uri que se usara para obtener el token
     * @var GuzzleHttp\Client $client Clse apra uso de ptriciones para la APi 
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    public function actualizaPagoFacturado(int $pago_id){
    	Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
    	Pagos::where('id', $pago_id)
           ->update([
               'facturado' => 2,       
           ]);
    
    	Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
    }


    /**
     * Funcion para descargar el pdf y xml, de forma consecutiva 
     * inserta el registro
     * 
     * @author Javier Hernandez
     * @copyright 2024 EnviosOK
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion validaResponse
     * 
     * @throws \LogicException
     * 
     * @var object $this->response Response de la solicutd de timbrar factura
     * 
     * 
     * @return void
     */

    public function guardarPdfXmlCFDI(int $pago_id){
        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);

        $nameXml = sprintf("facturaexterna/%s.xml",$this->response->cfdiTimbrado->respuesta->uuid );
        
        Storage::disk('public')->put($nameXml,$this->response->cfdiTimbrado->respuesta->cfdixml);

        $namePdf = sprintf("facturaexterna/%s.pdf", $this->response->cfdiTimbrado->respuesta->uuid);
         Storage::disk('public')->put($namePdf,base64_decode($this->response->cfdiTimbrado->respuesta->pdf));
            
        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);

        mFacturaExterna::create([
            "noCertificado" => $this->response->cfdiTimbrado->respuesta->noCertificado,
            "rfcProvCertif" => $this->response->cfdiTimbrado->respuesta->rfcProvCertif,
            "fecha" =>$this->response->cfdiTimbrado->respuesta->fecha ,
            "uuid" => $this->response->cfdiTimbrado->respuesta->uuid,
            "ruta_pdf" => $namePdf,
            "ruta_xml" => $nameXml,
            "empresa_id" => auth()->user()->empresa_id,
            "pago_id" => $pago_id,
        ]);

        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
    }


 

    public function getResponse(){
        return $this->response;
    }

    public function getMensajes(){
        return $this->mensaje;
    }

    public function getErrors(){
        return $this->errors;
    }
    public function getEstatus(){
        return $this->estatus;
    }
};