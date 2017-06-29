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
						{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}
								<h2>Información del usuario</h2>
                                 <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="names">Nombres</label>
			                        <input type="text" class="form-control" id="names" name="names" placeholder="Nombres" value="{{ old('names') }}">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="last_name">Apellidos</label>
			                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" value="{{ old('last_name') }}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="identity_card">Identificación</label>
			                        <input type="text" class="form-control" id="identity_card" name="identity_card" value="{{ old('identity_card') }}" placeholder="Identificación">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="gender">Estado Civil</label>
			                        <select id="civil_status" name="civil_status" class="form-control">
			                        	<option selected disabled> -- Seleccione una opción --</option>
                                    	<option >Soltero/a</option>
			                        	<option >Comprometido/a</option>
			                        	<option >Casado/a</option>
			                        	<option >Divorciado/a</option>
			                        	<option >Viudo/a</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="gender">Genero</label>
			                        <select id="gender" name="gender" class="form-control">
			                        	<option selected disabled> -- Seleccione una opción --</option>
                                    	<option >Hombre</option>
			                        	<option >Mujer</option>
			                        	<option >Otros</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="office_phone">Telefono oficina</label>
			                        <input type="text" class="form-control" id="office_phone" name="office_phone" value="{{ old('office_phone') }}" placeholder="Telefono oficina">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="personal_phone">Telefono personal</label>
			                        <input type="text" class="form-control" id="personal_phone" name="personal_phone" value="{{ old('personal_phone') }}" placeholder="Telefono personal">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="cellphone">Celular</label>
			                        <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{ old('cellphone') }}" placeholder="Celular" >
			                    </div>
			                     <div class="form-group col-sm-12 ">
			                        <label class="control-label" for="address">Dirección</label>
			                        <input type="text"  class="form-control" id="address" name="address" placeholder="Dirección" value="{{ old('address') }}">
			                    </div>
			                    <h2>Información de ingreso</h2>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="email">Email</label>
			                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="password">Contraseña</label>
			                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="status">Estado de Usuario</label>
			                        <select id="status" name="status" class="form-control">
			                        	<option selected disabled> -- Seleccione una opción --</option>
			                        	<option value="1">Activo</option>
			                        	<option value="0">Inactivo</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="rolls_id">Rol de usuario</label>
			                        <select id="rolls_id" name="rolls_id" class="form-control">
			                        	<option selected disabled> -- Seleccione una opción --</option>
                                    	<option value="1">Profesor</option>
			                        	<option value="2">Empleado</option>
			                        	<option value="3">Administrador</option>
			                        </select>
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