@extends('layouts.app')

@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('sweet::alert')
  @php
                        $url= url('/');
  @endphp

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><a href="{{ url('/')}}" class="btn btn-primary">Digitar otra cédula?</a>@auth <a href="/home" class="btn btn-danger"> Reportes Administrador</a>  
@endauth</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


 
                <div class="modal fade" id="modal-dq">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-white">
                      <div class="modal-header">
                        <h4 class="modal-title">Seguir con el protocolo bioseguridad</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">

                          (*) Cuenta con <code>sintomas relacionados con el Covid19</code> Por favor contactarse con bienestar universitario, para dar continuidad al protocolo de atención ante factores de riesgo: 
                          <table class="table table-responsive table-hover">
                            <thead>
                             
                            </thead>
<tbody>
                              <tr>
                                <td><lu>

                                  
                                  
                                  
                                
                                </lu></td>

                                 
                                 
                                </lu></td>

                              </tr>

                                            <tr>
                                <td><lu>

                                 
                               
                                  
                                </lu></td>

                             

                              </tr>
                            </tbody>
                          </table>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>


                                <div class="modal fade" id="modal-covid">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-white">
                      <div class="modal-header">
                        <h4 class="modal-title">Seguir con el protocolo de la empresa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">

                          (*) Cuenta con un <code>CASO POSITIVO DE COVID.</code> Por favor contactarse con Bienestar Universitario, para dar continuidad al protocolo de atención ante factores de riesgo: 
                          <table class="table table-responsive table-hover">
                            <thead>
                              <tr>
                               
                              </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                          </table>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>               
               


                                <div class="modal fade" id="modal-riesgo">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-white">
                      <div class="modal-header">
                        <h4 class="modal-title">Seguir con el protocolo de la empresa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">

                          (*) Cuenta con un <code>factor de riesgo.</code> Por favor contactarse con Bienestar universitario, para dar continuidad al protocolo de atención ante factores de riesgo: 
                          <table class="table table-responsive table-hover">
                            <thead>
                             ¿
                            </tbody>
                          </table>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div> 

 
 <table class="table table-condensed table-hover" id="infopersonal">
     <thead>
         <tr>
             <th>Información de ingreso</th>
             
         </tr>
     </thead>
     <tbody>
         <tr>
             <td>
             
             <lu>
                 <li><strong>Bienvenido </strong> {{$empleados->FullName}}</li>
                 <li><strong>Tipo de vinculación:</strong> {{$empleados->ARL}}</li>
                 <li><strong>Numero de documento:</strong> {{$empleados->CEDULA}}</li>

          {{--        <li><strong>Edad:</strong> {{$edad}}</li>
                 <li><strong>Dirección:</strong> {{$empleados->DIRECCION}}</li>
                 <li><strong>Teléfono:</strong> {{$empleados->TELEFONO}}</li>
                 <li><strong>Género:</strong> {{$empleados->SEXO=='M' ? 'Masculino': 'Femenino' }} </li> --}}
             </lu>

             
             
            </td>
         </tr>
         <tr>
             <td>
                 <lu id="tipotrabajo">
                     <li><strong>Dependencia que vicita:</strong> {{$tipotrabajo2}}</li>
                     <li><strong>Transporte:</strong> {{$transportes}}</li>
                 </lu>

             </td>
         </tr>
     </tbody>
 </table>

                
    <div id="preguntaprincipal">

        <div class="alert alert-warning">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong><code>Sintomas relacionados con Covid19</code></strong>
  <lu>
    <li>Fibre</li>
    <li>Dolor de Garganta</li>
    <li>Congestion Nasal</li>
    <li>Tos</li>
    <li>Dificultad para respirar</li>
    <li>Fatiga</li>
    <li>Escalofrío</li>
    <li>Dolor de Muscúlos</li>

  </lu> 
</div>
    <button type="button" class="btn btn-large btn-block btn-warning">¿Ha presentado sintomas relacionados con Covid 19?</button>
    <p>
    <center><button type="button" class="btn btn-primary" id="siconfirmo">Si</button> <button type="button" class="btn btn-danger" id="noconfirmo">No</button></center></div>



    

{!! Form::open(['route' => 'encuesta.store', 'method'=>'POST','id'=>'reg_form2']) !!}

