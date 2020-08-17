<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favico.ico')}}" type="image/ico" />

    <title>Descripción de Puestos BUAP</title>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        <center><h3>Solicitud de revisión de descripciones</h3></center>
          <section class="login_content">
            <form>
              <div>
                <input type="text" class="form-control" placeholder="Nombre del Titular o Coordinador Administrativo" id="registrar_Encargado" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Teléfono de contacto" id="registrar_Telefono" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="ID de trabajador" id="registrar_id_trabajador" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Correo electrónico" id="registrar_mail" />
              </div>
              <div>
                <select id="selectDependencia" class="form-control" id="select_dependencia">
                  <option value="">--DEPENDENCIA--</option>
                </select>
              </div>
              <div>
                <br>
                <span class="pull-left">Organigrama: </span>
                <br>
                <input type="file" id="inputSubirOrganigrama" name="" onclick="limpiarInput(this)" accept="image/*,application/pdf">
                <br>
                <strong style="color:red;">Nota: Para la solicitud de alta, actualización y baja de descripciones de puesto se requiere el organigrama autorizado por la Coordinación General Administrativa.</strong>
              </div>
              <div>
                <a class="btn btn-default submit" onclick="registrar()">Registrar</a>
              </div>
            </form>
          </section> 
        </div>
      </div>
    </div>
  </body>

  <!-- modales -->
    <!-- Modal -->
    <div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="tituloModalMensaje"></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 id="textoModalMensaje" align="center"> </h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
    </div>

    <!-- Modal Carga-->
    <div class="modal fade" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div align="center">
          <img src="{{ asset('images/carga3.gif') }}" class="img-rounded" alt="Cinque Terre">
        </div>
      </div>
    </div>
</html>


<script type="text/javascript">

  function login2(){
    location.href = "/dependencias"
  }

  function limpiarInput(elemento){
      $(elemento).val("");
    }

  traeDependencias();

  function registrar(){
    var encargado = $("#registrar_Encargado").val();
    var contacto = $("#registrar_Telefono").val();
    var id_trabajador = $("#registrar_id_trabajador").val();
    var mail = $("#registrar_mail").val();
    var dependencia = $("#selectDependencia").val();
    var organigrama = document.getElementById('inputSubirOrganigrama');
    if(organigrama.value==''){
        MensajeModal("¡ATENCIÓN!",'Debe adjuntar el curriculum del candidato');
    }else{
      var dataForm = new FormData();
      dataForm.append('encargado',encargado);
      dataForm.append('contacto',contacto);
      dataForm.append('id_trabajador',id_trabajador);
      dataForm.append('mail',mail);
      dataForm.append('dependencia',dependencia);
      dataForm.append('organigrama',organigrama.files[0]);
      $.ajax({
        url :"/dependencias/solicitud",
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
          $("#textoModalMensaje").text('Se ha realizado la solicitud con éxito');
          $("#modalMensaje").modal();   
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
