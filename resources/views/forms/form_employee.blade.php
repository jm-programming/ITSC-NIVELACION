<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">
        Nombres
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('names',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese sus Nombres"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">
        Apellidos
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('last_name',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese sus Apellidos"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
        Correo
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('email',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el correo"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job">
        Cargo
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('job',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el cargo"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="personal_phone">
        Telefono Particular
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('personal_phone',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el Telefono Particular"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="office_phone">
        Telefono Oficina
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('office_phone',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el Telefono de la oficina"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cellphone">
        Telefono Celular
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('cellphone',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el Telefono celular"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="identity_card">
        Identificación
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('identity_card',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese la identificación"]) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
        Dirección
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('address',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese la dirección"]) }}
    </div>
</div>
<div class="form-group">
    {!! Form::label('civil_status', 'Estado Civil',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-8 col-xs-12">
        {!! Form::select('civil_status',[

			                        	'Soltero/a' => 'Soltero',
			                        	'Casado/a' => 'Casado/a',
			                        	'Comprometido/a' => 'Comprometido/a',
			                        	'Divorciado/a' => 'Divorciado/a',


			                        ],null,['class' => 'form-control', 'placeholder'=>'-- seleccione una opción --'])!!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users_id">
        Codigo usuario
    </label>
    <div class="col-md-8 col-sm-6 col-xs-12">
        {{ Form::text('users_id',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el codigo de usuario"]) }}
    </div>
</div>
<div class="ln_solid">
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <div class="media-left">
            <button class="btn btn-round btn-primary" type="submit">
                Guardar
            </button>
        </div>
    </div>
</div>
