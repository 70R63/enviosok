<?php

namespace App\Http\Controllers\API\Misfinanzas;

use Log;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Empresa;
use App\Models\EmpresaEmpresas;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use HttpException;

use App\Negocio\Finanzas\DatosFiscales as nDatosFiscales;


class DatosFiscalesController extends ApiController
{
    /**
     * regimenFiscalPorTipoPersona
     *
     * @return \Illuminate\Http\Response
     */
    public function regimenFiscalPorTipoPersona(int $tipoPersonId)
    {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." tipoPersonId = $tipoPersonId");
        $numeroDeSolicitud = Carbon::now()->timestamp;
        
        try {

            $datosFiscales = new nDatosFiscales($numeroDeSolicitud);
            $datosFiscales->regimenFiscalPorTipoPersona($tipoPersonId);

            $resultado = $datosFiscales->getCatalogoRegimenFiscal();
            $mensaje = "ok";
            return $this->successResponse($resultado, $mensaje);

        
        } catch (ValidationException $ex) {
            Log::debug($ex );
            $mensaje = $ex->getMessage();

        } catch (ErrorException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ErrorException");
            Log::debug(print_r($ex,true));

            $mensaje =$ex->getMessage();

        } catch (HttpException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." HttpException");
            $resultado = $ex;
            $mensaje = $ex->getMessage();
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
            Log::info("QueryException");       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." Exception");
            Log::debug(print_r($e->getMessage(),true ));
           $mensaje = $e->getMessage();
        }
        Log::info(__CLASS__." ".__FUNCTION__." FINALIZANDO-----------------");
        return $this->sendError("Exception",$mensaje, "400");
    }


    /**
     * usoCdiPorTipoPersona
     *
     * @return \Illuminate\Http\Response
     */
    public function usoCdiPorTipoPersona(int $tipoPersonId)
    {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." tipoPersonId = $tipoPersonId");
        $numeroDeSolicitud = Carbon::now()->timestamp;
        
        try {

            $datosFiscales = new nDatosFiscales($numeroDeSolicitud);
            $datosFiscales->usoCdiPorTipoPersona($tipoPersonId);

            $resultado = $datosFiscales->getCatalogoUsoCfdi();
            $mensaje = "ok";
            return $this->successResponse($resultado, $mensaje);

        
        } catch (ValidationException $ex) {
            Log::debug($ex );
            $mensaje = $ex->getMessage();

        } catch (ErrorException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ErrorException");
            Log::debug(print_r($ex,true));

            $mensaje =$ex->getMessage();

        } catch (HttpException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." HttpException");
            $resultado = $ex;
            $mensaje = $ex->getMessage();
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
            Log::info("QueryException");       
            $mensaje = sprintf("%s - QueryException - Favor de buscar a tu administrador","$numeroDeSolicitud");

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." Exception");
            Log::debug(print_r($e->getMessage(),true ));
           $mensaje = $e->getMessage();
        }
        Log::info(__CLASS__." ".__FUNCTION__." FINALIZANDO-----------------");
        return $this->sendError("Exception",$mensaje, "400");
    }
}
