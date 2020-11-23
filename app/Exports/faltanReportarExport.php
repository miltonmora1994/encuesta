<?php

namespace App\Exports;

use App\encuesta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;



class faltanReportarExport implements FromCollection,ShouldQueue,Responsable,WithHeadings
{

    use Exportable;

    private $fileName = 'SinReportar.xlsx';

    //$ayer=Carbon::yesterday();
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ayer=Carbon::yesterday()->format('Y-m-d');
        $hoy=Carbon::now();

         return $index = \DB::table('encuesta')
                
        		->rightjoin('empleados', 'encuesta.empleados_id', '=', 'empleados.id')
                //->where('encuesta.created_at','like', '%'.$ayer.'%')
                ->where('Diligenciar','1' )
                ->where('encuesta.created_at',null )
                //->whereBetween('encuesta.created_at', [$ayer, $ayer])
                ->select('empleados.CEDULA', 'empleados.NOMBRE', 'empleados.APELLIDO','empleados.EMPRESA','empleados.CARGO','empleados.DIRECCION','empleados.TELEFONO','empleados.CODCC','empleados.NOMBRECOSTOS')
        		->get();

        
    }

       public function headings(): array
    {
        return [
        
        'CEDULA',
        'NOMBRE',
        'APELLIDO',
        'EMPRESA',
        'CARGO',
        'DIRECCION',
        'TELEFONO',
        'CODCC',
        'NOMBRECOSTOS'
        
            
        ];
    }
}
