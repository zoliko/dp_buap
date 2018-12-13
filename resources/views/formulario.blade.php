@extends('plantillas.menu')
@section('title','Formulario')
@section('tittle_page','Descripción de Puestos')

@section('content')

	<div class="row">
                <div class="x_panel">
                  
                  <div class="x_content">
              <div class="col-md-12 col-sm-12 col-xs-12">
<!--Agregar el formulario -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 id="nombre_descripcion"> CARGANDO... </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active" ><a href="#InfoGe" data-toggle="tab">Información General</a>
                        </li>
                        <li><a href="#Actividad" data-toggle="tab">Actividades</a>
                        </li>
                        <li><a href="#Relacion" data-toggle="tab">Relaciones Críticas</a>
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
                          <p class="lead">Información General y Propósito General del Puesto 
                            <i class="fa fa-question-circle" data-toggle="popover" title="Proposito General" data-content="Aqui encontraran la información de ayuda"></i>
                          </p>
                          <div class="x_panel">
                            <div class="x_content">
                            <br />
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Puesto: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_nombre_puesto" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reporta a: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_reporta_a" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_area_desc" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_direccion" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Clave de Puesto:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_clave" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de crecaión:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_creacion" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de revisión:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_frevision" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N°. de Revisión: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_nrevision" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                              </div>
                            </div>

                            <div class="ln_solid"></div>


                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Propósito General del Puesto 
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="left" title="Proposito General" data-content="Indicar la razón u objetivo principal del puesto, es decir, el tipo de necesidad que cubre y para qué fue creado o resulta necesario, enunciarlo preferentemente con verbos en infinitivo y responder: ¿qué hace?, ¿Cómo lo hace o por medio de qué lo hace? y ¿para qué lo hace?, es importante utilizar las palabras adecuadas al nivel que ocupa en puesto dentro del organigrama, según su grado de responsabilidad, (ejemplo: coordinar y gestionar…).">
                                </i>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" rows="3" placeholder="" id="Proposito"></textarea>
                              </div>
                            </div>

                              <button class="btn btn-primary pull-right" type="button" onclick="guardar_proposito()">Guardar</button>

                        </form>
                    </div>
                  </div>
                          <!--Fin del Formulario de información General-->
                </div>
                  <!--Inicio del modulo de actividades -->
                        <div class="tab-pane" id="Actividad">
                          <p class="lead">Actividades Principales y Especificas  <i class="fa fa-question-circle" data-toggle="popover" data-placement="right" title="Actividades Principales y Especificas" data-content="Enunciar las actividades secundarias (no obligatorias) que existan para el puesto y que no influyen en el logro de su objetivo; de incluirlas, enunciarlas con verbos en infinitivo (ejemplo: proporcionar, elaborar, mantener, gestionar, etc.). Incluir en las actividades generales la siguiente: realizar las funciones específicas del puesto que se requieran en la Unidad Académica o Dependencia Administrativa asignadas por el/a jefe/a inmediato/a."></i></p>
          

                            <table id="tablaprincipales" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>N°</th>
                                  <th>
                                    Principales actividades generales 
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Principales actividades generales" data-content="Enlistar cada una de las funciones que corresponden al puesto de forma obligatoria, constante y correcta, necesarias para cumplir con su objetivo; enunciarlas preferentemente con verbos en infinitivo (ejemplo: proporcionar, elaborar, mantener, gestionar, etc.). Es obligatorio para todas las descripciones de puesto, incluir en las actividades generales la siguiente: mantener la confidencialidad de la información de la Unidad Académica o Dependencia Administrativa. (Consultar Anexo III, donde se indica propuesta de verbos para enunciar las actividades generales).">
                                    </i>

                                  </th>
                                  <th>
                                    Indicadores de desempeño
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Indicadores de desempeño" data-content="Incluir la información que nos permiten identificar cualitativa o cuantitativamente lo esperado de las actividades y funciones que desempeña el puesto, deben ser medibles, y comprobables, por lo que son opcionales de indicarse (no obligatorios).">
                                    </i>
                                  </th>
                                  <th>
                                    Acciones
                                  </th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaprincipales"></tbody>
                            </table>

                            <button onclick="AgregaActividad()">Agregar</button>
                          <!--  <button class="btn btn-primary" type="button" onclick="guardar_Actividades()">Guardar</button>-->

                            <table id="tablaespecificas" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>N°</th>
                                  <th >
                                    Principales Actividades Especificas (No Obligatorias)
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Principales Actividades Especificas" data-content="Enunciar las actividades secundarias (no obligatorias) que existan para el puesto y que no influyen en el logro de su objetivo; de incluirlas, enunciarlas con verbos en infinitivo (ejemplo: proporcionar, elaborar, mantener, gestionar, etc.). Incluir en las actividades generales la siguiente: realizar las funciones específicas del puesto que se requieran en la Unidad Académica o Dependencia Administrativa asignadas por el/a jefe/a inmediato/a.">
                                  </th>
                                  <th>Acciones</th>
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
                          <p class="lead">Relaciones Criticas del Puesto <i class="fa fa-question-circle" data-toggle="popover" title="Relaciones Criticas del Puesto" data-content="El propósito de este apartado es que el ocupante del puesto conozca con qué puestos se relaciona y tenga claridad de los productos o servicios que proporciona o que o recibe; es decir, se describe la relación cliente/proveedor, proveedor/cliente. "></i></p>
          

                            <table id="tablarelaciones" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>
                                    Puestos que son sus proveedores
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Puestos que son sus proveedores" data-content="Enlistar las diferentes áreas o puestos, de las que recibe los productos, servicios o entregables para realizar su labor, con el fin de que, el ocupante del puesto conozca qué debe recibir y de qué puesto/s o áreas, es decir, se describe su relación como cliente/proveedor.">
                                    </i>
                                  </th>
                                  <th>
                                    Insumos que obtiene
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Insumos que obtiene" data-content="Mencionar las productos, servicios o entregables que recibe de los puestos o áreas que son sus proveedores.">
                                    </i>
                                  </th>
                                  <th>
                                    Frecuencia
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Frecuencia" data-content="Determinar  cada  cuándo se reciben productos, servicios o entregables por parte del proveedor; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable.">
                                    </i>
                                  </th>
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
                                  <th>
                                    Puestos que son sus clientes
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Puestos que son sus clientes" data-content="Enlistar las diferentes áreas o puestos a los cuales ofrece productos, servicios o entregables, tras realizar la labor respectiva del puesto, es decir, se describe su relación como proveedor/cliente.">
                                    </i>
                                  </th>
                                  <th>
                                    Productos que ofrece
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Productos que ofrece" data-content="Mencionar los productos, servicios o entregables que se generan y entregan del puesto a los clientes.">
                                    </i>
                                  </th>
                                  </th>
                                  <th>
                                    Frecuencia
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Frecuencia" data-content="Determinar  cada  cuándo se entregan productos, servicios o entregables por parte del puesto; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable.">
                                    </i>
                                  </th>
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
                          <p class="lead">Formación Profesional y Experiencia <i class="fa fa-question-circle" data-toggle="popover" title="Formación Profesional y Experiencia" data-content="Indicar el grado académico mínimo requerido para ocupar el puesto, así como  la experiencia en un área específica de conocimiento, si es que ésta se requiere."></i></p>
                          <i class="fas fa-comment-lines"></i>
                           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                              Formación Profesional:
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="formacion">
                            </div>
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Formación Profesional" data-content="Determinar  cada  cuándo se entregan productos, servicios o entregables por parte del puesto; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable.">
                                </i>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                            <div class="col-md-8 col-sm-8 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="area">
                            </div>
                              <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia.">
                              </i>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Años de experiencia Laboral: </label>
                            <div class="col-md-8 col-sm-8 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="años_ex">
                            </div>
                              <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Años de experiencia Laboral" data-content="Tiempo mínimo de la misma (ejemplo: Experiencia en reclutamiento y selección de personal, 2 años).">
                              </i>
                          </div>
                             <button class="btn btn-primary pull-right" type="button" onclick="guardar_formacion()">Guardar</button>
                        </form>
                     
                      </div>

                        <div class="tab-pane" id="Competencia">
                          <p class="lead">Competencias 
                            <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Competencias" data-content="En  este apartado se definen el tipo y grado de dominio de las habilidades, destrezas, actitudes y conocimientos que requiere tener y/o desarrollar el ocupante del puesto."></i>

                          </p>
                          <!--Comptencias inicio -->

                         <table id="tablaprincipales" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th colspan="2" align="center"><strong>Genéricas</strong>  
                                    <i class="fa fa-question-circle" data-placement="auto" data-toggle="popover" title="Competencias Genéricas" data-content="Son las características específicas requeridas para el puesto. Para facilitar la definición de estas competencias ver “Diccionario de Competencias” en la página Web de la DRH apartado Formatos. Para indicar el grado de dominio, elegir nivel: V, III, II o I según el grado de responsabilidad y la necesidad del puesto."></i>
                                  </th>
                                </tr>
                                <tr>
                                <th>
                                  Competencias
                                  <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Competencias" data-content="Escribe dentro del recuadro la competencia."></i>
                                </th>
                                <th>
                                  Grado de Dominio
                                  <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Grado de Dominio" data-content="Se elije entre Avanzado, Medio o Básico."></i>
                                </th>
                              </tr>
                              </thead>
                              <tbody id="tablacompetenciasG"></tbody>
                            </table>
                          <button onclick="AgregarCompetenciaGenericas()">Agregar</button>

                           <table id="tablaprincipales" class="table table-striped table-bordered">

                           
                              <thead>
                                <tr>
                                  <th colspan="2" align="center">
                                    <strong>Técnicas</strong>
                                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="right" title="Competencias Técnicas" data-content="Se indican los conocimientos técnicos, prácticos o especializados que requiere el puesto, cada Unidad Académica o Dependencia Administrativa deberá elaborar su propio diccionario de competencias técnicas con sus diferentes niveles. Los grados establecidos para las competencias técnicas utilizables en la Institución son:
                                    Avanzado: trabajo día a día desempeñando conocimiento, creación, planeación, establecimiento, ejecución, supervisión, solución, actualización y modificación de la competencia.
                                    Medio: trabajo día a día en desempeño del conocimiento, ejecución y reporte con supervisión de la competencia.
                                    Básico: trabajo día a día en la aplicación del conocimiento bajo supervisión."></i>
                                  </th>
                                </tr>
                                <tr>
                                <th>
                                  Competencias
                                  <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Competencias" data-content="Escribe dentro del recuadro la competencia."></i>
                                </th>
                                <th>
                                  Grado de Dominio
                                  <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Grado de Dominio" data-content="Para indicar el grado de dominio, elegir nivel: Avanzado, Medio o Básico."></i>
                                </th>
                              </tr>
                              </thead>
                              <tbody id="tablacompetenciasT"></tbody>
                            </table>
                          <button onclick="AgregarCompetenciaTecnicas()">Agregar</button>

                            <form>
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                  Idioma:
                              </label>
                                <div class="col-md-8 col-sm-8 col-xs-10">
                                    <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="idioma">
                                </div>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                             Computacion:
                            </label>
                                <div class="col-md-8 col-sm-8 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="computacion">
                            </div>

                            <button class="btn btn-primary pull-right" type="button" onclick="guardar_formacion()">Guardar</button>
                           <!--Comptencias Fin-->

                           </form>
                         </div>
                        <div class="tab-pane" id="Distribucion">

                           <table id="tabladistribucion" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>N°</th>
                                  <th>
                                    Lista de Distribución
                                   <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Lista de Distribución" data-content="Mencionar el/os puestos a los que compete visualizar la descripción, con el fin de que el SIGI realice el alta y distribución correspondiente y pueda ser consultado por los puestos a que se asigne."></i>
                                  </th>
                                </tr>
                              </thead>
                              <tbody id="cuerpoTablaespecificas"></tbody>
                            </table>
                            <button onclick="agregardistibucion()">Agregar</button>
                        </div>
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
});
</script>


