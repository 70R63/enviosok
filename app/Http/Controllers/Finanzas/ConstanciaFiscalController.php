<?php
namespace App\Http\Controllers\Finanzas;
//GENERAL
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConstanciaFiscalRequest;
use App\Http\Requests\UpdateConstanciaFiscalRequest;
use Log;
use Carbon\Carbon;

//MODELS
use App\Models\Misfinanzas\ConstanciaFiscal;
use App\Models\Misfinanzas\CatalogoPersonaFiscal;


//NEGOCIO
use App\Negocio\Finanzas\DatosFiscales as nDatosFiscales;

//EXCEPCIONES
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
        //abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConstanciaFiscalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConstanciaFiscalRequest $request)
    {
        try {
            $tabla = array();

            $numeroDeSolicitud = Carbon::now()->timestamp;
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            Log::info("$numeroDeSolicitud ".print_r($request->all(),true));

            $nDatosFiscales = new nDatosFiscales($numeroDeSolicitud);
            $nDatosFiscales->saveComplementoConstancia($request->all());
            
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            $notices=array("Exitoso");

            return \Redirect::route("finanzas.datosfiscales.index") -> withSuccess ($notices);

        } catch (LogicException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("LogicException");       
            $mensaje = sprintf("%s - LogicException - %s","$numeroDeSolicitud",$mensajeInterno );
            return \Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();


        } catch (ValidationException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ValidationException");       
            $mensaje = sprintf("%s - ValidationException - %s","$numeroDeSolicitud",$mensajeInterno );
            return \Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = sprintf("%s - ModelNotFoundException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            
            return \Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException ".print_r($mensajeInterno,true) );       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");
            return \Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();
        } catch (Exception $e) {

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::info(print_r($mensaje,true));
            Log::info("Error general ");   
             $mensaje = sprintf("%s - Exception - Favor de buscar a tu administrador","$numeroDeSolicitud");    
            return \Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();
        }
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
            $csf = $datosFiscales->getConstancias()[0];

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");

            Log::info("$numeroDeSolicitud ".__CLASS__." ".__FUNCTION__." ".__LINE__." ".print_r($csf->toArray(),true));
            $catalogoPersonaFiscal = CatalogoPersonaFiscal::pluck("descripcion", "id")->toArray();


            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." $numeroDeSolicitud");
            return view("finanzas.datosfiscales.editar",
                compact("catalogoPersonaFiscal", "csf") 
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
