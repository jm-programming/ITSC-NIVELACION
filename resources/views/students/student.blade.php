@extends('layouts.landingPage')
@section('title', 'Estudiantes')
@section('title-content', 'Estudiantes')
@section('content')
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

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th>#</th>
              <th class="column-title">Nombres </th>
              <th class="column-title">Apellidos </th>
              <th class="column-title">Carrera </th>
              <th class="column-title">Tanda </th>
              <th class="column-title">Condición </th>
              <th class="column-title no-link last"><span class="nobr">Acción</span>
              </th>
              <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
              </th>
            </tr>
          </thead>
          
          <tbody>
            <?php $contador = 0;?>
            @foreach ($studentList as $students)
              <?php $contador++?>
              <tr class="even pointer">
                <td class="a-center ">{{$contador}}</td>
                <td class=" ">{{$students->names}}</td>
                <td class=" ">{{$students->last_name}}</td>
                <td class=" ">{{$students->career}}</i></td>
                <td class=" ">{{$students->shift}}</td>
                <td class=" ">{{$students->condition}}</td>
                <td class=" last">
                  <a href="student/{{$students->id}}/edit" data-toggle="modal" data-target="#student-modal"><span class="label label-info">Ver</span></a>
                  <a href="student/{{$students->id}}/edit" data-toggle="modal" data-target="#student-modal"><span class="label label-warning">Editar</span></a>
                  <a href="student/{{$students->id}}" data-toggle="modal" data-target="#student-modal"><span class="label label-danger">Eliminar</span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
      <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>

      <!-- Large modal -->
      <div class="modal fade" id="student-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Estudiante</h4>
            </div>
            <form action="">
              <div class="modal-body">
                <fieldset>
                  {{-- @foreach($student as $student) --}}
                    <!-- Form Name -->
                    <!-- Prepended text-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <h4>Información personal del estudiante</h4>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Apellidos</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Carrera</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Fecha Nacimiento</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Identificación</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Estado Civil</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Email</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <h4>Información escolar de estudiante</h4>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Tanda</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Condición</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Oportunidades</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <label class="control-label" for="nombres">Deuda</label>
                        <input type="text" class="form-control" id="names" name="names" value="" placeholder="Nombres del estudiante">
                    </div>
                    <!-- Button -->
                    {{-- @endforeach --}}
                </fieldset>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
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