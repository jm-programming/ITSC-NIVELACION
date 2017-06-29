@extends('layouts.landingPage')
@section('title', 'Usuarios')
@section('title-content', 'Usuarios')
@section('content')

 <div class="row padding">
    <div class="col-lg-4 col-md-4">
      <div class="">
      @if (count($usersList) > 0)
        @include('forms.search_users',['url'=>'users','link'=>'users'])
      @endif
      </div>
    </div>

    <div class="col-lg-8 col-md-8 text-right ">
      {!!link_to('users/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
    </div>
  </div>

@if (count($usersList) > 0)

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th>#</th>
              <th class="column-title">Nombres </th>
              <th class="column-title">Apellidos </th>
              <th class="column-title">Identificación</th>
              <th class="column-title">Genero</th>
              <th class="column-title">Movil</th>
              <th class="column-title">Tipo de usuario</th>
              <th class="column-title">Estado</th>
              <th class="column-title no-link last"><span class="nobr">Acción</span>
              </th>
              <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php $contador = 0;?>
            @foreach ($usersList as $users)
              <?php $contador++?>
              <tr class="even pointer">
                <td class="a-center ">{{$contador}}</td>
                <td class=" ">{{$users->names}}</td>
                <td class=" ">{{$users->last_name}}</td>
                <td class=" ">{{$users->identity_card}}</td>
                <td class=" ">{{$users->gender}}</td>
                <td class=" ">{{$users->cellphone}}</td>
                <td class=" ">{{$users->roll}}</td>
                <!--condicion para que si el estado del profesor es 1 imprima activo-->
                @if ($users->status == 1)
                <td class=" ">Activo</i></td>
               <!--condicion para que si el estado del profesor es 0 imprima inactivo-->
                @else
                <td class=" ">Inactivo</i></td>
                @endif
                <td class=" last">
                  {!! link_to_route('users.edit', $title = 'Ver', $parameters = $users->id, $attributes = ['class' => 'label label-info']) !!}
                  {!! link_to_route('users.edit', $title = 'Editar', $parameters = $users->id, $attributes = ['class' => 'label label-warning']) !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
        {!! $usersList->links() !!}
        </ul>
      </nav>

      <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
@else
    <div class="container" id="error">
        <figure id="img-error">
          <img src="img/sad-face.png" alt="sad-face">
        </figure>
        <h2 class="text-center">Oops, no se encontro ningun dato.</h2>
    </div>
    
@endif


@endsection