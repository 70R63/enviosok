<?php


namespace App\Traits;

use App\Models\Domicilio;

trait HasDomicilios
{
    public function domicilios(){
        return $this->morphMany(Domicilio::class,'modelo');
    }


}
