<?php
  //dd($descripcion['DATOS']->NOM_DESC);
  //dd($descripcion);
?>
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
                          <br/>
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Puesto: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_nombre_puesto" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->NOM_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reporta a: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_reporta_a" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->REPORTA_A_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_area_desc" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->AREA_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_direccion" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->DIRECCION_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Clave de Puesto:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_clave" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->CLAVE_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de crecaión:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_creacion" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->CREACION_DESC}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha de revisión:</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_frevision" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{(($descripcion['DATOS']->REVISION_DESC)?$descripcion['DATOS']->REVISION_DESC:'')}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N°. de Revisión: </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="infg_nrevision" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{$descripcion['DATOS']->N_REVISION_DESC}}">
                              </div>
                            </div>

                            <div class="ln_solid"></div>


                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Propósito General del Puesto 
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="left" title="Proposito General" data-content="Indicar la razón u objetivo principal del puesto, es decir, el tipo de necesidad que cubre y para qué fue creado o resulta necesario, enunciarlo preferentemente con verbos en infinitivo y responder: ¿qué hace?, ¿Cómo lo hace o por medio de qué lo hace? y ¿para qué lo hace?, es importante utilizar las palabras adecuadas al nivel que ocupa en puesto dentro del organigrama, según su grado de responsabilidad, (ejemplo: coordinar y gestionar…).">
                                </i>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                @if($descripcion['PROPOSITO_GENERAL'])
                                  @if($descripcion['PROPOSITO_GENERAL']->ESTATUS_PROPOSITO_GENERAL==0)
                                    <textarea class="form-control" rows="3" placeholder="" id="Proposito">{{$descripcion['PROPOSITO_GENERAL']->PROPOSITO_GENERAL}}</textarea>
                                  @else
                                    <textarea class="form-control" rows="3" placeholder="" id="Proposito"  disabled="disabled">{{$descripcion['PROPOSITO_GENERAL']->PROPOSITO_GENERAL}}</textarea>
                                  @endif
                                @else
                                    <textarea class="form-control" rows="3" placeholder="" id="Proposito"></textarea>
                                @endif
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
                      <p class="lead">Actividades Principales y Especificas  <i class="fa fa-question-circle" data-toggle="popover" data-placement="right" title="Actividades Principales y Especificas" data-content="Enunciar las actividades secundarias (no obligatorias) que existan para el puesto y que no influyen en el logro de su objetivo; de incluirlas, enunciarlas con verbos en infinitivo (ejemplo: proporcionar, elaborar, mantener, gestionar, etc.). Incluir en las actividades generales la siguiente: realizar las funciones específicas del puesto que se requieran en la Unidad Académica o Dependencia Administrativa asignadas por el/a jefe/a inmediato/a."></i>
                      </p>
          

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
                        <tbody id="cuerpoTablaprincipales">
                          <!--{{$i=1}}-->
                          @foreach($descripcion['ACTIVIDADES_GRLES'] as $actividad)
                          <!-- {{$disabled = ((strcmp($actividad->ESTATUS_ACTIVIDAD,'0')==0)?'':'disabled')}} -->
                            <tr>
                              <td>{{$i}}</td>
                              <td>
                                <textarea class="form-control" rows="5" id="actividadPrin{{$i}}" {{$disabled}}>{{$actividad->NOMBRE_ACTIVIDAD}}</textarea>
                              </td>
                              <td>
                                <textarea class="form-control" rows="5" id="indicador{{$i}}" {{$disabled}}>{{$actividad->INDICADOR_ACTIVIDAD}}</textarea>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="actualizar_ActividadGral({{$actividad->ID_ACT_GRAL}},{{$i}})" {{$disabled}}>Actualizar</button>
                              </td>
                            </tr>
                            <!--{{$i++}}-->
                          @endforeach
                        </tbody>
                      </table>
                      <button onclick="AgregaActividad()">Agregar</button>
                        <!--  <button class="btn btn-primary" type="button" onclick="guardar_Actividades()">Guardar</button>-->
                      <hr>
                      <table id="tablaespecificas" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>N°</th>
                            <th>
                              Principales Actividades Especificas (No Obligatorias)
                              <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Principales Actividades Especificas" data-content="Enunciar las actividades secundarias (no obligatorias) que existan para el puesto y que no influyen en el logro de su objetivo; de incluirlas, enunciarlas con verbos en infinitivo (ejemplo: proporcionar, elaborar, mantener, gestionar, etc.). Incluir en las actividades generales la siguiente: realizar las funciones específicas del puesto que se requieran en la Unidad Académica o Dependencia Administrativa asignadas por el/a jefe/a inmediato/a."></i>
                            </th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpoTablaespecificas">
                          <!--{{$i=1}}-->
                          @foreach($descripcion['ACTIVIDADES_ESPECIFICAS'] as $actividad)
                            <!--{{$disabled = ((strcmp($actividad->ESTATUS_ACTIVIDAD,'0')==0)?'':'disabled')}}-->
                            <tr>
                              <td>
                                {{$i}}
                              </td>
                              <td>
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" id="ActividadEspecifica{{$i}}">{{$actividad->NOMBRE_ACTIVIDAD}}</textarea>
                                </div>
                              </td>
                              <td>
                                <button  class="btn btn-primary" type="button" onclick="actualizar_ActividadEsp({{$actividad->ID_ACT_ESP}},{{$i}})">Actualizar</button>
                              </td>
                            </tr>
                            <!--{{$i++}}-->
                          @endforeach
                        </tbody>
                      </table>
                        <button onclick="ActividadEspecifica()">Agregar Actividad</button>
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
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="cuerporelaciones">
                          <!-- {{$i=1}} -->
                          @foreach($descripcion['PUESTOS_PROVEEDORES'] as $puesto)
                            <!-- {{$disabled = ((strcmp($puesto->ESTATUS_PROVEEDOR,'0')==0)?'':'disabled')}} -->
                            <tr>
                              <td><input type="text" id="Proveedor{{$i}}" value="{{$puesto->DESCRIPCION_PROVEEDOR}}" class="form-control col-md-12 col-xs-12"></td>
                              <td>
                                  <textarea class="form-control" id="insumo{{$i}}">{{$puesto->INSUMO_PROVEEDOR}}</textarea>
                              </td>
                              <td>
                                <select class="form-control" id="frecuenciaPP{{$i}}">
                                  <option value="VARIABLE" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'VARIABLE')==0)?'SELECTED':'')}}>VARIABLE</option>
                                  <option value="DIARIO" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'DIARIO')==0)?'SELECTED':'')}}>DIARIO</option>
                                  <option value="SEMANAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'SEMANAL')==0)?'SELECTED':'')}}>SEMANAL</option>
                                  <option value="QUINCENAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'QUINCENAL')==0)?'SELECTED':'')}}>QUINCENAL</option>
                                  <option value="MENSUAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'MENSUAL')==0)?'SELECTED':'')}}>MENSUAL</option>
                                  <option value="TRIMESTRAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'TRIMESTRAL')==0)?'SELECTED':'')}}>TRIMESTRAL</option>
                                  <option value="SEMESTRAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'SEMESTRAL')==0)?'SELECTED':'')}}>SEMESTRAL</option>
                                  <option value="ANUAL" {{((strcmp($puesto->FRECUENCIA_PROVEEDOR,'ANUAL')==0)?'SELECTED':'')}}>ANUAL</option>
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="actualizar_pp({{$puesto->ID_PUESTO_PROVEEDOR}},{{$i}})">Actualizar</button>
                              </td>
                            </tr>
                            <!-- {{$i++}} -->
                          @endforeach
                        </tbody>
                      </table>
                      <button onclick="AgregaRelacion()">Agregar Relacion </button>
                      <hr>
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
                            <th>
                              Frecuencia
                              <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Frecuencia" data-content="Determinar  cada  cuándo se entregan productos, servicios o entregables por parte del puesto; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable.">
                              </i>
                            </th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="cuerporelaciones2">
                          <!-- {{$i=1}} -->
                          @foreach($descripcion['PUESTOS_CLIENTES'] as $puesto)
                            <!-- {{$disabled = ((strcmp($puesto->ESTATUS_CLIENTE,'0')==0)?'':'disabled')}} -->
                            <tr>
                              <td><input type="text" id="cliente{{$i}}" value="{{$puesto->DESCRIPCION_CLIENTE}}" class="form-control col-md-12 col-xs-12"></td>
                              <td>
                                  <textarea class="form-control" id="productoCliente{{$i}}">{{$puesto->PRODUCTO_CLIENTE}}</textarea>
                              </td>
                              <td>
                                <select class="form-control" id="frecuenciaPC{{$i}}">
                                  <option value="VARIABLE" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'VARIABLE')==0)?'SELECTED':'')}}>VARIABLE</option>
                                  <option value="DIARIO" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'DIARIO')==0)?'SELECTED':'')}}>DIARIO</option>
                                  <option value="SEMANAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'SEMANAL')==0)?'SELECTED':'')}}>SEMANAL</option>
                                  <option value="QUINCENAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'QUINCENAL')==0)?'SELECTED':'')}}>QUINCENAL</option>
                                  <option value="MENSUAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'MENSUAL')==0)?'SELECTED':'')}}>MENSUAL</option>
                                  <option value="TRIMESTRAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'TRIMESTRAL')==0)?'SELECTED':'')}}>TRIMESTRAL</option>
                                  <option value="SEMESTRAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'SEMESTRAL')==0)?'SELECTED':'')}}>SEMESTRAL</option>
                                  <option value="ANUAL" {{((strcmp($puesto->FRECUENCIA_CLIENTE,'ANUAL')==0)?'SELECTED':'')}}>ANUAL</option>
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="actualizar_pc({{$puesto->ID_PUESTO_CLIENTE}},{{$i}})">Actualizar</button>
                              </td>
                            </tr>
                            <!-- {{$i++}} -->

                          @endforeach
                        </tbody>
                      </table>
                      <button onclick="AgregaRelacion2()">Agregar Relacion </button>
                    </div>
                    <div class="tab-pane" id="Perfil">
                      <p class="lead">Formación Profesional y Experiencia <i class="fa fa-question-circle" data-toggle="popover" title="Formación Profesional y Experiencia" data-content="Indicar el grado académico mínimo requerido para ocupar el puesto, así como  la experiencia en un área específica de conocimiento, si es que ésta se requiere."></i></p>
                      <i class="fas fa-comment-lines"></i>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                          <div class="col-md-8 col-sm-8 col-xs-10">
                            <select id="selectArea" class="form-control" onchange="llenaProfesiones()" required>
                              <option value="false">--SELECCIONAR--</option>
                              @foreach($descripcion['CAT_AREAS'] as $area)
                                <option value="{{$area->CAT_AREAS_ID}}">{{$area->CAT_AREAS_AREA}}</option>
                              @endforeach
                              <option value="otro">OTRO</option>
                            </select>
                            
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                              Formación Profesional:
                          </label>
                          <div class="col-md-8 col-sm-8 col-xs-10" id="divOpcionProfesiones">
                            <select id="SetelctProfesiones" class="form-control">
                              <option value="false">--SELECCIONAR--</option>
                            </select>
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Formación Profesional" data-content="Determinar  cada  cuándo se entregan productos, servicios o entregables por parte del puesto; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable."></i>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Años de experiencia Laboral: </label>
                          <div class="col-md-8 col-sm-8 col-xs-10">

                            <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="anios_experiencia">

                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Años de experiencia Laboral" data-content="Tiempo mínimo de la misma (ejemplo: Experiencia en reclutamiento y selección de personal, 2 años)."></i>
                        </div>
                        <div class="form-group">
                          <div class="col-md-11 col-sm-11 col-xs-12">
                            <button class="btn btn-primary pull-right" type="button" onclick="guardar_formacion()">Guardar</button>
                          </div>
                        </div>
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
                            <th colspan="3" align="center"><strong>Genéricas</strong>  
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
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="tablacompetenciasG"></tbody>
                      </table>
                      <button onclick="AgregarCompetenciaGenericas()">Agregar</button>
                      <hr>

                      <table id="tablaprincipales" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th colspan="3" align="center">
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
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="tablacompetenciasT"></tbody>
                      </table>
                      <button onclick="AgregarCompetenciaTecnicas()">Agregar</button>
                      <hr>
                      <form>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Idioma:</label>
                          <div class="col-md-8 col-sm-8 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="idioma">
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                        </div>
                        <br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Computacion:</label>
                          <div class="col-md-8 col-sm-8 col-xs-10">
                            <input type="text" required="required" class="form-control col-md-3 col-xs-12" id="computacion">
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="col-md-11 col-sm-11 col-xs-12">
                            <button class="btn btn-primary pull-right" type="button" onclick="guardar_formacion2()">Guardar</button>
                          </div>
                        </div>
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
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpoListaDistribucion"></tbody>
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
 
  //var cont_actG=1;
  //var con_CG=1;
  //var con_CT=1;
  //var cont_AE=1;

  var cont_actG=1;
  var con_CG=1;
  var con_CT=1;
  var cont_AE=1;
  var cont_r=1;
  var cont_rd=1;
  var con_D = 1;
  function llenado(){
    //parte principal
    $("#nombre_descripcion").text(json_descripcion['DATOS']['NOM_DESC']);
    cont_actG = ($("#cuerpoTablaprincipales tr").length)+1;
    //alert("Total de act. principales: "+cont_actG);
    cont_AE = ($("#cuerpoTablaespecificas tr").length)+1;
    cont_r = ($("#cuerporelaciones tr").length)+1;
    cont_rd = ($("#cuerporelaciones2 tr").length)+1;
    //alert("Total de act. especificas: "+cont_AE);
    console.log("Total de act. principales: "+(cont_actG-1))
    console.log("Total de act. especificas: "+(cont_AE-1))
    console.log("Total de puestos proov.: "+(cont_r-1))
    console.log("Total de puestos clientes.: "+(cont_rd-1))
  }



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

  function llenaProfesiones(){
    var area = $("#selectArea").val();
    console.log(area);
    if(area == 'otro' && area != 'false'){
      console.log("OTRO");
      $("#divOpcionProfesiones").html(

          'INPUT AQUI'

        );

    }else if(area == 'false'){
      console.log("SELECCIONAR")
    }else{
      //console.log("AREA");

      var profesiones = json_descripcion['CAT_PROFESIONES'][area];
      //primero creamos el select en caso de que haya un input
      $("#divOpcionProfesiones").html(
        '<select id="SetelctProfesiones" class="form-control">'+
          '<option value="false">--SELECCIONAR--</option>'+
        '</select>'
      );
      //console.log(json_descripcion['CAT_PROFESIONES'][area]);
      //console.log(profesiones);
      for(var i = 0; i < profesiones.length; i++){
        //console.log(profesiones[i]['PROFESION']);
        $("#SetelctProfesiones").append(
          '<option value="'+profesiones[i]['ID_PROFESION']+'">'+
            profesiones[i]['PROFESION']+
          '</option>'
        );//*/
      }
    }
  }

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
   $("#cuerpoListaDistribucion").append(
      "<tr>"+
        "<td id='nombre_"+con_D+"'>"+
          con_D+
        "</td>"+
        "<td>"+
          //'<textarea class="form-control" rows="5" id="distribucion'+con_D+'"></textarea>'+
          '<select class="form-control" id="distribucion_'+con_D+'">'+
            '<option value="I">I</option>'+
            '<option value="II">II</option>'+
            '<option value="III">III</option>'+
            '<option value="IV">IV</option>'+
          "</select>"+
        "<td>"+
          '<button class="btn btn-primary" type="button" onclick="guarda_distribucion('+con_D+')">Guardar</button>'+
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
          "<td>"+
            '<input type="text" class="form-control col-md-12 col-xs-12" id="CompetenciaG'+con_CG+'">'+
          "</td>"+
          "<td>"+
            '<select class="form-control" id="indicador'+con_CG+'">'+
              '<option value="I">I</option>'+
              '<option value="II">II</option>'+
              '<option value="III">III</option>'+
              '<option value="IV">IV</option>'+
            "</select>"+
          "</td>"+
          "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasG('+con_CG+')">Guardar</button>'+"</td>"+
          "</tr>");
    con_CG++;//*/
  }

  function AgregarCompetenciaTecnicas(){
  //alert("Competencia Técnicas");
    $("#tablacompetenciasT").append(
      "<tr>"+
        "<td>"+
          '<input name="cog1" type="text" class="form-control col-md-3 col-xs-12" id="CompetenciaT'+con_CT+'">'+
        "</td>"+
        "<td>"+ 
          '<select class="form-control" id="indicador'+con_CT+'">'+
            '<option value="Básico">Basico</option>'+
            '<option value="Medio">Medio </option>'+
            '<option value="Avanzado">Avanzado</option>'+
           "</select>"+"</td>"+
        "<td>"+
          '<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasT('+con_CT+')">Guardar</button>'+
        "</td>"+
      "</tr>"
    );//*/
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
  
  //Puestos que son proveedores, llenado dinamico
  function AgregaRelacion(){
    $("#cuerporelaciones").append(

      "<tr>"+
        "<td>"+'<input type="text" id="Proveedor'+cont_r+'" class="form-control col-md-12 col-xs-12">'+"</td>"+
        "<td>"+
          '<div class="form-group">'+
            '<textarea class="form-control" rows="5" id="insumo'+cont_r+'"></textarea>'+
          '</div>'+
        "</td>"+
        "<td>"+
          '<select class="form-control" id="frecuenciaPP'+cont_r+'">'+
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
        "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_relacion('+cont_r+',this)">Guardar</button>'+"</td>"+
      "</tr>");//*/
      cont_r++;
    }


  function AgregaRelacion2(){
    //alert("Entre");
     $("#cuerporelaciones2").append(
      "<tr>"+
        "<td>"+'<input type="text" class="form-control" id="cliente'+cont_rd+'" class="form-control col-md-12 col-xs-12">'+"</td>"+
        "<td>"+'<div class="form-group">'+
              //'<label for="comment"></label>'+
                '<textarea class="form-control" rows="5" id="productoCliente'+cont_rd+'"></textarea>'+
                '</div>'+
        "</td>"+
       "<td>"+
          '<select class="form-control" id="frecuenciaPC'+cont_rd+'">'+
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

        "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_relacion2('+cont_rd+',this)">Guardar</button>'+"</td>"+
        
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

//almacenar los puestos que son proveedores
function guardar_relacion(tmp_cont_rel,elemento){
    //alert("Entre");
     //console.log("entre a la funcion guardar actividades");
   //  console.log(tmp_cont_rel);

  var relacion = $("#Proveedor"+tmp_cont_rel).val(); 
  var insumo = $("#insumo"+tmp_cont_rel).val();
  var frecuencia = $("#frecuenciaPP"+tmp_cont_rel).val(); 
  console.log(relacion);
  console.log(insumo);
  console.log(frecuencia);
  //console.log(id_des);
  var dataForm = new FormData();
  dataForm.append('Proveedor',relacion);
  dataForm.append('insumo', insumo);
  dataForm.append('frecuencia',frecuencia);
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
        $(elemento).attr('onclick','actualizar_pp('+json['id_puesto']+','+tmp_cont_rel+')');
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
  }//*/
}

  //actualizar puestos que son proveedores
  function actualizar_pp(id_puesto_proov,i){
    var puesto = $("#Proveedor"+i).val();
    var insumo = $("#insumo"+i).val();
    var frecuencia = $("#frecuenciaPP"+i).val();
    console.log("ID_PUESTO: "+id_puesto_proov);
    console.log("RENGLON: "+i);
    console.log(puesto);
    console.log(insumo);
    console.log(frecuencia);
    //alert("Entre");
    
    var success;
    var url = "/descripcion/actualiza_prov"
    var dataForm = new FormData();
    dataForm.append('id_puesto_prov',id_puesto_proov);
    dataForm.append('puesto',puesto);
    dataForm.append('insumo',insumo);
    dataForm.append('frecuencia',frecuencia);
    metodoAjax(url,dataForm,function(success){
      if(success['update']==1){
        swal("", "Actualizado correctamente", "success");
      }else{
        swal("", "Actualización incorrecta", "error");
      }

    });//*/ 

  }


  function guardar_relacion2(tmp_cont_reld,elemento){
    var puesto = $("#cliente"+tmp_cont_reld).val();
    var producto = $("#productoCliente"+tmp_cont_reld).val();
    var frecuencia = $("#frecuenciaPC"+tmp_cont_reld).val();
    console.log("Puesto"+puesto);
    console.log("Producto"+producto);
    console.log("Frecuencia"+frecuencia);
    console.log("Descripcion"+id_des);
    var dataForm = new FormData();
    dataForm.append('puesto',puesto);
    dataForm.append('producto', producto);
    dataForm.append('frecuencia',frecuencia);
    dataForm.append('id_des',id_des);

    if (puesto!="") {
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
        $(elemento).attr('onclick','actualizar_pc('+json['id_puesto']+','+tmp_cont_reld+')');
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

  function actualizar_pc(id_puesto_cliente,i){
    var puesto = $("#cliente"+i).val();
    var producto = $("#productoCliente"+i).val();
    var frecuencia = $("#frecuenciaPC"+i).val();
    var success;
    var url = "/descripcion/actualiza_cliente";
    var dataForm = new FormData();
    dataForm.append('puesto',puesto);
    dataForm.append('producto',producto);
    dataForm.append('frecuencia',frecuencia);
    dataForm.append('id_puesto_cliente',id_puesto_cliente);
    metodoAjax(url,dataForm,function(success){
      if(success['update']==1){
        swal("", "Actualizado correctamente", "success");
      }else{
        swal("", "Actualización incorrecta", "error");
      }


    });//*/
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
    console.log(formacion);
    console.log(area);
    console.log(años_ex);
        
    /*var success;
    var url = "/descripcion/guarda_formacion"
    var dataForm = new FormData();
    dataForm.append('archivo',"p1");
    dataForm.append('archivo',"p2");
    metodoAjax(url,dataForm,function(success){

    });//*/


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

