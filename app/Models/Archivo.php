<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Archivo extends Model
{
    use HasFactory;
    protected $table='archivos';
    protected $guarded=[];
    public function entidad(){
        return $this->morphTo('entidad');
    }

    protected static function limpiezaArchivos()
    {
        Log::info('Limpieza de archivos.');
        $dias = 3;
        $expiredTime = Carbon::now()->subDays($dias);
        static::whereNull('entidad_id')
            ->where('created_at', '<', $expiredTime)
            ->get()
            ->each(function ($archivo) {
                Storage::delete($archivo->ruta);
                $archivo->delete();
            });
    }

    protected static function boot()
    {
        parent::boot();
        static::updated(function () {
            static::limpiezaArchivos();
        });
    }
}
