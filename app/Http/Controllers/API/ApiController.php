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


    public function cotizar(Request $request){
        $cp_origen = explode(' - ',$request->origen)[1];
        $cp_destino = explode(' - ',$request->destino)[1];
        $peso = $request->peso;
        $alto = $request->alto;
        $largo = $request->largo;
        $ancho = $request->ancho;
        /**
         * Aquí implementar la lógica de cotización utilizando las variables anteriores
         * con base a los resultados armar el html de respuesta como el siguiente
         */
        $html="";
        $url_base = config('app.url');
        $resultadosDemo=[
            'estafeta'=>[
                'disponible'=>true,
                'tipos'=>['Económico','Express'],
                'estimado'=>[
                    'Económico'=>"De 2 a 7 días hábiles",
                    'Express'=>"De 1 a 2 días hábiles",
                ],
                'precio'=>'$150.00'
            ],
            'fedex'=>[
                'disponible'=>true,
                'tipos'=>['Económico','Express'],
                'estimado'=>[
                    'Económico'=>"De 2 a 7 días hábiles",
                    'Express'=>"De 1 a 2 días hábiles",
                ],
                'precio'=>'$200.00'
            ],
            'dhl'=>[
                'disponible'=>true,
                'tipos'=>['Express'],
                'estimado'=>[
                    'Express'=>"De 1 a 2 días hábiles",
                ],
                'precio'=>'$250.00'
            ],
            'ups'=>[
                'disponible'=>false
            ]
        ];

        foreach ($resultadosDemo as $codigo=>$paqueteria){
            if ($paqueteria['disponible']) {
                $html .= '<div class="row border rounded-4 py-2 my-2 align-items-center">';
                $html .= '<div class="col-md-3 text-center">';
                $html .= '<img style="max-width: 100px" src="' . $url_base . '/img/' . $codigo . '.png" alt="' . ucfirst($codigo) . '">';
                $html .= '</div>';
                $html .= '<div class="col-md-3 text-center">';
                $html .= '<h6 class="fw-bold">Tipo de envío</h6>';
                foreach ($paqueteria['tipos'] as $tipo) {
                    $badgeColor = $tipo == 'Express' ? 'bg-warning' : 'bg-primary';
                    $html .= '<span class="badge ' . $badgeColor . '">' . $tipo . '</span><br>';
                }
                if(count($paqueteria['tipos'])>1)
                    $html .= '<small>Según sea el caso</small>';
                $html .= '</div>';
                $html .= '<div class="col-md-3 text-center">';
                $html .= '<h6 class="fw-bold">Estimado de entrega</h6>';
                foreach ($paqueteria['estimado'] as $tipo => $estimado) {
                    $textColor = $tipo == 'Express' ? 'text-warning' : 'text-primary';
                    $html .= '<p class="' . $textColor . ' fw-semibold m-0">' . $estimado . '</p>';
                }
                $html .= '<p class="small m-0">Según sea el caso</p>';
                $html .= '</div>';
                $html .= '<div class="col-md-3 text-center">';
                $html .= '<h4 class="fw-bold mb-0">' . $paqueteria['precio'] . '</h4>';
                $html .= '<p class="small m-0">Último precio</p>';
                $html .= '<p class="m-0">';
                $html .= '<a href="' . $url_base . '/login" class="btn btn-sm btn-primary fw-bold text-warning">Crear guía</a>';
                $html .= '</p>';
                $html .= '</div>';
                $html .= '</div>';
            } else {
                $html .= '<div class="row border rounded-4 py-2 my-2 align-items-center">';
                $html .= '<div class="col-md-3 text-center">';
                $html .= '<img style="max-height: 50px" src="' . $url_base . '/img/' . $codigo . '.png" alt="' . ucfirst($codigo) . '">';
                $html .= '</div>';
                $html .= '<div class="col-md-8 text-center">';
                $html .= '<h6 class="fw-bold text-danger">No disponible</h6>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }

        return Response::json([
            'html' => $html
        ], 200);

    }
}
