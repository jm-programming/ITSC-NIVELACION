<div class="input-group">
	{!!Form::open(['method'=>'GET','url'=>'sections_s','role'=>'search'])!!}
	<div class="input-group-btn">
		<input type="text" class="form-control" name="sectionSearch" placeholder="Buscar por numero de sección">
		{!! Form::submit('Buscar', ['class' => 'btn btn-danger']) !!}
	</div>
	{!!Form::close()!!}
</div>