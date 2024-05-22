<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App;
use Log;
class RastreoEstafeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rastreo:estafeta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se actualiza el rastreo de Estafeta';

    /**
     * Execute the console command.
     *
     * @return int
     */ 
    public function handle()
    {
        //Log::info($this->option('paridad'));
        //$paridad = $this->option('paridad');

        $controller = App::make('\App\Http\Controllers\API\GuiaController');
        app()->call([$controller, 'rastreoActualizarAutomatico'], []);

        return Command::SUCCESS;
    }
}
