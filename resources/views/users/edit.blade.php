@extends('layouts.landingPage')
@section('title', 'Usuarios')
@section('title-content', 'Usuarios')
@section('content')
<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Usuario</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Editar Usuario</h2>
					</div>
					<div class="panel-body">
						{!! Form::model($users,['route' =>  ['users.update',$users->id], 'method' => 'PUT']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}


			                    <h4>Información del Usuario</h4>

			                    <div class="form-group col-sm-6 ">
			                        <label class="control-label" for="nombres">Contraseña</label>
			                        <input type="password" class="form-control" id="password" name="password" value="{{ $users->password }}">
			                    </div>

			                    {!! Form::submit('Editar Usuario',['class' => 'btn btn-primary btn-block']) !!}
			                </fieldset>
						{!! Form::close() !!}
						<hr>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection