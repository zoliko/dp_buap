@extends('plantillas.menu')
@section('title','Gestionar Descripciones')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Gestion de descripciones de puestos')

@section('content')

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 id="nombre_dependencia"></h2>
                    <button type="button" class="btn btn-primary pull-right" onclick="nuevaDescripcion()">REGISTRAR DESCRIPCION</button>
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

            <!-- Modal -->
            <div class="modal fade" id="modalNuevaDP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" align="center">
                    <h3 class="modal-title" id="exampleModalLongTitle">Registrar descripción de puesto</h3>
                  </div>
                  <div class="modal-body" align="center">
                    <h3 class="modal-title" id=""></h3>
                    <br>

                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Puesto <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="Nuevo_Nombre_Puesto" required="required" class="form-control col-md-12 col-xs-12" onchange="armarClave()">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Reporta a: <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="Nuevo_Reporta_a" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Área: <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="Nuevo_Area" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
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

                    </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="registrarDP()">Crear</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
    //alert(id_dependencia);
    var PuestoConsecutivo = 1;

    $(window).load(function () {
      //console.log(descripciones);
        // run code
        //traeDescripciones();
        $("#nombre_dependencia").text(dependencia);
        llenaDescripciones();
        autollenado();
        //obtenerIniciales(dependencia);
    });

    function llenaDescripciones(){
      for(var i=0;i<descripciones.length;i++){
        $("#cuerpoTablaListado").append(
            "<tr>"+
              "<td id='nombre_"+descripciones[i]['ID_DESC']+"'>"+descripciones[i]['NOM_DESC']+"</td>"+
              "<td id='num_rev_"+descripciones[i]['ID_DESC']+"'>"+descripciones[i]['REVISION_DESC']+"</td>"+
              "<td id='estatus_"+descripciones[i]['ID_DESC']+"'>"+descripciones[i]['ESTATUS_DESC']+"</td>"+
              "<td id='acciones_"+descripciones[i]['ID_DESC']+"'>"+"ACCIONES"+"</td>"+
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
    }
    function autollenado(){
      $("#Nuevo_Nombre_Puesto").val("Chalan");
      $("#Nuevo_Reporta_a").val("Jefe");
      $("#Nuevo_Area").val("Toda la dependencia");
      $("#selectDescripcion").val("DP");
      $("#rep_directos").val("5");
      $("#rep_indirectos").val("8");
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
      var tipDescripcion = (($("#selectDescripcion").val()!="ninguno")? $("#selectDescripcion").val() : "XX");
      var siglasPuesto = obtenerIniciales(($("#Nuevo_Nombre_Puesto").val()).toUpperCase());
      var consecutivo = ((PuestoConsecutivo<10)?"0":"") + PuestoConsecutivo;
      clave = nomenclatura + "/" + tipDescripcion + "/" + ((siglasPuesto=="")?"XX":siglasPuesto) + "-" + consecutivo;
      //$("#clave_puesto").val(clave);
      $("#clave_puesto").text(clave);
    }

    function nuevaDescripcion(){
      //alert("Epale");
      armarClave();
      $("#Nuevo_Direccion").val(dependencia);
      $("#modalNuevaDP").modal();
    }

    function traeDependencias(){
        var dataForm = new FormData();
        dataForm.append('usuario',"usuario");
        $.ajax({
          url :'/descripcion/trae',
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

    function registrarDP(){
      var puesto = $("#Nuevo_Nombre_Puesto").val();
      var reporta_a = $("#Nuevo_Reporta_a").val();
      var area = $("#Nuevo_Area").val();
      var direccion = dependencia;
      var dtp = $("#selectDescripcion").val();
      var clave = $("#clave_puesto").text();
      var rep_directos = $("#rep_directos").val();
      var rep_indirectos = $("#rep_indirectos").val();

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
        dataForm.append('puesto',puesto);
        dataForm.append('reporta_a',reporta_a);
        dataForm.append('area',area);
        dataForm.append('direccion',dependencia);
        dataForm.append('id_dependencia',id_dependencia);
        dataForm.append('dtp',dtp);
        dataForm.append('clave',clave);
        dataForm.append('rep_directos',rep_directos);
        dataForm.append('rep_indirectos',rep_indirectos);
        ajaxRegistrarDP(dataForm);
      }

    }

    function ajaxRegistrarDP(dataForm){
      $.ajax({
        url :'/descripcion/registrar',
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