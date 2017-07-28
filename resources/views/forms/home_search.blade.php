<div class="input-group">
	{!!Form::open(['method'=>'GET','url'=>'home_s','role'=>'search'])!!}
	
	<div class="input-group-btn">
		
<input type="text" class="form-control" name="query" placeholder="Buscar por nombre y apellido">
		{!! Form::submit('Buscar', ['class' => 'btn btn-danger']) !!}</div>
		
	<select name="user" id="user" class="btn btn-dark">
		<option value="Profesor">Profesor</option>
		<option value="Estudiante">Estudiante</option>
		<option value="Empleado">Empleado</option>
	</select>
	<!--el select con un array asociativo para los diferentes valores que obtendremos de la url
	al enviar el metodo submit-->
	
	<!--se agrego el form::close para cerrar el formulario-->
	{{ Form::close() }}
</div>