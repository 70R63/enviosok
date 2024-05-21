<?php
namespace App\Dto;

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
        $dataParseado = array();
    	$dataParseado['empresa_id']= $data['empresa_id'];
    	$dataParseado['banco_id']= 30;
    	$dataParseado['referencia']= $data['payment_id'];
        $dataParseado['importe']=$data['unit_price'];
    	Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
    	$this->data=$dataParseado;
    }

    public function getData(){
        return $this->data;
    }


}