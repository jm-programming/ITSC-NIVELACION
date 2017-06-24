@extends('layouts.landingPage')
@section('title', 'Periodo Academico')
@section('title-content', 'Periodo Academico')
@section('content')
@include('alerts.requets')

{{ Form::open(['route'=>'academic_periods.store', 'method'=>'POST', 'class'=>'form-horizontal form-label-left"']) }}
@include('forms.form_academic_period')
{{ Form::close() }}


@endsection