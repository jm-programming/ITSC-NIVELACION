@extends('layouts.landingPage')
@section('title', 'Usuarios')
@section('title-content', 'Usuarios')
@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Usuarios</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Editar Usuarios</h2>
					</div>
					<div class="panel-body">
						{!! Form::model($user,['route' =>  ['users.update',$user->id], 'method' => 'PUT']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}
                                <!--Usuario-->
                                <h2>Información del usuario</h2>
                                 <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="names">Nombres</label>
			                        <input type="text" class="form-control" id="names" name="names" placeholder="Nombres" value="{{$user->names}}">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="last_name">Apellidos</label>
			                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" value="{{$user->last_name}}">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="gender">Genero</label>
			                        <select id="gender" name="gender" class="form-control">
			                        	<option selected>{{$user->gender}}</option>
			                        	<option >-------------</option>
                                    	<option >Hombre</option>
			                        	<option >Mujer</option>
			                        	<option >Otros</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="identity_card">Identificación</label>
			                        <input type="text" class="form-control" id="identity_card" name="identity_card" value="{{$user->identity_card}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="office_phone">Telefono oficina</label>
			                        <input type="text" class="form-control" id="office_phone" name="office_phone" placeholder="Sin valor definido" value="{{$user->office_phone}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="personal_phone">Telefono personal</label>
			                        <input type="text" class="form-control" id="personal_phone" name="personal_phone" placeholder="Sin valor definido" value="{{$user->personal_phone}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="cellphone">Celular</label>
			                        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Sin valor definido" value="{{$user->cellphone}}">
			                    </div>
			                     <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="address">Dirección</label>
			                        <input type="text" class="form-control" id="address" name="address" placeholder="Sin valor definido" value="{{$user->address}}">
			                    </div>
			                    <h2>Información de ingreso</h2>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="email">Email</label>
			                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="password">Contraseña</label>
			                        <input type="text" class="form-control" id="password" name="password" placeholder="{{$user->password}}">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="status">Estado de Usuario</label>
			                        <select id="status" name="status" class="form-control">
                                        @if ($user->status == 1)
                                        <option selected value="1">Activo</option>
			                        	<option value="0">Inactivo</option>
                                        @endif    

                                        @if ($user->status == 0)
                                        <option selected value="0">Inactivo</option>
			                        	<option value="1">Activo</option>
                                        @endif

			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="rolls_id">Rol de usuario</label>
			                        <select id="rolls_id" name="rolls_id" class="form-control">
			                        	<option selected value="{{$user->rolls_id}}">{{$user->roll}}</option>
			                        	<option >-------------</option>
                                    	<option value="1">Profesor</option>
			                        	<option value="2">Empleado</option>
			                        	<option value="3">Administrador</option>
			                        </select>
			                    </div>
			                    <!-- Button -->
                                
                                
			                    {!! Form::submit('Editar usuario',['class' => 'btn btn-primary btn-block']) !!}
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