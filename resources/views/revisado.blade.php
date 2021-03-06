@extends('plantillas.menu')
@section('title','Formulario')
@section('tittle_page','Descripción de Puestos')

@section('content')

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
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
                        <li class="active" ><a href="#InfoGe" data-toggle="tab" style="background:#9CCF15">Información General</a>
                        </li>
                        <li><a href="#Actividad" data-toggle="tab" style="background:#9CCF15">Actividades</a>
                        </li>
                        <li><a href="#Relacion" data-toggle="tab" style="background:#9CCF15">Relaciones Criticas</a>
                        </li>
                        <li><a href="#Perfil" data-toggle="tab" style="background:#9CCF15">Perfil del Puesto</a>
                        </li>
                        <li><a href="#Competencia" data-toggle="tab" style="background:#CF5315">Competencias</a>
                        </li>
                        <li><a href="#Distribucion" data-toggle="tab" style="background:#9CCF15" >Lista de Distribución</a>
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
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="Psicologo" disabled="disabled">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reporta a: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="Coordinador" disabled="disabled">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="Coordinación de Bienestar emocional" disabled="disabled">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Dirección">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Clave de Puesto:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Clave de Puesto">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de crecaión:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Fecha de creacion">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de revisión:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Fecha de revision">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N°. de Revision: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="N° de revision">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Proposito General del Puesto <span class="required"></label>
                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                              <textarea class="form-control" rows="3" placeholder="" id="Proposito" disabled="disabled"> TODA LA DESCRIPCION DEL PUESTO</textarea>
                            </div>
                               
                          </div>

                            <button class="btn btn-primary" type="button" onclick="guardar_proposito()">Guardar</button>

                    </form>
                  </div>
                </div>
                          <!--Fin del Formulario de información General-->
                </div>
                  <!--Inicio del modulo de actividades -->
                        <div class="tab-pane" id="Actividad">
                          <p class="lead">Actividades Principales y Especificas </p>
          

                            <table id="tablaprincipales" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>N°</th>
                                  <th>Principales actividades generales </th>
                                  <th>Indicadores de desempeño</th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaprincipales"></tbody>
                            </table>

                            <button onclick="AgregaActividad()">Agregar Actividad </button>
                            <button class="btn btn-primary" type="button" onclick="guardar_Actividades()">Guardar</button>

                            <table id="tablaespecificas" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>N°</th>
                                  <th >Principales Actividades Especificas (No Obligatorias)</th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaespecificas"></tbody>
                            </table>
                            <button onclick="ActividadEspecifica()">Agregar Actividad </button>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            
                          </div>

                        </div>
                  <!--Fin del modulo de Relaciones -->
                        <div class="tab-pane" id="Relacion"> 
                          <p class="lead">Relaciones Criticas del Puesto </p>
          

                            <table id="tablarelaciones" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>PUESTOS QUE SON SUS PROVEEDORES</th>
                                  <th>INSUMOS QUE OBTIENE </th>
                                  <th>FRECUENCIA</th>
                                </tr>
                              </thead>
                              <tbody id="cuerporelaciones"></tbody>
                            </table>

                            <button onclick="AgregaRelacion()">Agregar Relacion </button>

                            <div class="tab-pane" id="Relacion"> 
                            <p class="lead">Relaciones Criticas del Puesto </p>
                            <table id="tablarelaciones2" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>PUESTOS QUE SON SUSS CLIENTES</th>
                                  <th>PRODUCTOS QUE OFRECE </th>
                                  <th>FRECUENCIA</th>
                                </tr>
                              </thead>
                              <tbody id="cuerporelaciones2"></tbody>
                            </table><button onclick="AgregaRelacion2()">Agregar Relacion </button>
                        </div>


                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>

                        </div>
                        <div class="tab-pane" id="Perfil">
                          <p class="lead">FORMACION PROFESIONAL Y EXPERIENCIA</p>
                          
                           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Formacion Profesional: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Formacion Profesional">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Area">
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Años de experiencia Laboral: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="Años de Experiencia"> 
                            </div>
                            
                          </div>
                        </form>
                      </div>


                        <div class="tab-pane" id="Competencia">
                          <p class="lead">COMPETENCIAS &nbsp &nbsp<i class="fa fa-question-circle" data-toggle="popover" title="Competencias" data-content="Debe proporcionar al menos 3 competencias."></i>

                          </p>
                          <!--Comptencias inicio -->

                          <table  class="table table-striped table-bordered">
                            <tr>
                              <td colspan="2" ><div align="center" ><strong>INSTITUCIONALES</strong></div></td>
                              <td colspan="2"><div align="center"><strong>GENERICAS</strong></div></td>
                              <td colspan="2"><div align="center"><strong>TÉCNICAS</strong></div></td>
                            </tr>
                              <tr>
                                <td width="287"><div align="center"><strong>COMPETENCIAS</strong></div></td>
                                <td width="106"><div align="center" class="Estilo5">Grado de Dominio </div></td>
                                <td width="300"><div align="center"><strong>COMPETENCIAS</strong></div></td>
                                <td width="107"><div align="center" class="Estilo5">Grado de Dominio </div></td>
                                <td width="300"><div align="center"><strong>COMPETENCIAS</strong></div></td>
                                <td width="106" class="Estilo5">Grado de Dominio </td>
                              </tr>
                              <tr>
                                <td><div align="left" class="Estilo9">COMPROMISO</div></td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog1" type="text" class="Estilo5" value="Dominio del estres" ></td>
                                <td> <select name="fg1">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot1" type="text" class="Estilo5" ></td>
                                <td><select name="ft1">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">CONCIENCIA ORGANIZACIONAL </td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog2" type="text" class="Estilo5" ></td>
                                <td> <select name="fg2">
                              <option>      </option>
                                  
                                </select></td>
                                <td><input name="cot2" type="text" class="Estilo5"></td>
                                <td><select name="ft2">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">EQUIDAD</td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog3" type="text" class="Estilo5"></td>
                                <td> <select name="fg3">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot3" type="text" class="Estilo5" ></td>
                                <td><select name="ft3">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">ÉTICA</td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog4" type="text" class="Estilo5" ></td>
                                <td> <select name="fg4">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot4" type="text" class="Estilo5"></td>
                                <td><select name="ft4">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">RESPONSABILIDAD</td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog5" type="text" class="Estilo5" ></td>
                                <td> <select name="fg5">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot5" type="text" class="Estilo5"></td>
                                <td><select name="ft5">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">RESPONSABILIDAD SOCIAL </td>
                                <td class="Estilo9"><div align="center">ÚNICO</div></td>
                                <td><input name="cog6" type="text" class="Estilo5"></td>
                                <td> <select name="fg6">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot6" type="text" class="Estilo5"></td>
                                <td><select name="ft6">
                              <option>      </option>
                                 
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">&nbsp;</td>
                                <td class="Estilo9"><div align="center"></div></td>
                                <td><input name="cog7" type="text" class="Estilo5" ></td>
                                <td> <select name="fg7">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot7" type="text" class="Estilo5" ></td>
                                <td><select name="ft7">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">&nbsp;</td>
                                <td class="Estilo9"><div align="center"></div></td>
                                <td><input name="cog8" type="text" class="Estilo5" ></td>
                                <td> <select name="fg8">
                              <option>      </option>
                                 
                                </select></td>
                                <td><input name="cot8" type="text" class="Estilo5" ></td>
                                <td><select name="ft8">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              <tr>
                                <td class="Estilo9">&nbsp;</td>
                                <td class="Estilo9"><div align="center"></div></td>
                                <td><input name="cog9" type="text" class="Estilo5" ></td>
                                <td> <select name="fg10">
                              <option>      </option>
                                  
                                </select></td>
                                <td><input name="cot9" type="text" class="Estilo5" ></td>
                                <td><select name="ft9">
                              <option>      </option>
                                  
                                </select></td>
                              </tr>
                              </table>
                               <p class="lead">IDIOMAS </p>

                               <p class="lead">COMPUTACIÓN</p>

                           <!--Comptencias Fin-->
                         </div>
                        <div class="tab-pane" id="Distribucion">
                          

                          <table class="table table-striped table-bordered">
                            <tr>
                              <td colspan="2" align="center">LISTA DE DISTRIBUCIÓN</td>
                            </tr>
            
                            <tr>
                              <td><input name="ld1" type="text" class="Estilo5"></td>
                              <td><input name="ld2" type="text" class="Estilo5"></td>
                            </tr>
                            <tr>
                              <td><input name="ld3" type="text" class="Estilo5"></td>
                              <td><input name="ld4" type="text" class="Estilo5"></td>
                            </tr>
                            <tr>
                              <td><input name="ld5" type="text" class="Estilo5"></td>
                              <td><input name="ld6" type="text" class="Estilo5"></td>
                            </tr>
                            </table>
                        </div>
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
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>




@endsection

