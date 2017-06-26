<div class="form-group col-sm-6">
    <label class="control-label" for="academic_period">
        Periodo Academico
    </label>

        {{ Form::text('academic_period',null,['class'=>'form-control','placeholder'=>"Ingrese el periodo academico"]) }}
</div>

                            <div class="form-group col-sm-3">
                                    <label class="control-label" for="nombres">Fecha de Inicio</label>
                                    <input type="date" class="form-control" name="date_first" placeholder="Fecha Nacimiento" >
                             </div>
                                <div class="form-group col-sm-3">
                                    <label class="control-label" for="nombres">Fecha de Finalización</label>
                                    <input type="date" class="form-control" name="date_last" placeholder="Fecha Nacimiento" >
                                </div>


                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="status" value="1"> &nbsp; Activo &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="status" value="0"> Inactivo
                                </label>
                              </div>
                            </div>
                          </div>


        <div class="media-left">
            <button class="btn btn-round btn-primary" type="submit">
                Guardar
            </button>
        </div>
