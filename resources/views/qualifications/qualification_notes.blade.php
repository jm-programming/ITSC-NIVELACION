@extends('layouts.landingPage')
@section('title', 'Estudiantes')
@section('title-content', 'Estudiantes')
@section('content')



  @if(Session::has('message'))

    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ session::get('message') }}
    </div>
  @endif

@if (count($alumno) > 0)
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th>
                    #
                </th>
                <th class="column-title">
                    Nombres
                </th>
                <th class="column-title">
                    Apellidos
                </th>
                <th class="column-title">
                    identificacion
                </th>
                <th class="column-title">
                    Primer_Parcial
                </th>
                <th class="column-title">
                    Segundo_Parcial
                </th>
                <th class="column-title">
                    Practicas
                </th>
                <th class="column-title">
                    Examen final
                </th>
                <th class="column-title">
                    Total
                </th>
                <th class="column-title no-link last">
                    <span class="nobr">
                        Acción
                    </span>
                </th>
                <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">
                        Bulk Actions (
                        <span class="action-cnt">
                        </span>
                        )
                        <i class="fa fa-chevron-down">
                        </i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="even pointer">
                <td class="a-center ">
                    1
                </td>
                <td class=" ">
                    {{$alumno->names}}
                </td>
                <td class=" ">
                    {{$alumno->last_name}}
                </td>
                <td class=" ">
                    {{$alumno->identity_card}}
                </td>
                <td class=" ">
                <input class="form-control" type="number"  min="0" max="10" id="first_midterm" name="first_midterm" placeholder="" value='' >
                </td>
                <td class=" ">
                <input class="form-control" type="number"  min="0" max="10" id="second_midterm" name="second_midterm" placeholder="" value=''>
                </td>
                <td class=" ">
                <input class="form-control" type="number"  min="0" max="60" id="pratice_score" name="pratice_score" placeholder="" value=''>
                </td>
                <td class=" ">
                <input class="form-control" type="number"  min="0" max="20" id="final_exam" name="final_exam" placeholder="" value=''>
                </td>
                <td class=" ">
                <input class="form-control" type="number"  id="score" name="score" placeholder="" value=''>
                </td>
                <td class=" last">
                <button type="button" class="btn btn-primary">Provicional</button>
            </tr>
        </tbody>
    </table>
    </div>

    @else
    <div class="container" id="error">
        @include('forms.search_student',['url'=>'students','link'=>'students'])
        <figure id="img-error">
          <img src="img/sad-face.png" alt="sad-face">
        </figure>
        <h2 class="text-center">Oops, no se encontro ningun dato.</h2>
    </div>

  @endif


@endsection