<input type="hidden" id="id"  name="id" value="">
<input type="hidden" id="covid19"  name="Covid19" value="No">
<input type="hidden" id="tipo"  name="tipotrabajo" value="{{$tipotrabajo}}">
<input type="hidden" id="subt"  name="subtipopresencial" value="{{$tipotrabajo2}}">
<input type="hidden" id="trans"  name="transporte" value="{{$transportes}}">


{!! Form::hidden('empleados_id', $empleados->ID,['class' => 'form-control', 'placeholder' => 'id','name'=>'empleados_id']) !!}


<div id="sintomas">

<fieldset>
  <legend>Factores de Riesgo</legend>


<div class="form-group">
                        <label for="id"><strong>1.  ¿Ha viajado en los últimos quince días? : (*) </strong> </label>
                            <p>
                            {{ Form::radio('pregunta1', 1, ['class'=>'with-gap','checked'=>'false']) }} <span>Si</span>
                            {{ Form::radio('pregunta1', 0, ['class'=>'with-gap']) }} <span>No</span>
                            {!!Form::text('pregunta1_resp', null, ['class'=> 'form-control ocultar','name'=>'pregunta1_resp',       'placeholder'=>'¿Dónde?','id'=>'pregunta1_resp']) !!}    


</div>


<div class="form-group">
                        <label for="id"><strong>2.  ¿Ha estado en contacto con alguien diagnosticado como positivo para COVID-19?  : (*) </strong></label>
                            <p>
                            {{ Form::radio('pregunta2', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta2', 0, ['class'=>'with-gap']) }} <span>No</span>
                               
                       
                        {!! Form::select('pregunta2_resp',[ ''=>'Seleccionar...','Tipo de contacto: Directo (en la misma vivienda y/o lugar estando cerca)'=>'Tipo de contacto: Directo (en la misma vivienda y/o lugar estando cerca)', 'Indirecto (en la misma vivienda y/o lugar sin estar cerca)' =>'Indirecto (en la misma vivienda y/o lugar sin estar cerca)'],null,['class'=> 'form-control ocultar','name'=>'pregunta2_resp' ,'id'=>'pregunta2_resp'] )!!}
                        


</div> 


    <div class="form-group">

                        <label for="id"><strong>3. ¿Alguna de las personas con las que convive presenta síntomas de alerta?    (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta13', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta13', 0, ['class'=>'with-gap']) }} <span>No</span>
                            {{-- {!! Form::select('companeros[]',$companeros, null, ['class' => 'form-control selectpicker companeros', 'id'=>'hola', 'multiple']) !!} --}}
                              <div id="selpersonas">
                                
                              
                              {!! Form::select('pregunta13_resp[]',[
                              'Padre'=>'Padre',
                              'Madre' =>'Madre',
                              'Suegr@' =>'Suegr@',
                              'Hij@' =>'Hij@',
                              'Yerno' =>'Yerno',
                              'Abuel@' =>'Abuel@',
                              'Niet@' =>'Niet@',
                              'Herman@' =>'Herman@',
                              'Cuñad@' =>'Cuñad@',
                              'Conyugue' =>'Conyugue',
                              'Ti@' =>'Ti@',
                              'Sobrin@' =>'Sobrin@'
                              


                              ],null,['class'=> 'form-control selectpicker ocultar','name'=>'pregunta13_resp[]' ,'id'=>'pregunta13_resp', 'multiple'] )!!}

                              </div>   
</div>

      
      <a class="btn btn-large btn-block btn-primary" href="#" role="button" id="Seccion1">Siguiente</a>
</div>


</fieldset>
<div id="factoresriesgo">


  <input type="button" id="refrescar" value="Regresar" class="btn btn-danger"><p/>
  <div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong></strong> <label for="id">Mencione si presenta o presentó en las ultimas 72 horas alguna de las siguientes sintomas: (*) </label>
</div>


 <div class="form-group">
                        <label for="id"><strong>3.  ¿Ha presentado tos?  (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta3', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta3', 0, ['class'=>'with-gap']) }} <span>No</span>
                            
                            {!! Form::select('pregunta3_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta3_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta3_resp']) !!}  

                             


</div>

 <div class="form-group">
                        <label for="id"><strong>4.  ¿Ha presentado fiebre mayor a 38°? : (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta4', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta4', 0, ['class'=>'with-gap']) }} <span>No</span>
                            
                            {!! Form::select('pregunta4_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta4_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta4_resp']) !!} 
