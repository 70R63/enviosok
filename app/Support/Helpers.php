<?php

use App\Models\Catalogo;
use App\Models\CatalogoElemento;

if (! function_exists('getCatalogo')) {
    function getCatalogo($codigo)
    {
        return Catalogo::whereCodigo($codigo)->first();
    }
}
if (! function_exists('getCatalogoElementos')) {
    function getCatalogoElementos($codigoCatalogo, $where = null)
    {
        $cat = Catalogo::whereCodigo($codigoCatalogo)->first();
        if (!$cat)
            return [];
        $a = CatalogoElemento::whereCatalogoId($cat->id)->whereNotIn('nombre', ['No especifica', 'No especificado', 'No identificado', 'No identificada'])
            ->when($where, function ($q) use ($where) {
                $q->whereRaw($where);
            })
            ->orderBy('nombre')->get();
        $b = CatalogoElemento::whereCatalogoId($cat->id)->whereIn('nombre', ['No especifica', 'No especificado', 'No identificado', 'No identificada'])->get();
        $c = $a->concat($b);
        return $c;
    }
}
