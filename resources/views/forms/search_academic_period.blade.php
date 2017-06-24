<div class="input-group">
	{!!Form::open(['method'=>'GET','url'=>'academic_periods_s','role'=>'search'])!!}
	<div class="input-group-btn">
		<input type="text" class="form-control" name="academic_periodSearch" placeholder="Buscar por periodo academico">
		{!! Form::submit('Buscar', ['class' => 'btn btn-danger']) !!}
	</div>
</div>