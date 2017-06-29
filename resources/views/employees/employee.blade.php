@extends('layouts.landingPage')
@section('title', 'Empleados')
@section('title-content', 'Empleados')


@if(Session::has('message'))

<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{ session::get('message') }}
</div>
@endif

@section('content')
	<div class="row padding">
			<div class="col-lg-4 col-md-4">
				<div class="input-group">
					@if (count($employees) > 0)
						@include('search.employee',['url'=>'employees','link'=>'employees'])
					@endif
				</div>
			</div>

		<div class="text-right ">
				{!!link_to('employees/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
		</div>
	</div>

@if (count($employees) > 0)

<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
<thead>
<tr class="headings">
<th>#</th>
<th class="column-title">Nombres </th>
<th class="column-title">Apellidos </th>
<th class="column-title">Cargo </th>
<th class="column-title">Correo </th>
<th class="column-title">Telefono Particular</th>
<th class="column-title">Telefono Oficina</th>
<th class="column-title">Celular</th>
<th class="column-title">Direccion</th>
<th class="column-title">Identificacion</th>
<th class="column-title">Estado Civil</th>
<th class="column-title no-link last"><span class="nobr">Acción</span>
</th>
<th class="bulk-actions" colspan="7">
<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
</th>
</tr>
</thead>

<tbody>
@foreach($employees as $employee)
<tr class="even pointer">

<td>{{ $employee->id }}</td>
<td>{{ $employee->names }}</td>
<td>{{ $employee->last_name }}</td>
<td>{{ $employee->job }}</td>
<td>{{ $employee->email }}</td>
<td>{{ $employee->personal_phone }}</td>
<td>{{ $employee->office_phone}}</td>
<td>{{ $employee->cellphone }}</td>
<td>{{ $employee->address}}</td>
<td>{{ $employee->identity_card }}</td>
<td>{{ $employee->civil_status}}</td>

<td class=" last">

{{ Form::open(['route'=>['employees.destroy', $employee->id, 'method'=>'DELETE'], 'class'=>'form-horizontal form-label-left"']) }}


{!! link_to_route('employees.edit', $title = 'Ver', $parameters = $employee->id, $attributes = ['class' => 'btn btn-info btn-xs']) !!}
{!! link_to_route('employees.edit', $title = 'Editar', $parameters = $employee->id, $attributes = ['class' => 'btn btn-primary btn-xs']) !!}

<a href="#" data-toggle="modal" data-target="#delete-modal"><span class="btn btn-danger btn-xs">Eliminar</span></a>
{{ Form::close() }}


@include('employees.modal_delete', ['r' => 'employees.destroy', 'id' => $employee->id])
</td>

</tr>
@endforeach
</tbody>
</table>
<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
</div>

<div class="text-right">
	{{ $employees->render() }}
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
