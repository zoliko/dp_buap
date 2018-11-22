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
        <center><h1>Descripciones de Puesto</h1></center>
          <section class="login_content">
          
            <img src="../images/logo.png" width="200" height="200" />
            <form>
              <h1>DP_BUAP</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" id="pass" />
              </div>
              <div>
                <a class="btn btn-default submit" onclick="login()">Ingresar</a>
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
  
  function login(){
    var usuario = $("#usuario").val();
    var contrasena = $("#pass").val();
    console.log("Usuario: "+usuario);
    console.log("Contraseña: "+contrasena);
    //alert("EPALE");
    var dataForm = new FormData();
        dataForm.append('usuario',usuario);
        dataForm.append('contrasena',contrasena);
        $.ajax({
          url :'/usuarios/login',
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
            if(!json['exito']){
              $("#tituloModalMensaje").text('ATENCION');
              $("#textoModalMensaje").text('Usuario o contraseña incorrecta.');
              $("#modalMensaje").modal();
            }else{
              if(json['categoria']=='DIRECTOR_DRH'){
                location.href='/dependencias'
              }else if(json['categoria']=='FACILITADOR'){
                location.href='/dependencias'
              }else if(json['categoria']=='DIRECTOR_D/UA'){
                location.href='/descripciones'
              }else if(json['categoria']=='ENCARGADO_D/UA'){
                location.href='/descripciones'
              }else if(json['categoria']=='CGA'){
                location.href='/dependencias'
              }else{
                $("#textoModalMensaje").text("No existe la categoría: "+json['categoria']);
                $("#modalMensaje").modal();
              }
            }
          },
          error : function(xhr, status) {
            $("#textoModalMensaje").text("Existió un error al cargar");
            $("#modalMensaje").modal();
          },
          complete : function(xhr, status){
            $("#modalCarga").modal('hide');
          }
        });//*/
  }

</script>
