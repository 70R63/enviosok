<?php
namespace App\Negocio\Finanzas;

//GENERAL
use Carbon\Carbon;
use Log;
use DB;
use Illuminate\Support\Facades\Storage;

//modelos
use App\Models\User;
use App\Models\Empresa;
use App\Models\Misfinanzas\CatalogoRegimenFiscal;
use App\Models\Misfinanzas\CatalogoUsoCfdi;
use App\Models\Misfinanzas\ConstanciaFiscal;
use App\Models\Domicilio;

//Negocio


//DTO

use Illuminate\Validation\ValidationException;

class DatosFiscales {
 
 	private $numeroDeSolicitud = 0;
 	private $constancias = null;
    private $catalogoRegimenFiscal = array();
    private $catalogoUsoCfdi = array();

	function __construct($numeroDeSolicitud) {
        $this->numeroDeSolicitud = $numeroDeSolicitud;
    }

	/**
     * Se busca obtener los datos complemtarias para la constancia fiscal toman do como base el registro de empressa
     * 
     * @author Javier Hernandez
     * @copyright 2024 XpertaMexico
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtener
     * 
     * @throws \LogicException
     *
     * @param array $parametros eseseses
     * 
     * @var int 
     * @var App\Negocio\Fedex_tarifas $fedexTarifa
     * @var string $cp 
     * @var string $cp_d
     * @var array $body valores unicos par envio al LTD
     * @var string $canal valor que indentifica de donde se realiza la peticion
     * 
     * 
     * @return void
     */

	public function constancias(){

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud); 

	 	$this->constancias = Empresa::base()
            ->where("empresas.id", auth()->user()->empresa_id)
            ->get()
            ;

		Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud); 

	}


   
    /**
     * La funcion regimenFiscalPorTipoPersona busca obtern los regimen fiscales 
     * asociados al tipo persona
     * 
     * @author Javier Hernandez
     * @copyright 2024 XpertaMexico
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtener regimenFiscalPorTipoPersona
     * 
     * @throws ModelNotFoundException
     * @throws QueryException
     * @throws ValidationException
     *
     * @param int $tipoPersonaId 
     * 
     * @var int 
     * @var App\Negocio\Fedex_tarifas $fedexTarifa
     * @var string $cp 
     * @var string $cp_d
     * @var array $body valores unicos par envio al LTD
     * @var string $canal valor que indentifica de donde se realiza la peticion
     * 
     * 
     * @return void
     */

    public function regimenFiscalPorTipoPersona(int $tipoPersonaId){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud);

        $this->catalogoRegimenFiscal = CatalogoRegimenFiscal::where("tipo_persona", $tipoPersonaId)
            ->pluck("descripcion", "regimen_fiscal_id")
            ->toArray();

        Log::info($this->numeroDeSolicitud." ".print_r($this->catalogoRegimenFiscal,true));
        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud);

    }


    /**
     * La funcion usoCdiPorTipoPersona busca obtener los Uso de CFDi 
     * asociados al tipo persona
     * 
     * @author Javier Hernandez
     * @copyright 2024 XpertaMexico
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtener usoCdiPorTipoPersona
     * 
     * @throws ModelNotFoundException
     * @throws QueryException
     * @throws ValidationException
     *
     * @param int $tipoPersonaId 
     * 
     * @var int 
     * 
     * 
     * @return void
     */

    public function usoCdiPorTipoPersona(int $tipoPersonaId){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud);

        $this->catalogoUsoCfdi = catalogoUsoCfdi::where("tipo_persona", $tipoPersonaId)
            ->pluck("descripcion", "clave")
            ->toArray();

        Log::info($this->numeroDeSolicitud." ".print_r($this->catalogoUsoCfdi,true));
       
    }


    /**
     * La funcion saveComplementoConstancia es ara actualizar datos para CSF
     * y asi se pueda generar facturas
     * 
     * @author Javier Hernandez
     * @copyright 2024 XpertaMexico
     * @package App\Negocio\Finanzas
     * @api
     * 
     * @version 1.0.0
     * 
     * @since 1.0.0 Primera version de la funcion obtener saveComplementoConstancia
     * 
     * @throws ModelNotFoundException
     * @throws QueryException
     * @throws ValidationException
     *
     * @param array $data 
     * 
     * @var int 
     * 
     * 
     * @return void
     */

    public function saveComplementoConstancia($data){

        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." ".$this->numeroDeSolicitud);

        $data['empresa_id'] = auth()->user()->empresa_id;
        $mEmpresa = Empresa::findOrFail(auth()->user()->empresa_id);
        $mEmpresa->update($data);

        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
        $dataDomicio = ["calle" =>$data["calle"],
        ];
        $mDomicilio = Domicilio::where("modelo_id",auth()->user()->empresa_id)->firstOrFail();
        $mDomicilio->update($dataDomicio);

        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
        Log::info(print_r($_FILES['csf_pdf'],true));
        $data['ruta_csf_pdf'] = $_FILES['csf_pdf']['name'];

        Storage::disk('public')->put("csf/".$data['ruta_csf_pdf'], file_get_contents($_FILES['csf_pdf']['tmp_name']));

         Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);

        $constanciaFiscal = ConstanciaFiscal::where("empresa_id",auth()->user()->empresa_id)
        
        ;

        $constanciaFiscalId = 0;
        $data['email']=$data['email_facturacion'];
        if ( count($constanciaFiscal->get()->toArray()) < 1 ) {
            Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
            $constanciaFiscalId = ConstanciaFiscal::create($data)->id;
        } else {
            Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);
            $constanciaFiscalTmp = $constanciaFiscal->first();
            $constanciaFiscalTmp->update($data);
        }

        Log::info($this->numeroDeSolicitud." ".__CLASS__." ".__FUNCTION__." ".__LINE__);


    }

	public function getConstancias(){
		return $this->constancias;
	}

    public function getCatalogoRegimenFiscal(){
        return $this->catalogoRegimenFiscal;
    }

    public function getCatalogoUsoCfdi(){
        return $this->catalogoUsoCfdi;
    }


}