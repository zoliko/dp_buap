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
                                @if(isset($descripcion['PROPOSITO_GENERAL']->MENSAJE_PROPOSITO_GENERAL) && strcmp($descripcion['PROPOSITO_GENERAL']->ESTATUS_PROPOSITO_GENERAL,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$descripcion['PROPOSITO_GENERAL']->MENSAJE_PROPOSITO_GENERAL}}" style="color: red;"></i>
                                @endif
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
                              <td>
                                {{$i}}
                                @if($actividad->MENSAJE_ACTIVIDAD && strcmp($actividad->ESTATUS_ACTIVIDAD,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$actividad->MENSAJE_ACTIVIDAD}}" style="color: red;"></i>
                                @endif
                              </td>
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
                                @if($actividad->MENSAJE_ACTIVIDAD && strcmp($actividad->ESTATUS_ACTIVIDAD,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$actividad->MENSAJE_ACTIVIDAD}}" style="color: red;"></i>
                                @endif
                              </td>
                              <td>
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" id="ActividadEspecifica{{$i}}" {{$disabled}}>{{$actividad->NOMBRE_ACTIVIDAD}}</textarea>
                                </div>
                              </td>
                              <td>
                                <button  class="btn btn-primary" type="button" onclick="actualizar_ActividadEsp({{$actividad->ID_ACT_ESP}},{{$i}})" {{$disabled}}>Actualizar</button>
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
                              <td><input type="text" id="Proveedor{{$i}}" value="{{$puesto->DESCRIPCION_PROVEEDOR}}" class="form-control col-md-12 col-xs-12" {{$disabled}}></td>
                              <td>
                                  <textarea class="form-control" id="insumo{{$i}}" {{$disabled}}>{{$puesto->INSUMO_PROVEEDOR}}</textarea>
                              </td>
                              <td>
                                <select class="form-control" id="frecuenciaPP{{$i}}" {{$disabled}}>
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
                                <button class="btn btn-primary" type="button" onclick="actualizar_pp({{$puesto->ID_PUESTO_PROVEEDOR}},{{$i}})" {{$disabled}}>Actualizar</button>

                                @if($puesto->MENSAJE_PROVEEDOR && strcmp($puesto->ESTATUS_PROVEEDOR,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$puesto->MENSAJE_PROVEEDOR}}" style="color: red;"></i>
                                @endif
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
                              <td>
                                <input type="text" id="cliente{{$i}}" value="{{$puesto->DESCRIPCION_CLIENTE}}" class="form-control col-md-12 col-xs-12" {{$disabled}}>
                              </td>
                              <td>
                                  <textarea class="form-control" id="productoCliente{{$i}}" {{$disabled}}>{{$puesto->PRODUCTO_CLIENTE}}</textarea>
                              </td>
                              <td>
                                <select class="form-control" id="frecuenciaPC{{$i}}" {{$disabled}}>
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
                                <button class="btn btn-primary" type="button" onclick="actualizar_pc({{$puesto->ID_PUESTO_CLIENTE}},{{$i}})" {{$disabled}}>Actualizar</button>

                                @if($puesto->MENSAJE_CLIENTE && strcmp($puesto->ESTATUS_CLIENTE,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$puesto->MENSAJE_CLIENTE}}" style="color: red;"></i>
                                @endif
                              </td>
                            </tr>
                            <!-- {{$i++}} -->

                          @endforeach
                        </tbody>
                      </table>
                      <button onclick="AgregaRelacion2()">Agregar Relacion </button>
                    </div>
                    <div class="tab-pane" id="Perfil">
                      <p class="lead">Formación Profesional y Experiencia 
                        <i class="fa fa-question-circle" data-toggle="popover" title="Formación Profesional y Experiencia" data-content="Indicar el grado académico mínimo requerido para ocupar el puesto, así como  la experiencia en un área específica de conocimiento, si es que ésta se requiere."></i>
                        @if(isset($descripcion['FORMACION_PROFESIONAL']->MENSAJE_PROFESION) && strcmp($descripcion['FORMACION_PROFESIONAL']->STATUS_PROFESION,'0')==0)
                          <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$descripcion['FORMACION_PROFESIONAL']->MENSAJE_PROFESION}}" style="color: red;"></i>
                        @endif
                      </p>
                      <i class="fas fa-comment-lines"></i>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área: </label>
                          <div class="col-md-8 col-sm-8 col-xs-10">
                            <!-- {{$disabled = ''}}-->
                            @if($descripcion['FORMACION_PROFESIONAL'])
                              <!--{{$disabled = ((strcmp($descripcion['FORMACION_PROFESIONAL']->STATUS_PROFESION,'0')==0)?'':'disabled')}}-->
                            @endif
                            <select id="selectArea" class="form-control" onchange="llenaProfesiones()" required {{$disabled}}>
                              <option value="false">--SELECCIONAR--</option>
                              @foreach($descripcion['CAT_AREAS'] as $area)
                                @if($descripcion['FORMACION_PROFESIONAL'])
                                  @if(strcmp($area->CAT_AREAS_ID,$descripcion['FORMACION_PROFESIONAL']->AREA_PROFESION)==0)
                                    <option value="{{$area->CAT_AREAS_ID}}" selected>{{$area->CAT_AREAS_AREA}}</option>
                                  @else
                                    <option value="{{$area->CAT_AREAS_ID}}">{{$area->CAT_AREAS_AREA}}</option>
                                  @endif
                                @else
                                  <option value="{{$area->CAT_AREAS_ID}}">{{$area->CAT_AREAS_AREA}}</option>
                                @endif
                              @endforeach
                              @if($descripcion['FORMACION_PROFESIONAL'])
                                <option value="otro" {{(($descripcion['FORMACION_PROFESIONAL']->AREA_PROFESION)?'':'SELECTED')}}>OTRO</option>
                              @else
                                <option value="otro">OTRO</option>
                              @endif
                            </select>
                            
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                              Formación Profesional:
                          </label>
                          <div class="col-md-8 col-sm-8 col-xs-10" id="divOpcionProfesiones">
                            @if($descripcion['FORMACION_PROFESIONAL'])
                              @if($descripcion['FORMACION_PROFESIONAL']->AREA_PROFESION)
                                <select id="SetelctProfesiones" class="form-control" {{$disabled}}>
                                  <option value="false">--SELECCIONAR--</option>
                                    @foreach($descripcion['CAT_PROFESIONES'][$descripcion['FORMACION_PROFESIONAL']->AREA_PROFESION] as $profesion)
                                      @if(strcmp($profesion->ID_PROFESION,$descripcion['FORMACION_PROFESIONAL']->ID_PROFESION)==0)
                                        <option value="{{$profesion->ID_PROFESION}}" selected>{{$profesion->PROFESION}}</option>
                                      @else
                                        <option value="{{$profesion->ID_PROFESION}}">{{$profesion->PROFESION}}</option>
                                      @endif
                                    @endforeach
                                </select>
                              @else
                                <input type="text" class="form-control text-uppercase" id="InputNuevaProfesion" aria-describedby="emailHelp" placeholder="INGRESE LA PROFESIÓN" value="{{$descripcion['FORMACION_PROFESIONAL']->OTRA_PROFESION}}" {{$disabled}}>
                              @endif
                            @else
                              <select id="SetelctProfesiones" class="form-control">
                                  <option value="false">--SELECCIONAR--</option>
                              </select>
                            @endif
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Formación Profesional" data-content="Determinar  cada  cuándo se entregan productos, servicios o entregables por parte del puesto; elegir entre: diario, semanal, quincenal, mensual, trimestral, cuatrimestral, semestral, anual o si no hay un tiempo específico, colocar variable."></i>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Años de experiencia Laboral: </label>
                          <div class="col-md-8 col-sm-8 col-xs-10">
                            <input type="text" required="required" class="form-control col-md-3 col-xs-12 text-uppercase" id="anios_experiencia" value="{{(($descripcion['FORMACION_PROFESIONAL'])?$descripcion['FORMACION_PROFESIONAL']->ANIOS_EXPERIENCIA_PROFESION:'')}}" {{$disabled}}>
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Años de experiencia Laboral" data-content="Tiempo mínimo de la misma (ejemplo: Experiencia en reclutamiento y selección de personal, 2 años)."></i>
                        </div>
                        <div class="form-group">
                          <div class="col-md-11 col-sm-11 col-xs-12">
                            <button class="btn btn-primary pull-right" type="button" onclick="guardar_formacion()" {{$disabled}}>Guardar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="Competencia">
                      <p class="lead">Competencias 
                        <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Competencias" data-content="En  este apartado se definen el tipo y grado de dominio de las habilidades, destrezas, actitudes y conocimientos que requiere tener y/o desarrollar el ocupante del puesto."></i>

                      </p>
                      <!--Comptencias inicio -->

                      <table id="tablaCompGenericas" class="table table-striped table-bordered">
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
                        <tbody id="tablacompetenciasG">
                          <!--{{$i=1}}-->
                          @foreach($descripcion['COMPETENCIAS_GENERICAS'] as $competencia)
                            <!--{{$disabled = ((strcmp($competencia->ESTATUS_COMPETENCIA_GENERICA,'0')==0)?'':'disabled')}}-->
                            <tr>
                              <td>
                                <input type="text" class="form-control col-md-12 col-xs-12" id="CompetenciaG{{$i}}" value="{{$competencia->DESCRIPCION_COMPETENCIA_GENERICA}}" {{$disabled}}>
                              </td>
                              <td>
                                <select class="form-control" id="GradoDominioG{{$i}}" {{$disabled}}>
                                  <option value="I" {{((strcmp($competencia->GRADO_COMPETENCIA_GENERICA,'I')==0)?'selected':'')}}>I</option>
                                  <option value="II" {{((strcmp($competencia->GRADO_COMPETENCIA_GENERICA,'II')==0)?'selected':'')}}>II</option>
                                  <option value="III" {{((strcmp($competencia->GRADO_COMPETENCIA_GENERICA,'III')==0)?'selected':'')}}>III</option>
                                  <option value="IV" {{((strcmp($competencia->GRADO_COMPETENCIA_GENERICA,'IV')==0)?'selected':'')}}>IV</option>
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="actualizarCompGen({{$competencia->ID_COMPETENCIA_GENERICA}} ,{{$i}})" {{$disabled}}>Actualizar</button>
                                @if(isset($competencia->MENSAJE_COMPETENCIA_GENERICA) && strcmp($competencia->ESTATUS_COMPETENCIA_GENERICA,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$competencia->MENSAJE_COMPETENCIA_GENERICA}}" style="color: red;"></i>
                                @endif
                              </td>
                            </tr>
                            <!--{{$i++}}-->
                          @endforeach                        
                        </tbody>
                      </table>
                      <button onclick="AgregarCompetenciaGenericas()">Agregar</button>
                      <hr>

                      <table id="tablaCompTecnicas" class="table table-striped table-bordered">
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
                        <tbody id="tablacompetenciasT">
                          <!--{{$i=1}}-->
                          @foreach($descripcion['COMPETENCIAS_TECNICAS'] as $competencia)
                            <!--{{$disabled = ((strcmp($competencia->ESTATUS_COMPETENCIA_TECNICA,'0')==0)?'':'disabled')}}-->
                            <tr>
                              <td>
                                <input name="cog1" type="text" class="form-control col-md-3 col-xs-12" id="CompetenciaT{{$i}}" value="{{$competencia->DESCRIPCION_COMPETENCIA_TECNICA}}" {{$disabled}}>
                              </td>
                              <td>
                                <select class="form-control" id="GradoDominioT{{$i}}" {{$disabled}}>
                                  <option value="BASICO" {{((strcmp($competencia->GRADO_COMPETENCIA_TECNICA,'BASICO')==0)?'selected':'')}}>BASICO</option>
                                  <option value="MEDIO" {{((strcmp($competencia->GRADO_COMPETENCIA_TECNICA,'MEDIO')==0)?'selected':'')}}>MEDIO</option>
                                  <option value="AVANZADO" {{((strcmp($competencia->GRADO_COMPETENCIA_TECNICA,'AVANZADO')==0)?'selected':'')}}>AVANZADO</option>
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="actualizarCompTec({{$competencia->ID_COMPETENCIA_TECNICA}} ,{{$i}})" {{$disabled}}>Actualizar</button>
                                @if(isset($competencia->MENSAJE_COMPETENCIA_TECNICA) && strcmp($competencia->ESTATUS_COMPETENCIA_TECNICA,'0')==0)
                                  <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$competencia->MENSAJE_COMPETENCIA_TECNICA}}" style="color: red;"></i>
                                @endif
                              </td>
                            </tr>
                            <!--{{$i++}}-->
                          @endforeach
                        </tbody>
                      </table>
                      <button onclick="AgregarCompetenciaTecnicas()">Agregar</button>
                      <hr>
                      <div>
                        <div class="form-group">
                          <!--{{$disabled = (($descripcion['IDIOMA'])?((strcmp($descripcion['IDIOMA']->ESTATUS_IDIOMA,'0')==0)?'':'disabled'):'')}}-->
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Idioma:</label>
                          <div class="col-md-4 col-sm-4 col-xs-10">
                              <input type="text" required="required" class="form-control col-md-3 col-xs-12 text-uppercase" id="idiomaDes" {{$disabled}} value="{{(($descripcion['IDIOMA'])?$descripcion['IDIOMA']->IDIOMA:'')}}">
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-10">
                            <select class="form-control" id="selectIdioma" {{$disabled}}>
                              <option value="BASICO" {{(($descripcion['IDIOMA'])?((strcmp($descripcion['IDIOMA']->NIVEL_DOMINIO_IDIOMA,'BASICO')==0)?'SELECTED':''):'')}}>BASICO</option>
                              <option value="MEDIO" {{(($descripcion['IDIOMA'])?((strcmp($descripcion['IDIOMA']->NIVEL_DOMINIO_IDIOMA,'MEDIO')==0)?'SELECTED':''):'')}}>MEDIO</option>
                              <option value="ALTO" {{(($descripcion['IDIOMA'])?((strcmp($descripcion['IDIOMA']->NIVEL_DOMINIO_IDIOMA,'ALTO')==0)?'SELECTED':''):'')}}>ALTO</option>
                            </select>
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                          @if(isset($descripcion['IDIOMA']->MENSAJE_IDIOMA) && strcmp($descripcion['IDIOMA']->ESTATUS_IDIOMA,'0')==0)
                            <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$descripcion['IDIOMA']->MENSAJE_IDIOMA}}" style="color: red;"></i>
                          @endif
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="col-md-11 col-sm-11 col-xs-12">
                            <button class="btn btn-primary pull-right" type="button" onclick="guardarIdioma()" {{$disabled}}>Guardar</button>
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                          <!--{{$disabled = (($descripcion['COMPUTACION'])?((strcmp($descripcion['COMPUTACION']->ESTATUS_COMPUTACION,'0')==0)?'':'disabled'):'')}}-->
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Computacion:</label>
                          <div class="col-md-4 col-sm-4 col-xs-10">
                            <input type="text" required="required" class="form-control col-md-3 col-xs-12 text-uppercase" id="computacionDes" {{$disabled}} value="{{(($descripcion['COMPUTACION'])?$descripcion['COMPUTACION']->PAQUETERIA_COMPUTACION:'')}}">
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-10">
                            <select class="form-control" id="selectComputacion" {{$disabled}}>
                              <option value="BASICO" {{(($descripcion['COMPUTACION'])?((strcmp($descripcion['COMPUTACION']->NIVEL_DOMINIO_COMPUTACION,'BASICO')==0)?'SELECTED':''):'')}}>BASICO</option>
                              <option value="MEDIO" {{(($descripcion['COMPUTACION'])?((strcmp($descripcion['COMPUTACION']->NIVEL_DOMINIO_COMPUTACION,'MEDIO')==0)?'SELECTED':''):'')}}>MEDIO</option>
                              <option value="ALTO" {{(($descripcion['COMPUTACION'])?((strcmp($descripcion['COMPUTACION']->NIVEL_DOMINIO_COMPUTACION,'ALTO')==0)?'SELECTED':''):'')}}>ALTO</option>
                            </select>
                          </div>
                          <i class="fa fa-question-circle" data-toggle="popover" data-placement="auto" title="Área" data-content="Especificar el área en que se requiere que tenga experiencia."></i>
                          @if(isset($descripcion['COMPUTACION']->MENSAJE_COMPUTACION) && strcmp($descripcion['COMPUTACION']->ESTATUS_COMPUTACION,'0')==0)
                            <i class="fa fa-envelope-o" data-toggle="popover" data-placement="left" title="{{$descripcion['COMPUTACION']->MENSAJE_COMPUTACION}}" style="color: red;"></i>
                          @endif
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="col-md-11 col-sm-11 col-xs-12">
                            <button class="btn btn-primary pull-right" type="button" onclick="guardarComputacion()" {{$disabled}}>Guardar</button>
                          </div>
                        </div>
                        <!--Comptencias Fin-->
                     </div>
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
                        <tbody id="cuerpoListaDistribucion">
                          <!--{{$i=1}}-->
                          @foreach($descripcion['LISTA_DISTRIBUCION'] as $distribucion)
                            <tr>
                              <td>{{$i}}</td>
                              <td>
                                <select class="form-control" id="distribucion_{{$i}}">
                                  @foreach($descripcion['PUESTOS'] as $puestos)
                                    <option value="{{$puestos->ID_PUESTO}}" {{((strcmp($distribucion->FK_LISTA_DISTRIBUCION,$puestos->ID_PUESTO)==0)?'selected':'')}}>{{$puestos->NOMBRE_PUESTO}}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" type="button" onclick="guarda_distribucion({{$i}},{{$distribucion->FK_LISTA_DISTRIBUCION}},this)">Actualizar</button>
                              </td>
                              <!-- {{$i++}} -->
                            </tr>
                          @endforeach
                        </tbody>
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
  var puestos = json_descripcion['PUESTOS'];
  var ldist = json_descripcion['LISTA_DISTRIBUCION'];
  var disSob = puestos.filter(puesto => !puestos.includes(ldist));

  $( window ).load(function() {
    console.log('Formulario normal');
    console.log(json_descripcion);
    /*console.log(puestos);
    console.log(ldist);
    console.log(disSob);//*/
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

    con_CG = ($("#tablacompetenciasG tr").length)+1;
    con_CT = ($("#tablacompetenciasT tr").length)+1;
    con_D = ($("#cuerpoListaDistribucion tr").length)+1;
    //alert("Total de act. especificas: "+cont_AE);
    /*console.log("Total de act. principales: "+(cont_actG-1));
    console.log("Total de act. especificas: "+(cont_AE-1));
    console.log("Total de puestos proov.: "+(cont_r-1));
    console.log("Total de puestos clientes.: "+(cont_rd-1));
    console.log("Total de Competencias Genericas.: "+(con_CG-1));
    console.log("Total de Competencias Tecnicas.: "+(con_CT-1));//*/
    //console.log(puestos);
    //console.log(ldist);
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
    //console.log(area);
    if(area == 'otro' && area != 'false'){
      console.log("OTRO");
      $("#divOpcionProfesiones").html(
        '<input type="text" class="form-control text-uppercase" id="InputNuevaProfesion" aria-describedby="emailHelp" placeholder="INGRESE LA PROFESIÓN">'
        );

    }else if(area == 'false'){
      $("#divOpcionProfesiones").html(
        '<select id="SetelctProfesiones" class="form-control">'+
          '<option value="false">--SELECCIONAR--</option>'+
        '</select>'
      );
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
            '<select class="form-control" id="GradoDominioG'+con_CG+'">'+
              '<option value="I">I</option>'+
              '<option value="II">II</option>'+
              '<option value="III">III</option>'+
              '<option value="IV">IV</option>'+
            "</select>"+
          "</td>"+
          "<td>"+'<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasG('+con_CG+',this)">Guardar</button>'+"</td>"+
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
          '<select class="form-control" id="GradoDominioT'+con_CT+'">'+
            '<option value="BASICO">BASICO</option>'+
            '<option value="MEDIO">MEDIO</option>'+
            '<option value="AVANZADO">AVANZADO</option>'+
           "</select>"+"</td>"+
        "<td>"+
          '<button class="btn btn-primary" type="button" onclick="guardar_CompetenciasT('+con_CT+',this)">Guardar</button>'+
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



  function guardar_CompetenciasT(tmp_cont_cT,elemento){
    //alert("Entre");
    //console.log("entre a la funcion guardar actividades");
    //  console.log(tmp_cont_rel);

    var gradoDominio = $("#GradoDominioT"+tmp_cont_cT).val(); 
    var competenciaT = $("#CompetenciaT"+tmp_cont_cT).val();
    console.log(competenciaT);
    console.log(gradoDominio);
    console.log(id_des);
    var dataForm = new FormData();
    dataForm.append('competenciaT',competenciaT);;
    dataForm.append('gradoDominio',gradoDominio);
    dataForm.append('id_des',id_des);
    url = '/descripcion/guardar_CompetenciasT';

    if (competenciaT!="") {
      metodoAjax(url,dataForm,function(success){
        //console.log(success);
        $(elemento).attr('onclick','actualizarCompTec('+success['id_CT']+','+tmp_cont_cT+')');
        $(elemento).text('Actualizar');
        swal("", "Información almacenada satisfactoriamente", "success");
      });//*/
    }else {
      swal("", "Favor de no dejar campos vacíos", "warning");
    }
  }
//*/

function guardar_CompetenciasG(tmp_cont_cg,elemento){
  var competenciag = $("#CompetenciaG"+tmp_cont_cg).val();
  var gradoDominio = $("#GradoDominioG"+tmp_cont_cg).val();
  //var indicador = $("#indicador"+tmp_cont_cg).val(); 
  console.log(competenciag);
  console.log(gradoDominio);
  console.log(id_des);
  var dataForm = new FormData();
  dataForm.append('competenciag',competenciag);;
  dataForm.append('gradoDominio',gradoDominio);
  dataForm.append('id_des',id_des);
  url = '/descripcion/guardar_CompetenciasG';

  if (competenciag!="") {
    metodoAjax(url,dataForm,function(success){
      //console.log(success);
      $(elemento).attr('onclick','actualizarCompGen('+success['id_CG']+','+tmp_cont_cg+')');
      $(elemento).text('Actualizar');
      swal("", "Información almacenada satisfactoriamente", "success");
    });//*/

  }else{
    swal("", "Favor de no dejar campos vacíos", "warning");
  }
}//*/

//almacenar los puestos que son proveedores
function guardar_relacion(tmp_cont_rel,elemento){

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
    var formacion = '';
    var nuevaProfesion = '';
    var area = $("#selectArea").val();
    var anios_exp = ($("#anios_experiencia").val()).toUpperCase();
    console.log(area);
    console.log(anios_exp);
    if(area == "otro"){
      nuevaProfesion = ($("#InputNuevaProfesion").val()).toUpperCase();
      console.log(nuevaProfesion);
    }else{
      formacion= $("#SetelctProfesiones").val();
      console.log(formacion);
    }
    if((area != 'false') && (anios_exp != "") && (((area == 'otro') && (nuevaProfesion != '')) || ((area != 'otro') && (formacion != 'false')) )){
      //alert("Enviando..");
      var success;
      var url = "/descripcion/guarda_formacion"
      var dataForm = new FormData();
      dataForm.append('area',area);
      dataForm.append('anios_exp',anios_exp);
      dataForm.append('nuevaProfesion',nuevaProfesion);
      dataForm.append('formacion',formacion);
      dataForm.append('descripcion',id_des);
      metodoAjax(url,dataForm,function(success){
        //console.log(success);
        swal("", success['mensaje'], "success");
      });//*/
    }else{
      swal("¡Atención!", "Existen campos vacíos", "warning");
    }


  } 
    function actualizarCompGen(idCompetenciaG,contCompG){
      var competencia = $("#CompetenciaG"+contCompG).val();
      var gradoDominio = $("#GradoDominioG"+contCompG).val();
      var dataForm = new FormData();
      dataForm.append('competenciag',competencia);;
      dataForm.append('gradoDominio',gradoDominio);
      dataForm.append('id_des',id_des);
      dataForm.append('idCompetenciaG',idCompetenciaG);
      url = '/descripcion/actualizar_CompetenciasG';
      if (competencia!="") {
        metodoAjax(url,dataForm,function(success){
          swal("", "Información actualizada satisfactoriamente", "success");
        });//*/

      }else{
        swal("", "Favor de no dejar campos vacíos", "warning");
      }
    }

    function actualizarCompTec(idCompetenciaT,contCompT){
      var gradoDominio = $("#GradoDominioT"+contCompT).val(); 
      var competenciaT = $("#CompetenciaT"+contCompT).val();
      var dataForm = new FormData();
      console.log(gradoDominio);
      console.log(competenciaT);
      console.log(idCompetenciaT);
      dataForm.append('competencia',competenciaT);;
      dataForm.append('gradoDominio',gradoDominio);
      dataForm.append('idCompetenciaT',idCompetenciaT);
      url = '/descripcion/actualizar_CompetenciasT';
      if (competenciaT!="") {
        metodoAjax(url,dataForm,function(success){
          swal("", "Información actualizada satisfactoriamente", "success");
        });//*/

      }else{
        swal("", "Favor de no dejar campos vacíos", "warning");
      }

    }

    function guardarIdioma(){
      var idioma = ($("#idiomaDes").val()).toUpperCase();
      var nivelDiminio = $("#selectIdioma").val();
      
      var success;
      var url = "/descripcion/guardaIdioma";
      var dataForm = new FormData();
      dataForm.append('idioma',idioma);
      dataForm.append('nivelDiminio',nivelDiminio);
      dataForm.append('id_des',id_des);
      if(idioma!=""){
        metodoAjax(url,dataForm,function(success){
          if(success['opcion']=='Existe'){
            swal("", "Información actualizada satisfactoriamente", "success");
          }else{
            swal("", "Información almacenada satisfactoriamente", "success");
          }
        });//*/
      }else{
        swal("", "Favor de no dejar campos vacíos", "warning");
      }
    }

    function guardarComputacion(){
      var computacion = ($("#computacionDes").val()).toUpperCase();
      var nivelDiminio = $("#selectComputacion").val();
      
      var success;
      var url = "/descripcion/guardaComputacion";
      var dataForm = new FormData();
      dataForm.append('computacion',computacion);
      dataForm.append('nivelDiminio',nivelDiminio);
      dataForm.append('id_des',id_des);
      if(computacion!=""){
        metodoAjax(url,dataForm,function(success){
          swal("", success['mensaje'], "success");
        });//*/
      }else{
        swal("", "Favor de no dejar campos vacíos", "warning");
      }
    }

    function agregardistibucion(){
      var option = '';
      for(i=0; i<puestos.length;i++){
        option=option + '<option value="'+ puestos[i]['ID_PUESTO'] +'">'+puestos[i]['NOMBRE_PUESTO']+'</option>';
      }
      $("#cuerpoListaDistribucion").append(
        "<tr>"+
          "<td id='nombre_"+con_D+"'>"+
            con_D+
          "</td>"+
          "<td>"+
            //'<textarea class="form-control" rows="5" id="distribucion'+con_D+'"></textarea>'+
            '<select class="form-control" id="distribucion_'+con_D+'">'+
              option+
            "</select>"+
          "<td>"+
            '<button class="btn btn-primary" type="button" onclick="guarda_distribucion('+con_D+',-1,this)">Guardar</button>'+
          "</td>"+       
        "</tr>");
      con_D++;
    }

    function guarda_distribucion(tmpRow,idAnterior,elemento){
      var distribucion = $("#distribucion_"+tmpRow).val();
      console.log("Distribución: "+distribucion);
      var success;
      var url = "/descripcion/guarda_distribucion";
      var dataForm = new FormData();
      dataForm.append('id_descripcion',id_des);
      dataForm.append('distribucion',distribucion);
      dataForm.append('dist_anterior',idAnterior);
      console.log(idAnterior);
      metodoAjax(url,dataForm,function(success){
        swal("", success['mensaje'], success['icono']);
        if(success['accion'] != 'repetido'){
          $(elemento).attr('onclick','guarda_distribucion('+tmpRow+','+distribucion+',this)');
          $(elemento).text('Actualizar');
        }
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
        swal("", "Informaciónalmacenada satisfactoriamente", "success");
      });//*/
    }



</script>

@endsection

