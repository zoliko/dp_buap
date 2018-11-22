@extends('plantillas.menu')
@section('title','Ayuda')
@section('tittle_page','Ayuda')

@section('content')

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" align="center">
                    <h3>Dirección de Recursos Humanos</h3>
                    <h3>Departamento de Ingreso y Evalación</h3>
                    <h2>Extensión 5897</h2>
                    <h2>drh.reclutamiento@correo.buap.mx</h2>
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
  </script>

@endsection