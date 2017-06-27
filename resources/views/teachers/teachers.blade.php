@extends('layouts.landingPage')
@section('title', 'Profesores')
@section('title-content', 'Profesores')
@section('content')

 <div class="row padding">
    <div class="col-lg-4 col-md-4">
      <div class="">
      @if (count($teachersList) > 0)
        @include('forms.teacherSearch',['url'=>'teachers','link'=>'teachers'])
      @endif
      </div>
    </div>

    <div class="col-lg-8 col-md-8 text-right ">
      {!!link_to('teachers/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
    </div>
  </div>

@if (count($teachersList) > 0)

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th>#</th>
              <th class="column-title">Nombres </th>
              <th class="column-title">Apellidos </th>
              <th class="column-title">Estado</th>
              <th class="column-title">identificacion</th>
              <th class="column-title">telefono</th>
              <th class="column-title">movil</th>
              <th class="column-title">genero</th>
              <th class="column-title">Direccion</th>
              <th class="column-title no-link last"><span class="nobr">Acción</span>
              </th>
              <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php $contador = 0;?>
            @foreach ($teachersList as $teachers)
              <?php $contador++?>
              <tr class="even pointer">
                <td class="a-center ">{{$contador}}</td>
                <td class=" ">{{$teachers->names}}</td>
                <td class=" ">{{$teachers->last_name}}</td>
               <!--condicion para que si el estado del profesor es 1 imprima activo-->
                @if ($teachers->status == 1)
                <td class=" ">Activo</i></td>
               <!--condicion para que si el estado del profesor es 0 imprima inactivo-->
                @else
                <td class=" ">Inactivo</i></td>
                @endif
                <td class=" ">{{$teachers->identity_card}}</td>
                <td class=" ">{{$teachers->personal_phone}}</td>
                <td class=" ">{{$teachers->cellphone}}</td>
                <td class=" ">{{$teachers->gender}}</td>
                <td class=" ">{{$teachers->addresss}}</td>
                <td class=" last">
                  {!! link_to_route('teachers.edit', $title = 'Ver', $parameters = $teachers->id, $attributes = ['class' => 'label label-info']) !!}
                  {!! link_to_route('teachers.edit', $title = 'Editar', $parameters = $teachers->id, $attributes = ['class' => 'label label-warning']) !!}
                  <a href="#" data-toggle="modal" data-target="#delete-modal"><span class="label label-danger">Eliminar</span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
        {!! $teachersList->links() !!}
        </ul>
      </nav>

      <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        {{-- modal --}}
        <!--@include('modals.delete_modal', ['r' => 'teachers.destroy', 'id' => $teachers->id])-->
@else
    <div class="container" id="error">
        <figure id="img-error">
          <img src="img/sad-face.png" alt="sad-face">
        </figure>
        <h2 class="text-center">Oops, no se encontro ningun dato.</h2>
    </div>
    
@endif


@endsection