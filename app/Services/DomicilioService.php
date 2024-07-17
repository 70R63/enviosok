<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Models\Domicilio;

class DomicilioService
{
    public function guardarDomicilio(Request $request,$modelo, int $empresaId=0){
            Domicilio::updateOrCreate([
                'modelo_id'=>$request->modelo_id??$modelo->id,
                'modelo_type'=>$request->modelo??$modelo->getMorphClass(),
            ],
            [
                'cp'=>$request->cp,
                'estado'=>$request->estado,
                'municipio_alcaldia'=>$request->municipio_alcaldia,
                'colonia'=>$request->colonia,
                'tipo_asentamiento'=>$request->tipo_asentamiento,
                'calle'=>$request->calle,
                'no_exterior'=>$request->no_exterior,
                'no_interior'=>@$request->no_interior,
                'referencias'=>@$request->referencias,
                'latitud'=>@$request->latitud,
                'longitud'=>@$request->longitud,
                'modelo_id'=>$request->modelo_id??$modelo->id,
                'modelo_type'=>$request->modelo??$modelo->getMorphClass(),
                'empresa_id' => $empresaId
            ]);
    }
}
