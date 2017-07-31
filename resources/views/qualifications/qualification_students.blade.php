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

@if (count($alumnos) > 0)
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
            <?php $contador = 0;?>
            @foreach ($alumnos as $alumno)
            <?php $contador++?>
            <tr class="even pointer">
                <td class="a-center ">
                    {{$contador}}
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
                
                <td class=" last">
                   {!! link_to_route('qualifications.edit','calificar',$parameters = [$seccionID,$alumno->id], $attributes = ['class' => 'btn btn-primary btn-xs']) !!}
                @endforeach
                 
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