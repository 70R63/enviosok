<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CP;
use App\Models\SEPOMEX;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function successResponse($result, $message)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,

        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function domicilio(Request $request)
    {

        $domicilio = SEPOMEX::where('d_codigo', $request->cp)->first();
        $colonias = SEPOMEX::where('d_codigo', $request->cp)->pluck('d_tipo_asenta','d_asenta');
        if(!isset($domicilio->d_codigo)){
            return Response::json([
                'mensaje' => 'sin resultados'
            ], 200);
        }
        $html = '';
        if(!empty($colonias)){
            $html .= '<select id="colonia" class="form-control select-colonia" name="colonia">';
            foreach ($colonias as $colonia => $tipo) {
                $html .= '<option value="'.$colonia.'" data-tipoAsenta="'.$tipo.'">'.$colonia.'</option>';
            }
            $html .= '<option value="otra" data-tipoAsenta="Colonia">Otra</option>';

            $html .= '</select>';
        }else{
            $html .= '<input type="text" class="form-control" id="colonia" name="colonia" value="">';
        }
        return Response::json([
            'mensaje' => 'resultados',
            'domicilio' => $domicilio,
            'colonias' => $html
        ], 200);
    }

    public function getCP(Request $request)
    {
        $domicilio = SEPOMEX::where('d_codigo','like', "%$request->cp%")->orWhere('d_asenta','like',"%$request->cp%")->first();
        if(!isset($domicilio->d_codigo)){
            return Response::json([], 200);
        }

        $colonias = SEPOMEX::where('d_codigo', 'like', "%$request->cp%")->orWhere('d_asenta','like',"%$request->cp%")->pluck('d_codigo','d_asenta');
        foreach ($colonias as $colonia => $cp) {
            $data[]=['colonia'=>$cp.' - '.$colonia,'cp'=>$cp];
        }
        return Response::json(
            $data
        , 200);
    }
    public function municipioAutocomplete(Request $request){
        $qry = $request->post('qry');
        $municipios = DB::table('sepomex')
            ->select(DB::raw('max(c_mnpio) as c_mnpio, d_mnpio, d_estado,max(d_codigo) as d_codigo, id_asenta_cpcons'))
            //REPLACE(concat(name,' ',paterno,' ',materno), 'ÁÀÉÈÍÌÓÒÚÙ', 'AAEEIIOOUU') LIKE REPLACE('%".$request->nombre."%', 'ÁÀÉÈÍÌÓÒÚÙ', 'AAEEIIOOUU')
            ->whereRaw("REPLACE(d_mnpio, 'áàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ', 'aaeeiioouuAAEEIIOOUU') like REPLACE('%".$qry."%', 'áàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ', 'aaeeiioouuAAEEIIOOUU')")
            //->where('d_mnpio', 'like', '%'.$qry.'%')
            ->groupBy('d_mnpio')
            ->groupBy('d_estado')
            ->groupBy('id_asenta_cpcons')
            ->get();

        $data=[];
        foreach($municipios as $municipio){
            $data[]=[
                'value'=>$municipio->c_mnpio,
                'text'=>$municipio->d_mnpio.' ('.$municipio->d_estado.')',
                'obj'=>$municipio
            ];
        }
        return Response::json($data);
    }

    public function getColonias(Request $request){
        $colonias=SEPOMEX::select('d_asenta','d_codigo','d_tipo_asenta')->where('d_estado',$request->estado)->where('id_asenta_cpcons',$request['id'])->get();
        $html = '';
        if(!empty($colonias)){
            $html .= '<select id="colonia" class="form-control select-colonia" onchange="getCodigoPostal()" name="colonia">';
            foreach ($colonias as $colonia) {
                $html .= '<option data-cp='.$colonia->d_codigo.' data-tipoAsenta="'.$colonia->d_tipo_asenta.'" value="'.$colonia->d_asenta.'">'.$colonia->d_asenta.'</option>';
            }
            $html .= '<option value="otra" data-tipoAsenta="Colonia">Otra</option>';

            $html .= '</select>';
        }else{
            $html .= '<input type="text" class="form-control" id="colonia" name="colonia" value="">';
        }
        return Response::json([
            'mensaje' => 'resultados',
            'colonias' => $html
        ], 200);

    }
}