<script type="text/javascript">
 //var ID_DESCRIPCION;
  var json_descripcion=<?php echo json_encode($descripcion) ?>;
  var id_des = json_descripcion['DATOS']['ID_DESCRIPCION'];
  $( window ).load(function() {
    console.log(json_descripcion);
    llenado();
     //alert(id_des);
  });
 
  var cont_actG=1;
  var con_CG=1;
  var con_CT=1;
  var cont_AE=1;

  function llenado(){
    //parte principal
    $("#nombre_descripcion").text(json_descripcion['DATOS']['NOM_DESC']);
    $("#infg_nombre_puesto").val(json_descripcion['DATOS']['NOM_DESC']);
    $("#infg_reporta_a").val(json_descripcion['DATOS']['REPORTA_A_DESC']);
    $("#infg_area_desc").val(json_descripcion['DATOS']['AREA_DESC']);
    $("#infg_direccion").val(json_descripcion['DATOS']['DIRECCION_DESC']);
    $("#infg_clave").val(json_descripcion['DATOS']['CLAVE_DESC']);
    $("#infg_creacion").val(json_descripcion['DATOS']['CREACION_DESC']);
    $("#infg_frevision").val(((json_descripcion['DATOS']['NOM_DESC'])?json_descripcion['DATOS']['NOM_DESC']:""));
    $("#infg_nrevision").val(json_descripcion['DATOS']['N_REVISION_DESC']);

    if(json_descripcion['PROPOSITO_GENERAL']){
      $("#Proposito").val(json_descripcion['PROPOSITO_GENERAL']['PROPOSITO_GENERAL']);
      if(json_descripcion['PROPOSITO_GENERAL']['ESTATUS_PROPOSITO_GENERAL']==1){
        $("#Proposito").prop('disabled', true);
      }
    }

    //actividades generales
    for(var i = 0; i < json_descripcion['ACTIVIDADES_GRLES'].length; i++){
      
      var disabled = ((json_descripcion['ACTIVIDADES_GRLES'][i]['ESTATUS_ACTIVIDAD']==1)?'disabled':'');
      $("#cuerpoTablaprincipales").append(
        '<tr disabled="true">'+
          '<td>'+(parseInt(i)+1)+'</td>'+
          '<td>'+
            '<textarea class="form-control" rows="5" id="actividadPrin'+cont_actG+'" '+disabled+'>'+
              json_descripcion['ACTIVIDADES_GRLES'][i]['NOMBRE_ACTIVIDAD']+
            '</textarea>'+
          '</td>'+
          //'<td>'+json_descripcion['ACTIVIDADES_GRLES'][i]['INDICADOR_ACTIVIDAD']+'</td>'+
          '<td>'+'<input type="text" class="form-control" id="indicador'+cont_actG+'"'+disabled+'>'+'</td>'+
          "<td>"+
            '<button class="btn btn-primary" type="button" onclick="actualizar_ActividadGral('+json_descripcion['ACTIVIDADES_GRLES'][i]['ID_ACT_GRAL']+","+cont_actG+')"'+disabled+'>Actualizar</button>'+
          "</td>"+
        '</tr>'
      );
      $("#indicador"+cont_actG).val(json_descripcion['ACTIVIDADES_GRLES'][i]['INDICADOR_ACTIVIDAD']);
      cont_actG++;
    }

    //Actividades especificas
    for(var i = 0; i < json_descripcion['ACTIVIDADES_ESPECIFICAS'].length; i++){
      var disabled = ((json_descripcion['ACTIVIDADES_ESPECIFICAS'][i]['ESTATUS_ACTIVIDAD']==1)?'disabled':'');
      $("#cuerpoTablaespecificas").append(
          '<tr>'+
            '<td>'+cont_AE+'</td>'+
            '<td>'+'<textarea class="form-control" rows="5" id="ActividadEspecifica'+cont_AE+'" '+disabled+'>'+json_descripcion['ACTIVIDADES_ESPECIFICAS'][i]['NOMBRE_ACTIVIDAD']+'</textarea>'+'</td>'+
            //'<td>'+'<input type="text" class="form-control" id="indicador'+cont_actG+'" >epa</input>'+'</td>'+
            '<td>'+
              '<button class="btn btn-primary" type="button" onclick="actualizar_ActividadEsp('+json_descripcion['ACTIVIDADES_ESPECIFICAS'][i]['ID_ACT_ESP']+","+cont_AE+')"'+disabled+'>Actualizar</button>'+
            '</td>'+
          '</tr>'
        );
      cont_AE++;
    }
    //swal("", "Información almacenada correctamente", "success");
  }

 
  var cont_actG=1;
  var con_CG=1;
  var con_CT=1;
  var cont_AE=1;
  var cont_r=1;
  var cont_rd=1;
  var con_D=1;

  //ejecutar popover al cargar la página
  $('[data-toggle="popover"]').popover({
    container: 'body'
  }); 

  //solo abrir un popover a la vez
  $('.fa-question-circle').on('click', function (e) {
      $('.fa-question-circle').not(this).popover('hide');
  });

  //cerrar popover cuando se da click fuera, en el body
  $('body').on('click', function (e) {
      //did not click a popover toggle or popover
      if ($(e.target).data('toggle') !== 'popover'
          && $(e.target).parents('.popover.in').length === 0) { 
          $('[data-toggle="popover"]').popover('hide');
      }
  });

  function actualizar_ActividadGral(id_act_gral,tmp_cont_actG){
    //alert(tmp_cont_actG);
    //console.log("entre a la funcion guardar actividades");
    var success;
    var url = "/descripcion/actualiza_actgral"
    var Actividad = $("#actividadPrin"+tmp_cont_actG).val();
    var indicador = $("#indicador"+tmp_cont_actG).val();
    var dataForm = new FormData();
    dataForm.append('Actividad',Actividad);
    dataForm.append('indicador',indicador);
    dataForm.append('id_act_gral',id_act_gral);
    /*console.log(Actividad);
    console.log(indicador);
    console.log(id_act_gral);//*/
    metodoAjax(url,dataForm,function(success){
      if(success['update']==1){
        swal("", "Actualizado correctamente", "success");
      }else{
        swal("", "Actualizado correctamente", "error");
      }

    });//*/

  }

  //actividades generales
  function AgregaActividad(){
    $("#cuerpoTablaprincipales").append(

      "<tr>"+
        "<td id='nombre_"+cont_actG+"'>"+cont_actG+"</td>"+
        "<td>"+'<div class="form-group">'+
              //'<label for="comment"></label>'+
                '<textarea class="form-control" rows="5" id="actividadPrin'+cont_actG+'"></textarea>'+
                '</div>'+
        "</td>"+
        "<td>"+'<input type="text" class="form-control" id="indicador'+cont_actG+'" >'+"</td>"+
        "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_Actividades('+cont_actG+',this)" id="btn_actgrl_'+cont_actG+'">Guardar</button>'+"</td>"+
        
      "</tr>"
      );//*/
      cont_actG++;//*/
    }

