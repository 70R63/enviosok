<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController;
use App\Models\Cliente;
use App\Models\Sucursal;

use Log;

class DireccionController extends ApiController
{
    /**
     * Index,  api
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo)
    {
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." INICIANDO-----------------");
        Log::debug($tipo);
        

        try {

            $tabla = [];
            if($tipo === "destinatario"){
                Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);
                
                foreach (Cliente::all() as $i){
                    $tabla[]=[
                        'id'=>$i->id,
                        'nombre'=>$i->nombre,
                        'contacto'=>$i->contacto,
                        'direccion'=>$i->domicilio->calle,
                        'colonia'=>$i->domicilio->colonia,
                        'ciudad'=>$i->domicilio->municipio_alcaldia,
                        'cp'=>$i->domicilio->cp,
                        'entidad_federativa'=>$i->domicilio->estado,
                        'telefono'=>$i->telefono,
                    ];
                }
            }else{
                Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__);

                foreach (Sucursal::all() as $i){

                    Log::debug(print_r($i->toArray(),true));
                    $tabla[]=[
                        'id'=>$i->id,
                        'nombre'=>$i->nombre,
                        'contacto'=>$i->contacto,
                        'direccion'=>$i->domicilio->calle,
                        'colonia'=>$i->domicilio->colonia,
                        'ciudad'=>$i->domicilio->municipio_alcaldia, 
                        'cp'=>$i->domicilio->cp,
                        'entidad_federativa'=>$i->domicilio->estado,
                        'telefono'=>$i->telefono,
                    ];
                }
            }
            /**/


            $success['mensaje'] = "Asignacion exitosa";

            return $this->successResponse($tabla, 'User login successfully.');

        } catch(\Illuminate\Database\QueryException $e){
            Log::info(__CLASS__." ".__FUNCTION__." QueryException");
            Log::debug($e->getMessage());
            $mensaje = $e->getMessage();

        } catch (\Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." Exception");
            Log::debug( $e->getMessage() );
            $mensaje = $e->getMessage();
        }
        Log::info(__CLASS__." ".__FUNCTION__." FINALIZANDO-----------------");
        return $this->sendError($mensaje);

    }
}
