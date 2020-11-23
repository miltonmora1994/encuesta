<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\encuestas;
use App\empleados;
use App\Mail\sinreportar;
use Carbon\Carbon;


class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia correos del día anterior de las encuestas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
  

        $index = \DB::table('encuesta')
                
                ->rightjoin('empleados', 'encuesta.empleados_id', '=', 'empleados.id')
                //->where('encuesta.created_at','like', '%'.$ayer.'%')
                ->where('Diligenciar','1' )
                ->where('encuesta.created_at',null )
                //->whereBetween('encuesta.created_at', [$ayer, $ayer])
                ->select('encuesta.created_at','empleados.CEDULA', 'empleados.NOMBRE', 'empleados.APELLIDO','empleados.EMPRESA','empleados.CARGO','empleados.DIRECCION','empleados.TELEFONO','empleados.CODCC','empleados.NOMBRECOSTOS','empleados.FECNAC','empleados.SEXO','empleados.Diligenciar')
                ->get();

        \Mail::to('ingenierodesarrollo@duquesa.com.co')->send(new sinreportar($index));
        \Mail::to('ingenierodesarrollo@duquesa.com.co')->send(new encuestacorreo());
        
            

    }
}
