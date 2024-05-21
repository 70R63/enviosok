<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCotizadorRequest;
use App\Http\Requests\UpdateCotizadorRequest;
use Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


use App\Models\Cotizador;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\Cliente;
use App\Models\CP;
use App\Models\Guia;
use App\Models\Empresa;

use App\Negocio\Guias\Cotizacion as nCotizacion;
use App\Negocio\MercadoPago\MercadoPago as nMercadoPago;

class CotizadorController extends Controller
{

    const INDEX_r = "cotizaciones.index";

    const DASH_v = "cotizaciones.dashboard";
    const CREAR_v = "cotizaciones.crear";
    const EDITAR_v = "cotizaciones.editar";
    const SHOW_v = "cotizaciones.show";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);

            $objeto = $request->all();           
            Log::debug(print_r($objeto,true));

            $sucursal = Sucursal::orderby('nombre')->pluck('nombre','id');

            $cliente = Cliente::orderby('contacto')->pluck('contacto','id');

            $nMercadoPago = new nMercadoPago();
            $nMercadoPago->preferences();
            $preferences = $nMercadoPago->getPreferences();

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            return view(self::DASH_v 
                    ,compact( "objeto", "preferences")

                );

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." Exception");
        }
    }

    /**
     * Crea los atributos para la vista web
     * .
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." INICIANDO-----------------");
        try {

            $objeto = $request->all();
            Log::debug(print_r($objeto,true));
            
            $empresaId = auth()->user()->empresa_id;

            Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." Validacion esManual");

            $nCotizacion = new nCotizacion();
            $nCotizacion->cotizacionTipo($objeto);


            $sucursal= $nCotizacion->getSucursal();
            $cliente= $nCotizacion->getCliente();

            Log::info(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." ==>DEBUG  ");
            $objeto['pesos'] = explode(",", $request['pesos'][0] );
            $objeto['largos'] = explode(",", $request['largos'][0] );
            $objeto['anchos'] = explode(",", $request['anchos'][0] );
            $objeto['altos'] = explode(",", $request['altos'][0] );

            Log::debug(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." $empresaId");
            $empresa = Empresa::findOrFail($empresaId);
            Log::debug(__CLASS__." ".__FUNCTION__." LINE ".__LINE__." ==>DEBUG  ");
            Log::debug(print_r($empresa->nombre,true));
            $objeto['clienteXperta'] = $empresa->nombre;
            $objeto['empresa_id'] = $empresa->id;
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." Obteniendo Servicio");
            $servicio = Servicio::findOrFail($request->get("servicio_id"));

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." Obteniendo precio");
            $precio = $request->get("precio");
            $ltd_nombre = $request->get("ltd_nombre");
            $piezas = $request->get("piezas_guia");

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." objeto");
            Log::debug(print_r($objeto,true));
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." sucursal");
            Log::debug(print_r($sucursal->toArray(),true));
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." cliente");
            Log::debug(print_r($cliente,true));

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." FINALIZANDO CON EXITO-----------------");
            return view(self::CREAR_v
                , compact('cliente', 'sucursal', 'precio', 'piezas', 'ltd_nombre','objeto','servicio')
            );

        } catch(\Illuminate\Database\QueryException $ex){
            Log::info(__CLASS__." ".__FUNCTION__." "."QueryException");
            Log::debug($ex->getMessage());

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." "."Exception");
            Log::debug( $e->getMessage() );

        }

        Log::info(__CLASS__." ".__FUNCTION__." FINALIZANDO CON ERROR-----------------");
        return \Redirect::back()
                ->withErrors(array($ex->errorInfo[2]))
                ->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCotizadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCotizadorRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." INICIANDO-----------------");
        try {

            
            Log::debug(print_r($request->route()->parameter('cotizacione'),true));
            $objeto = $request->all();

            Log::debug(print_r($objeto,true));


            $nCotizacion = new nCotizacion();
           
            return view(self::DASH_v 
                    ,compact( "objeto")
                );

        } catch(\Illuminate\Database\QueryException $ex){ 
            Log::info(__CLASS__." ".__FUNCTION__." "."QueryException");
            Log::debug($ex->getMessage()); 
    
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." "."Exception");
            Log::debug( $e->getMessage() );

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizador $cotizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCotizadorRequest  $request
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCotizadorRequest $request, Cotizador $cotizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizador $cotizador)
    {
        //
    }
}
