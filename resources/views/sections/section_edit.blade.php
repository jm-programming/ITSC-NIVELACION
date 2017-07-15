@extends('layouts.landingPage');

@section('title', 'Crear Sección')
@section('title-content', 'Editar Sección')
@section('content')
	<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Sección</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Editar Sección</h2>
					</div>
					<div class="panel-body">
						@include('alerts.requets')
						{!! Form::open(['route' => ['sections.update', $section->id], 'method' => 'PUT']) !!}
			                <fieldset class="col-sm-10 col-sm-offset-1">
			                    <!-- Form Name -->
			                    <!-- Prepended text-->
			                    {!!Form::token()!!}
			                    <h4>Información de sección</h4>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="subjects_id">Asignatura</label>
			                        <select id="subjects_id" name="subjects_id" class="form-control">
			                        	@foreach($sectionsSubject as $sectionsSubject)
				                        	<option value="{{$sectionsSubject->id}}">{{$sectionsSubject->subject}}</option>
			                        	@endforeach
			                        	<option disabled value> --------------------------- </option>
			                        	@foreach($subject as $subjects)
			                        		<option value="{{$subjects->id}}">{{$subjects->subject}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="users_id">Docentes</label>
			                        <select id="users_id" name="users_id" class="form-control">
			                        	@foreach($sectionsTeacher as $sectionsTeacher)
				                        	<option value="{{$sectionsTeacher->id}}">{{$sectionsTeacher->names}} {{$sectionsTeacher->last_name}}</option>
			                        	@endforeach
			                        	<option disabled value> ------------------------------------- </option>
			                        	@foreach($teacher as $teachers)
				                        	<option value="{{$teachers->id}}">{{$teachers->names}} {{$teachers->last_name}}</option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="shift">Tanda</label>
			                        <select id="shift" name="shift" class="form-control">
			                        	<option>{{$section->shift}}</option>
			                        	<option disabled value> -------------- </option>
		                        		<option>Nocturna</option>
			                        	<option>Matutina</option>
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="classrooms_id">Aula</label>
			                        <select id="classrooms_id" name="classrooms_id" class="form-control">
			                        	@foreach($sectionsClassrooms as $sectionsClassrooms)
				                        	<option value="{{$sectionsClassrooms->id}}">{{$sectionsClassrooms->location}}</option>
			                        	@endforeach
			                        	<option disabled value> ----------- </option>
			                        	@foreach($classroom as $classrooms)
			                        	<option value="{{$classrooms->id}}">{{$classrooms->location}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="day_one">Primer dia</label>
			                        <select id="day_one" name="day_one" class="form-control">
			                        	<option >{{$section->day_one}}</option>
			                        	<option disabled value> ------- </option>
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
			                        	<option >{{$section->day_two}}</option>
			                        	<option disabled value> ------- </option>
			                        	<option value=""> </option>
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
			                        	@foreach($sectionsAcademic_period as $sectionsAcademic_period)
				                        	<option value="{{$sectionsAcademic_period->id}}">{{$sectionsAcademic_period->academic_period}}</option>
			                        	@endforeach
			                        	<option disabled value> -------- </option>
			                        	@foreach($academic_period as $academic_periods)
			                        	<option value="{{$academic_periods->id}}">{{$academic_periods->academic_period}} </option>
			                        	@endforeach
			                        </select>
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="time_first">Hora inicio de clase</label>
			                        <input type="time" class="form-control" id="time_first" name="time_first" value="{{$section->time_first}}" pattern="">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="time_last">Hora final de clase</label>
			                        <input type="time" class="form-control" id="time_last" name="time_last" value="{{$section->time_last}}">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="second_time_first">2da Hora inicio de clase</label>
			                        <input type="time" class="form-control" id="second_time_first" name="second_time_first" value="{{$section->second_time_first}}" pattern="">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="second_time_last">2da Hora final de clase</label>
			                        <input type="time" class="form-control" id="second_time_last" name="second_time_last" value="{{$section->second_time_last}}">
			                    </div>
			                    <div class="form-group col-sm-6">
			                        <label class="control-label" for="section">Numero de Sección</label>
			                        <input type="text" class="form-control" id="section" name="section" placeholder="Numero de Sección" value="{{$section->section}}">
			                    </div>
			                    <div class="form-group col-sm-3">
			                        <label class="control-label" for="quota">Cupo</label>
			                        <input type="text" class="form-control" id="quota" name="quota" value="{{$section->quota}}">
			                    </div>
			                    <div class="form-group col-sm-3">
			                    	<label class="control-label" for="status">Estatus de sección</label><br>
			                    	<input type="radio" name="status" class="flat" id="status" value="1" @if($section->status == 1) checked @endif> Activada<br>
  									<input type="radio" name="status" class="flat" id="status" value="0" @if($section->status == 0) checked @endif> Desactivada
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