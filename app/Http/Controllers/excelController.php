<?php

namespace App\Http\Controllers;

use App\Exports\encuestaExport;
use App\Exports\empleadosExport;
use App\Exports\consintomasExport;
use App\Exports\consintomasfechaExport;
use App\Exports\concovidfechaExport;
use App\Exports\sinsintomasExport;
use App\Exports\sinsintomasfechaExport;
use App\Exports\conCovidExport;
use App\Exports\faltanReportarfechaExport;
use App\Exports\consultaencuestaExport;
use App\Exports\faltanReportarExport;
use App\Exports\tercerosExport;
use App\Exports\confactoresriesgosExport;
use App\Exports\factoresriesgosfechaExport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;

class excelController extends Controller
{
    
    public function encuestas(encuestaExport $encuestaExport)
    {
      return $encuestaExport;
    }

      public function empleados(empleadosExport $empleadosExport)
    {
      return $empleadosExport;
    }

       public function consintomas(consintomasExport $consintomasExport)
    {
      return $consintomasExport;
    }

          public function sinsintomas(sinsintomasExport $sinsintomasExport)
    {
      return $sinsintomasExport;
    }

            public function concovid(conCovidExport $conCovidExport)
    {
      return $conCovidExport;
    }

      public function faltanReportar(faltanReportarExport $faltanReportarExport)
    {
      return $faltanReportarExport;
    }

    public function consultaencuesta(Request $request){

        //dd($request->fecha);

      return new consultaencuestaExport($request->fecha);
    }


  public function faltanReportarFecha(Request $request){

        //dd($request->fecha);

      return new faltanreportarfechaExport($request->fecha);
    }


    public function sinsintomasFecha(Request $request){

        //dd($request->fecha);

      return new sinsintomasfechaExport($request->fecha);
    }
  

    public function concovidFecha(Request $request){

        //dd($request->fecha);

      return new concovidfechaExport($request->fecha);
    }


        public function consintomasFecha(Request $request){

        //dd($request->fecha);

      return new consintomasfechaExport($request->fecha);
    }


       public function factoresriesgos(confactoresriesgosExport $confactoresriesgosExport)
    {
      return $confactoresriesgosExport;
    }



        public function factoresriesgosFecha(Request $request){

        //dd($request->fecha);

      return new factoresriesgosfechaExport($request->fecha);
    }


      public function terceros(tercerosExport $tercerosExport)
    {
      return $tercerosExport;
    }





}


