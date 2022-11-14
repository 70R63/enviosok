<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use App\Models\EmpresaLtd;
use App\Models\Sucursal;
use App\Models\Cliente;
use App\Models\Cfg_ltd;
use App\Models\Servicio;


use App\Mail\GuiaCreada;

use App\Dto\EstafetaDTO;
//use App\Dto\Estafeta;
use App\Dto\Guia as GuiaDTO;
use App\Dto\FedexDTO;

use App\Singlenton\Estafeta as sEstafeta;
use App\Singlenton\Fedex;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;
use Mail;
use Config;
use Redirect;

class GuiaController extends Controller
{

    const INDEX_r = "guia.index";

    const DASH_v = "guia.dashboard";
    const CREAR_v = "guia.crear";
    const EDITAR_v = "guia.editar";
    const SHOW_v = "guia.show";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__); 
            $ltdActivo = Cfg_ltd::pluck("nombre","id");
            $cliente = Cliente::pluck("nombre","id");
            $sucursal = Sucursal::pluck("nombre","id");
            $servicioPluck = Servicio::pluck("nombre","id");
            $tabla = Guia::get(); 
            
            Log::debug(__CLASS__." ".__FUNCTION__." Return View DASH_v ");
            return view(self::DASH_v 
                    ,compact("tabla", "ltdActivo","cliente","sucursal", "servicioPluck")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("Error general ");       
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);   
            $ltdActivo = EmpresaLtd::Ltds()
                    ->pluck("nombre","id");
            
            return view(self::CREAR_v 
                    ,compact("ltdActivo")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("Error general ");       
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__."store inicia ----------------------------");
        $mensaje = array();
        try {
            
            Log::debug($request);

            //    dd(Config('ltd.fedex.cred'));
            $requestInicial = $request->except(['_token']);
            //ltd_id = 1 Estafeta
            if ($request['ltd_id'] === Config('ltd.estafeta.id')) {
                Log::debug("Se intancia el Singlento Estafeta");

                $dto = new EstafetaDTO();
                $body = $dto->parser($requestInicial,"WEB");
 
                $sEstafeta = new sEstafeta(Config('ltd.estafeta.id'));
                Log::debug("sEstafeta -> envio()");
                $sEstafeta -> envio($body);
                $resultado = $sEstafeta->getResultado();

                $insert = GuiaDTO::estafeta($sEstafeta,$requestInicial,"WEB");
                $id = Guia::create($insert)->id;

            } else{
                $fedex = Fedex::getInstance(Config('ltd.fedex.id'));

                $fedexDTO = new FedexDTO();
                $etiqueta = $fedexDTO->parser($request);
                
                Log::info(__CLASS__." ".__FUNCTION__." fedex->envio");
                $fedex->envio(json_encode($etiqueta));

                $guiaDTO = new GuiaDTO();
                $guiaDTO->parser($request,$fedex);

                Log::info(__CLASS__." ".__FUNCTION__." Guia::create");
                $id = Guia::create($guiaDTO->insert)->id;
            
            }
            
            
            /*
            * Mail::to($request->email)
            *    ->cc(Config("mail.cc"))
            *    ->send(new GuiaCreada($request, $id));
            */
            $tmp = sprintf("El registro de la guia con ID %d fue exitoso",$id);
            $notices = array($tmp);
            
            Log::info(__CLASS__." ".__FUNCTION__."store Fin ----------------------------");
            Log::debug(__CLASS__." ".__FUNCTION__." INDEX_r");
            return \Redirect::route(self::INDEX_r) -> withSuccess ($notices);

         } catch (\Spatie\DataTransferObject\DataTransferObjectError $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." DataTransferObjectError");
            Log::debug(print_r($ex->getMessage(),true));
            
            $mensaje = $ex->getMessage();

        } catch (\GuzzleHttp\Exception\RequestException $re) {
            Log::info(__CLASS__." ".__FUNCTION__." RequestException INICIO ------------------");
            $response = ($re->getResponse());
            //Log::debug(print_r(($response->getBody()),true));

            $responseContenido = json_decode($response->getBody()->getContents());    

            if (is_object($responseContenido)) {
                Log::debug(print_r($responseContenido,true));
                if ($responseContenido->code === 131) {
                    $mensaje= array($responseContenido->description);

                } else {

                    $mensaje = $responseContenido;
                     return Redirect::back()
                        ->with('dangers',$mensaje)
                        ->withInput();    
                }
                 

            } else{
                //Log::debug(print_r($responseContenido,true));
                
                
                foreach ($responseContenido as $key => $value) {
                    $mensaje = array("desc$key"=> $value->description);                   
                }

            }
            Log::info(__CLASS__." ".__FUNCTION__." RequestException FIN ------------------");

        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ClientException");
            $response = json_decode($ex->getResponse()->getBody());
            Log::debug(print_r($response,true));
            $mensaje = $response->errors[0]->code;
            
        } catch (\GuzzleHttp\Exception\InvalidArgumentException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." InvalidArgumentException");
            Log::debug($ex->getBody());
            $mensaje = "Se ha producido un error interno favor de contactar al proveedor";

        } catch(\Illuminate\Database\QueryException $ex){ 
            Log::info(__CLASS__." ".__FUNCTION__." "."QueryException");
            Log::debug($ex->getMessage()); 
            $mensaje= $ex->errorInfo[2];

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." "."Exception");
            Log::debug( $e->getMessage() );
            $mensaje= $e->getMessage();
        }

        return \Redirect::back()
                ->withErrors($mensaje)
                ->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(Guia $guia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guia $guia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guia $guia)
    {
        //
    }
}
