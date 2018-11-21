@extends('plantillas.menu')
@section('title','Usuarios')
@section('tittle_page','Gestión de usuarios')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalNuevoUsuario"">REGISTRAR USUARIO</button>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="tablaListadoDependencias" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>DEPENDENCIA</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaDependencias">
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal de registro de descripcion de puesto-->
  <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" id="tituloModalUsuario"></h3>
        </div>
        <div class="modal-body" align="center">
          <h3 class="modal-title" id=""></h3>
          <br>

          <form class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Dependencia <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <!--<select id="selectDependencia" class="form-control" required>
                  <option value="false">--SELECCIONAR DEPENDENCIA--</option>
                </select>-->
                <input type="text" id="Nuevo_Dependencia" name="last-name" required="required" class="form-control col-md-7 col-xs-12 text-uppercase" placeholder="" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Puesto <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select id="selectPuestos" class="form-control" onchange="cambioPuesto()" required>
                  <option value="false">--SELECCIONAR PUESTO--</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Responsable: <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="Encargado_usr" name="last-name" required="required" class="form-control col-md-7 col-xs-12 text-uppercase" placeholder="Persona a cargo del usuario">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario:
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label id="clave_puesto" style="margin-top:10px">XX/XX/XX-XX</label>
              </div>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contraseña:
              </label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label id="pass_puesto" style="margin-top:10px">XXXXXXXX</label>
              </div>
            </div> 


            <!--<div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Titular <span class="required">*</span>
              </label>
              <div class="col-md-1 col-sm-1 col-xs-12">
                <input type="checkbox" value="" onclick="puestoTitular()">
              </div>
            </div>-->           

          </form>

          <hr/>
          <div>
            <table id="tablaVinculacionDescripciones" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>DESCRIPCION</th>
                  <th>ACCIONES</th>
                </tr>
              </thead>
              <tbody id="cuerpoVinculacionDescripciones">
              </tbody>
            </table>
          </div>

        </div>
        <div class="modal-footer">
          <input type="text" id="ClaveUsr" value="" hidden="hidden">
          <input type="text" id="nivelUsr" value="" hidden="hidden">
          <input type="text" id="id_dependencia" value="" hidden="hidden">
          <button type="button" class="btn btn-primary" onclick="guardarUsr()"  id="editarUsr">Guardar</button>
          <button type="button" class="btn btn-primary" onclick="crearUsr()" id="crearUsr">Crear Usuario</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
  var dependencias = <?php echo json_encode($dependencias) ?>;
    $(window).load(function () {
      //console.log(dependencias);
      llenaDependencias();
  });

  function llenaDependencias(){
    for(var i = 0; i < dependencias.length; i++){
      var id_dependencia = dependencias[i]['ID_DEP'];
      $("#cuerpoTablaDependencias").append(
        "<tr>"+
          "<td>"+(parseInt(i)+1)+"</td>"+
          "<td id='nombre_dep_"+id_dependencia+"'>"+dependencias[i]['NOMBRE_DEP']+"</td>"+
          "<td id='acciones_dep_"+id_dependencia+"'>"+ 
            '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DETALLE" id="btnVer_'+id_dependencia+'" onclick="modalDetalleUsuarios('+id_dependencia+","+i+')">'+
              '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>'+
            '</button>'+
          "</td>"+
        "</tr>"
      );
    }

      $('#tablaListadoDependencias').DataTable({
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

  function modalDetalleUsuarios(id_dependencia,n_dependencia){
    //console.log(id_dependencia);
    //console.log(dependencias[n_dependencia]['NOMBRE_DEP']);
    $("#Encargado_usr").val("");
    $("#Nuevo_Dependencia").val(dependencias[n_dependencia]['NOMBRE_DEP']);
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
        $("#selectPuestos").html(
            '<option value="false">---SELECCIONAR PUESTO----</option>'
          );
        for(var i = 0; i < json['descripcion'].length; i++){
          var id_descripcion = json['descripcion'][i]['ID_DESC'];
          $("#selectPuestos").append(
            '<option value="'+id_descripcion+'">'+json['descripcion'][i]['NOM_DESC']+'</option>'
          );//*/
        }
        $("#id_dependencia").val(id_dependencia);
        $("#crearUsr").hide();
        $("#editarUsr").hide();
        $("#modalNuevoUsuario").modal();
        
      },
      error : function(xhr, status) {
        $("#textoModalMensaje").text('Existió un problema al cargar el listado de puestos');
        $("#modalMensaje").modal();
        $('#btnCancelar').prop('disabled', false);
      },
      complete : function(xhr, status){
         $("#modalCarga").modal('hide');
      }
    });//*/
  }

  function guardarUsr(){
    var clave = $("#clave_puesto").text();
    var responsable = ($("#Encargado_usr").val()).toUpperCase();
    console.log(clave);
    console.log(responsable);
    if(responsable!=""){
      var dataForm = new FormData();
      dataForm.append('clave',clave);
      dataForm.append('responsable',responsable);
      $.ajax({
        url :'/usuarios/actualizar',
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
          if(json['exito']==true){
          //$("#pass_puesto").text(json['contrasena']);
          $("#textoModalMensaje").text('Guardado correctamente.');
          $("#modalMensaje").modal();

        }else{
          //$("#pass_puesto").text(json['contrasena']);
          $("#textoModalMensaje").text('Existió un problema con la información, es posible que la información ya se haya guardado con anterioridad o no exista ningún cambio en la información.');
          $("#modalMensaje").modal();
        }
          
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema con el servidor');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }else{
      $("#textoModalMensaje").text('Por favor indique el responsable del usuario.');
      $("#modalMensaje").modal();
    }
  }

  function crearUsr(){
    var id_usr = $("#ClaveUsr").val();
    var nivel_usr = $("#nivelUsr").val();
    var id_dependencia = $("#id_dependencia").val();
    //alert(id_usr);
    var responsable = ($("#Encargado_usr").val()).toUpperCase();
    console.log(id_usr);
    console.log(nivel_usr);
    console.log(responsable);
    console.log(id_dependencia);
    if(responsable!=""){
      var dataForm = new FormData();
      dataForm.append('id_usr',id_usr);
      dataForm.append('responsable',responsable);
      dataForm.append('nivel',nivel_usr);
      dataForm.append('id_dependencia',id_dependencia);
      $.ajax({
        url :'/usuarios/crear',
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

          $("#pass_puesto").text(json['contrasena']);
            $("#crearUsr").hide();
            $("#editarUsr").show();
          
        },
        error : function(xhr, status) {
          $("#textoModalMensaje").text('Existió un problema al crear el usuario');
          $("#modalMensaje").modal();
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });//*/
    }else{
      $("#textoModalMensaje").text('Por favor indique el responsable del usuario.');
      $("#modalMensaje").modal();
    }
  }

  function cambioPuesto(){
    var id_descripcion = $("#selectPuestos option:selected").val();
    //$("#Encargado_usr").val("");
    //console.log(typeof id_descripcion);
    //console.log(id_descripcion);
    if(id_descripcion!="false"){
      var dataForm = new FormData();
      var id_dependencia = $("#id_dependencia").val();
      //console.log(id_dependencia);
      dataForm.append('id_descripcion',id_descripcion);
      dataForm.append('id_dependencia',id_dependencia);
      $.ajax({
        url :'/usuarios/trae_usuario',
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
          //se ponen la clave del puesto
          if(json['descripcion']){
            $("#clave_puesto").text(json['descripcion'][0]['CLAVE_DES']);
            $("#ClaveUsr").val(json['descripcion'][0]['CLAVE_DES']);
            $("#nivelUsr").val(json['descripcion'][0]['NIVEL_DES']);
            llenaTablaPermisos(json['permisos']);
            
            //var id_usr = $("#ClaveUsr").val();
            //alert(id_usr);
          }
          //console.log("Tamaño de usuarios: "+json['usuario'].length);
          //si existe el usuario entonces se autollena y se muestra el boton de guardar
          if(json['usuario'].length > 0){
            $("#pass_puesto").text(json['cuenta'][0]['CONTRASENA_LOGIN']);
            //$("#Encargado_usr").val("ALGUIEN");
            $("#Encargado_usr").val(json['usuario'][0]['RESPONSABLE_USUARIO']);
            $("#crearUsr").hide();
            $("#editarUsr").show();
          }else{//si no existe el usuario entonces se muestra el boton de crear
            $("#pass_puesto").text("XXXXXXXX");
            $("#Encargado_usr").val("");
            $("#crearUsr").show();
            $("#editarUsr").hide();
            if(json['descripcion'][0]['NIVEL_DES']=="TITULAR"){
              $("#Encargado_usr").val(json['titular']);
              //console.log(json['descripcion'][0]['NIVEL_DES']);
              //console.log("titular");
            }
          }
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
    }else{
      $("#crearUsr").hide();
      $("#editarUsr").hide();
      $("#clave_puesto").text("XX/XX/XX-XX");
    }
  }

  function llenaTablaPermisos(arrayPermisos){
    var acciones;
    $("#cuerpoVinculacionDescripciones").html("");
    for(var i=0;i<arrayPermisos.length; i++){
      var id_descripcion = arrayPermisos[i]['ID_DESC'];
      if(arrayPermisos[i]['PERMISO']==null){
        acciones = '<a id="accion_'+id_descripcion+'" href="javascript:void(0)" onclick="permisos('+id_descripcion+',1)">PERMITIR</a>';
      }else{
        acciones = '<a id="accion_'+id_descripcion+'" href="javascript:void(0)" onclick="permisos('+id_descripcion+',0)">DENEGAR</a>';
      }//*/
      $("#cuerpoVinculacionDescripciones").append(
        "<tr>"+
          "<td id='nombre_dep_"+id_descripcion+"'>"+arrayPermisos[i]['NOM_DESC']+"</td>"+
          "<td id='acciones_desc_"+id_descripcion+"'>"+ 
            acciones+
          "</td>"+
        "</tr>"
      );
    }
  }
  function permisos(id_descripcion,fl){
    console.log("DESCRIPCION: "+id_descripcion);
  }

  $('#modalNuevoUsuario').on('hidden.bs.modal', function () {
    // do something…
      $('body').addClass('test');
      $("#cuerpoVinculacionDescripciones").html("");
  });




  </script>

@endsection