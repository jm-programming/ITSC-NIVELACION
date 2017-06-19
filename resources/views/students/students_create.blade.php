@extends('layouts.landingPage');

@section('title', 'Crear Estudiante')

@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Estudiantes</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Crear Estudiante</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['route' => 'student.create', 'method' => 'GET']) !!}
			                <fieldset>
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}
			                    <h4>Información personal del estudiante</h4>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Nombres</label>
			                        <input type="text" class="form-control" id="names" name="names" placeholder="Nombres estudiante">
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Apellidos</label>
			                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos estudiante">
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Carrera</label>
			                        <input type="text" class="form-control" id="career" name="career" placeholder="Carrera estudiante">
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Fecha Nacimiento</label>
			                        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Fecha Nacimiento" >
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Identificación</label>
			                        <input type="text" class="form-control" id="identity_card" name="identity_card" placeholder="Identificación" >
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Estado Civil</label>
			                        <input type="text" class="form-control" id="civil_status" name="civil_status" placeholder="Estado Civil">
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Email</label>
			                        <input type="email" class="form-control" id="email" name="email" placeholder="Email estudiante">
			                    </div>
			                    <h4>Información Universitaria del estudiante</h4>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Tanda</label>
			                        <input type="text" class="form-control" id="shift" name="shift" placeholder="Tanda estudiante">
			                    </div>
			                    <div class="form-group col-sm-10 col-sm-offset-1">
			                        <label class="control-label" for="nombres">Condición</label>
			                        <input type="text" class="form-control" id="condition" name="condition" placeholder="Condición estudiante">
			                    </div>
			                    <!-- Button -->
			                    {!! Form::submit('Crear Estudiante',['class' => 'btn btn-primary col-sm-offset-9']) !!}
			                </fieldset>
						{!! Form::close() !!}
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
        	$('#phone-number').inputmask({"mask": "999-999-9999"}); 
        	$('#identity-card').inputmask({"mask": "999-9999999-9"}); 
      	});
	</script>
@endsection