</div>

     <div class="form-group">

                        <label for="id"><strong>5.  ¿Ha presentado Dolor de garganta?  : (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta5', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta5', 0, ['class'=>'with-gap']) }} <span>No</span>
         {!! Form::select('pregunta5_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta5_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta5_resp']) !!} 
</div>

         <div class="form-group">

                        <label for="id"><strong>6.  ¿Ha presentado congestión nasal?  : (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta6', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta6', 0, ['class'=>'with-gap']) }} <span>No</span>
                        {!! Form::select('pregunta6_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta6_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta6_resp']) !!}  
</div>

<div class="form-group">

                        <label for="id"><strong>7.  ¿Ha presentado dificultad para respirar? : (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta7', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta7', 0, ['class'=>'with-gap']) }} <span>No</span>
              {!! Form::select('pregunta7_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta7_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta7_resp']) !!} 
</div>

    <div class="form-group">

                        <label for="id"><strong>8.  ¿Ha presentado fatiga?  : (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta8', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta8', 0, ['class'=>'with-gap']) }} <span>No</span>
         {!! Form::select('pregunta8_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta8_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta8_resp']) !!}   
</div>


    <div class="form-group">

                        <label for="id"><strong>9.  ¿Ha presentado Escalofrió? (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta9', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta9', 0, ['class'=>'with-gap']) }} <span>No</span>
       {!! Form::select('pregunta9_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta9_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta9_resp']) !!}    
</div>

    <div class="form-group">

                        <label for="id"><strong>10. ¿Ha presentado dolor muscular? (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta10', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta10', 0, ['class'=>'with-gap']) }} <span>No</span>
       {!! Form::select('pregunta10_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta10_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta10_resp']) !!}    
</div>


    <div class="form-group">

                        <label for="id"><strong>11. ¿Ha presentado dolor de cabeza?  (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta11', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta11', 0, ['class'=>'with-gap']) }} <span>No</span>
       {!! Form::select('pregunta11_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta11_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta11_resp']) !!}   
</div>

    <div class="form-group">

                        <label for="id"><strong>12. ¿Ha consultado a su EPS por estos síntomas?   (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta12', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta12', 0, ['class'=>'with-gap']) }} <span>No</span>
       {!! Form::select('pregunta12_resp', [

                                ''=>'Seleccione...',
                                '1 día'=>'1 día',
                                '2 días'=>'2 días',
                                '3 días'=>'3 días',
                                '4 días'=>'4 días',
                                '5 días'=>'5 días',
                                '6 días'=>'6 días',
                                '7 días'=>'7 días',
                                '8 días'=>'8 días',
                                '9 días'=>'9 días',
                                '10 días'=>'10 días',
                                '11 días'=>'11 días',
                                '12 días'=>'12 días',
                                '13 días'=>'13 días',
                                '14 días'=>'14 días',
                                '15 días'=>'15 días',


                              ], null, ['class'=> 'ocultar form-control','name'=>'pregunta12_resp', 'placeholder'=>'¿Por cuánto tiempo?','id'=>'pregunta12_resp']) !!}  
</div>




<div class="form-group">

                        <label for="id"><strong>13. ¿Cuenta con prueba para COVID-19?     (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta14', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta14', 0, ['class'=>'with-gap']) }} <span>No</span>
                               
</div>

<div class="form-group" id="pregunta15_resp">

                        <label for="id"><strong>14. ¿El resultado de su prueba es Positiva?     (*) </strong> </label>
                        <p>
                            {{ Form::radio('pregunta15', 1, ['class'=>'with-gap']) }} <span>Si</span>
                            {{ Form::radio('pregunta15', 0, ['class'=>'with-gap']) }} <span>No</span>
                               
</div>


 {{--    <div class="form-group" id="pregunta16_resp">

    <label>16.  ¿Con quién ha tenido contacto desde que presenta los síntomas? </label>
    {!! Form::select('companeros[]',$companeros, null, ['class' => 'form-control selectpicker companeros', 'id'=>'hola', 'multiple']) !!}

    </div>   --}}



        </div>

   <button type="button" class="btn btn-large btn-block btn-primary" id="Sig2">Siguiente</button>

