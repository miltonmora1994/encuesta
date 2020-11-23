<?php

namespace App\Http\Controllers;

use App\empleados;
use App\encuesta;
use Illuminate\Http\Request;
use App\Exports\empleadosExport;
use Maatwebsite\Excel\Facades\Excel;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $encuesta=\DB::select('SELECT  
DATE_FORMAT(ENC.created_at, "%Y-%m-%d")AS fecha,COUNT(*) AS CONTAR, (SELECT COUNT(*) FROM empleados WHERE DILIGENCIAR=1) AS EMPRESA FROM encuesta ENC
INNER JOIN empleados EMP ON EMP.ID = ENC.empleados_id
WHERE EMP.Diligenciar = 1

GROUP BY FECHA;'); 

        return $encuesta;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

     $empleados =  new empleados($request-> all());
      $empleados->save();
  
  return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleados $empleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleados $empleados)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new empleadosExport, 'empleados.xlsx');
    }    



}
