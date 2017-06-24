@extends('layouts.landingPage')
@section('title', 'Aulas')
@section('title-content', 'Aulas')



@section('content')
@include('alerts.requets')
{{ Form::model($classrooms,['route'=>['classrooms.update', $classrooms->id, 'method'=>'POST'],
 'class'=>'form-horizontal form-label-left"']) }}
{{ method_field('PUT') }}
@include('forms.form_classroom')
{{ Form::close() }}


@endsection