function agregardistibucion(){
 $("#tabladistribucion").append(
    "<tr>"+
      "<td id='nombre_"+con_D+"'>"+con_D+"</td>"+
        "<td>"+
          '<div class="form-group">'+
            '<textarea class="form-control" rows="5" id="distribucion'+con_D+'"></textarea>'+
             "<td>"+'<button class="btn btn-primary" type="button" onclick="guarda_distribucion('+con_D+')">Guardar</button>'+"</td>"+
          '</div>'+
        "</td>"+
      "</td>"+        
    "</tr>");
   con_D++;

}


  function ActividadEspecifica(){
   // alert("Entre");
   $("#cuerpoTablaespecificas").append(
    "<tr>"+
      "<td id='nombre_"+cont_AE+"'>"+cont_AE+"</td>"+
        "<td>"+
          '<div class="form-group">'+
            '<textarea class="form-control" rows="5" id="ActividadEspecifica'+cont_AE+'"></textarea>'+
             "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_ActividadesE('+cont_AE+')">Guardar</button>'+"</td>"+
          '</div>'+
        "</td>"+
      "</td>"+        
    "</tr>");
    cont_AE++;//*/
  }


  function AgregarCompetenciaGenericas(){
 // alert("Competencia Generica");
    $("#tablacompetenciasG").append(
       " <tr>"+
          "<td>"+'<input type="text" class="Estilo5" id="CompetenciaG'+con_CG+'">'+"</td>"+
            "<td>"+'<select name="fg1"id="indicador'+con_CG+'">'+
                   '<option value="I">I</option>'+
                    '<option value="II">II</option>'+
                    '<option value="III">III</option>'+
                    '<option value="IV">IV</option>'+
                 "</select>"+"</td>"+
          "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasG('+con_CG+')">Guardar</button>'+"</td>"+
          "</tr>");
    con_CG++;//*/
  }

  function AgregarCompetenciaTecnicas(){
  //alert("Competencia Técnicas");
   $("#tablacompetenciasT").append(
       " <tr>"+
          "<td>"+'<input name="cog1" type="text" class="Estilo5"  id="CompetenciaT'+con_CT+'">'+"</td>"+
            "<td>"+ '<select name="fg1" id="indicador'+con_CT+'">'+
                   '<option value="Básico">Basico</option>'+
                    '<option value="Medio">Medio </option>'+
                    '<option value="Avanzado">Avanzado</option>'+
                    
                 "</select>"+"</td>"+

           "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasT('+con_CT+')">Guardar</button>'+"</td>"+
          "</tr>");//*/

   con_CT++;
  }

  function ActividadEspecifica(){
   $("#cuerpoTablaespecificas").append(
    "<tr>"+
      "<td id='nombre_"+cont_AE+"'>"+cont_AE+"</td>"+
        "<td>"+
          '<div class="form-group">'+
            '<textarea class="form-control" rows="5" id="ActividadEspecifica'+cont_AE+'"></textarea>'+
             "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_ActividadesE('+cont_AE+',this)">Guardar</button>'+"</td>"+
          '</div>'+
        "</td>"+
      "</td>"+        
    "</tr>");
    cont_AE++;
  }
  

  function AgregaRelacion(){


     $("#cuerporelaciones").append(

                  "<tr>"+
                    "<td>"+'<input type="text" id="Proveedor'+cont_r+'" >'+"</td>"+
                    "<td>"+'<div class="form-group">'+
                          //'<label for="comment"></label>'+
                            '<textarea class="form-control" rows="5" id="insumo'+cont_r+'"></textarea>'+
                            '</div>'+
                    "</td>"+
                   "<td>"+
                      '<select name="fg1" id="indicador'+cont_r+'">'+
                        '<option value="VARIABLE">VARIABLE</option>'+
                        '<option value="DIARIO">DIARIO</option>'+
                        '<option value="SEMANAL">SEMANAL</option>'+
                        '<option value="QUINCENAL">QUINCENAL</option>'+
                        '<option value="MENSUAL">MENSUAL</option>'+
                        '<option value="TRIMESTRAL">TRIMESTRAL</option>'+
                        '<option value="SEMESTRAL">SEMESTRAL</option>'+
                        '<option value="ANUAL">ANUAL</option>'+
                       "</select>"+
                    "</td>"+
                    "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_relacion('+cont_r+')">Guardar</button>'+"</td>"+
                    
                  "</tr>");//*/
    cont_r++;
  }


  function AgregaRelacion2(){
    //alert("Entre");
     $("#cuerporelaciones2").append(

                  "<tr>"+
                    "<td>"+'<input type="text" class="form-control" id="cliente'+cont_rd+'">'+"</td>"+
                    "<td>"+'<div class="form-group">'+
                          //'<label for="comment"></label>'+
                            '<textarea class="form-control" rows="5" id="insumo'+cont_rd+'"></textarea>'+
                            '</div>'+
                    "</td>"+
                   "<td>"+
                      '<select name="fg1" id="indicador'+cont_rd+'">'+
                        '<option value="VARIABLE">VARIABLE</option>'+
                        '<option value="DIARIO">DIARIO</option>'+
                        '<option value="SEMANAL">SEMANAL</option>'+
                        '<option value="QUINCENAL">QUINCENAL</option>'+
                        '<option value="MENSUAL">MENSUAL</option>'+
                        '<option value="TRIMESTRAL">TRIMESTRAL</option>'+
                        '<option value="SEMESTRAL">SEMESTRAL</option>'+
                        '<option value="ANUAL">ANUAL</option>'+
                       "</select>"+
                    "</td>"+

                    "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_relacion2('+cont_rd+')">Guardar</button>'+"</td>"+
                    
                  "</tr>");//*/
     cont_rd++;
  }
