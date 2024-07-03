<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Log;

class Sucursal extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Agraga a la consulta los casos de negocio.
     *
     *
    */

    protected static function boot()
    {

        parent::boot();
        static::addGlobalScope('estatus', function (Builder $builder) {
            $builder->where('sucursals.estatus', '1');

            $empresaId =  isset(auth()->user()->empresa_id)  ? auth()->user()->empresa_id : 2 ;
            $empresas = EmpresaEmpresas::where('id',$empresaId)
                ->pluck('empresa_id')->toArray();
            $builder->whereIN('empresa_id',$empresas);
        });
    }

    /**
     * Funcion para crear un objeto para insertar el registro del cliente.
     *
     * @param $request
     * @return array
     *
    */

    public function insertParse($request){
        Log::info(__CLASS__." ".__FUNCTION__." INICIANDO ---------");

        if ($request['esManual'] === "SI" || $request['esManual'] === "SEMI" || $request['esManual'] === "API") {
            $empresa_id = $request['empresa_id'];
        } else {
            $empresa_id = auth()->user()->empresa_id;
        }

        $insert = array(
            "nombre"    => $request['nombre']
            ,"contacto" => $request['contacto']
            ,"direccion"=> $request['calle']
            ,"cp"       => $request['cp']
            ,"celular"  => $request['celular']
            ,"telefono" => $request['telefono']
            ,"empresa_id"=>$empresa_id
            );

        $this->insertId = $this->create($insert)->id;
        Log::info(__CLASS__." ".__FUNCTION__." ");
        Domicilio::updateOrCreate([
            'modelo_id'=>$this->insertId,
            'modelo_type'=>$this->getMorphClass(),
        ],
            [
                'cp'=>$request->cp,
                'estado'=>$request->estado,
                'codigo_estado'=>@$request->codigo_estado,
                'municipio_alcaldia'=>$request->municipio_alcaldia,
                'colonia'=>$request->colonia,
                'tipo_asentamiento'=>$request->tipo_asentamiento,
                'tipo_vialidad_id'=>$request->tipo_vialidad_id,
                'calle'=>$request->calle,
                'ciudad'=>@$request->ciudad,
                'no_exterior'=>$request->no_exterior,
                'no_interior'=>@$request->no_interior,
                'referencias'=>@$request->referencias,
                'latitud'=>@$request->latitud,
                'longitud'=>@$request->longitud,
                'modelo_id'=>$this->insertId,
                'modelo_type'=>$this->getMorphClass(),
            ]);


        Log::info(__CLASS__." ".__FUNCTION__." ".__LINE__." FINALIZANDO ---------");


    }

    /**
     * Funcion para crear un objeto para insertar el registro del remitente.
     *
     * @param $request
     * @return array
     *
    */

    public function existe($request){

        Log::info(__CLASS__." ".__FUNCTION__." INICIANDO ---------");


        if ($request['esManual'] === "SI" || $request['esManual'] === "SEMI" || $request['esManual'] === "API") {
            $empresa_id = $request['empresa_id'];
        } else {
            $empresa_id = auth()->user()->empresa_id;
        }

        $remitente = self::where('nombre', 'like', $request['nombre'])
                        ->where('empresa_id',$empresa_id)
                        ->pluck('id')
                        ->toArray();

        Log::debug(print_r($remitente,true));

        Log::info(__CLASS__." ".__FUNCTION__." FINALIZANDO ---------");
        if (empty($remitente)) {
            Log::info("No exite el remitente");
            $this->existe = false;
        } else {
            Log::info("Se agrego el remitente");
            $this->existe = true;
            $this->insertId = $remitente[0];
        }


    }

    public function getExiste(){
        return $this->existe;
    }


    public function getId(){
        return $this->insertId;
    }

    public function domicilio(){
        return $this->morphOne(Domicilio::class,'modelo');
    }
}
