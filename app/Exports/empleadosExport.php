<?php

namespace App\Exports;

use App\empleados;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;


class empleadosExport implements FromCollection,ShouldQueue,Responsable,WithHeadings
{
    use Exportable;

    private $fileName = 'empleados.xlsx';
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $index = \DB::table('empleados')
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
        'ACTIVO?',
        'DILIGENCIAR?',
        'FECHA CREACION',
        'FECHA ACTUALIZACION'

            
        ];
    }

        
}
