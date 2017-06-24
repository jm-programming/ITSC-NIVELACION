@extends('layouts.landingPage')
@section('title', 'Aulas')
@section('title-content', 'Aulas')
@section('content')
@include('alerts.requets')

{{ Form::open(['route'=>'classrooms.store', 'method'=>'POST', 'class'=>'form-horizontal form-label-left"']) }}
		@include('forms.form_classroom')
{{ Form::close() }}


@endsection