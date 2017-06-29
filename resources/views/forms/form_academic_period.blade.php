<fieldset class="col-sm-10 col-sm-offset-1">
    <!-- Form Name -->
    <!-- Prepended text-->
    {!!Form::token()!!}
    <h4>
        Información personal del periodo academico
    </h4>
    <div class="form-group col-sm-12">
        <label class="control-label" for="academic_period">
            Periodo Academico
        </label>
        {{ Form::text('academic_period',null,['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"Ingrese el periodo academico"]) }}
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="nombres">
            Fecha de Inicio
        </label>
        <input class="form-control col-md-7 col-xs-12" name="date_first" placeholder="Fecha Nacimiento" type="date">
        </input>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label" for="nombres">
            Fecha de Finalización
        </label>
        <input class="form-control col-md-7 col-xs-12" name="date_last" placeholder="Fecha Nacimiento" type="date">
        </input>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label">
            Status
        </label>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" type="radio" value="1">
                    Activo
                </input>
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" type="radio" value="0">
                    Inactivo
                </input>
            </label>
        </div>
    </div>
    <!-- Button -->
    {!! Form::submit('Crear Periodo Academico',['class' => 'btn btn-primary btn-block']) !!}
    <br>
    </br>
</fieldset>