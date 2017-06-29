@include('alerts.requets');
@extends('layouts.landingPage')
@section('title', 'Empleados')
@section('title-content', 'Empleados')
@section('content')

@include('alerts.requets')
{{ Form::open(['route'=>'employees.store', 'method'=>'POST',
'class'=>'form-horizontal form-label-left"']) }}

		@include('forms.form_employee')


{{ Form::close() }}


@endsection