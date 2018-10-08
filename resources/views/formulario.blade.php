@extends('plantillas.menu')
@section('title','Formulario')
@section('nombre_usuario','Marvin Eliosa')
@section('tittle_page','Descripción de Puestos')

@section('content')

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--<div class="x_title">
                    <h2>Seccion 1 de la página</h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                    </ul>
                    <div class="clearfix"></div>
                  </div>-->
                  <div class="x_content">
<!--Agregar el formulario -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> "Puesto" <small>Descripcion de puestos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#InfoGe" data-toggle="tab">Información General</a>
                        </li>
                        <li><a href="#Actividad" data-toggle="tab">Actividades</a>
                        </li>
                        <li><a href="#Relacion" data-toggle="tab">Relaciones Criticas</a>
                        </li>
                        <li><a href="#Perfil" data-toggle="tab">Perfil del Puesto</a>
                        </li>
                        <li><a href="#Competencia" data-toggle="tab">Competencias</a>
                        </li>
                        <li><a href="#Distribucion" data-toggle="tab">Lista de Distribución</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="InfoGe">
                          <p class="lead">Informacion General y Porposito General del puesto</p>
  <!--Formulario de informacion General-->
                      <div class="x_panel">
                          <div class="x_content">
                          <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Puesto: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reposta a: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Clave de Puesto:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de crecaión:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de revisión:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N°. de Revision: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Proposito General del Puesto <span class="required"></label>
                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                              <textarea class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>



                    </form>
                  </div>
                </div>
                          <!--Fin del Formulario de información General-->
                </div>
                  <!--Inicio del modulo de actividades -->
                        <div class="tab-pane" id="Actividad">
                          <p class="lead">Actividades Principales y Especificas </p>
                         
                       <!--   <table  class="table table-bordered">
                             <tr>
                                <td bgcolor="#003B5C"></td>

                                <td bgcolor="#003B5C">
                                <div align="center"><span class="Estilo3">Principales actividades generales </span></div>
                                </td>
                                <td bgcolor="#003B5C">
                                <div align="center"><span class="Estilo3">Indicadores de desempe&ntilde;o </span><br /> 
                                </div>
                                </td>
                             </tr>
                             <tr>
                                <td><div align="center">1</div></td>
                                <td><div class="form-group">
                                    <label for="comment">Comment:</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                      </div>
                                  </td>
                                <td> </td>
                              </tr>
                             
                              </table>-->

                            <table id="tablaprincipales" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th bgcolor="#003B5C">N°</th>
                                  <th bgcolor="#003B5C">Principales actividades generales </th>
                                  <th bgcolor="#003B5C">Indicadores de desempeño</th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaprincipales"></tbody>
                            </table>

                            <button onclick="AgregaActividad()">Agregar Actividad </button>

                            <table id="tablaespecificas" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th bgcolor="#003B5C">N°</th>
                                  <th bgcolor="#003B5C">Principales Actividades Especificas (No Obligatorias)</th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaespecificas"></tbody>
                            </table>
                            <button onclick="ActividadEspecifica">Agregar Actividad </button>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>

                        </div>
                  <!--Fin del modulo de actividades -->
                        <div class="tab-pane" id="Relacion">Messages Tab.</div>
                        <div class="tab-pane" id="Perfil">Settings Tab.</div>
                        <div class="tab-pane" id="Competencia">Settings Tab.</div>
                        <div class="tab-pane" id="Distribucion">Settings Tab.</div>
                      </div>
              </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>


                  </div>
                </div>
              </div>
            </div>
@endsection

@section('script')
<script type="text/javascript">
  function AgregaActividad(){

    
     $("#cuerpoTablaprincipales").append(

                  "<tr>"+
                    "<td id='nombre_"+5+"'></td>"+
                    "<td>"+'<div class="form-group">'+
                          //'<label for="comment"></label>'+
                            '<textarea class="form-control" rows="5" id="comment"></textarea>'+
                            '</div>'+
                    "</td>"+
                    "<td>"+'<input type="text" class="form-control">'+"</td>"+
                    
                  "</tr>");


  }

  for (var i = Things.length - 1; i >= 0; i--) {
    var lll = $("#elem_"+i).val();
  }
</script>
@endsection

