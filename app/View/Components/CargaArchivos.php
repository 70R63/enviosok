<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CargaArchivos extends Component
{
    public $multiple;
    public $minimo;
    public $class;
    public $labelClass;
    public $archivo;
    public $archivos;
    public $entidad;
    public $tipo;
    public $required;
    public $requiredAsterisk;
    public $codigo;
    public $label;
    public $labelDescripcion;
    public $maxmb;
    public $invalidLabel;
    public $editable;
    public $labelDetalle;

    public function __construct($minimo=0,$multiple=false,$class = 'col-12',
                                $labelClass='fw-semibold', $required = true, $requiredAsterisk = true, $tipo = 'todos',
                                $codigo = 'general',$label = 'Archivo',$labelDescripcion = 'Descripción',
                                $maxmb = '5',$entidad = null ,$invalidLabel='Archivo obligatorio',$editable=true, $labelDetalle=null)
    {
        $this->minimo = $minimo;
        $this->multiple = $multiple;
        $this->class = $class;
        $this->labelClass = $labelClass;
        $this->required = $required;
        $this->requiredAsterisk = $requiredAsterisk;
        $this->entidad = $entidad;
        $this->tipo = $tipo;
        $this->codigo = $codigo;
        $this->label = $label;
        $this->labelDetalle = $labelDetalle;
        $this->labelDescripcion = $labelDescripcion;
        $this->maxmb = $maxmb;
        $this->invalidLabel = $invalidLabel;
        $this->editable = $editable;
        $this->archivo = $entidad ? $entidad->archivos()->whereCodigo($codigo)->first() : null;
        $this->archivos = $entidad ? $entidad->archivos()->whereCodigo($codigo)->get() : [];
    }

    public function render()
    {
        return view('components.carga-archivos');
    }
}
