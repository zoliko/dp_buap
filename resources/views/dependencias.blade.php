@extends('plantillas.menu')
@section('title','Dependencias')
@section('tittle_page','Listado de dependencias')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2>
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
  <div class="modal fade" id="modalListado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
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
          <input type="number" id="listadoIdDep" value="" hidden="hidden">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          @if(strcmp(\Session::get('categoria')[0],'FACILITADOR')==0)
            <button type="button" class="btn btn-success" onclick="redirigeDescripciones()">Gestionar Descripciones</button>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Listado de archivos -->
  <div class="modal fade" id="modalListadoArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloModalListado">DEPENDENCIA</h3>
        </div>
        <div class="modal-body">
          <table id="tablaListado" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Archivo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaArchivos">
              
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <input type="number" id="idDependencia" value="" hidden="hidden">
          <!-- input que contiene el archivo, esta oculto -->
          <input type="file" id="inputSubirArchivo" name="" style="display: none;" onchange="cambioArchivo(this)" onclick="limpiarInput(this)" accept="image/*,application/pdf">
          <!-- boton que solo ejecuta un click en el input file -->
          <button type="button" class="btn btn-success" id="btnSubirArchivo" onclick="inputArchivo()">Subir Archivos</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal ver imagen -->
  <!--<div class="modal fade" id="modalVerImagen2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%; height: 100%; overflow-y: scroll;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloModalListado">DEPENDENCIA</h3>
        </div>
        <div class="modal-footer">
          <input type="number" id="idDependencia" value="" hidden="hidden">
          <button type="button" class="btn btn-success" onclick="redirigeDescripciones()">Subir Archivos</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>-->

  <!-- Modal de la imagen -->
  <div id="modalImagen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="//placehold.it/1000x600" class="img-responsive" id="imagen_modal">
          </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDecideEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body" align="center">
          
          <h3> ¿Está seguro de que desea eliminar el archivo? </h3>
        </div>
        <div class="modal-footer" id="areaBotones">
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    var categoria_usr = "<?php echo (string)\Session::get('categoria')[0]; ?>";
    console.log("Categoría: "+categoria_usr);
    $( document ).ready(function() {
      traeDependencias();
      //$("#modalDecideEliminar").modal();
      //$("#modalListado").modal();
      //console.log( "ready!" );
    });
    var listadoArchivos = [];

    //---------------------- ARCHIVOS ----------------------
    function inputArchivo(){
      $("#inputSubirArchivo").trigger('click');
    }

    function cambioArchivo(input){
      var curFiles = input.files;
      if(curFiles.length === 0){
        //$("#btnSubirArchivo").html("<span>Subir Archivos</span>");
      }else{
        //$("#btnSubirArchivo").html("<span>"+curFiles[0].name+"</span>");
        //alert("Subiendo archivo");
        guardaArchivo(curFiles);
      }
    }

    function limpiarInput(elemento){
      $(elemento).val("");
    }

    function guardaArchivo(curFiles){
      if(curFiles[0].size > 2000000){
        $("#textoModalMensaje").text('El archivo debe pesar máximo 2MB');
        $("#modalMensaje").modal();
      }else{
        var success;
        var url = "/archivos/subir"
        var id_dependencia = $("#idDependencia").val();
        var arch = document.getElementById('inputSubirArchivo');
        var archivoAdjunto = arch.files[0];

        var dataForm = new FormData();
        dataForm.append('archivo',archivoAdjunto);
        dataForm.append('identificador',id_dependencia);
        dataForm.append('carpeta','dependencias');
        //en esta función recibimos lo que salió del ajax y lo almacenamos en success
        //también contiene lo que haría el success
        //var consecutivo = listadoArchivos['archivos'].length;
        //alert(consecutivo);
        metodoAjax(url,dataForm,function(success){
          //console.log(success);
          if(success['error']){
            $("#textoModalMensaje").text(success['error']);
            $("#modalMensaje").modal();
          }else{
            var archivo = success['NOMBRE_ARCHIVO'];
            var id_archivo = success['ID_ARCHIVO'];
            var url_archivo = success['URL_ARCHIVO'];
            var ruta_archivo = success['RUTA_ARCHIVO'];
            var consecutivo = listadoArchivos['archivos'].length;
            var acciones = creaAccionesArchivo(id_archivo,archivo,consecutivo);
            $("#cuerpoTablaArchivos").append(
              "<tr id='tr_archivo_"+id_archivo+"'>"+
                "<td id='nombre_"+id_archivo+"'>"+
                    archivo+
                "</td>"+
                "<td id='acciones_"+id_archivo+"'>"+
                  acciones+
                "</td>"+
              "</tr>"
            );
            var arr_archivos = {
              "ID_ARCHIVO":id_archivo,
              "NOMBRE_ARCHIVO":archivo,
              "RUTA_ARCHIVO":ruta_archivo,
              "URL_ARCHIVO":url_archivo
            };
            listadoArchivos['archivos'].push(arr_archivos);
            //console.log(listadoArchivos);
          }
        });//*/
      }//*/
    }

    function creaAccionesArchivo(id_archivo,nombre_archivo,i){
      var ext = [".png",".PNG",".jpg",".JPG",".jpeg" ,".JPEG"];
      var acciones = "";
      for(var j = 0; j<ext.length; j++){
        if(nombre_archivo.includes(ext[j])){
          //console.log(j + " " + nombre_archivo + " tiene " + ext[j]);
          acciones = acciones + '<button type="button" class="btn btn-default btn-xs" onclick="verImagen('+id_archivo+','+i+')">'+
                        '<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>'+
                      '</button>';
          j=acciones.length;
        }
      }
      if(nombre_archivo.includes(".PDF") || nombre_archivo.includes(".pdf")){
          //console.log(j + " " + nombre_archivo + " tiene " + ext[j]);
          acciones = acciones + '<button type="button" class="btn btn-default btn-xs " aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER PDF" onclick="abrirPdf('+id_archivo+','+i+')" id="btnPdf_'+id_archivo+'" >'+
                        '<span class="fa fa-file-pdf-o" aria-hidden="true"></span>'+
                      '</button>';
        }
      acciones = acciones +  '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DESCARGAR ARCHIVO" onclick="descargarArchivo('+id_archivo+','+i+')" id="btnDescargar_'+id_archivo+'">'+
                        '<span class="glyphicon glyphicon-download" aria-hidden="true"></span>'+
                      '</button>';//*/
      if(categoria_usr=="FACILITADOR"){                     
      acciones = acciones +  '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="ELIMINAR" onclick="decisionEliminar('+id_archivo+','+i+')" id="btnEliminar_'+id_archivo+'">'+
                        '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>'+
                      '</button>';
      }
      return acciones;
    }

    //aqui se muestra el modal con la lista de archivos
    function archivos(id_dependencia){
      $("#cuerpoTablaArchivos").html("");
      var success;
      var url = "/archivos/trae/dependencia";
      var dataForm = new FormData();
      dataForm.append('dependencia',id_dependencia);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        listadoArchivos = success;
        //console.log(listadoArchivos);
        for(var i=0; i<success['archivos'].length;i++){
          var acciones = "";
          var id_archivo = success['archivos'][i]['ID_ARCHIVO'];
          var ruta_archivo = success['archivos'][i]['RUTA_ARCHIVO'];
          var nombre_archivo = success['archivos'][i]['NOMBRE_ARCHIVO'];
          //var ext = [".png",".PNG",".jpg",".JPG",".jpeg" ,".JPEG"];
          acciones = creaAccionesArchivo(id_archivo,nombre_archivo,i);
          $("#cuerpoTablaArchivos").append(
              "<tr id='tr_archivo_"+id_archivo+"'>"+
                "<td id='nombre_"+id_archivo+"'>"+
                    success['archivos'][i]['NOMBRE_ARCHIVO']+
                "</td>"+
                "<td id='acciones_"+id_archivo+"'>"+
                  acciones+
                "</td>"+
              "</tr>"
            );//*/
          $("#btnPdf_"+(i+1)).tooltip('fixTitle');
          $("#btnDescargar_"+(i+1)).tooltip('fixTitle');
          $("#btnEliminar_"+(i+1)).tooltip('fixTitle');
          console.log("#btnPdf_"+(i+1));
          //acciones = "";
        }//*/
        $("#idDependencia").val(id_dependencia);
        $("#modalListadoArchivos").modal();
        //console.log(listadoArchivos);
      });

    }

    //------------------Funciones para ver IMAGEN---------------------
    function verImagen(id_archivo,indice){
      $("#modalListadoArchivos").modal('hide');
      var ruta_archivo = listadoArchivos['archivos'][indice]['URL_ARCHIVO'];
      var imagen = document.getElementById('imagen_modal');
      imagen.src = ruta_archivo;
      $(this).css('display', 'block');
      var $dialog = $(this).find(".modal-dialog");
      var offset = ($(window).height() - $dialog.height()) / 2;
      $dialog.css("margin-top", offset);
      $("#modalImagen").modal();
    }
    $('#modalImagen').on('hidden.bs.modal', function () {
      $("#modalListadoArchivos").modal();
    })
    //--------------------fin funciones de IMAGEN---------------------

    function abrirPdf(id_archivo,indice){
      var ruta_archivo = listadoArchivos['archivos'][indice]['URL_ARCHIVO'];
      window.open(ruta_archivo, '_blank', 'fullscreen=yes');
    }

    function descargarArchivo(id_archivo,indice){
      var nombre_archivo = listadoArchivos['archivos'][indice]['NOMBRE_ARCHIVO'];
      var url = "/archivos/descargar/dependencias/"+nombre_archivo;
      window.open(url, '_blank');
    }

    function decisionEliminar(id_archivo,indice){
      $("#areaBotones").html(        
          '<button type="button" class="btn btn-danger" onclick="eliminarArchivo('+id_archivo+","+indice+')">Eliminar</button>'+
          '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'
        );
      $("#modalDecideEliminar").modal();//*/

    }
    
    function eliminarArchivo(id_archivo,indice){
      var nombre_archivo = listadoArchivos['archivos'][indice]['NOMBRE_ARCHIVO'];
      var ruta_archivo = listadoArchivos['archivos'][indice]['RUTA_ARCHIVO'];
      //alert("Epale!!");
      var success;
      var url = "/archivos/eliminar";
      var dataForm = new FormData();
      dataForm.append('id_archivo',id_archivo);
      dataForm.append('ruta_archivo',ruta_archivo);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        $("#tr_archivo_"+id_archivo).remove();
        $("#modalDecideEliminar").modal('hide');
      });
    }
    //-----------------------------------------------------------------------

    /*//señor metodo maestro ajax
    function metodoAjax(url,dataForm,callback){
      var resultado = null;
      
      $.ajax({
        url :url,
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
          //resultado = json;
          callback(json);
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema con la operación');
          $("#modalMensaje").modal();
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//
    }//*/

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
            var acciones = "";

            $("#cuerpoTabla").append(

                "<tr>"+
                  "<td id='nombre_"+json['dependencias'][i]['ID_DEP']+"'>"+json['dependencias'][i]['NOMBRE_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['TITULAR_DEP']+"</td>"+
                  "<td>"+json['dependencias'][i]['CABEZA_SECTOR']+"</td>"+
                  "<td>"+
                    //"<a href='/descripciones/"+json['dependencias'][i]['ID_DEP']+"'>Gestionar</a><br>"+
                    '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER DESCRIPCIONES" id="btnVer_'+json['dependencias'][i]['ID_DEP']+'" onclick="mostrarListado('+json['dependencias'][i]['ID_DEP']+')">'+
                      '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>'+
                    '</button>'+
                    '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="ARCHIVOS" id="btnAbrir_'+json['dependencias'][i]['ID_DEP']+'" onclick="archivos('+json['dependencias'][i]['ID_DEP']+')">'+
                      '<span class="glyphicon glyphicon-paperclip" aria-hidden="true" ></span>'+
                    '</button>'+
                    /*"<a href='javascript:void(0)' onclick='mostrarListado("+json['dependencias'][i]['ID_DEP']+")'>Descripciones</a>" +*/
                  "</td>"+//
                "</tr>"

              );
              $("#btnVer_"+json['dependencias'][i]['ID_DEP']).tooltip('fixTitle');
              $("#btnAbrir_"+json['dependencias'][i]['ID_DEP']).tooltip('fixTitle');
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
      var id_dep = $("#listadoIdDep").val();
      //alert(id_dep);
      location.href="/descripciones/gestionar/"+id_dep;
    }

    function mostrarListado(id_dependencia){
      var dataForm = new FormData();
      dataForm.append('dependencia',id_dependencia);
      $.ajax({
        url :'/descripciones/listado',
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
          $("#cuerpoTablaListado").html("");
          if(json['total'] != 0){
            for(var i = 0; i<json['total'];i++){
              var acciones = "";
              var id_descripcion = json['descripcion'][i]['ID_DESC'];

              if(categoria_usr=="DIRECTOR_DRH"){                     
                acciones = acciones +  '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="APROBAR DESCRIPCION" onclick="aprobar('+id_descripcion+')" id="btnAprobar_'+id_descripcion+'">'+
                                  '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>'+
                                '</button>';
              }
              if(categoria_usr!='CGA'){
                acciones = acciones +  '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="ABRIR DESCRIPCION" onclick="abrirDescripcion('+id_descripcion+')" id="btnAbrir_'+id_descripcion+'">'+
                    '<span class="fa fa-external-link" aria-hidden="true"></span>'+
                  '</button>';
              }
              acciones = acciones +  '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER PDF" onclick="verPdfDesc('+id_descripcion+')" id="btnPdf_'+id_descripcion+'">'+
                  '<span class="fa fa-file-pdf-o" aria-hidden="true"></span>'+
                '</button>';
              $("#cuerpoTablaListado").append(

                  "<tr id='"+id_descripcion+"'>"+
                    "<td id='nombre_"+id_descripcion+"'>"+json['descripcion'][i]['NOM_DESC']+"</td>"+

                    "<td id='acciones_"+id_descripcion+"'>"+acciones+"</td>"+
                  "</tr>"//*/

                );
              $("#btnAprobar_"+id_descripcion).tooltip('fixTitle');
              $("#btnAbrir_"+id_descripcion).tooltip('fixTitle');
              $("#btnPdf_"+id_descripcion).tooltip('fixTitle');
            }
              $("#listadoIdDep").val(id_dependencia);
              $("#modalListado").modal();
          }else{
            $("#textoModalMensaje").html('Aún no ha creado descripciones de puestos para esta dependencia.<br><h5><u><a href="/descripciones/gestionar/'+id_dependencia+'">CREAR DESCRIPCIONES</a></u></h5>');
            $("#modalMensaje").modal();

          }

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

    function abrirDescripcion(id_descripcion){
      //location.href = "/descripcion/"+id_descripcion;
      window.open("/descripcion/"+id_descripcion,'_blank');
    }

    function verPdfDesc(id_descripcion){
      console.log("Mostrando descripcion");
    }

  </script>
@endsection