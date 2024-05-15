<?php
namespace App\Negocio\Saldos;

//GENERAL
use Carbon\Carbon;
use Log;

//modelos
use App\Models\Saldos\Pagos as mPagos;

//Negocio
use App\Negocio\Saldos\Saldos AS nSaldos;

//DTO
use App\Dto\MercadoPago as dtoMercadoPago;

class MercadoPago {


	/**
     * Se obtienen los datos de las tarifas de los clietnes ligados al cliente
     * 
     * @author Javier Hernandez
     * @copyright 2022-2024 XpertaMexico
     * @package App\Negocio\Clientes
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

	public function registroPago($data){

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

		$dtoMercadoPago = new dtoMercadoPago();
		$dtoMercadoPago->parsear($data);
		$dataParseada = $dtoMercadoPago->getData();

		if ( $data['payment_id']==='null' ) {
			Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
			$maxValue = mPagos::max('id');
			Log::debug($maxValue);	

			$dataParseada['referencia']= sprintf("%s-%s",$dataParseada['referencia'], $maxValue);
			Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
		}
		

		mPagos::create($dataParseada);


		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

	}

}