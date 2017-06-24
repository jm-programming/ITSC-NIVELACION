<div class="input-group">
	{!!Form::open(['method'=>'GET','url'=>'classrooms_s','role'=>'search'])!!}
	<div class="input-group-btn">
		<input type="text" class="form-control" name="classroomSearch" placeholder="Buscar por aula">
		{!! Form::submit('Buscar', ['class' => 'btn btn-danger']) !!}
	</div>
</div>