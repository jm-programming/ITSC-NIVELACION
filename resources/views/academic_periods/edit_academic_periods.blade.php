@extends('layouts.landingPage')
@section('title', 'Periodo Academico')
@section('title-content', 'Periodo Academico')



@section('content')

@include('alerts.requets')
{{ Form::model($academic_periods,['route'=>['academic_periods.update', $academic_periods->id, 'method'=>'POST'],
 'class'=>'form-horizontal form-label-left"']) }}
{{ method_field('PUT') }}
@include('forms.form_academic_period')
{{ Form::close() }}

@endsection