//function


/*
function guardar_CompetenciasT(tmp_cont_cT){
    //alert("Entre");
     //console.log("entre a la funcion guardar actividades");
   //  console.log(tmp_cont_rel);

        var competenciat = $("#CompetenciaT"+tmp_cont_cT).val();
        var indicador = $("#indicador"+tmp_cont_cT).val(); 
       console.log(competenciaT);
        console.log(indicador);
        console.log(id_des);
        var dataForm = new FormData();
            dataForm.append('competenciaT',competenciaT);;
            dataForm.append('indicador',indicador);
            dataForm.append('id_des',id_des);

            if (competenciag!="") {
          $.ajax({
                    url :'/descripcion/guardar_CompetenciasT',
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
                       //Codigo en caso de que la visita haya sido correcta
                       swal("", "Información almacenada correctamente", "success");
                    },
                    error : function(xhr, status) {
                      $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
                      $("#modalMensaje").modal();
                      $('#btnCancelar').prop('disabled', false);
                    },
                    complete : function(xhr, status){
                       $("#modalCarga").modal('hide');
                    }
                  });

          }else {
            alert("no tiene actividad");
          }
}
//*/

/*function guardar_CompetenciasG(tmp_cont_cg){
    //alert("Entre");
     //console.log("entre a la funcion guardar actividades");
   //  console.log(tmp_cont_rel);

        var competenciag = $("#CompetenciaG"+tmp_cont_cg).val();
        var indicador = $("#indicador"+tmp_cont_cg).val(); 
       console.log(competenciag);
        console.log(indicador);
        console.log(id_des);
        var dataForm = new FormData();
            dataForm.append('competenciag',competenciag);;
            dataForm.append('indicador',indicador);
            dataForm.append('id_des',id_des);

            if (competenciag!="") {
          $.ajax({

            
                    url :'/descripcion/guardar_CompetenciasG',
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
                       //Codigo en caso de que la visita haya sido correcta
                       swal("", "Información almacenada correctamente", "success");
                    },
                    error : function(xhr, status) {
                      $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
                      $("#modalMensaje").modal();
                      $('#btnCancelar').prop('disabled', false);
                    },
                    complete : function(xhr, status){
                       $("#modalCarga").modal('hide');
                    }
                  });

          }else {
            alert("no tiene actividad");
          }
}//*/


