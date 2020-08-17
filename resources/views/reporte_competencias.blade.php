@extends('plantillas.menu')
@section('title','Reporte de competencias')
@section('tittle_page','Reporte de competencias')

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

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario" placeholder="">Dependencia <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="selectDependencia" class="form-control" id="select_dependencia">
                  <option value="">--DEPENDENCIA--</option>
                </select>
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <!-- <button class="btn btn-primary" type="button" onclick="btnCancelar()">Cancelar</button> -->
                <button type="" class="btn btn-success" onclick="DescargarReporte()">Descargar Reporte</button>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
    $(window).load(function () {
      });

    function DescargarReporte(){
      var dependencia = $("#selectDependencia").val();
      var success;
      var url = "/competencias/reporte_competencias";
      var dataForm = new FormData();
      dataForm.append('dependencia',dependencia);
      // dataForm.append('p2','p2');
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        var wb = XLSX.utils.book_new();
          wb.Props = {
                  Title: "Reporte de Competencias",
                  Subject: "Reporte",
                  Author: "Marvin Eliosa",
                  CreatedDate: new Date()
          };
          wb.SheetNames.push("Reporte");
          //var ws_data = [['hello' , 'world']];  //a row with 2 columns
          var ws_data = success['descripciones'];  //a row with 2 columns


          var SolicitudesWs = XLSX.utils.json_to_sheet(ws_data) 

          // A workbook is the name given to an Excel file
          var wb = XLSX.utils.book_new() // make Workbook of Excel

          // add Worksheet to Workbook
          // Workbook contains one or more worksheets
          //XLSX.utils.book_append_sheet(wb, animalWS, 'animals') // sheetAName is name of Worksheet
          XLSX.utils.book_append_sheet(wb, SolicitudesWs, 'Solicitudes')   

          // export Excel file
          var nombre_archivo = 'Reporte_de_competencias.xlsx';
          XLSX.writeFile(wb, nombre_archivo)
      });
    }

    function ejemploAjax(){
      var success;
      var url = "/ruta1/ruta2";
      var dataForm = new FormData();
      dataForm.append('p1',"p1");
      dataForm.append('p2','p2');
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
      });
    }

    traeDependencias();
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
            // if(!json['dependencias'][i]['ACTIVA']){
              $("#selectDependencia").append(
                  '<option value="'+json['dependencias'][i]['ID_DEP']+'">'+json['dependencias'][i]['NOM_DEP']+'</option>'
                );
            // }
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