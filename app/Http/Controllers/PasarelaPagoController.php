<?php

namespace App\Http\Controllers;

//GENERAL
use Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

//MODELS
use App\Models\PasarelaPago;


//NEGOCIO
use App\Negocio\Saldos\MercadoPago as nMarcadoPago; 

class PasarelaPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try {
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
          
            
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 
            return view("finanzas.index" 
                
            );
            
            

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function show(PasarelaPago $pasarelaPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function edit(PasarelaPago $pasarelaPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasarelaPago $pasarelaPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasarelaPago $pasarelaPago)
    {
        //
    }
}
