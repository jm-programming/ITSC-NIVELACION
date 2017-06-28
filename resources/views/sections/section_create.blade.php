@extends('layouts.landingPage');

@section('title', 'Crear Sección')
@section('title-content', 'Crear Sección')
@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Sección</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Crear Sección</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['route' => 'sections.store', 'method' => 'POST']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}
			                    <h4>Información de sección</h4>
								<div class="form-group col-sm-6">
			                        <label class="control-label" for="subjects_id">Asignatura</label>
			                        <select id="subjects_id" name="subjects_id" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	@foreach($subject as $subjects)
			                        	<option value="{{$subjects->id}}">{{$subjects->subject}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="users_id">Docentes</label>
			                        <select id="users_id" name="users_id" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	@foreach($teacher as $teachers)
				                        	<option value="{{$teachers->id}}">{{$teachers->names}} {{$teachers->last_name}}</option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="shift">Tanda</label>
			                        <select id="shift" name="shift" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	<option>Matutina</option>
			                        	<option>Nocturna</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="classrooms_id">Aula</label>
			                        <select id="classrooms_id" name="classrooms_id" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	@foreach($classroom as $classrooms)
			                        	<option value="{{$classrooms->id}}">{{$classrooms->location}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="day_one">Primer dia</label>
			                        <select id="day_one" name="day_one" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	<option >Lunes </option>
			                        	<option >Martes </option>
			                        	<option >Miercoles </option>
			                        	<option >Jueves </option>
			                        	<option >Viernes </option>
			                        	<option >Sabado </option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="day_two">Segundo dia</label>
			                        <select id="day_two" name="day_two" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	<option >Lunes </option>
			                        	<option >Martes </option>
			                        	<option >Miercoles </option>
			                        	<option >Jueves </option>
			                        	<option >Viernes </option>
			                        	<option >Sabado </option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="academic_periods_id">Periodo Academico</label>
			                        <select id="academic_periods_id" name="academic_periods_id" class="form-control">
			                        	<option disabled selected value> -- select an option -- </option>
			                        	@foreach($academic_period as $academic_periods)
			                        	<option value="{{$academic_periods->id}}">{{$academic_periods->academic_period}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="time_first">Hora inicio de clase</label>
			                        <input type="time" class="form-control" id="time_first" name="time_first" pattern="">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="time_last">Hora final de clase</label>
			                        <input type="time" class="form-control" id="time_last" name="time_last">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="section">Numero de Sección</label>
			                        <input type="text" class="form-control" id="section" name="section" placeholder="Numero de Sección">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="quota">Cupo</label>
			                        <input type="text" class="form-control" id="quota" name="quota">
			                    </div>
			                    <div class="form-group col-sm-3">
			                    	<label class="control-label" for="status">Estatus de sección</label><br>
			                    	<input type="radio" name="status" class="flat" id="status" value="1" checked> Activada<br>
  									<input type="radio" name="status" class="flat" id="status" value="0"> Desactivada
			                    </div>
			                    <!-- Button -->
			                    {!! Form::submit('Crear Sección',['class' => 'btn btn-primary btn-block']) !!}
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
        	$('#time_first').datetimepicker({
		        format: 'hh:mm A'
		    });
      	});
	</script>
@endsection