<center><button type="submit" class="btn btn-large btn-block btn-danger" id="enviar1">Enviar</button>
<center><button type="submit" class="btn btn-large btn-danger" id="enviar2" >Por favor click para confirmar?</button>
{!! Form::close() !!}

</div>

</div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    
    $(document).ready(function() {
    
     
    $('#pregunta13_resp').select2();
     $('#selpersonas').hide(); 
   
});

    
    $(document).ready(function() {
        $('#sintomas').show();
        $('#factoresriesgo').hide();
        $('.ocultar').hide();
        $('#pregunta15_resp').hide();
        $('#totalpreguntas').hide();
        $('#enviar1').hide();
        $('#Sig2').hide();
        $('#enviar2').hide();
        $('#preguntaprincipal').hide();
        $('.tipo').show();


        $("#refrescar").click(function(){
      //Actualizamos la página
      location.reload();
      });
      
     
     // tres primeras preguntas  
var p1 =$('input:radio[name=pregunta1]').click(function(event) {if ($(this).val()==1) {p1=1; } else {p1=0; } ; });
var p2 =$('input:radio[name=pregunta2]').click(function(event) {if ($(this).val()==1) {p2=1; } else {p2=0; } ; }); 
var p13 =$('input:radio[name=pregunta13]').click(function(event) {if ($(this).val()==1) {p13=1; } else {p13=0; } ; });

  //Demás preguntas

 var p3 =$('input:radio[name=pregunta3]').click(function(event) {if ($(this).val()==1) {p3=1; } else {p3=0; } ; }); 
 var p4 =$('input:radio[name=pregunta4]').click(function(event) {if ($(this).val()==1) {p4=1; } else {p4=0; } ; });
 var p5 =$('input:radio[name=pregunta5]').click(function(event) {if ($(this).val()==1) {p5=1; } else {p5=0; } ; });
 var p6 =$('input:radio[name=pregunta6]').click(function(event) {if ($(this).val()==1) {p6=1; } else {p6=0; } ; });
 var p7 =$('input:radio[name=pregunta7]').click(function(event) {if ($(this).val()==1) {p7=1; } else {p7=0; } ; });
 var p8 =$('input:radio[name=pregunta8]').click(function(event) {if ($(this).val()==1) {p8=1; } else {p8=0; } ; });
 var p9 =$('input:radio[name=pregunta9]').click(function(event) {if ($(this).val()==1) {p9=1; } else {p9=0; } ; });
 var p10 =$('input:radio[name=pregunta10]').click(function(event) {if ($(this).val()==1) {p10=1; } else {p10=0; } ; });
 var p11 =$('input:radio[name=pregunta11]').click(function(event) {if ($(this).val()==1) {p11=1; } else {p11=0; } ; });
 var p12 =$('input:radio[name=pregunta12]').click(function(event) {if ($(this).val()==1) {p12=1; } else {p12=0; } ; });
 var p14 =$('input:radio[name=pregunta14]').click(function(event) {if ($(this).val()==1) {p14=1; } else {p14=0; } ; });
 var p15 =$('input:radio[name=pregunta15]').click(function(event) {if ($(this).val()==1) {p15=1; } else {p15=0; } ; });



  $('input:radio[name=pregunta1]').click(function () {var resp1=$(this).val(); if (resp1==1) {$('#pregunta1_resp').show(); } else {$('#pregunta1_resp').hide(); } }); 
  $('input:radio[name=pregunta2]').click(function () {var resp2=$(this).val(); if (resp2==1) {$('#pregunta2_resp').show(); } else {$('#pregunta2_resp').hide(); } });
  
  $('input:radio[name=pregunta3]').click(function () {var resp3=$(this).val(); console.log(resp3); if (resp3==1) {$('#pregunta3_resp').show(); $('#Sig2').prop('disabled', false);} else {$('#pregunta3_resp').hide(); $('#Sig2').prop('disabled', true); } });

  $('input:radio[name=pregunta4]').click(function () {var resp4=$(this).val(); $('#Sig2').prop('disabled', false);if (resp4==1) {$('#pregunta4_resp').show(); } else {$('#pregunta4_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta5]').click(function () {var resp5=$(this).val(); $('#Sig2').prop('disabled', false); if (resp5==1) {$('#pregunta5_resp').show(); } else {$('#pregunta5_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta6]').click(function () {var resp6=$(this).val(); $('#Sig2').prop('disabled', false); if (resp6==1) {$('#pregunta6_resp').show(); } else {$('#pregunta6_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta7]').click(function () {var resp7=$(this).val(); $('#Sig2').prop('disabled', false); if (resp7==1) {$('#pregunta7_resp').show(); } else {$('#pregunta7_resp').hide(); $('#Sig2').prop('disabled', true);} });
  $('input:radio[name=pregunta8]').click(function () {var resp8=$(this).val(); $('#Sig2').prop('disabled', false);if (resp8==1) {$('#pregunta8_resp').show(); } else {$('#pregunta8_resp').hide(); $('#Sig2').prop('disabled', true);} });
  $('input:radio[name=pregunta9]').click(function () {var resp9=$(this).val(); $('#Sig2').prop('disabled', false); if (resp9==1) {$('#pregunta9_resp').show(); } else {$('#pregunta9_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta10]').click(function () {var resp10=$(this).val(); $('#Sig2').prop('disabled', false); if (resp10==1) {$('#pregunta10_resp').show(); } else {$('#pregunta10_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta11]').click(function () {var resp11=$(this).val();  $('#Sig2').prop('disabled', false); if (resp11==1) {$('#pregunta11_resp').show(); } else {$('#pregunta11_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta12]').click(function () {var resp12=$(this).val(); $('#Sig2').prop('disabled', false); if (resp12==1) {$('#pregunta12_resp').show(); } else {$('#pregunta12_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta13]').click(function () {var resp13=$(this).val(); if (resp13==1) {$('#selpersonas').show(); } else {$('#selpersonas').hide(); } });
  $('input:radio[name=pregunta14]').click(function () {var resp14=$(this).val(); $('#Sig2').prop('disabled', false); if (resp14==1) {$('#pregunta15_resp').show();  } else {$('#pregunta16_resp').hide(); $('#Sig2').prop('disabled', true); } });
  $('input:radio[name=pregunta15]').click(function () {var resp15=$(this).val(); $('#Sig2').prop('disabled', false);if (resp15==1) {$('#pregunta16_resp').show(); } else {$('#pregunta16_resp').hide(); $('#Sig2').prop('disabled', true); } });
  

  $('input:radio[name=trabajo]').click(function () {

    var trabajo=$(this).val(); 
    if (trabajo==1) {
        $('#preguntaprincipal').show(); 
        $('.tipo').hide();
    } else {
        $('#preguntaprincipal').hide();
        $('.tipo').show(); 

    } });

  //$('#totalpreguntas').show();

  $('#siconfirmo').click(function(event) {

      //$('#modal-dq').modal();
      $('#factoresriesgo').show();
      $('#covid19').val('Si');
      $('#infopersonal').show();
      $('#preguntaprincipal').hide();
      $('#Sig2').show();
      $('#Sig2').prop('disabled', true);
      $('#enviar1').hide();
      confirm('!Por favor realizar la siguiente encuesta¡')
  });

   $('#noconfirmo').click(function(event) {
      $('#infopersonal').hide();  
      $('#totalpreguntas').hide();
      $('#preguntaprincipal').hide();
      $('#enviar2').show();
    
  });

   $('#Seccion1').click(function(event) {

      console.log(p1,p2,p3);
      
      if (p1==1 || p2 == 1 || p13==1) {

        $('#modal-riesgo').modal();

      } else {}

      


      $('#preguntaprincipal').show();  
      $('#sintomas').hide();
      $('#tipotrabajo').hide();
      
      $('#enviar2').hide();
    
  });




  $('#Sig2').click(function(event) {

      

   //alert('hola');
 if (p3==1 || p4==1 || p5 == 1 || p6==1 || p7==1 || p8==1 || p9==1 || p10==1 || p11==1 || p12==1) {
       
       
        $('#modal-dq').modal();
      
        

    } else if (p14==1 && p15 == 1) {
        
      
        $('#modal-covid').modal();
        
        

    }
      $('#factoresriesgo').hide();
      $('#infopersonal').hide();  
      $('#totalpreguntas').hide();
      $('#preguntaprincipal').hide();
      $('#Sig2').hide();
      $('#enviar2').show();



  });

 

   });
</script>





@endsection


