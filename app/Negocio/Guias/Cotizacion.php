<?php
namespace App\Negocio\Guias;


use Log;
use DB;

//modelos
use App\Models\Tarifa;
use App\Models\API\Tarifa as TarifaApi;
use App\Models\EmpresaEmpresas;
use App\Models\EmpresaLtd;
use App\Models\API\EmpresaLtd as EmpresaLtdApi;
use App\Models\LtdCobertura;
use App\Models\PostalGrupo;
use App\Models\PostalZona;
use App\Models\DhlTarifas;
use App\Models\Empresa;
use App\Models\API\Empresa as EmpresaApi;
use App\Models\Sucursal;
use App\Models\Cliente;

use App\Models\Cfg_ltd as mCfgLtd;

//Negocio
use App\Negocio\Fedex_tarifas;
use App\Negocio\Saldos\Saldos;

class Cotizacion {

    private $mensaje = array();
    private $tabla = array();
    private $empresaId = 0;
    private $saldo = 0;
    private $tipoPagoId = 0;
    private $sucursal = array();
    private $cliente = array();

     /**
     * Metodo base, Genera la logica para las cotizacion
     *
     * @param array $parametros
     * @return void
    */

    public function base ($request,$ltd_id = 0, $canal ="WEB"){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $empresa_id = auth()->user()->empresa_id;



        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $ltds = mCfgLtd::where("estatus",1)->pluck('nombre',    'id')
                ->toArray();
        Log::debug($ltds);
        $tabla = array();
        foreach ($ltds as $ltdId => $nombre) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." LTD $ltdId => nombre $nombre ");

            $tablaTmp = array();

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $canal");
          

            $query = Tarifa::base($empresa_id,$request['cp_d'], $ltdId);

            $tablaTmp = $query->get()->toArray();

            foreach ($tablaTmp as $key => $value) {
                $tablaTmp[$key]['zona'] = "NA";
            }
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $tabla = array_merge($tabla, $tablaTmp);

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $this->tabla = $tabla;
        }//fin foreach ($empresasLtd as $ltdId => $clasificacion) {

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $saldo = new Saldos();
        $this->saldo = $saldo->porEmpresa($empresa_id);

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $canal");
        if ($canal === "API") {
            $empresa = EmpresaApi::select("tipo_pago_id")->where("id", $empresa_id)->firstOrFail();
        } else {
            $empresa = Empresa::select("tipo_pago_id")->where("id", $empresa_id)->firstOrFail();
        }


        $this->tipoPagoId = $empresa->tipo_pago_id;

    }// fin public function base ($guiaId){


    /**
     * Se obtienen los datos para armar el insert de fedex
     *
     * @author Javier Hernandez
     * @copyright 2022-2023 XpertaMexico
     * @package App\Negocio\Guias
     * @api
     *
     * @version 1.0.0
     *
     * @since 1.0.0 Primera version de la funcion fedexApi
     *
     * @throws
     *
     * @param array $parametros eseseses
     *
     * @var int
     *
     *
     * @return json Objeto con la respuesta de exito o fallo
     */

    public function valoresCotizacion($data){
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $data['costo_kg_extra']= 0;
        $data['costo_seguro'] = 0;
        $data['costo_extendida'] = 0;
        $data['sobre_peso_kg'] =0;
        $data['bSeguro'] = false;

        $data['peso_bascula'] = $data['peso'];
        $data['peso_dimensional'] = ($data['alto']*$data['ancho']*$data['largo'])/5000;

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $data['peso_facturado'] = ($data['peso_bascula'] > $data['peso_dimensional']) ? ceil($data['peso_bascula']) : ceil($data['peso_dimensional']) ;

        $data['pesoFacturado']=$data['peso_facturado'];


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $data['subPrecio'] = $data['costo_kg_extra']+$data['costo_seguro']+$data['costo_extendida'];


        return $data;
    }//private function valoresCotizacion()


    /**
     * Se obtienen los datos obtener el precio
     *
     * @author Javier Hernandez
     * @copyright 2022-2023 XpertaMexico
     * @package App\Negocio\Guias
     * @api
     *
     * @version 1.0.0
     *
     * @since 1.0.0 Primera version de la funcion fedexApi
     *
     * @throws
     *
     * @param array $data informacion de todo el flujo
     *
     * @var int
     *
     *
     * @return json Objeto con la respuesta de exito o fallo
     */

    public function calculoPrecio($data) {
        $data['zona'] = $this->tarifa['zona'];
        $data['costo_base'] = $this->tarifa['costo'];
        $data['costo_seguro'] = 0;
        $data['costo_kg_extra'] = 0;
        $data['costo_extendida'] = 0;

        //Calcula sobre peso
        if ($data['peso_facturado'] > $this->tarifa['kg_fin'] ) {

            $data['sobre_peso_kg'] = $data['peso_facturado'] - $this->tarifa['kg_fin'];
            $data['costo_kg_extra'] = $data['sobre_peso_kg'] * $this->tarifa['kg_extra'];
        }
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        //valida Seguro
        if ($data['valor_envio'] > 0) {
            $data['costo_seguro'] = ($data['valor_envio']* $this->tarifa['seguro'])/100;
            $data['bSeguro'] = true;

        }

        $data['extendida'] = $this->tarifa['extendida_cobertura'];
        //Valida area extendida
        if ( $this->tarifa['extendida_cobertura'] === "SI"){
            $data['costo_extendida'] = $this->tarifa['extendida'];

        }
        $data['subPrecio'] = $data['costo_base']+$data['costo_kg_extra']+$data['costo_seguro'] + $data['costo_extendida'];
        $data['precio'] = round($data['subPrecio']*1.16, 2);
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return $data;
    } //fin calculoPrecio



     /**
     * Se busca validar que tipo de cotizacion es Manu, Semi o Libreta
     * 
     * @author Javier Hernandez
     * @copyright 2022-2023 XpertaMexico
     * @package App\Negocio\Guias
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion cotizacionTipo
     * 
     * @throws
     *
     * @param array $data informacion de todo el flujo 
     * 
     * @var int 
     * 
     * 
     * @return json Objeto con la respuesta de exito o fallo 
     */

    public function cotizacionTipo($objeto) {

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $esManual = $objeto['esManual'];

        switch ($esManual) {
            case 'NO':
                Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." Obteniendo direccion");
                $this->cliente = Cliente::findOrFail($objeto["cliente_id"]);
                $this->sucursal = Sucursal::findOrFail($objeto["sucursal_id"]);
                break;
            case 'SI':

                break;

            case 'SEMI':
                Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." semi");
                $this->sucursal = Sucursal::findOrFail($objeto["sucursal_id"]);
                break;
            default:
                // code...
                break;
        }


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }

    public function getMensaje ()
    {
        return $this->mensaje;
    }

    public function getTabla()
    {
        return $this->tabla;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getTipoPagoId()
    {
        return $this->tipoPagoId;
    }


    public function getSucursal()
    {
        return $this->sucursal;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

}// Fin Clase

