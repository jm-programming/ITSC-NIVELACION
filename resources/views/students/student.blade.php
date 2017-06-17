@extends('layouts.landingPage')
@section('title', 'Estudiantes')
@section('content')

<div class="jumbotron main">

 <h1 class="text-center padding ">Estudiantes</h1>



<div class="row padding">
  <div class="col-lg-4 col-md-4">
    <div class="input-group">
    @if (count($studentList) > 0)
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Buscar</button>
      </span>
    @endif
    </div>
  </div>

  <div class="col-lg-8 col-md-8 text-right ">
    <i class="fa fa-plus fa-3x pointer blackColor" aria-hidden="true"></i>
    <i class="fa fa-print fa-3x pointer blackColor" aria-hidden="true"></i>
  </div>
</div>









  @if (count($studentList) > 0)
    <table class="table table-striped table-bordered table-hover table-responsive">
      <thead>
   
      <tr class="bg-danger">
        <th>#</th>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Carrera</td>
        <td>Tanda</td>
        <td>Acción</td>
      </tr>
      </thead>
      <tbody>
      <?php $contador = 1?>
      
        @foreach ($studentList as $students)
        <?php $contador++?>
        <tr>
          <th scope="row">{{$contador}}</th>
          <th>{{$students->names}}</th>
          <th>{{$students->last_names}}</th>
          <th>{{$students->career}}</th>
          <th>{{$students->shift}}</th>
          <th><a href=""><span class="label label-info">Ver</span></a><a href=""><span class="label label-info">Ver</span></a></th>
        </tr>
        @endforeach
      
      
      
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  @else
  <div class="container" id="error">
      <figure id="img-error">
        <img src="img/sad-face.png" alt="sad-face">
      </figure>
      <h2 class="text-center">Oops, no se encontro ningun dato.</h2>
  </div>
  
@endif













</div>





@endsection