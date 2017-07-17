<fieldset class="col-sm-10 col-sm-offset-1">
    <!-- Form Name -->
    <!-- Prepended text-->
    {!!Form::token()!!}
    <h4>
        Información personal del empleado
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
        <label class="control-label" for="email">
            Correo
        </label>
        {{ Form::text('email',null,['class'=>'form-control','placeholder'=>"Ingrese el correo"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="password">
            Password
        </label>
        {{ Form::password('password',['class'=>'form-control','placeholder'=>"Ingrese su contraseña"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="personal_phone">
            Telefono Particular
        </label>
        {{ Form::text('personal_phone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono Particular", 'id'=>"personal_phone"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="office_phone">
            Telefono Oficina
        </label>
        {{ Form::text('office_phone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono de la oficina", 'id'=>"office_phone"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="cellphone">
            Telefono Celular
        </label>
        {{ Form::text('cellphone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono celular", 'id'=>"cellphone"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="identity_card">
            Identificación
        </label>
        {{ Form::text('identity_card',null,['class'=>'form-control','placeholder'=>"Ingrese la identificación", 'id'=>"identity_card"]) }}
    </div>
    <div class="form-group col-sm-8">
        <label class="control-label" for="address">
            Dirección
        </label>
        {{ Form::text('address',null,['class'=>'form-control','placeholder'=>"Ingrese la dirección"]) }}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('civil_status', 'Estado Civil',['class'=>'control-label']) !!}

            {!! Form::select('civil_status',[

            'Soltero/a' => 'Soltero/a',
            'Casado/a' => 'Casado/a',
            'Comprometido/a' => 'Comprometido/a',
            'Divorciado/a' => 'Divorciado/a',


            ],null,['class' => 'form-control', 'placeholder'=>'-- seleccione una opción --'])!!}
    </div>
    <div class="form-group col-sm-6">

        {!! Form::label('gender', 'Genero',['class'=>'control-label']) !!}

            {!! Form::select('gender',[

            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer',

            ],null,['class' => 'form-control', 'placeholder'=>'-- seleccione una opción --'])!!}

    </div>


    <div class="form-group col-sm-6">
        {!!Form::label('status','Estatus de Empleado',['class'=>'control-label'])!!}<br>
        {!!Form::radio('status', '1')!!} Activo.
        <br>
        {!!Form::radio('status', '0')!!} Inactivo.
    </div>
    {!! Form::submit('Crear Empleado',['class' => 'btn btn-primary btn-block']) !!}
    <br/>
</fieldset>


@section('script')
<script>
    $(document).ready(function(){
            $('#identity_card').inputmask({"mask": "999-9999999-9"});
            $('#cellphone').inputmask({"mask": "999-999-9999"})
            $('#personal_phone').inputmask({"mask": "999-999-9999"})
            $('#office_phone').inputmask({"mask": "999-999-9999"})
        });
</script>
@endsection
