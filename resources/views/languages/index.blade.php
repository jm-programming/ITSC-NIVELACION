@extends('layouts.landingPage')
@section('title', 'Citas')
@section('title-content', 'Citas')
@section('content')


   <div class="text-right ">
        {!!link_to('languages/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
    </div>
</div>

@if(Session::has('message'))
<div class="alert alert-success" id="Success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ session::get('message') }}
</div>
@endif 

@if (count($language) > 0)

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action" id="table_idlanguaje">
          <thead>
            <tr class="headings">
              <th>#</th>
              <th class="column-title">Lenguaje</th>
              <th class="column-title">Fecha de la cita</th>
              <th class="column-title">Hora</th>
              <th class="column-title">Ubicación</th>

          
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
            @foreach($language as $languages)
            <?php $contador++?>
            <tr class="even pointer">
                <td>
                    {{ $contador }}
                </td>
                <td>
                    {{ $languages->language }}
                </td>

                <td>
                   {!! $languages->date !!}
                                    </td>
                <td>
                    {{ $languages->time}}
                </td>
                <td>{{$languages->location}}</td>
                <td class="last">    
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> Ver</button>

                   <!-- {!!Form::open(['route'=> ['languages.destroy', $languages->id], 'method' => 'DELETE'])!!}-->
                    <!-- Button trigger modal -->

                             <!--{!! link_to_route('languages.edit', $title = 'Editar', $parameters = $languages->id, $attributes = ['class' => 'btn btn-warning btn-xs']) !!} -->
                       <!-- {!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-xs'])!!}-->

                    {!!Form::close()!!}
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1 class="modal-title" id="myModalLabel"> Cita de Idiomas</h1>
      </div>
      <div class="modal-body">
            <h1> Fecha de la Cita <span>{{ $languages->date }}</span></h1> 
            <h2>Ubicación <span> {{ $languages->location }}</span></h2>
            <h2>Hora <span>{{ $languages->time }}</span></h2>
            <p>Fecha de la cita</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" >Imprimir</button>
              </div>
    </div>
  </div>
</div>

    
      </div>
<div class="text-right">
    {{ $language->render() }}
</div>
@else
<div class="container" id="error">
    <figure id="img-error">
        <img alt="sad-face" src="img/sad-face.png">
        </img>
    </figure>
    <h2 class="text-center">
        Oops, no se encontro ningun dato.
    </h2>
</div>
@endif

@endsection

@include('forms.alerts')