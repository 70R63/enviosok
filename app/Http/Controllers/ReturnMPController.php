<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//GENERAL
use Log;
use Carbon\Carbon;

//MODELS

//NEGOCIO
use App\Negocio\Saldos\MercadoPago as nMarcadoPago; 



class ReturnMPController extends Controller
{
    //

    public function success(Request $request)
    {
        $tabla = array();
        $iniciarBusqueda =true;
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            Log::debug(print_r($request->all(),true));
           
            
            $mensaje="Pago Exito";

            
            

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
        return \Redirect::route("reportes.pagado.index") -> withSuccess ($notices);
    }



    public function failure(Request $request)
    {
        $mensaje = "";
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            $data= $request->all();
            Log::debug(print_r($data,true));

           
            $nMarcadoPago = new nMarcadoPago();
            $nMarcadoPago->registroPago($data);

            $mensaje="Pago en fallo ";  
            

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
        return \Redirect::route("reportes.pagado.index") -> withSuccess ($notices);
    }


    public function pending(Request $request)
    {
        
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            Log::debug(print_r($request->all(),true));
           
            
            $mensaje="Pago pendiente";  
            

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
        return \Redirect::route("reportes.pagado.index") -> withSuccess ($notices);
    }
}
