<?php

namespace Database\Seeders\Misfinanzas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MpPreference;

class MpPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        MpPreference::where('id', 1)
           ->update([
               'costo' => 344.83,
               'costo_iva' => 55.17 ,
           ]);

        MpPreference::where('id', 2)
           ->update([
               'costo' => 517.24,
               'costo_iva' => 82.76 ,
           ]);

        MpPreference::where('id', 3)
           ->update([
               'costo' => 689.66,
               'costo_iva' => 110.34 ,
           ]);

        MpPreference::where('id', 4)
           ->update([
               'costo' => 862.07,
               'costo_iva' => 137.93 ,
           ]);

       
    }
}
