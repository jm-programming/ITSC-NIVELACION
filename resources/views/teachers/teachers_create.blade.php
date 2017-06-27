@extends('layouts.landingPage');

@section('title', 'Crear Profesor')
@section('title-content', 'Crear Profesor')
@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Profesor</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Crear Profesor</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['route' => 'teachers.store', 'method' => 'POST']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}


			                    <h4>Información del usuario del profesor</h4>
                                <!--Usuario-->
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="email">Email</label>
			                        <input type="text" class="form-control" id="email" name="email" placeholder="email profesor">
			                    </div>
                                 <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="password">Contraseña</label>
			                        <input type="text" class="form-control" id="password" name="password" placeholder="contraseña">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="job">cargo</label>
			                        <input type="text" class="form-control" id="job" name="job" placeholder="cargo">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="status">Estado</label>
			                        <select id="status" name="status" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	<option value=1>Activo</option>
			                        	<option value=0>Inactivo</option>
			                        </select>
			                    </div>


								<h4>Información del profesor</h4>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="nombres">Nombres</label>
			                        <input type="text" class="form-control" id="names" name="names" placeholder="Nombres profesor">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="apellido">Apellidos</label>
			                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos profesor">
			                    </div>
			                  
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="teacher_code">codigo</label>
			                        <input type="text" class="form-control" id="teacher_code" name="teacher_code" placeholder="codigo del profesor" >
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="nombres">Identificación</label>
			                        <input type="text" class="form-control" id="identity_card" name="identity_card" >
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="personal_phone">telefono</label>
			                        <input type="text" class="form-control" id="personal_phone" name="personal_phone" placeholder="telefono profesor">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="cellphone">Celular</label>
			                        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="telefono profesor">
			                    </div>
			                    <!-- Button -->

                                
			                    {!! Form::submit('Crear Usuario',['class' => 'btn btn-primary btn-block']) !!}
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
        	$('#identity_card').inputmask({"mask": "999-9999999-9"});
            $('#cellphone').inputmask({"mask": "9-999-9999"})
            $('#personal_phone').inputmask({"mask": "9-999-9999"})
      	});
	</script>
@endsection