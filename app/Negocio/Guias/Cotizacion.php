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
use App\Negocio\Guias\Creacion as nCreacion;

use Exception;
use Illuminate\Validation\ValidationException;

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
        $this->todosLtds($request, $canal);

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
     * Funcion todosLtds hace un foreach de todas las LTDS
     *
     * @author Javier Hernandez
     * @copyright 2024 Envios-OK
     * @package App\Negocio\Guias
     *
     * @version 1.0.0
     *
     * @since 1.0.0 Primera version de la funcion pesoFacturado
     *
     * @throws
     *
     * @param array $data Informacion general de la peticion
     *
     *
     * @return $data Se agra informacion segun la necesidad
     */

    public function todosLtds($data, $canal){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        $ltds = mCfgLtd::where("estatus",1)->pluck('nombre',    'id')
                ->toArray();
        Log::debug($ltds);
        $tabla = array();

        foreach ($ltds as $ltdId => $nombre) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." LTD $ltdId => nombre $nombre ");

            $tablaTmp = array();
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $canal");
            switch ($nombre) {
                case 'FEDEX':
                    Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__);
                    $zona = Tarifa::fedexZona($data['cp'],$data['cp_d']);
                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." zona=$zona");
                    $query = Tarifa::base($data['cp_d'], $ltdId)
                        ->pesoFacturado($data['pesoFacturado'])
                        ->zona($zona)
                        ;
                    $tablaTmp = $query->get()->toArray();
                    break;
                case 'ESTAFETA':
                    Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__);

                    $query = Tarifa::base($data['cp_d'], $ltdId)
                        ->pesoFacturado($data['pesoFacturado']);

                    $tablaTmp = $query->get()->toArray();

                    foreach ($tablaTmp as $key => $value) {
                        $tablaTmp[$key]['zona'] = "NA";
                    }

                    break;

                case 'DHL':
                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

                    $estadoCoberturaOrigen = LtdCobertura::select('estado', 'extendida')
                            ->where('ltd_id',Config('ltd.dhl.id'))
                            ->where('cp',$data['cp'])
                            ->get()->toArray()
                            ;

                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
                    $estadoCoberturaDestino = LtdCobertura::select('estado', 'extendida', 'ocurre' )
                            ->where('ltd_id',Config('ltd.dhl.id'))
                            ->where('cp',$data['cp_d'])
                            ->get()->toArray()
                            ;

                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
                    if ( !(count($estadoCoberturaOrigen) * count($estadoCoberturaDestino) )  ) {
                        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
                        Log::debug("No se cuenta con cobertura");
                        break;
                    }

                    Log::debug(print_r($estadoCoberturaDestino,true));
                    $postalGrupoOrigen = PostalGrupo::select('grupo')
                            ->where('ltd_id',Config('ltd.dhl.id'))
                            ->where('entidad_federativa',$estadoCoberturaOrigen[0])
                            ->get()->pluck('grupo')->toArray()
                            ;

                    $postalGrupoDestino = PostalGrupo::select('grupo')
                            ->where('ltd_id',Config('ltd.dhl.id'))
                            ->where('entidad_federativa',$estadoCoberturaDestino[0])
                            ->get()->pluck('grupo')->toArray()
                            ;

                    Log::debug("Grupos Postales ".$postalGrupoOrigen[0]." ".$postalGrupoDestino[0]);

                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
                    $zona = PostalZona::select('zona')
                            ->where('ltd_id',Config('ltd.dhl.id'))
                            ->where('grupo_origen',$postalGrupoOrigen[0])
                            ->where('grupo_destino', $postalGrupoDestino[0])
                            ->get()->pluck('zona')->toArray()
                            ;


                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." Zona ".$zona[0]);

                    $query = Tarifa::base($data['cp_d'], $ltdId)
                        ->pesoFacturado($data['pesoFacturado'])
                        ->zona($zona[0]);
                    Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." tablaTmp");
                    $tablaTmp = $query->get()->toArray();

                    break;


                default:
                    // code...
                    break;
            }

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $tabla = array_merge($tabla, $tablaTmp);

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $this->tabla = $tabla;
        }//fin foreach ($empresasLtd as $ltdId => $clasificacion) {

    }


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



    /**
     * Funcion pesoFaturado usado para calcular cual es el peso a facturar entre dimensinal o bascula
     *
     * @author Javier Hernandez
     * @copyright 2024 Envios-OK
     * @package App\Negocio\Guias
     *
     * @version 1.0.0
     *
     * @since 1.0.0 Primera version de la funcion pesoFacturado
     *
     * @throws
     *
     * @param array $data Informacion general de la peticion
     *
     *
     * @return $data Se agra informacion segun la necesidad
     */

    public function pesoFacturado($data){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $data['peso_bascula'] = $data['peso'];
        $data['peso_dimensional'] = ($data['alto']*$data['ancho']*$data['largo'])/5000;

        $data['peso_facturado'] = ($data['peso_bascula'] > $data['peso_dimensional']) ? ceil($data['peso_bascula']) : ceil($data['peso_dimensional']) ;

        $data['pesoFacturado']=$data['peso_facturado'];
        return $data;

    }


    /**
     * Funcion que regresara lo valores reale de las cotizaciones al cotizar externo
     *
     * @author Javier Hernandez
     * @copyright 2024 Envios-Ol
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

    public function externa($request) {

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        Log::debug($request->all());


        $data = array();
        $data['cp'] = explode(' - ',$request->origen)[0] ?? $request->origen;
        $data['cp_d'] = explode(' - ',$request->destino)[0] ?? $request->destino;
        $data['peso'] = $request->peso;
        $data['alto'] = $request->alto;
        $data['largo'] = $request->largo;
        $data['ancho'] = $request->ancho;

        $data = $this->pesoFacturado($data);

         if ( $data['pesoFacturado'] > 68 ) {

            throw ValidationException::withMessages(array("Peso Maxima superado, Peso maximo 68 kg"));
        }

        $this->todosLtds($data, "Externo");

        if ( count($this->tabla) < 1 ) {
            throw new Exception("No se encontraron resultados para cotizacion");
        }

        Log::debug($this->tabla);

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

    }


    /**
     * Funcionpara armar el html de cotizacion externa
     *
     * @author Javier Hernandez
     * @copyright 2024 Envios-Ol
     * @package App\Negocio\Guias
     * @api
     *
     * @version 1.0.0
     *
     * @since 1.0.0 Primera version de la funcion cotizacionTipo
     *
     * @throws
     *
     * @param
     *
     * @var string $html usado para armar un codigo de html
     * @var string $url_base url del sistema
     * @var array $estimadoEntrega Arreglo para leyyendas de tiempo de entrega
     *
     * @return json Objeto con la respuesta de exito o fallo
     */

    public function externaHtml() {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

        $html="";
        $url_base = config('app.url');


        $estimadoEntrega=[1=>"De 2 a 7 días hábiles"
            ,2=>"De 1 a 2 días hábiles"
        ];

        foreach ($this->tabla as $cotizacion) {
            $html .= '<div class="row border rounded-4 py-2 my-2 align-items-center">';
            $html .= '<div class="col-md-3 text-center">';
            $html .= '<img style="max-width: 100px" src="' . $url_base . '/img/' . strtolower($cotizacion['nombre']) . '.png" alt="' . $cotizacion['nombre'] . '">';
            $html .= '</div>';
            $html .= '<div class="col-md-3 text-center">';
            $html .= '<h6 class="fw-bold">Tipo de envío</h6>';
            $html .= '<span class="badge bg-'.($cotizacion['servicio_id']=='1'?'primary':'warning').'">' . $cotizacion['servicios_nombre'] . '</span><br>';
            $html .= '</div>';
            $html .= '<div class="col-md-3 text-center">';
            $html .= '<h6 class="fw-bold">Estimado de entrega</h6>';
            $html .= '<p class="text-'.($cotizacion['servicio_id']=='1'?'primary':'warning').' fw-semibold m-0">' . $estimadoEntrega[$cotizacion['servicio_id']] . '</p>';
            $html .= '</div>';
            $html .= '<div class="col-md-3 text-center">';
            $html .= '<h4 class="fw-bold mb-0">$' . $cotizacion['costo'] . '</h4>';
            $html .= '<p class="small m-0">Último precio</p>';
            $html .= '<p class="m-0">';
            $html .= '<a href="' . $url_base . '/login" class="btn btn-sm btn-primary fw-bold text-warning">Crear guía</a>';
            $html .= '</p>';
            $html .= '</div>';
            $html .= '</div>';
        }


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return $html;

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

