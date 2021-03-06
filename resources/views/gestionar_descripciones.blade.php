@extends('plantillas.menu')
@section('title','Gestionar Descripciones')
@section('tittle_page','Gestion de descripciones de puestos')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2 id="nombre_dependencia"></h2>
          <button type="button" class="btn btn-primary pull-right" onclick="nuevaDescripcion()">REGISTRAR DESCRIPCION</button>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="tablaListado" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>CLAVE</th>
                <th>DESCRIPCION</th>
                <th>NUMERO DE REVISION</th>
                <th>ESTATUS</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaListado">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
            
  <!-- Modal de registro de descripcion de puesto-->
  <div class="modal fade" id="modalNuevaDP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" id="tituloModalDP"></h3>
        </div>
        <div class="modal-body" align="center">
          <h3 class="modal-title" id=""></h3>
          <br>

          <form class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Puesto <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Nuevo_Nombre_Puesto" required="required" class="form-control col-md-12 col-xs-12 text-uppercase" onchange="armarClave()">
              </div>
            </div>
            <!--<div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Titular <span class="required">*</span>
              </label>
              <div class="col-md-1 col-sm-1 col-xs-12">
                <input type="checkbox" value="" onclick="puestoTitular()">
              </div>
            </div>-->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Reporta a: <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Nuevo_Reporta_a" name="last-name" required="required" class="form-control col-md-7 col-xs-12 text-uppercase">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Área: <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Nuevo_Area" name="last-name" required="required" class="form-control col-md-7 col-xs-12 text-uppercase">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección: <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Nuevo_Direccion" name="last-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
              </div>
            </div>

            <div class="form-group">

              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select id="selectDescripcion" class="form-control" onchange="armarClave()">
                  <option value="ninguno">----</option>
                  <option value="DP">PUESTO</option>
                  <option value="DT">TIPO</option>
                </select>
              </div>
              
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Clave: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <!--<input type="text" id="clave_puesto" name="last-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="XX/XX/XX-XX">-->
                <label id="clave_puesto" style="margin-top:10px">XX/XX/XX-XX</label>
              </div>

            </div>

            <div class="form-group">

              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nivel: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select id="selectNivel" class="form-control" onchange="armarClave()">
                  <option value="false">------</option>
                  <option value="TITULAR">TITULAR</option>
                  <option value="SUBDIRECTOR">SUBDIRECTOR/A</option>
                  <option value="JEFE_DEPARTAMENTO">JEFE/A DE DEPARTAMENTO</option>
                  <option value="SUBJEFE_DEPARTAMENTO">SUBJEFE/A DE DEPARTAMENTO</option>
                  <option value="COORDINADOR">COORDINADOR/A</option>
                  <option value="GESTOR">GESTOR/A</option>
                  <option value="PROFESIONAL">PROFESIONAL</option>
                  <option value="ESPECIALISTA">ESPECIALISTA</option>
                  <option value="TECNICO">TÉCNICO</option>
                  <option value="AUXILIAR">AUXILIAR</option>
                </select>
              </div>

              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Código: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" id="Nuevo_Codigo" required="required" class="form-control col-md-7 col-xs-12">
              </div>

            </div>

            <div class="form-group">

              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Categoría: <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Nuevo_Categoria" required="required" class="form-control col-md-7 col-xs-12">
              </div>

            </div>

            <h4 class="modal-title" id="exampleModalLongTitle" align="center">Personas que le reportan</h4><br>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Directos: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="number" id="rep_directos" name="last-name" required="required" class="form-control col-md-7 col-xs-12" min="0" value="0">
              </div>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Indirectos: <span class="required">*</span>
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="number" id="rep_indirectos" name="last-name" required="required" class="form-control col-md-7 col-xs-12" min="0" value="0">
              </div>
            </div>

            <!-- <hr> -->

          </form>

        </div>
        <div class="modal-footer">
          <button id="MarcarRevision" type="button" class="btn btn-warning btn-md pull-left" data-toggle="tooltip" data-placement="right" title="DESMARCAR FUTURA REVISIÓN" onclick="futuraRevision(0)">
            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
          </button>

          <button id="DesmarcarRevision" type="button" class="btn btn-warning btn-md pull-left" data-toggle="tooltip" data-placement="right" title="MARCAR FUTURA REVISIÓN" onclick="futuraRevision(1)">
            <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
          </button>

          <input type="number" id="edicionIdDP" value="" hidden="hidden">

          <button type="button" class="btn btn-primary" onclick="editarDP()"  id="editarDP">Guardar</button>

          <button type="button" class="btn btn-primary" onclick="registrarDP()" id="registrarDP">Crear</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDetalleDP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center">Descripción de puesto</h3>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">CAMPO</th>
                <th scope="col">DETALLE</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-active">
                <th scope="row">NOMBRE DEL PUESTO</th>
                <td id="detalle_nombre"></td>
              </tr>
              <tr>
                <th scope="row">REPORTA A</th>
                <td id="detalle_reporta_a"></td>
              </tr>
              <tr>
                <th scope="row">AREA</th>
                <td id="detalle_area"></td>
              </tr>
              <tr>
                <th scope="row">DIRECCIÓN</th>
                <td id="detalle_direccion"></td>
              </tr>
              <tr>
                <th scope="row">TIPO/PUESTO</th>
                <td id="detalle_dtp"></td>
              </tr>
              <tr>
                <th scope="row">CLAVE</th>
                <td id="detalle_clave"></td>
              </tr>
              <tr>
                <th scope="row">FECHA DE CREACIÓN</th>
                <td id="detalle_creacion"></td>
              </tr>
              <tr>
                <th scope="row">ÚLTIMA REVISIÓN</th>
                <td id="detalle_f_revision"></td>
              </tr>
              <tr>
                <th scope="row">NÚMERO DE REVISIÓN</th>
                <td id="detalle_n_revision"></td>
              </tr>
              <tr>
                <th scope="row">PERSONAS DIRECTAS QUE LE REPORTAN</th>
                <td id="detalle_p_directas"></td>
              </tr>
              <tr>
                <th scope="row">PERSONAS INDIRECTAS QUE LE REPORTAN</th>
                <td id="detalle_p_indirectas"></td>
              </tr>
              <tr>
                <th scope="row">TOTAL DE PERSONAS QUE LE REPORTAN</th>
                <td id="detalle_t_reportan"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <input type="number" id="detalleIdDP" value="" hidden="hidden">
          <button type="button" class="btn btn-success" onclick="redirigirDP()">Ver Completa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center">Dejar un mensaje</h3>
        </div>
        <div class="modal-body">

          
           <form class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Mensaje <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" id="TextMensajes" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" > <span class="required"></span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <button type="button" class="btn btn-primary pull-right " onclick="GuardarComentario()">Guardar comentario</button>
              </div>
            </div>
            <!-- ---------------------------------- -->
            <hr>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comentario</th>
                    <!-- <th scope="col" style="width: 20%">Acciones</th> -->
                  </tr>
                </thead>
                <tbody id="CuerpoTablaComentarios">
                  
                </tbody>
              </table>

          </form>


        </div>
        <br>
        <div class="modal-footer">
          <input type="number" id="detalleIdDP" value="" hidden="hidden">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Riesgos-->
  <div class="modal fade" id="modalRiesgos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center">Riesgos</h3>
        </div>
        <div class="modal-body">
           <form class="form-horizontal form-label-left">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comentario</th>
                  </tr>
                </thead>
                <tbody id="CuerpoTablaComentarios">
                  <tr>
                    <td>Condiciones en el ambiente de trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_1">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Carga de trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_2">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Falta de control sobre el trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_3">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Jornada de trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_4">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Interferencia en la relación trabajo-familia</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_5">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Liderazgo negativo en el trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_6">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Relaciones negativas en el trabajo</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_7">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Violencia</td>
                    <td>
                      <select class="form-control" id="SelectRiesgo_8">
                        <option>Muy alto</option>
                        <option>Alto</option>
                        <option>Medio</option>
                        <option>Bajo</option>
                        <option>Nulo</option>
                      </select>
                    </td>
                  </tr>
                </tbody>
              </table>

          </form>


        </div>
        <br>
        <div class="modal-footer">
          <input type="number" id="detalleIdDP" value="" hidden="hidden">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="GuardarRiesgos()">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Configuraciones-->
  <div class="modal fade" id="ModalConfiguraciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center">Control de cambio de estatus</h3>
        </div>
        <div class="modal-body">
           <form class="form-horizontal form-label-left">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comentario</th>
                  </tr>
                </thead>
                <tbody id="CuerpoTablaComentarios">
                  <tr>
                    <td>Condiciones en el ambiente de trabajo</td>
                    <td>
                      <select class="form-control" id="SelectEstatus">
                        <option value="NADA">SELECCIONAR</option>
                        <option value="LLENANDO">LLENANDO</option>
                        <option value="REVISIÓN">REVISIÓN</option>
                        <option value="REVISADO">REVISADO</option>
                        <option value="AUTORIZANDO">AUTORIZANDO</option>
                        <option value="AUTORIZADO">AUTORIZADO</option>
                        <option value="SOLICITUD DE MODIFICACIÓN">SOLICITUD DE MODIFICACIÓN</option>
                        <option value="SOLICITUD DE BAJA">SOLICITUD DE BAJA</option>
                        <option value="BAJA">BAJA</option>
                      </select>
                      <br>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="GuardarEstatus()">Guardar</button>
                    </td>
                  </tr>
                </tbody>
              </table>

          </form>


        </div>
        <br>
        <div class="modal-footer">
          <input type="number" id="ConfigIdDP" value="" hidden="hidden">
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="GuardarRiesgos()">Guardar</button> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
  <script type="text/javascript">
    var descripciones = <?php echo json_encode($descripciones) ?>;
    var dependencia = <?php echo json_encode($dependencia) ?>;
    var nomenclatura = <?php echo json_encode($nomenclatura) ?>;
    var id_dependencia = <?php echo json_encode($id_dependencia) ?>;
    console.log(descripciones);
    var PuestoConsecutivo = 1;
    var estatusEdicion = false;
    var GL_descripcion = 0;
    // $("#modalRiesgos").modal();
    $(window).load(function () {
        $("#nombre_dependencia").text(dependencia);
        llenaDescripciones();
        autollenado();
    });

    function GuardarRiesgos(){
      console.log(GL_descripcion);
      swal("", "Información almacenada satisfactoriamente", "success");
    }

    function ModalRiesgos(id_descripcion){
      GL_descripcion = id_descripcion;
      console.log(id_descripcion);
      /*var success;
      var url = "/riesgos/obtener";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        
        
        $("#modalComentarios").modal();
      });//*/
      $("#modalRiesgos").modal();
    }

    function GuardarComentario(){
      var comentario = $("#TextMensajes").val();
      console.log(GL_descripcion);
      console.log(comentario);
      var success;
      var url = "/observaciones/insertar";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',GL_descripcion);
      dataForm.append('comentario',comentario);

      // $("#CuerpoTablaComentarios").append(
      //       '<tr>'+
      //         '<td>'+ '------' +'</td>'+
      //         '<td>'+ comentario +'</td>'+
      //       '</tr>'
      //       );
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
          // modalMensaje('¡Éxito!','Se ha almacenado el mensaje satisfactoriamente');
          $("#CuerpoTablaComentarios").append(
            '<tr>'+
              '<td>'+ '------' +'</td>'+
              '<td>'+ comentario +'</td>'+
            '</tr>'
            );

          $("#textoModalMensaje").text('Se ha almacenado el mensaje satisfactoriamente');
          $("#modalMensaje").modal();
        
      });//*/
    }

    function modalMostrarMensajes(id_descripcion){
      GL_descripcion = id_descripcion;
      console.log(id_descripcion);
      var success;
      var url = "/observaciones/obtener";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        
        $("#CuerpoTablaComentarios").html("");
        for(var i=0; i < success['comentarios'].length ; i++){
          $("#CuerpoTablaComentarios").append(
            '<tr>'+
              '<td>'+ success['comentarios'][i]['created_at'] +'</td>'+
              '<td>'+ success['comentarios'][i]['COMENTARIOS_COMENTARIO'] +'</td>'+
            '</tr>'
            );
        }
        $("#modalComentarios").modal();
      });
    }

    function futuraRevision(fl_revision){
      //console.log(fl_revision);
      var id_descripcion = $("#edicionIdDP").val();
      console.log(id_descripcion);
      var dataForm = new FormData();
      dataForm.append('estatus_revision',fl_revision);
      dataForm.append('id_descripcion',id_descripcion);
      $.ajax({
        url :'/descripciones/marcarRevisionFutura',
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
          if(json['exito']==1){
            if(fl_revision==0){
              $("#MarcarRevision").hide();//revision a futuro
              $("#DesmarcarRevision").show();//revision a futuro
            }else{
              $("#MarcarRevision").show();//revision a futuro
              $("#DesmarcarRevision").hide();//revision a futuro
            }
          }
          
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al traer la información');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/

    }
    //inicializando tooltips
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    function archivos(){
      $("#textoModalMensaje").text('Aqui se gestionan los archivos, organigramas u oficios que hayan llegado de la dependencia');
      $("#modalMensaje").modal();
    }

    function verCompleto(id_descripcion){
      //alert("Redirigiendo...");
      location.href = "/descripcion/"+id_descripcion;
    }

    function redirigirDP(){
      var id_dp = $("#detalleIdDP").val();
      //alert(id_dp);
      location.href = "/descripcion/"+id_dp;
    }

    function editarDP(){
      var id_dp = $("#edicionIdDP").val();
      //alert("Editando: "+id_dp);
      var puesto = $("#Nuevo_Nombre_Puesto").val();
      var reporta_a = $("#Nuevo_Reporta_a").val();
      var area = $("#Nuevo_Area").val();
      var direccion = dependencia;
      var dtp = $("#selectDescripcion").val();
      var clave = $("#clave_puesto").text();
      var rep_directos = $("#rep_directos").val();
      var rep_indirectos = $("#rep_indirectos").val();
      var nivel = $("#selectNivel").val();

      //alert("Actualizando");

      //if(puesto!="" && reporta_a != "" && area != "" && dtp != "ninguno" && )
      if(puesto==""){
        $("#textoModalMensaje").text('Debe registrar el puesto');
        $("#modalMensaje").modal();
      }else if(reporta_a == ""){
        $("#textoModalMensaje").text('Debe registrar la persona a la que reporta');
        $("#modalMensaje").modal();
      }else if(area == ""){
        $("#textoModalMensaje").text('Debe registrar el área');
        $("#modalMensaje").modal();
      }else if(dtp == "ninguno"){
        $("#textoModalMensaje").text('Debe indicar si es "Descripción Puesto" o "Descripción Tipo"');
        $("#modalMensaje").modal();
      }else if(rep_directos == ""){
        $("#textoModalMensaje").text('Debe registrar el número de personas directas que le reportan, en caso contrario ingresar 0');
        $("#modalMensaje").modal();
      }else if(rep_indirectos == ""){
        $("#textoModalMensaje").text('Debe registrar el número de personas indirectas que le reportan, en caso contrario ingresar 0');
        $("#modalMensaje").modal();
      }else{
        var dataForm = new FormData();
        dataForm.append('id_descripcion',id_dp);
        dataForm.append('puesto',puesto);
        dataForm.append('reporta_a',reporta_a);
        dataForm.append('area',area);
        dataForm.append('direccion',dependencia);
        dataForm.append('id_dependencia',id_dependencia);
        dataForm.append('dtp',dtp);
        dataForm.append('clave',clave);
        dataForm.append('rep_directos',rep_directos);
        dataForm.append('rep_indirectos',rep_indirectos);
        dataForm.append('nivel',nivel);
        ajaxGuardarEdicion(dataForm,id_dp,puesto,clave);
      }
    }

    function ajaxGuardarEdicion(dataForm,descripcion,puesto,clave){
      $.ajax({
        url :'/descripciones/actualizar',
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
          if(json['exito']){
            $("#nombre_"+descripcion).html(puesto);
            $("#clave_"+descripcion).html(clave);
            $("#textoModalMensaje").text('Guardado correctamente.');
            $("#modalMensaje").modal();
          }
          
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al guardar la descripción.');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }

    function modalEditar(id_descripcion){
      //alert(id_descripcion);
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      $.ajax({
        url :'/descripciones/trae_descripcion',
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
          if(parseInt(json['total'])>0){
            estatusEdicion = true;
            $("#Nuevo_Nombre_Puesto").val(json['descripcion']['NOM_DESC']);
            $("#Nuevo_Reporta_a").val(json['descripcion']['REPORTA_A_DESC']);
            $("#Nuevo_Area").val(json['descripcion']['AREA_DESC']);
            $("#selectDescripcion").val(((json['descripcion']['DTP_DESC'] == "PUESTO")?"DP":"DT"));
            $("#selectNivel").val(json['descripcion']['NIVEL_DESC']);
            $("#rep_directos").val(json['descripcion']['DIRECTOS_DESC']);
            $("#rep_indirectos").val(json['descripcion']['INDIRECTOS_DESC']);
            $("#Nuevo_Direccion").val(dependencia);
            $("#clave_puesto").text(json['descripcion']['CLAVE_DESC']);
            $("#edicionIdDP").val(id_descripcion);
            //armarClave();
            //---------------------------------------------------
            $("#registrarDP").hide();
            $("#editarDP").show();
            if(json['descripcion']['REV_FUTURA_DESC']=='1'){
              $("#MarcarRevision").show();//revision a futuro
              $("#DesmarcarRevision").hide();//revision a futuro
            }else{
              $("#MarcarRevision").hide();//revision a futuro
              $("#DesmarcarRevision").show();//revision a futuro

            }
            $("#tituloModalDP").text("Editar descripción de puesto");
            $("#modalNuevaDP").modal();
          }
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al traer la información');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/

    }

    function llenaDescripciones(){
      //alert("Llenado");
      //console.log(descripciones);
      for(var i=0;i<descripciones.length;i++){
        //console.log(PuestoConsecutivo);
        var id_des = descripciones[i]['ID_DESC'];
        $("#cuerpoTablaListado").append(
            "<tr class='primary'>"+
              "<td>"+(parseInt(i)+1)+"</td>"+
              "<td id='clave_"+id_des+"'>"+descripciones[i]['CLAVE_DESC']+"</td>"+
              "<td id='nombre_"+id_des+"'>"+descripciones[i]['NOM_DESC']+"</td>"+
              "<td id='num_rev_"+id_des+"'>"+descripciones[i]['REVISION_DESC']+"</td>"+
              "<td id='estatus_"+id_des+"'>"+descripciones[i]['ESTATUS_DESC']+"</td>"+
              "<td id='acciones_"+id_des+"'>"+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DETALLE" id="btnVer_'+id_des+'" onclick="modalDetalle('+id_des+')">'+
                  '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>'+
                '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="EDITAR" id="btnEditar_'+id_des+'" onclick="modalEditar('+id_des+')">'+
                  '<span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>'+
                '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="ABRIR DESCRIPCION" id="btnAbrir_'+id_des+'" onclick="verCompleto('+id_des+')">'+
                  '<span class="glyphicon glyphicon-new-window" aria-hidden="true" ></span>'+
                '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER ARCHIVOS" id="btnArchivos_'+id_des+'" onclick="archivos('+id_des+')">'+
                  '<span class="glyphicon glyphicon-file" aria-hidden="true" ></span>'+
                '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DEJAR UN COMENTARIO" onclick="modalMostrarMensajes('+id_des+')">'+
                      '<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>'+
                    '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="REGISTRAR RIESGOS" onclick="ModalRiesgos('+id_des+')">'+
                      '<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>'+
                    '</button>'+
                '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="" onclick="ModalConfiguraciones('+id_des+')">'+
                      '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>'+
                    '</button>'+
              "</td>"+
            "</tr>"
          );
        $("#btnVer_"+id_des).tooltip('fixTitle');
        $("#btnAbrir_"+id_des).tooltip('fixTitle');
        $("#btnEditar_"+id_des).tooltip('fixTitle');//*/
        $("#btnArchivos_"+id_des).tooltip('fixTitle');//*/
        PuestoConsecutivo++;
      }
        $('#tablaListado').DataTable({
          //responsive: true,
          language: {
            emptyTable: "No hay datos para mostrar en la tabla",
            zeroRecords: "No hay datos para mostrar en la tabla",
              "search": "Buscar:",
              "info":"Se muestra los registros _START_ a _END_ de _TOTAL_ totales.",
              "infoEmpty":"No se ha encontrado registros.",
              "lengthMenu":"Mostrando _MENU_ registros",
              "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
              "search": "Buscar: ",
             paginate: {
               "first":      "Primero",
               "last":       "Ultimo",
               "next":       "Siguiente",
               "previous":   "Anterior"
              }
            }
          });//*/
    }

    function ModalConfiguraciones(id_descripcion){
      $("#ConfigIdDP").val(id_descripcion);
      var success;
      var url = "/descripciones/trae_descripcion";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        // console.log(success);
        $("#SelectEstatus").val(success['descripcion']['ESTATUS']);
        $("#ModalConfiguraciones").modal();

      });

    }

    function GuardarEstatus(){
      id_descripcion = $("#ConfigIdDP").val();
      estatus = $("#SelectEstatus").val();
      var success;
      var url = "/descripciones/cambiar_estatus";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      dataForm.append('estatus',estatus);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        // console.log(success);
        // $("#SelectEstatus").val("LLENANDO");
        // $("#ModalConfiguraciones").modal();
        MostrarMensaje('¡Éxito!','Se ha cambiado el estatus satisfactoriamente!');
      });
    }



    $('#modalDetalleDP').on('hidden.bs.modal', function () {
      limpiarModalDetalle();
    });

    function limpiarModalDetalle(){
      $("#detalle_nombre").html("");
      $("#detalle_reporta_a").html("");
      $("#detalle_area").html("");
      $("#detalle_direccion").html("");
      $("#detalle_dtp").html("");
      $("#detalle_clave").html("");
      $("#detalle_creacion").html("");
      $("#detalle_f_revision").html("");
      $("#detalle_n_revision").html("");
      $("#detalle_p_directas").html("");
      $("#detalle_p_indirectas").html("");
      $("#detalle_t_reportan").html("");
    }

    function modalDetalle(id_descripcion){
      //id_descripcion = 10;
      //alert(id_descripcion);
      $("#modalDetalleDP").modal();
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_descripcion);
      $.ajax({
        url :'/descripciones/trae_descripcion',
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
          //console.log(typeof json['total']);
          if(parseInt(json['total'])>0){
            $("#detalle_nombre").html(json['descripcion']['NOM_DESC']);
            $("#detalle_reporta_a").html(json['descripcion']['REPORTA_A_DESC']);
            $("#detalle_area").html(json['descripcion']['AREA_DESC']);
            $("#detalle_direccion").html(dependencia);
            $("#detalle_dtp").html(json['descripcion']['DTP_DESC']);
            $("#detalle_clave").html(json['descripcion']['CLAVE_DESC']);
            $("#detalle_creacion").html(json['descripcion']['CREACION_DESC']);
            $("#detalle_f_revision").html(json['descripcion']['REVISION_DESC']);
            $("#detalle_n_revision").html(json['descripcion']['N_REVISION_DESC']);
            $("#detalle_p_directas").html(json['descripcion']['DIRECTOS_DESC']);
            $("#detalle_p_indirectas").html(json['descripcion']['INDIRECTOS_DESC']);
            $("#detalle_t_reportan").html(parseInt(json['descripcion']['DIRECTOS_DESC'])+parseInt(json['descripcion']['INDIRECTOS_DESC']));
            $("#detalleIdDP").val(id_descripcion);
            //document.getElementById("detalleIdDP").value = id_descripcion;

            $("#modalDetalleDP").modal();
          }
            //alert("nada");
          
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al cargar el detalle');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }

    function autollenado(){
      $("#Nuevo_Nombre_Puesto").val("Chalan");
      $("#Nuevo_Reporta_a").val("Jefe");
      $("#Nuevo_Area").val("Toda la dependencia");
      $("#selectDescripcion").val("DP");
      $("#rep_directos").val("5");
      $("#rep_indirectos").val("8");
    }
    function limpiarModalRegistro(){
      $("#Nuevo_Nombre_Puesto").val("");
      $("#Nuevo_Reporta_a").val("");
      $("#Nuevo_Area").val("");
      $("#selectDescripcion").val("");
      $("#rep_directos").val("");
      $("#rep_indirectos").val("");
    }

    function obtenerIniciales(cadena){
      var omitir = ['DE','Y','LA','E'];
      var palabras = cadena.split(" ");
      var siglas = "";
      if(palabras.length > 1){
        for(var i=0;i< palabras.length;i++){
          if(omitir.indexOf(palabras[i]))
            siglas = siglas+palabras[i].substring(0,1);
        }
      }else{
        siglas = palabras[0].substring(0,3)
      }
      //alert(siglas);
      return siglas;
    }

    function armarClave(){
      //tipDescripcion =  $("#selectDescripcion option:selected").text();
      if(!estatusEdicion){
        var tipDescripcion = (($("#selectDescripcion").val()!="ninguno")? $("#selectDescripcion").val() : "XX");
        var siglasPuesto = obtenerIniciales(($("#Nuevo_Nombre_Puesto").val()).toUpperCase());
        var consecutivo = ((PuestoConsecutivo<10)?"0":"") + PuestoConsecutivo;
        clave = nomenclatura + "/" + tipDescripcion + "/" + ((siglasPuesto=="")?"XX":siglasPuesto) + "-" + consecutivo;
      }else{
        var claveVieja = $("#clave_puesto").text().split("-");
        //alert(claveVieja[1]);
        var tipDescripcion = (($("#selectDescripcion").val()!="ninguno")? $("#selectDescripcion").val() : "XX");
        var siglasPuesto = obtenerIniciales(($("#Nuevo_Nombre_Puesto").val()).toUpperCase());
        var consecutivo = ((PuestoConsecutivo<10)?"0":"") + PuestoConsecutivo;
        clave = nomenclatura + "/" + tipDescripcion + "/" + ((siglasPuesto=="")?"XX":siglasPuesto) + "-" + claveVieja[1];
      }
      //$("#clave_puesto").val(clave);
      $("#clave_puesto").text(clave);
    }

    function nuevaDescripcion(){
      //alert("Epale");
      estatusEdicion = false;
      limpiarModalRegistro();
      $("#registrarDP").show();
      $("#editarDP").hide();
      $("#tituloModalDP").text("Registrar descripción de puesto");
      armarClave();
      $("#MarcarRevision").hide();//revision a futuro
      $("#DesmarcarRevision").hide();//revision a futuro
      $("#Nuevo_Direccion").val(dependencia);
      $("#Nuevo_Codigo").val('');
      $("#Nuevo_Categoria").val('');
      $("#modalNuevaDP").modal();
    }

    function registrarDP(){
      var objDescripcion = new Object();
      objDescripcion.puesto = ($("#Nuevo_Nombre_Puesto").val()).toUpperCase();
      objDescripcion.reporta_a = ($("#Nuevo_Reporta_a").val()).toUpperCase();
      objDescripcion.area = ($("#Nuevo_Area").val()).toUpperCase();
      objDescripcion.direccion = dependencia;
      objDescripcion.dtp = $("#selectDescripcion").val();
      objDescripcion.clave = $("#clave_puesto").text();
      objDescripcion.rep_directos = $("#rep_directos").val();
      objDescripcion.rep_indirectos = $("#rep_indirectos").val();
      objDescripcion.nivel = $("#selectNivel").val();
      objDescripcion.codigo = $("#Nuevo_Codigo").val();
      objDescripcion.categoria = $("#Nuevo_Categoria").val();
      /*console.log(objDescripcion.puesto);
      console.log(objDescripcion.reporta_a);
      console.log(objDescripcion.area);//*/
      console.log(objDescripcion);
      //if(puesto!="" && reporta_a != "" && area != "" && dtp != "ninguno" && )
      if(objDescripcion.puesto==""){
        $("#textoModalMensaje").text('Debe registrar el puesto');
        $("#modalMensaje").modal();
      }else if(objDescripcion.reporta_a == ""){
        $("#textoModalMensaje").text('Debe registrar la persona a la que reporta');
        $("#modalMensaje").modal();
      }else if(objDescripcion.area == ""){
        $("#textoModalMensaje").text('Debe registrar el área');
        $("#modalMensaje").modal();
      }else if(objDescripcion.dtp == "ninguno"){
        $("#textoModalMensaje").text('Debe indicar si es "Descripción Puesto" o "Descripción Tipo"');
        $("#modalMensaje").modal();
      }else if(objDescripcion.nivel == "false"){
        $("#textoModalMensaje").text('Debe indicar el nivel');
        $("#modalMensaje").modal();
      }else if(objDescripcion.rep_directos == ""){
        $("#textoModalMensaje").text('Debe registrar el número de personas directas que le reportan, en caso contrario ingresar 0');
        $("#modalMensaje").modal();
      }else if(objDescripcion.rep_indirectos == ""){
        $("#textoModalMensaje").text('Debe registrar el número de personas indirectas que le reportan, en caso contrario ingresar 0');
        $("#modalMensaje").modal();
      }else{
        var dataForm = new FormData();
        dataForm.append('puesto',objDescripcion.puesto);
        dataForm.append('reporta_a',objDescripcion.reporta_a);
        dataForm.append('area',objDescripcion.area);
        dataForm.append('direccion',dependencia);
        dataForm.append('id_dependencia',id_dependencia);
        dataForm.append('dtp',objDescripcion.dtp);
        dataForm.append('clave',objDescripcion.clave);
        dataForm.append('nivel',objDescripcion.nivel);
        dataForm.append('rep_directos',objDescripcion.rep_directos);
        dataForm.append('rep_indirectos',objDescripcion.rep_indirectos);
        dataForm.append('codigo',objDescripcion.codigo);
        dataForm.append('categoria',objDescripcion.categoria);
        ajaxRegistrarDP(dataForm, objDescripcion);
      }
    }

    function ajaxRegistrarDP(dataForm,objDescripcion){
      $.ajax({
        url :'/descripciones/registrar',
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
          if(json['exito']){
            var id_des = json['id_descripcion'];
            PuestoConsecutivo++;
            console.log(PuestoConsecutivo);
            var des = {
              "CLAVE_DESC":objDescripcion.clave,
              "ESTATUS_DESC":"ELABORACIÓN",
              "ID_DESC":json['id_descripcion'],
              "NOM_DESC":objDescripcion.puesto,
              "REVISION_DESC":1
            };
            descripciones.push(des);

            recargarListado();
            $("#modalNuevaDP").modal('hide');
          }
          
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

    
    function recargarListado(){
      $("#tablaListado").DataTable().destroy();
      $("#cuerpoTablaListado").empty();
      PuestoConsecutivo = 1;
      llenaDescripciones();
    }
  </script>
@endsection