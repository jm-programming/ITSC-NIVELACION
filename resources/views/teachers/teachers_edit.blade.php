@extends('layouts.landingPage');

@section('title', 'Editar Profesor')
@section('title-content', 'Editar Profesor')
@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Profesor</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">editar Profesor</h2>
					</div>
					<div class="panel-body">
                <?php $contador = 0;?>
                        @foreach ($users as $user)
              <?php $contador++?>
						{!! Form::model($user,['route' =>  ['teachers.update',$user->users_id], 'method' => 'PUT']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}


			                    <h4>Información del usuario del profesor</h4>
                                <!--Usuario-->
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="email">Email</label>
			                        <input type="text" class="form-control" id="email" name="email" placeholder="email profesor" value="{{$user->email}}">
			                    </div>
                                 <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="password">Contraseña</label>
			                        <input type="text" class="form-control" id="password" name="password" placeholder="contraseña" value="{{$user->password}}">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="job">cargo</label>
			                        <input type="text" class="form-control" id="job" name="job" placeholder="cargo" value="{{$user->job}}">
			                    </div>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="status">Estado de Usuario</label>
			                        <select id="status" name="status" class="form-control">
                                        @if ($user->teacher_status == 1)
                                        <option selected value=1>Activo</option>
			                        	<option value=0>Inactivo</option>
                                        @endif    

                                        @if ($user->teacher_status == 0)
                                        <option selected value=0>Inactivo</option>
			                        	<option value=1>Activo</option>
                                        @endif

			                        </select>
			                    </div>


								<h4>Información del profesor</h4>
                                <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="nombres">Nombres</label>
			                        <input type="text" class="form-control" id="names" name="names" placeholder="Nombres profesor" value="{{$user->names}}">
			                    </div>
			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="apellido">Apellidos</label>
			                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos profesor" value="{{$user->last_name}}">
			                    </div>
			                  
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="teacher_code">codigo</label>
			                        <input type="text" class="form-control" id="teacher_code" name="teacher_code" placeholder="codigo del profesor" value="{{$user->teacher_code}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="nombres">Identificación</label>
			                        <input type="text" class="form-control" id="identity_card" name="identity_card" value="{{$user->identity_card}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="personal_phone">telefono</label>
			                        <input type="text" class="form-control" id="personal_phone" name="personal_phone" placeholder="telefono profesor" value="{{$user->personal_phone}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="cellphone">Celular</label>
			                        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="telefono profesor" value="{{$user->cellphone}}">
			                    </div>


			                    <!-- Button -->
                                <!--<div class="form-group col-sm-6 ">
			                        <label class="control-label" for="status">Estado de Usuario</label>
			                        <select id="status" name="status" class="form-control">
                                        @if ($user->status == 1)
                                        <option disabled selected value=1>Activo</option>
			                        	<option value=0>Inactivo</option>
                                        @endif    

                                        @if ($user->status == 0)
                                        <option disabled selected value=0>Inactivo</option>
			                        	<option value=1>Activo</option>
                                        @endif

			                        </select>
			                    </div>-->
                                
			                    {!! Form::submit('Editar Profesor',['class' => 'btn btn-primary btn-block']) !!}
			                </fieldset>
						{!! Form::close() !!}
						<hr>
					</div>
                     @endforeach
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