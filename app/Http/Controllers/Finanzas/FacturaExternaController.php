<?php

namespace App\Http\Controllers\Finanzas;
use App\Http\Controllers\Controller;

use App\Http\Requests\Misfinanzas\StoreFacturaExternaRequest;
use App\Http\Requests\Misfinanzas\UpdateFacturaExternaRequest;
use Log;
use Carbon\Carbon;
use Redirect;


//NEGOCIO
use App\Negocio\Finanzas\FacturaExterna as nFacturaExterna;

//EXCEPCIONES
use Exception;
use LogicException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class FacturaExternaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(403, 'Unauthorized action.');
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
     * @param  \App\Http\Requests\StoreFacturaExternaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacturaExternaRequest $request)
    {
        try {
            $numeroDeSolicitud = Carbon::now()->timestamp;
            Log::info("$numeroDeSolicitud ".__CLASS__." ".__FUNCTION__." ".__LINE__);
            $data = $request->all();
            
            Log::info("$numeroDeSolicitud ".print_r($data,true));
            $nFacturaExterna = new nFacturaExterna($numeroDeSolicitud);
            $nFacturaExterna->crear($data);

            if ($nFacturaExterna->getEstatus()) {
                Log::info("$numeroDeSolicitud ".__CLASS__." ".__FUNCTION__." ".__LINE__);
                $nFacturaExterna->actualizaPagoFacturado($data['pago_id']);
                $nFacturaExterna->guardarPdfXmlCFDI($data['pago_id']);
                
                $notices = $nFacturaExterna->getMensajes();
                return Redirect::route("pagos.index") -> withSuccess ($notices);
            } else {
               return Redirect::back()
                ->withErrors($nFacturaExterna->getMensajes())
                ->withInput();
            }
            
           

        } catch (LogicException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("LogicException");       
            $mensaje = sprintf("%s - LogicException - %s","$numeroDeSolicitud",$mensajeInterno );
            


        } catch (ValidationException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ValidationException");       
            $mensaje = sprintf("%s - ValidationException - %s","$numeroDeSolicitud",$mensajeInterno );
            

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = sprintf("%s - ModelNotFoundException - Favor de buscar a tu administrador","$numeroDeSolicitud");
         
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException ".print_r($mensajeInterno,true) );       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");
           
        } catch (Exception $e) {

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::info(print_r($mensaje,true));
            Log::info("Error general ");   
             $mensaje = sprintf("%s - Exception - Favor de buscar a tu administrador","$numeroDeSolicitud");;    
            
        }

        return Redirect::back()
                ->withErrors(array($mensaje))
                ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FacturaExterna  $facturaExterna
     * @return \Illuminate\Http\Response
     */
    public function show(FacturaExterna $facturaExterna)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacturaExterna  $facturaExterna
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaExterna $facturaExterna)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturaExternaRequest  $request
     * @param  \App\Models\FacturaExterna  $facturaExterna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacturaExternaRequest $request, FacturaExterna $facturaExterna)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacturaExterna  $facturaExterna
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacturaExterna $facturaExterna)
    {
        abort(403, 'Unauthorized action.');
    }
}
