@extends('layouts.landingPage')
@section('title', 'Aulas')
@section('title-content', 'Aulas')

@if(Session::has('message'))

<div class="alert alert-success">
{{ session::get('message') }}
</div>
@endif


@section('content')
<div class="row padding">
			<div class="col-lg-4 col-md-4">
				<div class="input-group">
					@if (count($classrooms) > 0)
						@include('forms.search_classroom',['url'=>'classrooms','link'=>'classrooms'])
					@endif
				</div>
			</div>

		<div class="text-right ">
			{!!link_to('classrooms/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
		</div>
	</div>

@if (count($classrooms) > 0)

<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
<thead>
<tr class="headings">
		<th>#</th>
		<th class="column-title">Classrooms </th>
		<th class="column-title no-link last"><span class="nobr">Acción</span></th>
<th class="bulk-actions" colspan="7">
<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
</th>
</tr>
</thead>

<tbody>
@foreach($classrooms as $classroom)
<tr class="even pointer">

<td>{{ $classroom->id }}</td>
<td>{{ $classroom->location }}</td>
<td class=" last">

{{ Form::open(['route'=>['classrooms.destroy', $classroom->id, 'method'=>'DELETE'], 'class'=>'form-horizontal form-label-left"']) }}
{!! link_to_route('classrooms.edit', $title = 'Ver', $parameters = $classroom->id, $attributes = ['class' => 'btn btn-info btn-xs']) !!}
{!! link_to_route('classrooms.edit', $title = 'Editar', $parameters = $classroom->id, $attributes = ['class' => 'btn btn-primary btn-xs']) !!}
<a href="#" data-toggle="modal" data-target="#delete-modal"><span class="btn btn-danger btn-xs">Eliminar</span></a>
{{ Form::close() }}


@include('employees.modal_delete', ['r' => 'classrooms.destroy', 'id' => $classroom->id])
</td>
</tr>
@endforeach
</tbody>
</table>
<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
</div>

<div class="text-right">
	{{ $classrooms->render() }}
</div>
@else
<div class="container" id="error">
<figure id="img-error">
<img src="img/sad-face.png" alt="sad-face">
</figure>
<h2 class="text-center">Oops, no se encontro ningun dato.</h2>
</div>

@endif



@endsection
