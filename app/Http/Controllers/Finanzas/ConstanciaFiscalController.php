<?php
namespace App\Http\Controllers\Finanzas;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConstanciaFiscalRequest;
use App\Http\Requests\UpdateConstanciaFiscalRequest;

//MODELS
use App\Models\Misfinanzas\ConstanciaFiscal;


//GENERAL
use Log;
use Carbon\Carbon;

//NEGOCIO
use App\Negocio\Finanzas\DatosFiscales as nDatosFiscales;

use Exception;
use LogicException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;


class ConstanciaFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        try {
            $tabla = array();
            $numeroDeSolicitud = Carbon::now()->timestamp;
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            
            $datosFiscales = new nDatosFiscales($numeroDeSolicitud);
            $datosFiscales->constancias();
            $tabla = $datosFiscales->getConstancias();

            Log::debug(print_r($tabla,true));
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                );

        } catch (LogicException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("LogicException");       
            $mensaje = sprintf("%s - LogicException - %s","$numeroDeSolicitud",$mensajeInterno );
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                )->withErrors(array($mensaje));


        } catch (ValidationException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ValidationException");       
            $mensaje = sprintf("%s - ValidationException - %s","$numeroDeSolicitud",$mensajeInterno );
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                )->withErrors(array($mensaje));

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = sprintf("%s - ModelNotFoundException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                )->withErrors(array($mensaje));
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException");       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                )->withErrors(array($mensaje));
        } catch (Exception $e) {

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::debug(print_r($mensaje,true));
            Log::info("Error general ");   
             $mensaje = sprintf("%s - Exception - Favor de buscar a tu administrador","$numeroDeSolicitud");;    
            return view("finanzas.datosfiscales.index" 
                    ,compact("tabla")
                )->withErrors(array($mensaje));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConstanciaFiscalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConstanciaFiscalRequest $request)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConstanciaFiscal  $constanciaFiscal
     * @return \Illuminate\Http\Response
     */
    public function show(ConstanciaFiscal $constanciaFiscal)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConstanciaFiscal  $constanciaFiscal
     * @return \Illuminate\Http\Response
     */
    public function edit(int $empresa_id)
    {
        try {
            $numeroDeSolicitud = Carbon::now()->timestamp;
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");

            
            $datosFiscales = new nDatosFiscales($numeroDeSolicitud);
            $datosFiscales->constancias();
            $tabla = $datosFiscales->getConstancias();

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            return view("finanzas.datosfiscales.editar" 
                );

        } catch (LogicException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("LogicException");       
            $mensaje = sprintf("%s - LogicException - %s","$numeroDeSolicitud",$mensajeInterno );
            return view("finanzas.datosfiscales.index")->withErrors(array($mensaje));


        } catch (ValidationException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ValidationException");       
            $mensaje = sprintf("%s - ValidationException - %s","$numeroDeSolicitud",$mensajeInterno );
            return view("finanzas.datosfiscales.index")->withErrors(array($mensaje));

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = sprintf("%s - ModelNotFoundException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            
            return view("finanzas.datosfiscales.index")->withErrors(array($mensaje));
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException");       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            return view("finanzas.datosfiscales.index")->withErrors(array($mensaje));

        } catch (Exception $e) {

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::debug(print_r($mensaje,true));
            Log::info("Error general ");   
             $mensaje = sprintf("%s - Exception - Favor de buscar a tu administrador","$numeroDeSolicitud");;    
            return view("finanzas.datosfiscales.index")->withErrors(array($mensaje));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConstanciaFiscalRequest  $request
     * @param  \App\Models\ConstanciaFiscal  $constanciaFiscal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConstanciaFiscalRequest $request, ConstanciaFiscal $constanciaFiscal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConstanciaFiscal  $constanciaFiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConstanciaFiscal $constanciaFiscal)
    {
        //
    }
}
