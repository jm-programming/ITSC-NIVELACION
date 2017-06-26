@extends('layouts.landingPage')
@section('title', 'Aulas')
@section('title-content', 'Aulas')



@section('content')
@include('alerts.requets')


<div id="content" class="jumbotron main">
		<h1 class="text-center padding ">Aula</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Editar Aula</h2>
					</div>
					<div class="panel-body">
	{{ Form::model($classrooms,['route'=>['classrooms.update', $classrooms->id, 'method'=>'POST']]) }}
{{ method_field('PUT') }}


									@include('forms.form_classroom')


						{!! Form::close() !!}


						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection