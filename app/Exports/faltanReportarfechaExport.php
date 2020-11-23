<?php

namespace App\Exports;

use App\encuesta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;



class faltanReportarfechaExport implements FromCollection,ShouldQueue,Responsable,WithHeadings
{

    use Exportable;



    private $fileName = 'faltanReportarfecha.xlsx';


      public function __construct($fecha) 
    {
        $this->fecha = $fecha;
      
    }


    //$ayer=Carbon::yesterday();
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $empleados = \DB::table('empleados')
                    ->leftjoin('encuesta','encuesta.empleados_id','=','empleados.ID')
                    //->select('empleados.ID')
                    ->where('empleados.Diligenciar','1' )
                    ->where('encuesta.created_at','LIKE','%'.$this->fecha.'%')  
                    ->pluck('empleados.ID');
                    

              //dd($empleados);      

         return $index = \DB::table('empleados')                
                        ->where('Diligenciar','1' )    
                        ->whereNotIn('ID', $empleados)  
                ->get();

               

                
        		

        
    }

       public function headings(): array
    {
        return [
        
                    'ID',
                    'CEDULA',
                    'NOMBRE',
                    'APELLIDO',
                    'CARGO',
                    'DIRECCION',
                    'TELEFONO',
                    'CODCC',
                    'NOMBRECOSTOS',
                    'FECNAC',
                    'SEXO',
                    'EMPRESA',
                    'EMAIL',
                    'EPS',
                    'ARL',
                    'ACTIVO',
                    'DILIGENCIAR',
                    'CONTACTO EMPRESA',
                    'FECHA ACTUALIZACIÓN',
                    'FECHA DE CREACIÓN'

            
        ];
    }
}
