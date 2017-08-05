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

  <div class="row padding">
    <div class="col-lg-4 col-md-4">
        <div class="input-group">
            @if (count($studentsList) > 0)
        @include('forms.search_student',['url'=>'students','link'=>'students'])
      @endif
        </div>
    </div>
    <div class="col-lg-8 col-md-8 text-right ">
        {!!link_to('students/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
    </div>
</div>
@if (count($studentsList) > 0)
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
                    Carrera
                </th>
                <th class="column-title">
                    Tanda
                </th>
                <th class="column-title">
                    Condición
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
            @foreach ($studentsList as $students)
            <?php $contador++?>
            <tr class="even pointer">
                <td class="a-center ">
                    {{$contador}}
                </td>
                <td class=" ">
                    {{$students->names}}
                </td>
                <td class=" ">
                    {{$students->last_name}}
                </td>
                <td class=" ">
                    {{$students->career}}
                </td>
                <td class=" ">
                    {{$students->shift}}
                </td>
                <td class=" ">
                    {{$students->condition}}
                </td>
                <td class=" last">
<<<<<<< HEAD
                    {!! link_to_route('horariostudent.show', $title = 'Horario', $parameters = $students->id, $attributes = ['class' => 'btn btn-primary btn-xs']) !!}
                    {!! link_to_route('students.show', $title = 'Inscribir', $parameters = $students->id, $attributes = ['class' => 'btn btn-primary btn-xs']) !!}
                    {{-- {!! link_to_route('students.edit', $title = 'Ver', $parameters = $students->id, $attributes = ['class' => 'btn btn-info btn-xs']) !!} --}}
                    {!! link_to_route('students.edit', $title = 'Editar', $parameters = $students->id, $attributes = ['class' => 'btn btn-warning btn-xs']) !!}
=======
                   
>>>>>>> Development
                    {{-- {!! link_to_action('StudentsController@destroy', $title = 'Eliminar', $parameters = $students->id, $attributes = ['class' => 'label label-danger']) !!} --}}
                    {!!Form::open(['route'=> ['students.destroy', $students->id], 'method' => 'DELETE'])!!}
                     {{-- {!! link_to_route('students.edit', $title = 'Ver', $parameters = $students->id, $attributes = ['class' => 'btn btn-info btn-xs']) !!} --}}
                    {!! link_to_route('students.edit', $title = 'Editar', $parameters = $students->id, $attributes = ['class' => 'btn btn-warning btn-xs']) !!}
                        {!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-xs'])!!}
                    {!!Form::close()!!}
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {!! $studentsList->links() !!}
        </ul>
    </nav>
    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>

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