function guardar_relacion(tmp_cont_rel){
    //alert("Entre");
     //console.log("entre a la funcion guardar actividades");
   //  console.log(tmp_cont_rel);

        var relacion = $("#Proveedor"+tmp_cont_rel).val(); 
        var insumo = $("#insumo"+tmp_cont_rel).val();
        var indicador = $("#indicador"+tmp_cont_rel).val(); 
       console.log(relacion);
        console.log(insumo);
        console.log(indicador);
        console.log(id_des);
        var dataForm = new FormData();
            dataForm.append('relacion',relacion);
            dataForm.append('insumo', insumo);
            dataForm.append('indicador',indicador);
            dataForm.append('id_des',id_des);

            if (relacion!="") {
          $.ajax({
                    url :'/descripcion/guardar_relacion',
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
                       //Codigo en caso de que la visita haya sido correcta
                       swal("", "Información almacenada correctamente", "success");
                    },
                    error : function(xhr, status) {
                      $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
                      $("#modalMensaje").modal();
                      $('#btnCancelar').prop('disabled', false);
                    },
                    complete : function(xhr, status){
                       $("#modalCarga").modal('hide');
                    }
                  });

          }else {
            alert("no tiene actividad");
          }//*/
}


function guardar_relacion2(tmp_cont_reld){
        var relacion = $("#cliente"+tmp_cont_reld).val(); 
        var insumo = $("#insumo"+tmp_cont_reld).val();
        var indicador = $("#indicador"+tmp_cont_reld).val(); 
       console.log(relacion);
        console.log(insumo);
        console.log(indicador);
        console.log(id_des);
        var dataForm = new FormData();
            dataForm.append('relacion',relacion);
            dataForm.append('insumo', insumo);
            dataForm.append('indicador',indicador);
            dataForm.append('id_des',id_des);

  if (relacion!="") {
        $.ajax({
                  url :'/descripcion/guardar_relacion2',
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

                type: 'POST',
                dataType : 'json',
                beforeSend: function (){
                  $("#modalCarga").modal();
                },
                success : function(json){
                   //Codigo en caso de que la visita haya sido correcta
                   swal("", "Información almacenada correctamente", "success");
                },
                error : function(xhr, status) {
                  $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
                  $("#modalMensaje").modal();
                  $('#btnCancelar').prop('disabled', false);
                },
                complete : function(xhr, status){
                   $("#modalCarga").modal('hide');
                }
              });

      }else {
        alert("no tiene actividad");
      } 


}



