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
        <label class="control-label" for="job">
            Cargo
        </label>
        {{ Form::text('job',null,['class'=>'form-control','placeholder'=>"Ingrese el cargo"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="personal_phone">
            Telefono Particular
        </label>
        {{ Form::text('personal_phone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono Particular"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="office_phone">
            Telefono Oficina
        </label>
        {{ Form::text('office_phone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono de la oficina"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="cellphone">
            Telefono Celular
        </label>
        {{ Form::text('cellphone',null,['class'=>'form-control','placeholder'=>"Ingrese el Telefono celular"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="identity_card">
            Identificación
        </label>
        {{ Form::text('identity_card',null,['class'=>'form-control','placeholder'=>"Ingrese la identificación"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="address">
            Dirección
        </label>
        {{ Form::text('address',null,['class'=>'form-control','placeholder'=>"Ingrese la dirección"]) }}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('civil_status', 'Estado Civil',['class'=>'control-label']) !!}

{!! Form::select('civil_status',[

'Soltero/a' => 'Soltero',
'Casado/a' => 'Casado/a',
'Comprometido/a' => 'Comprometido/a',
'Divorciado/a' => 'Divorciado/a',


],null,['class' => 'form-control', 'placeholder'=>'-- seleccione una opción --'])!!}
    </div>
    <div class="form-group col-sm-12">
        {!!Form::label('users_id', 'Codigo de Usuario',['class'=>'control-label']) !!}

{!!Form::select('users_id',[
'100'=>'100',
],null,['class' => 'form-control', 'placeholder'=>'-- seleccione una opción --'])!!}
    </div>
    <!-- Button -->
    {!! Form::submit('Crear Empleado',['class' => 'btn btn-primary btn-block']) !!}
    <br>
    </br>
</fieldset>