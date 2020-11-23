<?php

namespace App\Exports;

use App\encuesta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;



class confactoresriesgosExport implements FromCollection,ShouldQueue,Responsable,WithHeadings
{

    use Exportable;

    private $fileName = 'confactoresriesgosExport.xlsx';
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return $index = \DB::table('encuesta')
        		->join('empleados', 'empleados.id', '=', 'encuesta.empleados_id')
                ->orWhere('pregunta1','1' )
                ->orWhere('pregunta1','1' )
                ->orWhere('pregunta13','1' )
                ->select('encuesta.*', 'empleados.CEDULA', 'empleados.NOMBRE', 'empleados.APELLIDO','empleados.EMPRESA','empleados.CARGO','empleados.DIRECCION','empleados.TELEFONO','empleados.CODCC','empleados.NOMBRECOSTOS','empleados.FECNAC','empleados.SEXO')
        		->get();

        
    }

       public function headings(): array
    {
        return [
'id',
'id_empleado',
'¿Sintomas de Covid19?',
'1. ¿Ha viajado en los últimos quince días? ',
'¿Dónde?',
'¿Ha estado en contacto con alguien diagnosticado como positivo para COVID-19? ',
'Tipo de contacto',
'¿Ha presentado tos? ',
'¿Por cuánto tiempo?',
'¿Ha presentado fiebre mayor a 38°? ',
'¿Por cuánto tiempo?',
'¿Ha presentado Dolor de garganta? ',
'¿Por cuánto tiempo?',
'¿Ha presentado congestión nasal? ',
'¿Por cuánto tiempo?',
'¿Ha presentado dificultad para respirar? ',
'¿Por cuánto tiempo?',
' ¿Ha presentado fatiga?',
'¿Por cuánto tiempo?',
'¿Ha presentado Escalofrió? ',
'¿Por cuánto tiempo?',
'¿Ha presentado dolor muscular? ',
'¿Por cuánto tiempo?',
'¿Ha presentado dolor de cabeza? ',
'¿Por cuánto tiempo?',
'¿Ha consultado a su EPS por estos síntomas? ',
'Porqué?',
' ¿Alguna de las personas con las que convive presenta síntomas de alerta? ',
'¿Quién? ',
' ¿Cuenta con prueba para COVID-19? ',
'¿El resultado de su prueba es Positiva?',
'Fecha Encuesta',
'Fecha Actualización',
'companeros',
'tipotrabajo',
'subtipopresencial',
'transporte',
'CEDULA',
'NOMBRE',
'APELLIDO',
'EMPRESA',
'CARGO',
'DIRECCION',
'TELEFONO',
'CODCC',
'NOMBRECOSTOS',
'FECNAC',
'SEXO'


            
        ];
    }
}
