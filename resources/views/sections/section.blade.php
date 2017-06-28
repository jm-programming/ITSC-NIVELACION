@extends('layouts.landingPage')
@section('title', 'Secciones')
@section('title-content', 'Secciones')
@section('content')
<div class="row padding">
    <div class="col-lg-4 col-md-4">
        <div class="input-group">
            @if (count($sections) > 0)
            <div class="input-group">
                @include('forms.search_section',['url'=>'students','link'=>'students'])
            </div>
            @endif
        </div>
    </div>
    <div class="col-lg-8 col-md-8 text-right ">
        {!!link_to('sections/create', $title = '', $attributes = ['class' => 'fa fa-plus fa-3x pointer blackColor'], $secure = null)!!}
    </div>
</div>
@if (count($sections) > 0)
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th>
                    #
                </th>
                <th class="column-title">
                    Sección
                </th>
                <th class="column-title">
                    Cupos
                </th>
                <th class="column-title">
                    Dias
                </th>
                <th class="column-title">
                    Hora
                </th>
                <th class="column-title">
                    Tanda
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
            @foreach ($sections as $section)
            <?php $contador++?>
            <tr class="even pointer">
                <td class="a-center ">
                    {{$contador}}
                </td>
                <td class=" ">
                    {{$section->section}}
                </td>
                <td class=" ">
                    {{$section->quota}}
                </td>
                <td class=" ">
                    {{$section->day_one}} / {{$section->day_two}}
                </td>
                <td class=" ">
                    {{$section->time_first}} / {{$section->time_last}}
                </td>
                <td class=" ">
                    {{$section->shift}}
                </td>
                <td class=" last">
                    {!! link_to_route('sections.edit', $title = 'Ver', $parameters = $section->id, $attributes = ['class' => 'label label-info']) !!}
                  {!! link_to_route('sections.edit', $title = 'Editar', $parameters = $section->id, $attributes = ['class' => 'label label-warning']) !!}
                    <a data-target="#delete-modal" data-toggle="modal" href="#">
                        <span class="label label-danger">
                            Eliminar
                        </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination text-center">
        {!! $sections->links() !!}
    </ul>
</nav>
<button class="btn btn-default" onclick="window.print();">
    <i class="fa fa-print">
    </i>
    Print
</button>
{{-- modal --}}
        @include('modals.delete_modal', ['r' => 'sections.destroy', 'id' => $section->id])
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
