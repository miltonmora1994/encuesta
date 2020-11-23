<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      /*  $query = \DB::select('SELECT  
DATE_FORMAT(encuesta.created_at, "%Y-%m-%d")AS fecha,COUNT(*) AS CONTAR, (SELECT COUNT(*) FROM empleados WHERE DILIGENCIAR=1) AS EMPRESA FROM encuesta 
INNER JOIN empleados EMP ON EMP.ID = empleados.empleados_id
WHERE EMP.Diligenciar = 1

GROUP BY FECHA;');  
        */

        return view('home'/*, compact('query')*/);
    }
}
