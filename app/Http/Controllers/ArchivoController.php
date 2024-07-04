<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{

    public function store(Request $request)
    {
        $archivo = $request->file('file');

        $maxSize = intval($request->maxmb) * 1024 * 1024; // 50MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/svg+xml','video/mp4', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        if ($archivo->getSize() > $maxSize) {
            return response()->json(['error' => 'El archivo es demasiado grande.'], 400);
        }

        if (!in_array($archivo->getMimeType(), $allowedTypes)) {
            return response()->json(['error' => 'Tipo de archivo no permitido.'], 400);
        }

        try {
            $archivoname = time().'_'.$archivo->getClientOriginalName();
            $pesoArchivo = round(($archivo->getSize() / 1024) / 1024, 2);
            $rutaArchivo = $archivo->storeAs('archivos',$archivoname);
            $data = [
                'ruta' => $rutaArchivo,
                'nombre' => $archivo->getClientOriginalName(),
                'codigo' => @$request->codigo,
                'descripcion' => @$request->descripcion,
                'entidad_id' => @$request->entidad_id,
                'entidad_type' => @$request->entidad_type,
                'extension' => $archivo->extension(),
                'peso' => $pesoArchivo . ' MB',
            ];
            $create = Archivo::updateOrCreate($data);

            return response()->json([
                'nombre' => $create->nombre,
                'id' => $create->id,
                'ruta'=>route('descarga-archivo',\Illuminate\Support\Facades\Crypt::encryptString($create->ruta)),
                'extension'=>$create->extension,
                'descripcion'=>$create->descripcion,
                'peso'=>$create->peso,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        $archivo = Archivo::findOrFail($request->archivo_id);
        if($archivo->ruta)
            Storage::delete($archivo->ruta);

        $archivo->delete();
        return response()->json(['msg' => 'Archivo eliminado correctamente.']);
    }
    public function download($rutaOriginal,$descarga=null)
    {
        try {
            $ruta = Crypt::decryptString($rutaOriginal);
            $archivo = Archivo::whereRuta($ruta)->first();
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // Si no se puede desencriptar, se devuelve un error 404
        }
        if (!Storage::exists($ruta)) {
            abort(404);
        }
        $fileContent = Storage::get($ruta);

        $mimeType = Storage::mimeType($ruta);

        if ($descarga) {
            return response($fileContent, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . basename($archivo->nombre) . '"'
            ]);
        }

        return response($fileContent, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($archivo->nombre) . '"'
        ]);
    }
}
