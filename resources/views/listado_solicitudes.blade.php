@extends('plantillas.menu')
@section('title','Prueba DPBUAP')
@section('tittle_page','Control de descripciones')

@section('content')

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="tablaDatos" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>DEPENDENCIA</th>
                <th>ENCARGADO</th>
                <th>CONTACTO</th>
                <th>ACCIONES</th>
              </tr>
              <tbody>
                 <!-- {{$i=1}} -->
                @foreach($solicitudes as $solicitud)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$solicitud->DEPENDENCIA}}</td>
                  <td>{{$solicitud->ENCARGADO_REGISTRO}}</td>
                  <td>{{$solicitud->CONTACTO_REGISTRO}}</td>
                  <td>
                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="DESCARGAR ORGANIGRAMA" onclick="descargarOrganigrama( {{$solicitud->ORGANIGRAMA}} )">
                      <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="CANCELAR SOLICITUD" onclick="ModalCancelarSolicitud( {{$solicitud->ID_REGISTRO}} )">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>

                  </td>
                </tr>
                <!-- {{$i++}} -->
                @endforeach
              </tbody>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <!-- Modal invalidar organigrama  -->
  <div class="modal fade" id="ModalCancelarSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="tituloDetalleModal" align="center"> Cancelación de solicitud </h3>
          <h5 class="modal-title" id="tituloDetalleModal" align="center"> Por favor registre el motivo de la cancelación de la solicitud </h5>
        </div>
        <input type="number" id="IdSolicitudCancelar" value="" hidden="hidden">
        <div class="modal-body" align="center">
          
           <form class="form-horizontal form-label-left">

            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea class="form-control" id="TextMensajeCancelar" rows="3"></textarea>
              </div>
            </div>

          </form>

           
        </div>
        <div class="modal-footer" id="areaBotones">
          <button type="button" class="btn btn-danger" onclick="CancelarSolicitud()">Cancelar solicitud</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
    $(window).load(function () {
      });

    function ModalCancelarSolicitud(id_solicitud){
      $("#IdSolicitudCancelar").val(id_solicitud);
      $("#ModalCancelarSolicitud").modal();
    }

    function CancelarSolicitud(){
      id_solicitud = $("#IdSolicitudCancelar").val();
      motivo_cancelacion = $("#TextMensajeCancelar").val();
      // alert(id_solicitud);
      var success;
      var url = "/solicitudes/denegar";
      var dataForm = new FormData();
      dataForm.append('id_solicitud',id_solicitud);
      dataForm.append('motivo_cancelacion',motivo_cancelacion);
      //lamando al metodo ajax
      metodoAjax(url,dataForm,function(success){
        //aquí se escribe todas las operaciones que se harían en el succes
        //la variable success es el json que recibe del servidor el método AJAX
        $("#ModalCancelarSolicitud").modal('hide');
        swal("", "Solicitud cancelada satisfactoriamente", "success");
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

    function descargarOrganigrama(id_organigrama){
      window.open(
        '/archivos/descargar/'+id_organigrama,
        '_blank' // <- This is what makes it open in a new window.
      );
    }
  </script>

@endsection