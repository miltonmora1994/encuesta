<?php

namespace App\Http\Controllers;

use App\encuesta;
use App\empleados;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

use App\Exports\encuestaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Mail\encuestacorreo;
use App\Mail\sinreportar;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(encuesta::all());

        //return view('encuesta.tipo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       //dd($request->all());

            //\Mail::to('ingenierodesarrollo@duquesa.com.co')->send(new encuestacorreo());
            //\Mail::to('ingenierodesarrollo@duquesa.com.co')->send(new sinreportar());

        $tipotrabajo=$request->input('home');
        $tipotrabajo2=$request->input('trabajo');
        $transportes=$request->input('transportes');
        $cedula=$request->input('cedula');


        $validatedData = $request->validate(['cedula' => 'required|max:255', ]); 

        $cedula=$request->input('cedula');


        if(!$empleados = empleados::where('cedula',$validatedData)->first() ){

            return view('empleados.create'); 
            $request->session()->flash('status', 'No existe la cédula!'); };



         $edad = Carbon::createFromDate($empleados->FECNAC)->age; 
         $companeros= DB::table('empleados') ->where('CODCC', $empleados->CODCC) ->pluck('NOMBRE','CEDULA'); 
         $request->session()->flash('status', 'Ingreso correctamente, por favor dilingenciar la encuesta !');

        return view('encuesta.create',compact('empleados','edad','companeros','tipotrabajo','tipotrabajo2','transportes'));
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

        $json = json_encode($request->input('companeros'), true);
        $json13 = json_encode($request->input('pregunta13_resp'), true);

        $encuesta =  new encuesta();
        $encuesta->empleados_id =$request->input('empleados_id');
        $encuesta->Covid19 =$request->input('Covid19');
        $encuesta->pregunta1 =$request->input('pregunta1');
        $encuesta->pregunta1_resp =$request->input('pregunta1_resp');
        $encuesta->pregunta2 =$request->input('pregunta2');
        $encuesta->pregunta2_resp =$request->input('pregunta2_resp');
        $encuesta->pregunta3 =$request->input('pregunta3');
        $encuesta->pregunta3_resp =$request->input('pregunta3_resp');
        $encuesta->pregunta4 =$request->input('pregunta4');
        $encuesta->pregunta4_resp =$request->input('pregunta4_resp');
        $encuesta->pregunta5 =$request->input('pregunta5');
        $encuesta->pregunta5_resp =$request->input('pregunta5_resp');
        $encuesta->pregunta6 =$request->input('pregunta6');
        $encuesta->pregunta6_resp =$request->input('pregunta6_resp');
        $encuesta->pregunta7 =$request->input('pregunta7');
        $encuesta->pregunta7_resp =$request->input('pregunta7_resp');
        $encuesta->pregunta8 =$request->input('pregunta8');
        $encuesta->pregunta8_resp =$request->input('pregunta8_resp');
        $encuesta->pregunta9 =$request->input('pregunta9');
        $encuesta->pregunta9_resp =$request->input('pregunta9_resp');
        $encuesta->pregunta10 =$request->input('pregunta10');
        $encuesta->pregunta10_resp =$request->input('pregunta10_resp');
        $encuesta->pregunta11 =$request->input('pregunta11');
        $encuesta->pregunta11_resp =$request->input('pregunta11_resp');
        $encuesta->pregunta12 =$request->input('pregunta12');
        $encuesta->pregunta12_resp =$request->input('pregunta12_resp');
        $encuesta->pregunta13 =$request->input('pregunta13');
        $encuesta->pregunta13_resp =$json13;
        $encuesta->pregunta14 =$request->input('pregunta14');
        $encuesta->pregunta15 =$request->input('pregunta15');
        $encuesta->tipotrabajo =$request->input('tipotrabajo');
        $encuesta->subtipopresencial =$request->input('subtipopresencial');
        $encuesta->transporte =$request->input('transporte');
        $encuesta->companeros =$json;
        $encuesta->save();


        $request->session()->flash('status', 'Se guardo correctamente, gracias!');
        
    return view('welcome');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(encuesta $encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(encuesta $encuesta)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(encuesta $encuesta)
    {
        //
    }

    public function tipotrabajo(Request $request)
    {
        
        $tipotrabajo=$request->input('home');
        $tipotrabajo2=$request->input('trabajo');
        $transportes=$request->input('transportes');
        $cedula=$request->input('cedula');
        $hoy=Carbon::now()->format('Y-m-d');

        $validatedData = $request->validate(['cedula' => 'required|max:255', ]);

        $empleados=empleados::where('cedula',$validatedData)->first(); 

        if (is_null($empleados)) {
            return view('empleados.create');
        }

        $encuesta2 = encuesta::where('empleados_id',$empleados->ID)
                    ->where('created_at','LIKE','%'.$hoy.'%')
                    ->get();
                    //dd($encuesta2->count());

         $cedula=$request->input('cedula');             
          
        if (!$encuesta2->count()==0) {

            $request->session()->flash('status', 'Hoy '.$hoy.' tiene un registro en la encuesta, por favor realizarla mañana!');

            return view('welcome');
            

        }elseif(!$empleados = empleados::where('cedula',$validatedData)->first()){

            return view('empleados.create'); $request->session()->flash('status', 'No existe la cédula!'); };
         $edad = Carbon::createFromDate($empleados->FECNAC)->age; 
         $companeros= DB::table('empleados') ->where('CODCC', $empleados->CODCC) ->pluck('NOMBRE','CEDULA'); $request->session()->flash('status', 'Ingreso correctamente, por favor dilingenciar la encuesta !');       

       
        


        return view('encuesta.tipo', compact('tipotrabajo','tipotrabajo2','transportes','empleados','edad','companeros','cedula'));
    }

    
   
}
