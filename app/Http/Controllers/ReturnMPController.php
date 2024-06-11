<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//GENERAL
use Log;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;


//NEGOCIO
use App\Negocio\MercadoPago\MercadoPago as nMarcadoPago; 



class ReturnMPController extends Controller
{
    //

    public function success(Request $request)
    {
        $tabla = array();
        $iniciarBusqueda =true;
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $data = $request->all(); 
            Log::debug(print_r($data,true));
            $data['empresa_id'] = auth()->user()->empresa_id;

            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            $nMarcadoPago = new nMarcadoPago();
            $nMarcadoPago->pagoExitoso($data);
            
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            return \Redirect::route("cotizaciones.index") -> withSuccess ($nMarcadoPago->getMensajes());    
            
        } catch (ValidationException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ValidationException");       
            $mensaje = sprintf("ValidationException - %s",$mensajeInterno );

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = "ModelNotFoundException - Favor de buscar a tu administrador ";
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException");       
            $mensaje = "QueryException - Favor de buscar a tu administrador ";
        
        } catch (\Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::debug(print_r($mensaje,true));
            Log::info("Error general ");       
        }
        $notices[] = $mensaje;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return \Redirect::route("finanzas.pasarela.index") -> withErrors ($notices);
    }



    public function failure(Request $request)
    {
        $mensaje = "";
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $data= $request->all();
            Log::debug(print_r($data,true));
            $data['empresa_id'] = auth()->user()->empresa_id;
           
            $nMarcadoPago = new nMarcadoPago();
            $nMarcadoPago->pagoFallido($data);
            
            
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
            return \Redirect::route("finanzas.pasarela.index") -> withErrors ($nMarcadoPago->getMensajes()); 
            

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = "ModelNotFoundException - Favor de buscar a tu administrador ";
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException");       
            $mensaje = "QueryException - Favor de buscar a tu administrador ";
        
        } catch (\Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::debug(print_r($mensaje,true));
            Log::info("Error general ");       
        }
        $notices[] = $mensaje;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return \Redirect::route("finanzas.pasarela.index") -> withErrors ($notices);
    }


    public function pending(Request $request)
    {
        
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $data = $request->all();
            $data['empresa_id'] = auth()->user()->empresa_id;
            Log::debug(print_r($data,true));
           
            $nMarcadoPago = new nMarcadoPago();
            $nMarcadoPago->pagoPendiente($data);

            $mensaje= $nMarcadoPago->getMensajes();  
            

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("ModelNotFoundException");       
            $mensaje = "ModelNotFoundException - Favor de buscar a tu administrador ";
        
        } catch (QueryException $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensajeInterno=$e->getMessage();
            Log::debug(print_r($mensajeInterno,true));
            Log::info("QueryException");       
            $mensaje = "QueryException - Favor de buscar a tu administrador ";
        
        } catch (\Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $mensaje=$e->getMessage();
            Log::debug(print_r($mensaje,true));
            Log::info("Error general ");       
        }
        $notices[] = $mensaje;
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
        return \Redirect::route("finanzas.pasarela.index") -> withErrors ($notices);
    }
}
