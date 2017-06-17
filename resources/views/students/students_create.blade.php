@extends('layouts.landingPage');

@section('title', 'Crear Estudiante')

@section('content')
	<div class="jumbotron main">
		<h1 class="text-center padding ">Estudiantes</h1>
		<div class="container">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2 class="panel-title">Crear Estudiante</h2>
					</div>
					<div class="panel-body">
						<form action="" method="" id="">
							<div class="form-group">
								<label for="">asdasds</label>
								<input type="text" class="form-control" id="identity-card">
								<input type="text" class="form-control" id="phone-number">
							</div>
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
        	$('#phone-number').inputmask({"mask": "999-999-9999"}); 
        	$('#identity-card').inputmask({"mask": "999-9999999-9"}); 
      	});
	</script>
@endsection