function guardar_Actividades(tmp_cont_actG,elemento){
  //alert(tmp_cont_actG);
  //console.log("entre a la funcion guardar actividades");
  var Actividad = $("#actividadPrin"+tmp_cont_actG).val();
  var indicador = $("#indicador"+tmp_cont_actG).val();
  //console.log(Actividad);
  //console.log(id_des);
  //console.log(indicador);
  var dataForm = new FormData();
  dataForm.append('Actividad',Actividad);
  dataForm.append('indicador',indicador);
  dataForm.append('id_des',id_des);

  if (Actividad!="") {
  $.ajax({
    url :'/descripcion/guardar_Actividades',
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
      //Codigo en caso de que la visita haya sido correcta
      $(elemento).attr('onclick','actualizar_ActividadGral('+json['id_act_gral']+','+tmp_cont_actG+')');
      $(elemento).text('Actualizar');
      swal("", "Información almacenada correctamente", "success");

    },
    error : function(xhr, status) {
      $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
      $("#modalMensaje").modal();
      $('#btnCancelar').prop('disabled', false);
    },
    complete : function(xhr, status){
       $("#modalCarga").modal('hide');
    }
  });//*/

  }else {
    alert("no tiene actividad");
  }  
} 

function guardar_ActividadesE(tmp_cont_actE,elemento){
 //alert("Entre");
  console.log("entre a la funcion guardar actividades específica");
    var ActividadE = $("#ActividadEspecifica"+tmp_cont_actE).val();
    //console.log(ActividadE);
    //console.log(id_des);
    var dataForm = new FormData();
//<<<<<<< HEAD
    dataForm.append('ActividadE',ActividadE);
    dataForm.append('id_des',id_des);

    if (ActividadE!="") {
    $.ajax({
      url :'/descripcion/guardar_ActividadesEspecifica',
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
        //Codigo en caso de que la visita haya sido correcta
        $(elemento).attr('onclick','actualizar_ActividadEsp('+json['id_act_esp']+','+tmp_cont_actE+')');
        $(elemento).text('Actualizar');//*/
        swal("", "Información almacenada correctamente", "success");
      },
      error : function(xhr, status) {
        $("#textoModalMensaje").text('Existió un problema al guardar la actividades');
        $("#modalMensaje").modal();
        $('#btnCancelar').prop('disabled', false);
      },
      complete : function(xhr, status){
         $("#modalCarga").modal('hide');
      }
    });//*/
    }else {
      alert("no tiene actividad");
    }  
  }

  function actualizar_ActividadEsp(id_act_esp,tmp_cont_actE){
    //alert(tmp_cont_actE);
    //console.log("entre a la funcion guardar actividades");
    var success;
    var url = "/descripcion/actualiza_actesp"
    var Actividad = $("#ActividadEspecifica"+tmp_cont_actE).val();
    var dataForm = new FormData();
    dataForm.append('Actividad',Actividad);
    dataForm.append('id_act_esp',id_act_esp);
    //console.log(Actividad);
    //console.log(id_act_esp);
    metodoAjax(url,dataForm,function(success){
      if(success['update']==1){
        swal("", "Actualizado correctamente", "success");
      }else{
        swal("", "Actualización incorrecta", "error");
      }

    });//*/

  }

    function guardar_proposito(){
      //alert("Entre");
    var Proposito = $("#Proposito").val();
    //console.log(Proposito);
    //console.log(id_des);
    var dataForm = new FormData();
    dataForm.append('Proposito',Proposito);
    dataForm.append('id_des',id_des);
    if (Proposito!="") {
      $.ajax({
        url :'/descripcion/guarda_proposito',
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
           //Codigo en caso de que la visita haya sido correcta
          swal("", "Información almacenada correctamente", "success");
        },
        error : function(xhr, status) {
          swal("¡Error!", "Existió un problema con el servidor!", "error");
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });
    }else {
      swal("¡Atención!", "El campo Próposito General está vacío", "warning");
    }  //*/
  }


 function guardar_formacion(){
      //alert("Entre");
   // var Proposito = $("#Proposito").val();
   var formacion = $("#formacion").val();
   var area = $("#area").val();
   var años_ex= $("#años_ex").val();
  /*console.log(formacion);
   console.log(area);
   console.log(años_ex);
   console.log(id_des);*/
   /*'var dataForm = new FormData();
    dataForm.append('Proposito',Proposito);
    dataForm.append('formacion',formacion);
    dataForm.append('area',area);
    dataForm.append('años_ex',años_ex);
    dataForm.append('id_des',id_des);
    if (formacion!="") {
      $.ajax({
        url :'/descripcion/guardar_formacion',
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
           //Codigo en caso de que la visita haya sido correcta
          swal("", "Información almacenada correctamente", "success");
        },
        error : function(xhr, status) {
          swal("¡Error!", "Existió un problema con el servidor!", "error");
          $('#btnCancelar').prop('disabled', false);
        },
        complete : function(xhr, status){
           $("#modalCarga").modal('hide');
        }
      });
    }else {
      swal("¡Atención!", "El campo Próposito General está vacío", "warning");
    }  //*/
  }



    function algo(){
      alert("Entre");
      
      var success;
      var url = "/archivos/subir"
      var dataForm = new FormData();
      dataForm.append('archivo',"p1");
      dataForm.append('archivo',"p2");
      metodoAjax(url,dataForm,function(success){


      });//*/
    }



</script>

@endsection

