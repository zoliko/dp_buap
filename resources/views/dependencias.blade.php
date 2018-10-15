@extends('plantillas.menu')
@section('title','Dependencias')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Listado de dependencias')

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

          <table id="tablaDatos" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>NOMBRE</th>
                <th>TITULAR</th>
                <th>CABEZA DE SECTOR</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Listado DP -->
  <div class="modal fade" id="modalListado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloModalListado">DEPENDENCIA</h3>
        </div>
        <div class="modal-body">
          <table id="tablaListado" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaListado">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success">Gestionar Descripciones</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">

    $( document ).ready(function() {
      traeDependencias();
      //$("#modalListado").modal();
      //console.log( "ready!" );
    });

    function traeDependencias(){
      //alert("EPALE");
      var dataForm = new FormData();
      dataForm.append('usuario',"usuario");
      $.ajax({
        url :'/dependencias/trae_activas',
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
            $("#cuerpoTabla").append(

                "<tr>"+
                  "<td id='nombre_"+json['dependencias'][i]['ID_DEP']+"'>"+json['dependencias'][i]['NOMBRE_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['TITULAR_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['CABEZA_SECTOR']+"</td>"+
                  "<td>"+
                    //"<a href='/descripciones/"+json['dependencias'][i]['ID_DEP']+"'>Gestionar</a><br>"+
                    "<a href='javascript:void(0)' onclick='mostrarListado("+json['dependencias'][i]['ID_DEP']+")'>Descripciones</a>" +
                  "</td>"+
                "</tr>"

              );
          }
          $('#tablaDatos').DataTable({
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

        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al cargar el listado de dependencias');
          $("#modalMensaje").modal();
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }

    function redirigeDescripciones(){
      location.href("/");
    }

    function mostrarListado(id_dependencia){
      var dataForm = new FormData();
      dataForm.append('dependencia',id_dependencia);
      $.ajax({
        url :'/descripcion/listado',
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
            $("#cuerpoTablaListado").append(

                "<tr>"+
                  "<td id='nombre_"+json['dependencias'][i]['ID_DEP']+"'>"+json['dependencias'][i]['NOMBRE_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['TITULAR_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['CABEZA_SECTOR']+"</td>"+
                  "<td>"+
                    //"<a href='/descripciones/"+json['dependencias'][i]['ID_DEP']+"'>Gestionar</a><br>"+
                    "<a href='javascript:void(0)' onclick='listarDP("+json['dependencias'][i]['ID_DEP']+")'>Descripciones</a>" +
                  "</td>"+
                "</tr>"

              );
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

        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al cargar el listado de dependencias');
          $("#modalMensaje").modal();
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }

  </script>
@endsection