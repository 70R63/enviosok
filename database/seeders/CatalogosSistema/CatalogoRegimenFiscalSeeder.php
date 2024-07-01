<?php

namespace Database\Seeders\CatalogosSistema;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Misfinanzas\CatalogoRegimenFiscal;

class CatalogoRegimenFiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 605,
            'tipo_persona' => 1,
            'descripcion' => 'Sueldos y Salarios e Ingresos Asimilados a Salarioslarios'
            
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 606,
            'tipo_persona' => 1,
            'descripcion' => 'Arrendamiento'
            
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 608,
            'tipo_persona' => 1,
            'descripcion' => 'Demás ingresos'
            
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 611,
            'tipo_persona' => 1,
            'descripcion' => 'Ingresos por Dividendos (socios y accionistas)'
            
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 612,
            'tipo_persona' => 1,
            'descripcion' => 'Personas Físicas con Actividades Empresariales y Profesionales' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 614,
            'tipo_persona' => 1,
            'descripcion' => 'Ingresos por intereses' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 616,
            'tipo_persona' => 1,
            'descripcion' => 'Sin obligaciones fiscales' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 621,
            'tipo_persona' => 1,
            'descripcion' => 'Incorporación Fiscal' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 622,
            'tipo_persona' => 1,
            'descripcion' => 'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 629,
            'tipo_persona' => 1,
            'descripcion' => 'De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 630,
            'tipo_persona' => 1,
            'descripcion' => 'Enajenación de acciones en bolsa de valores' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 615,
            'tipo_persona' => 1,
            'descripcion' => 'Régimen de los ingresos por obtención de premios' 
        ]);


        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' =>601 ,
            'tipo_persona' => 2,
            'descripcion' => 'General de Ley Personas Morales' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 603,
            'tipo_persona' => 2,
            'descripcion' => 'Personas Morales con Fines no Lucrativos' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 609,
            'tipo_persona' => 2,
            'descripcion' => 'Consolidación' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 620,
            'tipo_persona' => 2,
            'descripcion' => 'Sociedades Cooperativas de Producción que optan por diferir sus ingresos' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 622,
            'tipo_persona' => 2,
            'descripcion' => 'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 623,
            'tipo_persona' => 2,
            'descripcion' => 'Opcional para Grupos de Sociedades' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' => 624,
            'tipo_persona' => 2,
            'descripcion' => 'Coordinados' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' =>628 ,
            'tipo_persona' => 2,
            'descripcion' => 'Hidrocarburos' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' =>607 ,
            'tipo_persona' => 2,
            'descripcion' => 'Régimen de Enajenación o Adquisición de Bienes' 
        ]);

        CatalogoRegimenFiscal::create([
            'regimen_fiscal_id' =>610 ,
            'tipo_persona' => 3,
            'descripcion' => 'Residentes en el Extranjero sin Establecimiento Permanente en México' 
        ]);

    }
}
 
 
 
 
 
 
 

 
 
 
 
 
