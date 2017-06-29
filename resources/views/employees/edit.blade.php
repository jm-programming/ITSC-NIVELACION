@extends('layouts.landingPage')
@section('title', 'Empleados')
@section('title-content', 'Empleados')
@include('alerts.requets');
@section('content')

@include('alerts.requets')
{{ Form::model($employees,['route'=>['employees.update', $employees->id, 'method'=>'POST'],
 'class'=>'form-horizontal form-label-left"']) }}
{{ method_field('PUT') }}
    @include('forms.form_employee')
{{ Form::close() }}

@endsection