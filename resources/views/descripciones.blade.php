@extends('plantillas.menu')
@section('title','Descripciones')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Listado de descripciones de puestos')

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
                    <table id="tablaListado" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>CLAVE</th>
                          <th>DESCRIPCION</th>
                          <th>DIRECCIÓN</th>
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

            <!-- modales -->
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
@endsection

@section('script')
  <script type="text/javascript">
    var descripciones = <?php echo json_encode($descripciones) ?>;
    $(window).load(function (){
      //console.log(descripciones);
      llenaDescripciones();
    });

    function llenaDescripciones(){
      //alert("Llenado");
      //console.log(descripciones);
      for(var i=0;i<descripciones.length;i++){
        var id_des = descripciones[i]['ID_DESC'];
        $("#cuerpoTablaListado").append(
          "<tr>"+
            "<td>"+(parseInt(i)+1)+"</td>"+
            "<td id='clave_"+id_des+"'>"+descripciones[i]['CLAVE_DESC']+"</td>"+
            "<td id='nombre_"+id_des+"'>"+descripciones[i]['NOM_DESC']+"</td>"+
            "<td id='direccion_"+id_des+"'>"+"<a href='/descripciones/gestionar/"+descripciones[i]['ID_DEP']+"'>"+descripciones[i]['DIR_DESC']+"</a>"+"</td>"+
            "<td id='num_rev_"+id_des+"'>"+descripciones[i]['REVISION_DESC']+"</td>"+
            "<td id='estatus_"+id_des+"'>"+descripciones[i]['ESTATUS_DESC']+"</td>"+
            "<td id='acciones_"+id_des+"'>"+
              '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DETALLE" id="btnVer_'+id_des+'" onclick="modalDetalle('+id_des+')">'+
                '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>'+
              '</button>'+
              /*'<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="EDITAR" id="btnEditar_'+id_des+'" onclick="modalEditar('+id_des+')">'+
                '<span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>'+
              '</button>'+//*/
              '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="ABRIR DESCRIPCION" id="btnAbrir_'+id_des+'" onclick="verCompleto('+id_des+')">'+
                '<span class="glyphicon glyphicon-new-window" aria-hidden="true" ></span>'+
              '</button>'+
              '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER ARCHIVOS" id="btnAbrir_'+id_des+'" onclick="archivos('+id_des+')">'+
                '<span class="glyphicon glyphicon-upload" aria-hidden="true" ></span>'+
              '</button>'+
            "</td>"+
          "</tr>"
        );
        $("#btnVer_"+id_des).tooltip('fixTitle');
        $("#btnAbrir_"+id_des).tooltip('fixTitle');
        $("#btnEditar_"+id_des).tooltip('fixTitle');
        //PuestoConsecutivo++;
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

    function archivos(){
      $("#textoModalMensaje").text('Aqui se gestionan los archivos como oficios que cancelen la descripción de puestos');
      $("#modalMensaje").modal();
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
            //$("#detalle_area").html(json['descripcion']['DIRECCION_DESC']);
            $("#detalle_direccion").html(json['descripcion']['DIRECCION_DESC']);
            $("#detalle_dtp").html(json['descripcion']['DTP_DESC']);
            $("#detalle_clave").html(json['descripcion']['CLAVE_DESC']);
            $("#detalle_creacion").html(json['descripcion']['CREACION_DESC']);
            $("#detalle_f_revision").html(json['descripcion']['REVISION_DESC']);
            $("#detalle_n_revision").html(json['descripcion']['N_REVISION_DESC']);
            $("#detalle_p_directas").html(json['descripcion']['DIRECTOS_DESC']);
            $("#detalle_p_indirectas").html(json['descripcion']['INDIRECTOS_DESC']);
            $("#detalle_t_reportan").html(parseInt(json['descripcion']['DIRECTOS_DESC'])+parseInt(json['descripcion']['INDIRECTOS_DESC']));
            $("#detalleIdDP").val(id_descripcion);

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

    function verCompleto(id_descripcion){
      //alert("Redirigiendo...");//
      location.href = "/descripcion/"+id_descripcion;
    }

    function redirigirDP(){
      var id_dp = $("#detalleIdDP").val();
      //alert(id_dp);
      location.href = "/descripcion/"+id_dp;
    }
  </script>

@endsection