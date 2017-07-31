<fieldset class="col-sm-10 col-sm-offset-1">
    <!-- Form Name -->
    <!-- Prepended text-->
    {!!Form::token()!!}
    <h4>
        Información personal de la cita
    </h4>

    <div class="form-group col-sm-6">
        <label class="control-label" for="names">
            Nombres
        </label>
        {{ Form::text('names',null,['class'=>'form-control','placeholder'=>"Ingrese sus Nombres"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="last_name">
            Apellidos
        </label>
        {{ Form::text('last_name',null,['class'=>'form-control','placeholder'=>"Ingrese sus Apellidos"]) }}
    </div>
   <div class="form-group col-sm-6">
                                    <label class="control-label" for="nombres">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday')}}" placeholder="Fecha Nacimiento" min="01/01/1900">
                                </div>
    
    <div class="form-group col-sm-6">
        <label class="control-label" for="matricula">
            Matricula
        </label>
        {{ Form::text('matricula',null,['class'=>'form-control','placeholder'=>"Ingrese la matricula estudiantil"]) }}
    </div>
    
    <div class="form-group col-sm-6">
        <label class="control-label" for="identity_card">
            Identificación
        </label>
        {{ Form::text('identity_card',null,['class'=>'form-control','placeholder'=>"Ingrese la identificación", 'id'=>"identity_card"]) }}
    </div>
     <div class="form-group col-sm-6">
        <label class="control-label" for="email">
            Correo
        </label>
        {{ Form::text('email',null,['class'=>'form-control','placeholder'=>"Ingrese el correo"]) }}
    </div>
     <div class="form-group col-sm-12">
                                    <label class="control-label" for="nombres">Carrera</label>
                                    <select id="career" name="career" class="form-control">
                                        <option disabled selected value> -- select an option -- </option>
                                        <option disabled>Salud </option>
                                        <option>Técnico Superior en Higiene Dental</option>
                                        <option>Técnico Superior en Enfermería</option>
                                        <option>Técnico Superior en Imágenes Médicas</option>
                                        <option>Técnico Superior en Mecánica Dental</option>

                                        <option disabled>Informatica </option>
                                        <option>Técnico Superior en Administración de Redes</option>
                                        <option>Técnico Superior en Desarrollo de Software</option>
                                        <option>Técnico Superior en Soporte Informático</option>

                                        <option disabled>Artes </option>
                                        <option>Técnico Superior en Fotografía</option>
                                        <option>Técnico Superior en Diseño de Modas</option>
                                        <option>Técnico Superior en Diseño Gráfico</option>
                                        <option>Técnico Superior en Producción de Eventos</option>
                                        <option>Técnico Superior en Diseño de Interiores</option>
                                        <option>Técnico Superior en Industria del Mueble</option>

                                        <option disabled>Turismo </option>
                                        <option>Técnico Superior en Gastronomía</option>
                                        <option>Técnico Superior en Sistemas de Información Turística</option>
                                        <option>Técnico Superior en Gestión de Alojamiento Turístico</option>
                                        <option>Técnico Superior en Alimentos y Bebidas</option>
                                        <option>Técnico Superior en Empresas de Intermediación Turística</option>
                                        <option>Técnico Superior en Panadería y Repostería</option>

                                        <option disabled >Industrial </option>
                                        <option>Técnico Superior en Tecnologías de Manufactura</option>
                                        <option>Técnico Superior en Logística</option>

                                        <option disabled>Contrucción </option>
                                        <option>Técnico Superior en Construcción</option>
                                        <option>Técnico Superior en Plomería</option>

                                        <option disabled >Electromecánica </option>
                                        <option>Técnico Superior Mecatronica</option>
                                        <option>Técnico Superior en Electrónica</option>
                                        <option>Técnico Superior en Electricidad</option>
                                        <option>Técnico Superior en Refrigeración</option>
                                    </select>
                                    <br>
                                </div>  
    <div class="form-group col-sm-12">
        <label class="control-label" for="location">
            Ubicación
        </label>
        {{ Form::text('location',null,['class'=>'form-control','placeholder'=>"Ingrese la ubicación"]) }}
    </div>
     <div class="form-group col-sm-6">
                                    <label class="control-label" for="nombres">Fecha del examen</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date')}}" min="01/01/1900">
                                </div>
    
    <div class='form-group col-sm-6'>
                    <label for="date">Hora del Examen</label>
                    <div class="form-group">
                        <div class='input-group date' id='Datepicker'>
                            <input type='text' class="form-control" name="time" value="{{ old('date')}}"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
   
 
    {!! Form::submit('Crear Cita',['class' => 'btn btn-primary btn-block']) !!}
    <br/>
</fieldset>


@section('script')
@include('forms.alerts')

@endsection
