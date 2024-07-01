<?php

namespace Database\Seeders\CatalogosSistema;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Misfinanzas\CatalogoUsoCfdi;

class CatalogoUsoCfdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogoUsoCfdi::create([
            "clave" => "G01",
            "descripcion" => "Adquisición de mercancías",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "G02",
            "descripcion" => "Devoluciones, descuentos o bonificaciones",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "G03",
            "descripcion" => "Gastos en general",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I01",
            "descripcion" => "Construcciones",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I02",
            "descripcion" => "Mobiliario y equipo de oficina por inversiones",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I03",
            "descripcion" => "Equipo de transporte",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I04",
            "descripcion" => "Equipo de cómputo y accesorios",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I05",
            "descripcion" => "Dados, troqueles, moldes, matrices y herramental",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I06",
            "descripcion" => "Comunicaciones telefónicas",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I07",
            "descripcion" => "Comunicaciones satelitales",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I08",
            "descripcion" => "Otra maquinaria y equipo",
            "tipo_persona" =>1 ,

        ]);
        CatalogoUsoCfdi::create([
            "clave" => "D01",
            "descripcion" => "Honorarios médicos, dentales y gastos hospitalarios.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D02",
            "descripcion" => "Gastos médicos por incapacidad o discapacidad",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D03",
            "descripcion" => "Gastos funerales.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D04",
            "descripcion" => "Donativos",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D05",
            "descripcion" => "Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D06",
            "descripcion" => "Aportaciones voluntarias al SAR.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D07",
            "descripcion" => "Primas por seguros de gastos médicos.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D08",
            "descripcion" => "Gastos de transportación escolar obligatoria.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D09",
            "descripcion" => "Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "D10",
            "descripcion" => "Pagos por servicios educativos (colegiaturas)",
            "tipo_persona" =>1 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "CP01",
            "descripcion" => "Pagos",
            "tipo_persona" =>1 ,
        ]);

        CatalogoUsoCfdi::create([
            "clave" => "CN01",
            "descripcion" => "Nómina",
            "tipo_persona" =>1 ,
        ]);

        CatalogoUsoCfdi::create([
            "clave" => "S01",
            "descripcion" => "Sin Efectos Fiscales",
            "tipo_persona" =>1 ,
        ]);

    /* Morales */

    CatalogoUsoCfdi::create([
            "clave" => "G01",
            "descripcion" => "Adquisición de mercancías",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "G02",
            "descripcion" => "Devoluciones, descuentos o bonificaciones",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "G03",
            "descripcion" => "Gastos en general",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I01",
            "descripcion" => "Construcciones",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I02",
            "descripcion" => "Mobiliario y equipo de oficina por inversiones",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I03",
            "descripcion" => "Equipo de transporte",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I04",
            "descripcion" => "Equipo de cómputo y accesorios",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I05",
            "descripcion" => "Dados, troqueles, moldes, matrices y herramental",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I06",
            "descripcion" => "Comunicaciones telefónicas",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I07",
            "descripcion" => "Comunicaciones satelitales",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "I08",
            "descripcion" => "Otra maquinaria y equipo",
            "tipo_persona" =>2 ,

        ]);

        CatalogoUsoCfdi::create([
            "clave" => "CP01",
            "descripcion" => "Pagos",
            "tipo_persona" =>2 ,
        ]);

        CatalogoUsoCfdi::create([
            "clave" => "S01",
            "descripcion" => "Sin Efectos Fiscales",
            "tipo_persona" =>2 ,
        ]);

    }
}
    
    
    
    
    
 
