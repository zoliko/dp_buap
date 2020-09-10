@extends('plantillas.menu')
@section('title','Descripciones')
@section('tittle_page','Listado de descripciones de puestos')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <button type="button" class="btn btn-info pull-right" onclick="archivos()">Subir Archivo</button>
        <button type="button" class="btn btn-info pull-right" onclick="NuevaDescripcion()">Nueva Descripción</button>
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
          <table id="tablaListado" class="table table-bordered">
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
          <button type="button" class="btn btn-info pull-left" onclick="PonerEnRevision()">Poner en Revisión</button>
          <button type="button" class="btn btn-info pull-left" onclick="ModalModificarDescripcion()">Solicitar Modificación</button>
          <button type="button" class="btn btn-danger pull-left" onclick="BajaDescripcion()">Dar de baja</button>
          <button type="button" class="btn btn-success" onclick="redirigirDP()">Ver Completa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
          <button type="button" class="btn btn-success" id="btnSubirArchivo" onclick="inputArchivo('archivo')">Subir Archivos</button>
          <button type="button" class="btn btn-success" id="btnSubirOrganigrama" onclick="inputArchivo('organigrama')">Subir Organigrama</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal especificar apartados de actualización -->
  <div class="modal fade" id="ModalActualizarDescripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center"> Solicitud de modificación </h3>
          <h5 class="modal-title" id="" align="center"> Por favor especifique las secciones que quiere actualizar </h5>
        </div>
        <div class="modal-body" align="center">
          
           <form class="form-horizontal form-label-left">

            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea class="form-control" id="TextModificarDescripcion" rows="3"></textarea>
              </div>
            </div>

          </form>

           
        </div>
        <div class="modal-footer" id="areaBotones">
          <button type="button" class="btn btn-warning" onclick="SolicitarModificacion()">Solicitar Modificación</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    var descripciones = <?php echo json_encode($descripciones) ?>;
    var id_dependencia = <?php echo json_encode($id_dependencia) ?>;
    var categoria_usr = "<?php echo (string)\Session::get('categoria')[0]; ?>";
    var GL_descripcion = 0;
    var tipo_archivo = 'VACIO';
    // alert(tipo_archivo);
    $(window).load(function (){
      // console.log(descripciones);
      // console.log(id_dependencia);
      llenaDescripciones();
    });

    var listadoArchivos = [];

    function SolicitarModificacion(){
      var id_descripcion = $("#detalleIdDP").val();
      var texto_modificacion = $("#TextModificarDescripcion").val();
      // alert(texto_modificacion);
      var success;
      var url = "/descripciones/solicitar_modificacion";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',GL_descripcion);
      dataForm.append('texto_modificacion',texto_modificacion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        $("#textoModalMensaje").text('Se ha solicitado la modificación con éxito');
          $("#modalMensaje").modal();

        $("#ModalActualizarDescripcion").modal('hide');
      });
    }

    function ModalModificarDescripcion(){

      $("#modalDetalleDP").modal('hide');
      $("#ModalActualizarDescripcion").modal();
    }

    // function ModificarDescripcion(){
    //   console.log('modificando descripcion');
    //   var success;
    //   var url = "/descripciones/solicitar_modificacion";
    //   var dataForm = new FormData();
    //   dataForm.append('id_descripcion',GL_descripcion);
    //   //lamando al metodo ajax
    //   metodoAjax(url,dataForm,function(success){
    //     //aquí se escribe todas las operaciones que se harían en el succes
    //     //la variable success es el json que recibe del servidor el método AJAX
    //     $("#textoModalMensaje").text('Se ha solicitado la modificación con éxito');
    //       $("#modalMensaje").modal();
    //   });

    // }

    function BajaDescripcion(){
      console.log('dar de baja la descripcion');
      var success;
      var url = "/descripciones/solicitar_baja";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',GL_descripcion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX

        $("#textoModalMensaje").text('Se ha solicitado la baja con éxito');
          $("#modalMensaje").modal();
      });

    }

    
    function inputArchivo(tmp_tipo_archivo){
      tipo_archivo = tmp_tipo_archivo;
       // alert('primero '+tipo_archivo);
      $("#inputSubirArchivo").trigger('click');
    }

    function cambioArchivo(input){
      var curFiles = input.files;
      // alert('segundo '+tipo_archivo);
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
        console.log(tipo_archivo);
        var dataForm = new FormData();
        dataForm.append('archivo',archivoAdjunto);
        dataForm.append('identificador',id_dependencia);
        dataForm.append('carpeta','dependencias');
        dataForm.append('tipo_archivo',tipo_archivo);
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
    function abrirPdf(id_archivo,indice){
      var ruta_archivo = listadoArchivos['archivos'][indice]['URL_ARCHIVO'];
      window.open(ruta_archivo, '_blank', 'fullscreen=yes');
    }

    function descargarArchivo(id_archivo,indice){
      var nombre_archivo = listadoArchivos['archivos'][indice]['NOMBRE_ARCHIVO'];
      var url = "/archivos/descargar/dependencias/"+nombre_archivo;
      window.open(url, '_blank');
    }

    //aqui se muestra el modal con la lista de archivos
    function archivos(){
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

    function llenaDescripciones(){
      //alert("Llenado");
      //console.log(descripciones);
      for(var i=0;i<descripciones.length;i++){
        var id_des = descripciones[i]['ID_DESC'];
        $("#cuerpoTablaListado").append(
          "<tr class='bg-info'>"+
            "<td>"+(parseInt(i)+1)+"</td>"+
            "<td id='clave_"+id_des+"'>"+descripciones[i]['CLAVE_DESC']+"</td>"+
            "<td id='nombre_"+id_des+"'>"+descripciones[i]['NOM_DESC']+"</td>"+
            "<td id='direccion_"+id_des+"'>"+"<a href='/descripciones/gestionar/"+descripciones[i]['ID_DEP']+"'>"+descripciones[i]['DIR_DESC']+"</a>"+"</td>"+
            "<td id='num_rev_"+id_des+"'>"+descripciones[i]['REVISION_DESC']+"</td>"+
            "<td id='estatus_"+id_des+"'>"+descripciones[i]['ESTATUS']+"</td>"+
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
              /*'<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="VER ARCHIVOS" id="btnAbrir_'+id_des+'" onclick="archivos('+id_des+')">'+
                '<span class="glyphicon glyphicon-upload" aria-hidden="true" ></span>'+
              '</button>'+//*/
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

    // function archivos(){
    //   $("#textoModalMensaje").text('Aqui se gestionan los archivos como oficios que cancelen la descripción de puestos');
    //   $("#modalMensaje").modal();
    // }

    function modalDetalle(id_descripcion){
      GL_descripcion = id_descripcion;
      //id_descripcion = 10;
      //alert(id_descripcion);
      //$("#modalDetalleDP").modal();
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