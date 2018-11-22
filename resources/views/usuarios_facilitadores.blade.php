@extends('plantillas.menu')
@section('title','Crear Facilitador')
@section('tittle_page','Crear facilitador')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario" placeholder="">Usuario <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="usuario" required="required" class="form-control col-md-7 col-xs-12" placeholder="USUARIO DEL FACILITADOR">
              </div>
            </div>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Falicitador <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nombre_usuario" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="NOMBRE COMPLETO DEL FACILITADOR">
              </div>
            </div>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de usuario <span class="required">*</span></label>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="selectTipoUsuario" class="form-control" onchange="armarClave()">
                  <option value="false">------</option>
                  <option value="FACILITADOR">FACILITADOR</option>
                  <option value="CGA">COORDINACION GENERAL ADMINISTRATIVA</option>
                  <option value="DIRECTOR_DRH">DIRECTOR DE RECURSOS HUMANOS</option>
                </select>
              </div>

            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="button" onclick="btnCancelar()">Cancelar</button>
                <button type="" class="btn btn-success" onclick="registraUsuario()">Registrar</button>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
    $(window).load(function () {
      });

    function registraUsuario(){
      var usuario = $("#usuario").val();
      var nombre_usuario = $("#nombre_usuario").val();
      var tipo_usuario = $("#selectTipoUsuario").val();
      var success;
      var url = "/usuarios/crear/facilitador";
      var dataForm = new FormData();
      dataForm.append('usuario',usuario);
      dataForm.append('nombre',nombre_usuario);
      dataForm.append('tipo_usuario',tipo_usuario);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        if(success['error']){
          $("#textoModalMensaje").text(success['error']);
          $("#modalMensaje").modal();
        }else{
          $("#textoModalMensaje").text("Usuario registrado corrrectamente, favor de anotar la contraseña: "+success['contrasena']);
          $("#modalMensaje").modal();
        }
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
      });//*/
    }

    function btnCancelar(){
      location.href='/dependencias';
    }
  </script>

@endsection