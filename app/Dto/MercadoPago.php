<?php
namespace App\Dto;

use Carbon\Carbon;
use Log;


class MercadoPago 
{
    private $data = array();
    
    function __construct()
    {
        // code...
    }

    public function parsear($data){
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        Log::info(print_r($data,true));
        $dataParseado = array();
    	$dataParseado['empresa_id']= $data['empresa_id'];
    	$dataParseado['banco_id']= 30;
        $dataParseado['fecha_deposito'] = carbon::now()->format('Y-m-d');
        $dataParseado['hora_deposito'] = carbon::now()->format('H:i:s');
        
        $data = array_merge($data,$dataParseado);
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->data=$data;
    }

    public function getData(){
        return $this->data;
    }


}