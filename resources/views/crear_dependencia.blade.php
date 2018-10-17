@extends('plantillas.menu')
@section('title','Nueva Dependencia')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Registrar dependencia')

@section('content')

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seccion 1 de la página</h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Dependencia/Unidad Académica <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <!--
                          <input type="text" id="first-name" required="required" class="form-control col-md-12 col-xs-12" >
                          -->
                          <select id="selectDependencia" class="form-control" onchange="cambioDependencia()">
                            <option value="">--SELECCIONAR--</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" id="nomenclatura" required="required" class="form-control col-md-12 col-xs-12" placeholder="NOMENCLATURA">
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Titular <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="titular_dep" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">¿Tiene cabeza de sector?
                          
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="padding-top: 5px">
                          <p>
                            Si
                            <input type="radio" class="" name="CS" id="noEsCS" value="No" onchange="estatusCS(false)" checked="checked" /> &nbsp;&nbsp;&nbsp;
                            No
                            <input type="radio" class="" name="CS" id="siEsCS" value="Si" onchange="estatusCS(true)" />
                          </p>
                        </div>
                      </div> -->

                      <div class="form-group" style="display:block" id="div_CS">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Seleccionar cabeza de sector <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-9">
                          <select id="selectCabezaSector" class="form-control" required>
                            <option value="false">--SELECCIONAR--</option>
                          </select>
                        </div>

                        <!--
                          <div class="col-md-1 col-sm-1 col-xs-3">
                          <button type="button" data-toggle="modal" class="btn btn-round btn-primary" data-target="#modalNuevaCS">Nuevo</button>
                        </div>
                      -->

                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" id="btnCancelar" type="button" onclick="cancelarRegistro()" disabled="disabled">Cancelar</button>
                          <button type="button" id="btnRegistrar" class="btn btn-success" onclick="registrar()" disabled="disabled">Registrar</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalNuevaCS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" align="center">
                    <h3 class="modal-title" id="">Registrar cabeza de sector</h3>
                    <h5 class="modal-title" id="">Utilice esta función solo si no encuentra la cabeza de sector que necesita.</h5>
                    <br>

                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="Nombre_NCS" required="required" class="form-control col-md-12 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Titular <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="Titular_NCS" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="registrarCS()">Crear</button>
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('script')
  <script type="text/javascript">
    /*$( document ).ready(function() {
      traeDependencias();
      //console.log( "ready!" );
    });//*/

    $(window).load(function () {
            // run code
            traeDependencias();
        });
    function cambioDependencia(){
      //alert("Epale");
      var dependencia = $("#selectDependencia option:selected").text();
      if(dependencia!="RECTORIA"){
        $("#div_CS").css("display", "block");
        //alert("No es cabeza de sector");
      }else{
        $("#div_CS").css("display", "none");
        //alert("Es cabeza de sector");
      }
      //alert(dependencia);
    }


    function cancelarRegistro(){
      //window.history.back();
      window.location.href = "/dependencias";
    }

    function registrar(){
      var dependencia = $("#selectDependencia").val();
      var titular_dep = $("#titular_dep").val();

      /*var flCS = $("#siEsCS").is(':checked');
      var nombreCS = $("#selectCabezaSector").val();//*/
      var nomenclatura = $("#nomenclatura").val();
      var flCS = ((dependencia=="RECTORIA")?false:true);
      var nombreCS = $("#selectCabezaSector").val();

      var txtDependencia = $("#selectDependencia option:selected").text();
      /*console.log("Dependencia: "+dependencia);
      console.log("Titular: " + titular_dep);
      console.log("flCS: " + flCS);
      console.log("Cabeza de sector: " + nombreCS);//*/
      if(dependencia!="" && titular_dep!="" && nomenclatura!=""){
        var dataForm = new FormData();
        dataForm.append('dependencia',dependencia);
        dataForm.append('titular',titular_dep);
        dataForm.append('fl_cabeza_sector',flCS);
        dataForm.append('cabeza_sector',nombreCS);
        dataForm.append('nomenclatura',nomenclatura);
        if(txtDependencia == "RECTORIA"){
          dataForm.append('fl_cabeza_sector',false);
          ajaxRegistrar(dataForm,dependencia);
        }else if(txtDependencia != "RECTORIA" && nombreCS>0){
          dataForm.append('fl_cabeza_sector',true);
          ajaxRegistrar(dataForm,dependencia);
        }else{
          $("#textoModalMensaje").text('Seleccione una cabeza de sector');
          $("#modalMensaje").modal();
        }
      }else{
        $("#textoModalMensaje").text('Favor de llenar todos los campos');
        $("#modalMensaje").modal();
      }
    }

    function ajaxRegistrar(dataForm,dependencia){
      $.ajax({
          url :'/dependencias/registrar',
          data : dataForm,
          contentType:false,
          processData:false,
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          type: 'POST',
          dataType : 'json',
          beforeSend: function (){
            $("#modalCarga").modal();
          },
          success : function(json){
            console.log(json);
            if(!json['exito']){
              //$("#tituloModalMensaje").text('ATENCION');
              $("#textoModalMensaje").text('No se pudo registrar la dependencia.');
              $("#modalMensaje").modal();
            }else{
              location.href="/descripciones/gestionar/"+dependencia;
            }
          },
          error : function(xhr, status) {
            $("#textoModalMensaje").text('Existió un error al registrar la dependencia');
            $("#modalMensaje").modal();
          },
          complete : function(xhr, status){
            $("#modalCarga").modal('hide');
          }
        });//*/
    }

    function estatusCS(valor){
      if(!valor){
        $("#div_CS").css("display", "block");
        //alert("No es cabeza de sector");
      }else{
        $("#div_CS").css("display", "none");
        //alert("Es cabeza de sector");
      }
      //alert("EPALE");
    }

    function traeDependencias(){
    //alert("EPALE");
      var dataForm = new FormData();
        dataForm.append('usuario',"usuario");
        $.ajax({
          url :'/dependencias/trae',
          data : dataForm,
          contentType:false,
          processData:false,
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          type: 'POST',
          dataType : 'json',
          beforeSend: function (){
            $("#modalCarga").modal();
          },
          success : function(json){
            //console.log(json);
            for(var i = 0; i<json['total'];i++){
              if(!json['dependencias'][i]['ACTIVA']){
                $("#selectDependencia").append(
                    '<option value="'+json['dependencias'][i]['ID_DEP']+'">'+json['dependencias'][i]['NOM_DEP']+'</option>'
                  );
              }
              $("#selectCabezaSector").append(
                  '<option value="'+json['dependencias'][i]['ID_DEP']+'">'+json['dependencias'][i]['NOM_DEP']+'</option>'
                );
            }
            $('#btnCancelar').prop('disabled', false);
            $('#btnRegistrar').prop('disabled', false);
            
          },
          error : function(xhr, status) {
            $("#textoModalMensaje").text('Existió un problema al cargar el listado de dependencias');
            $("#modalMensaje").modal();
            $('#btnCancelar').prop('disabled', false);
          },
          complete : function(xhr, status){
             $("#modalCarga").modal('hide');
          }
        });//*/
    }


  </script>
@endsection