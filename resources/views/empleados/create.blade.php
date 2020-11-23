@extends('layouts.app')
@section('content')


<div class="container">

	<div class="row justify-content-center">
		  <div class="col-md-8">
	<div class="panel-body">
		<div class="panel-heading">
{!! Form::open(['route' => 'empleados.store', 'method'=>'POST','id'=>'reg_form2']) !!}


{!! Form::hidden('CODCC', 99999, []) !!}
{!! Form::hidden('NOMBRECOSTOS', 'EXTERNO', []) !!}
			
			<h3 class="panel-title">Registro</h3>
		


	<div class="panel panel-primary">

	
	<div class="form-group">
	<label for="id">Cédula</label>
	{!! Form::text('CEDULA', null,['class' => 'form-control', 'placeholder' => 'Digite la Cédula','name'=>'CEDULA', 'required']) !!}
	</div>

	<div class="form-group">
	<label for="id">Nombre: </label>
	{!! Form::text('NOMBRE', null,['class' => 'form-control', 'placeholder' => 'Nombre completo','name'=>'NOMBRE', 'required']) !!}
	</div>

	<div class="form-group">
	<label for="id">Apellido: </label>
	{!! Form::text('APELLIDO', null,['class' => 'form-control', 'placeholder' => 'Digite los Apellidos','name'=>'APELLIDO', 'required']) !!}
	</div>

		<div class="form-group">
	<label for="id">Teléfono: </label>
	{!! Form::text('TELEFONO', null,['class' => 'form-control', 'placeholder' => 'Digite el teléfono','name'=>'TELEFONO', 'required']) !!}
	</div>

			<div class="form-group">
	<label for="id">Dirección: </label>
	{!! Form::text('DIRECCION', null,['class' => 'form-control', 'placeholder' => 'Digite la dirección','name'=>'DIRECCION', 'required']) !!}
	</div>

				<div class="form-group">
	<label for="id">Fecha de Nacimiento: </label>
	{!! Form::date('FECNAC', null,['class' => 'form-control', 'placeholder' => 'FECNAC','name'=>'FECNAC', 'required']) !!}
	</div>

				<div class="form-group">
	<label for="id">EPS </label>
	{!! Form::text('EPS', null,['class' => 'form-control', 'placeholder' => 'Ingrese entidad de salud afiliado','name'=>'EPS']) !!}

	</div>


				<div class="form-group">
	<label for="id">Correo Electrónico: </label>
	{!! Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email','name'=>'email', 'required']) !!}

	</div>

				<div class="form-group">
	<label for="id">Género: </label>
	{!! Form::select('SEXO',[ ''=>'Seleccione...','M'=>'Masculino', 'F' =>'Femenino'],null,['class'=> 'form-control','name'=>'SEXO', 'required'] )!!}
	</div>

					<div class="form-group">
	<label for="id">tipo de vinculacion </label>
	{!! Form::select('ARL',[ ''=>'Seleccione...','Estudiante'=>'Estudiante','Funcionario'=>'Funcionario','Visitante'=>'Visitante'],null,['class'=> 'form-control','name'=>'ARL', 'required'] )!!}
	</div>

	<div class="form-group">
	<label for="id">carrera o programa</label>
	{!! Form::select('EMPRESA',[ ''=>'Seleccione...','Ing.Civil'=>'Ing.Civil','Ing.Sistemas'=>'Ing.Sistemas','Ing.Ambiental'=>'Ing.Ambiental','Teg.Desarrollo de software'=>'Teg.Desarrollo de software'],null,['class'=> 'form-control','name'=>'EMPRESA', 'required'] )!!}

	</div>

	<div class="form-group">
	<label for="id">Semestre</label>
	{!! Form::select('contactoempresa',[ ''=>'Seleccione...','1','2','3','4','5','6','7','8','9','10'],null,['class'=> 'form-control','name'=>'contactoempresa', 'required'] )!!}
	</div>

   
    <center><button type="submit" class="btn btn-block btn-primary" >Enviar</button>
	
	</div>
	</div>
	</div>
	</div>
	
	
	
	
	
	
	
   
    
     
                                             
 
 
    


  	{!! Form::close() !!}

@endsection
