@extends('plantillas.menu')
@section('title','Crear Facilitador')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Crear un facilitador')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" placeholder="">Usuario <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Falicitador <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
              </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="button">Cancelar</button>
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
    $(window).load(function () {
      });

    
  </script>

@endsection