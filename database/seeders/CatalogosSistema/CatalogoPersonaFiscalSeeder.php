<?php

namespace Database\Seeders\CatalogosSistema;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Misfinanzas\CatalogoPersonaFiscal;

class CatalogoPersonaFiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogoPersonaFiscal::create([
            'id' =>1,
            'descripcion' => 'Fisica',
        ]);

        CatalogoPersonaFiscal::create([
            'id' =>2,
            'descripcion' => 'Moral',
        ]);

        CatalogoPersonaFiscal::create([
            'id' =>3,
            'descripcion' => 'Extranjero',
        ]);
    }
}
