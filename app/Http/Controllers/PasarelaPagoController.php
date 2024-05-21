<?php

namespace App\Http\Controllers;

//GENERAL
use Log;
use Carbon\Carbon;
use Illuminate\Http\Request;


//NEGOCIO
use App\Negocio\Finanzas\MercadoPago as nMarcadoPago; 

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
            $nMarcadoPago = new nMarcadoPago();
            $nMarcadoPago->preferences();
            Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__); 

            $preferences =$nMarcadoPago->getpreferences();

            return view("finanzas.index" 
                ,compact("preferences")    
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
        return \Redirect::route("dashboard") -> withSuccess ($notices);
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
    public function show(Request $pasarelaPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $pasarelaPago)
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
    public function update(Request $request, Request $pasarelaPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasarelaPago  $pasarelaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $pasarelaPago)
    {
        //
    }
}
