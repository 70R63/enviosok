<?php
namespace App\Negocio\Finanzas;

//GENERAL
use Carbon\Carbon;
use Log;

//modelos
use App\Models\MpPreference as mMpPreference;

//Negocio


//DTO


class MercadoPago {

	private $preferences = array();
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

	public function preferences(){

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

		$this->preferences = mMpPreference::select("init_point", "currency_id", "unit_price")
		->get()->toArray();

		Log::debug($this->preferences); 

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

	}

	public function getpreferences()
    {
        return $this->preferences;
    }
}