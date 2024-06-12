<?php
namespace App\Negocio\MercadoPago;

//GENERAL
use Carbon\Carbon;
use Log;
use Illuminate\Validation\ValidationException;

//modelos
use App\Models\MpPreference as mMpPreference;
use App\Models\Saldos\Pagos as mPagos;

//Negocio
use App\Negocio\Saldos\Saldos AS nSaldos;

//DTO
use App\Dto\MercadoPago as dtoMercadoPago;



class MercadoPago {

	private $preferences = array();
    private $preference = array();
    private $mensajes = array();
    private $dataParseada = array();


    /**
     * Fucnion para insertar el pago de la respuesta de mercado pago
     * 
     * @author Javier Hernandez
     * @copyright 2022-2024 XpertaMexico
     * @package App\Negocio\Clientes
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion registroPago
     * 
     * @throws 
     *
     * @param array $data response de marcado pago
     * 
     * @var array $body valores unicos par envio al LTD
     * 
     * 
     * @return void
     */

    public function registroPago(array $data){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

        $dtoMercadoPago = new dtoMercadoPago();
        $dtoMercadoPago->parsear($data);
        $dataParseada = $dtoMercadoPago->getData();

        mPagos::create($dataParseada);
        $this->dataParseada = $dataParseada;

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

    }

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
     * @throws Illuminate\Validation\ValidationException
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

    public function obtenerPreference($id){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

        $preference = mMpPreference::select("init_point", "currency_id", "unit_price")
            ->where("id_preference", $id)
        ->get()->toArray();

        if (count($preference) != 1){
            $mensaje[] = sprintf("El pago con referencia '%s' es invalido favor de validar",$id );
            throw ValidationException::withMessages($mensaje);
        }

        $this->preference = $preference[0];
        $this->mensajes[] = sprintf("Preferencia '%s' ", $id);

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

    }


    /**
     * PAgo Exito se realizara validacion y mensajes
     * 
     * @author Javier Hernandez
     * @copyright 2022-2024 EnvioOK
     * @package App\Negocio\MercadoPago
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion pagoExitoso
     * 
     * @throws Illuminate\Validation\ValidationException
     *
     * @param array $data Valores de respuesta de Mercado Pago
     * 
     * @var array $data
     * 
     * 
     * @return void
     */

    public function pagoExitoso($data){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $this->obtenerPreference($data['preference_id']);

        $data = array_merge($data,$this->preference);
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        
        $data['descripcion'] = sprintf("El pago de $%s fue exito ",$data['unit_price']);
        $data['importe'] = $data['unit_price'];
        $data['referencia'] = $data['payment_id'];
        $this->registroPago($data);
        //$data = array_merge($this->dataParseada,$data);


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $nSaldos = new nSaldos();
        $nSaldos->calcular($data);
        $this->mensajes[]= sprintf("El pago de '%s %s' se realizo con exito",$this->preference['unit_price'],$this->preference['currency_id']);

        $this->mensajes[]= sprintf("MP payment_id='%s'",$data['payment_id']);
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }


    /**
     * PAgo Exito se realizara validacion y mensajes
     * 
     * @author Javier Hernandez
     * @copyright 2022-2024 EnvioOK
     * @package App\Negocio\MercadoPago
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion pagoExitoso
     * 
     * @throws Illuminate\Validation\ValidationException
     *
     * @param array $data Valores de respuesta de Mercado Pago
     * 
     * @var array $data
     * 
     * 
     * @return void
     */

    public function pagoFallido($data){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $this->obtenerPreference($data['preference_id']);

        $data = array_merge($data,$this->preference);
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $maxValue = mPagos::max('id');
        Log::debug($maxValue);  
        
        $data['referencia']= sprintf("%s-%s",$dataParseada['referencia'], ($maxValue+1));
        $data['descripcion'] = sprintf("El pago de $%s  FUE RECHAZADO",$data['unit_price']);
        $data['importe'] = 0;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
        
        $this->registroPago($data);
       

        $this->mensajes[]= sprintf("El pago de '%s %s' no se realizo ",$this->preference['unit_price'],$this->preference['currency_id']);
       

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }


    /**
     * Pago Pendiente se realizara validacion y mensajes de los diferentes estatus de pago no realizado, Estatus de MP https://www.mercadopago.com.mx/developers/es/docs/your-integrations/test/cards
     * 
     * @author Javier Hernandez
     * @copyright 2023-2024 EnviosOK
     * @package App\Negocio\MercadoPago
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion pagoPendiente
     * 
     * @throws Illuminate\Validation\ValidationException
     *
     * @param array $data Valores de respuesta de Mercado Pago
     * 
     * @var array $data
     * 
     * 
     * @return void
     */

    public function pagoPendiente($data){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $this->obtenerPreference($data['preference_id']);

        $data = array_merge($data,$this->preference);
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $data['referencia']= $data['payment_id'];
        if ( $data['payment_id']==='null' ) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $maxValue = mPagos::max('id');
            $data['referencia']= sprintf("%s-%s",$data['payment_id'], ($maxValue+1));

        }
        
        $data['descripcion'] = sprintf("El pago de $%s NO SE ACREDITO ",$data['unit_price']);
        $data['importe'] = 0;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
        
        
        $this->registroPago($data);


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $this->mensajes[]= sprintf("El pago de '%s %s' no se realizo, 'payment_id'=%s ",$this->preference['unit_price'],$this->preference['currency_id'], $data['payment_id']);
       

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }


    public function getMensajes()
    {
        return $this->mensajes;
    }

    public function getPreference()
    {
        return $this->preference;
    }

	public function getPreferences()
    {
        return $this->preferences;
    }
}