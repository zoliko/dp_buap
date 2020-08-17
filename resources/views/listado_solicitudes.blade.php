@extends('plantillas.menu')
@section('title','Prueba DPBUAP')
@section('tittle_page','titulo pagina')

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
@endsection

@section('script')

  <script type="text/javascript">
    $(window).load(function () {
      });

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