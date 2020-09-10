<?php 
	//$descripcion = json_encode($descripcion);
	//dd($descripcion["DATOS"]->NOM_DESC);
	//dd($descripcion);
?>
<!DOCTYPE html>
<html>
	<head>
	    <!-- jQuery -->
	    <!-- <script src="../vendors/jquery/dist/jquery.min.js"></script> -->

	   <!-- Bootstrap --> 
		<!-- <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> -->

		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"> -->

		<!-- Latest compiled and minified JavaScript -->
		<!-- <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> -->

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<style type="text/css">
			th.fondo{
				background-color: rgb(31, 78, 121);
				color: white;
			}
			.bloque{
				text-align:center;
			}
			.ui-helper-center {
			    text-align: center;
			}
			.tabla-nobs{
				border: 1px solid #ddd;
			}
			.nivelar{
				vertical-align: middle;
			}
		</style>
		<title>{{$descripcion["DATOS"]->NOM_DESC}}</title>
	</head>
	<body>
		<div id="1_cabecera">
			<img src="images/logo.png" width="70" height="70" />
			<label class="pull-right" style="font-size: 25px;">Descripción de Puesto</label>
		</div>
		<br>
		<div id="2_datos">
			<table class="table table-bordered">
			  <tbody>
			    <tr>
			      <th scope="row" colspan="4" class="bloque">Información General</th>
			    </tr>
			    <tr>
			      <th scope="row" class="fondo">Puesto:</th>
			      <td >{{$descripcion["DATOS"]->NOM_DESC}}</td>
			      <th scope="row" class="fondo">Clave del Puesto:</th>
			      <td>{{$descripcion["DATOS"]->CLAVE_DESC}}</td>
			    </tr>
			    <tr>
			      <th scope="row" class="fondo">Reporta a:</th>
			      <td>{{$descripcion["DATOS"]->REPORTA_A_DESC}}</td>
			      <th scope="row" class="fondo">Fecha de creación:</th>
			      <td>{{$descripcion["DATOS"]->CREACION_DESC}}</td>
			    </tr>
			    <tr>
			      <th scope="row" class="fondo">Área:</th>
			      <td>{{$descripcion["DATOS"]->AREA_DESC}}</td>
			      <th scope="row" class="fondo">Fecha de revisión:</th>
			      <td>{{(($descripcion["DATOS"]->REVISION_DESC)?$descripcion["DATOS"]->REVISION_DESC:"")}}</td>
			    </tr>
			    <tr>
			      <th scope="row" class="fondo">Dirección:</th>
			      <td>{{$descripcion["DATOS"]->DIRECCION_DESC}}</td>
			      <th scope="row" class="fondo">No. de revisión:</th>
			      <td>{{$descripcion["DATOS"]->N_REVISION_DESC}}</td>
			    </tr>
			  </tbody>
			</table>
			
			<table class="table table-bordered">
			  <tbody>
			    <tr>
			      <th scope="row" class="fondo">Total de personas que le reportan:</th>
			      <td>{{$descripcion["DATOS"]->N_DIRECTOS_DESC + $descripcion["DATOS"]->N_INDIRECTOS_DESC}}</td>
			      <th scope="row" class="fondo">Directos:</th>
			      <td>{{$descripcion["DATOS"]->N_DIRECTOS_DESC}}</td>
			      <th scope="row" class="fondo">Indirector:</th>
			      <td>{{$descripcion["DATOS"]->N_INDIRECTOS_DESC}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

		<div id="3_proposito">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th class="bloque">Propósito General del Puesto</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td align="justify">{{(($descripcion['PROPOSITO_GENERAL'])?$descripcion['PROPOSITO_GENERAL']->PROPOSITO_GENERAL:'')}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

		<div id="4_actividades">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" colspan="3" class="bloque">Principales actividades e Indicadores de desempeño</th>
			    </tr>
			    <tr>
			      <th scope="row" class="bloque fondo"></th>
			      <th scope="row" class="bloque fondo">Principales Actividades Generales</th>
			      <th scope="row" class="bloque fondo">Indicadores de Desempeño</th>
			    </tr>
			  </thead>
			  <tbody>
              <!--{{$i=1}}-->
              @foreach($descripcion['ACTIVIDADES_GRLES'] as $actividad)
                <tr>
                  <td>{{$i}}</td>
                  <td>
                    {{$actividad->NOMBRE_ACTIVIDAD}}
                  </td>
                  <td>
                    {{$actividad->INDICADOR_ACTIVIDAD}}
                  </td>
                </tr>
                <!--{{$i++}}-->
              @endforeach
			  </tbody>
			</table>
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" class="bloque fondo"></th>
			      <th scope="row" class="bloque fondo">Principales Actividades Específicas</th>
			    </tr>
			  </thead>
			  <tbody>
              <!--{{$i=1}}-->
              @foreach($descripcion['ACTIVIDADES_ESPECIFICAS'] as $actividad)
                <!--{{$disabled = ((strcmp($actividad->ESTATUS_ACTIVIDAD,'0')==0)?'':'disabled')}}-->
                <tr>
                  <td>
                    {{$i}}
                  </td>
                  <td>
                    <div>
                      {{$actividad->NOMBRE_ACTIVIDAD}}
                    </div>
                  </td>
                </tr>
                <!--{{$i++}}-->
              @endforeach
			  </tbody>
			</table>
		</div>

		<div id="5_relaciones">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" colspan="3" class="bloque">Relaciones Críticas del Puesto</th>
			    </tr>
			    <tr>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 40%;">Puestos que son sus proveedores</th>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 40%;">Insumos que obtiene</th>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 20%;">Frecuencia</th>
			    </tr>
			  </thead>
			  <tbody>
              <!-- {{$i=1}} -->
              @foreach($descripcion['PUESTOS_PROVEEDORES'] as $puesto)
                <tr>
                  <td>
                  	{{$puesto->DESCRIPCION_PROVEEDOR}}
                  </td>
                  <td>
                      {{$puesto->INSUMO_PROVEEDOR}}
                  </td>
                  <td>
                  	{{$puesto->FRECUENCIA_PROVEEDOR}}
                  </td>
                </tr>
                <!-- {{$i++}} -->
              @endforeach
			  </tbody>
			</table>

			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 40%;">Puestos que son sus clientes</th>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 40%;">Productos que ofrece</th>
			      <th scope="row" class="bloque fondo" style="vertical-align: middle; width: 20%;">Frecuencia</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($descripcion['PUESTOS_CLIENTES'] as $clientes)
			    	<tr>
			    		<td>
			    			{{$clientes->DESCRIPCION_CLIENTE}}
			    		</td>
			    		<td>
			    			{{$clientes->PRODUCTO_CLIENTE}}
			    		</td>
			    		<td>
			    			{{$clientes->FRECUENCIA_CLIENTE}}
			    		</td>
			    	</tr>
			    @endforeach
			  </tbody>
			</table>
		</div>

		<div id="6_formacion">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" colspan="2" class="bloque">Formación Profesional y Experiencia</th>
			    </tr>
			    <tr>
			      <th scope="row" colspan="2" class="bloque fondo">Perfil de Puesto</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if($descripcion['FORMACION_PROFESIONAL'])
				    <tr>
				      <td>Formación profesional</td>
				      <td align="justify">{{$descripcion['CAT_PROFESIONES'][$descripcion['FORMACION_PROFESIONAL']->AREA_PROFESION][($descripcion['FORMACION_PROFESIONAL']->ID_PROFESION)-1]->PROFESION}}</td>
				    </tr>
				    <tr>
				      <td>Años de experiencia laboral</td>
				      <td align="justify">{{$descripcion['FORMACION_PROFESIONAL']->ANIOS_EXPERIENCIA_PROFESION}}</td>
				    </tr>
				@endif
			  </tbody>
			</table>
		</div>

		<!--<div id="7_competencias">
			<table class="tabla-nobs">
				<thead>
			    	<tr>
			      		<th scope="row" colspan="3" class="bloque">Competencias</th>
			    	</tr>
				</thead>
				<tbody>
				  	<tr>
				    	<td>
				      		<table class="table table-bordered bloque">
						  		<thead>
							    	<tr>
							      		<th scope="row" colspan="2" class="bloque fondo">INSTITUCIONALES</th>
							    	</tr>
							    	<tr>
							      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
							      		<th class="bloque">GRADO DE DOMINIO</th>
							    	</tr>
						  		</thead>
						  		<tbody>
								    <tr>
								      <td>COMPROMISO</td>
								      <td>ÚNICO</td>
								    </tr>
								    <tr>
								      <td>CONCIENCIA ORGANIZACIONAL</td>
								      <td>ÚNICO</td>
								    </tr>
								    <tr>
								      <td>EQUIDAD</td>
								      <td>ÚNICO</td>
								    </tr>
								    <tr>
								      <td>ÉTICA</td>
								      <td>ÚNICO</td>
								    </tr>
								    <tr>
								      <td>RESPONSABILIDAD</td>
								      <td>ÚNICO</td>
								    </tr>
								    <tr>
								      <td>RESPONSABILIDAD SOCIAL</td>
								      <td>ÚNICO</td>
								    </tr>
						  		</tbody>
							</table>
				    	</td>
				    	<td>
				      		<table class="table table-bordered bloque">
						  		<thead>
							    	<tr>
							      		<th scope="row" colspan="2" class="bloque fondo">GERENCIAS</th>
							    	</tr>
							    	<tr>
							      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
							      		<th class="bloque">GRADO DE DOMINIO</th>
							    	</tr>
						  		</thead>
						  		<tbody>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
						  		</tbody>
							</table>
				    	</td>
				    	<td>
				      		<table class="table table-bordered bloque">
						  		<thead>
							    	<tr>
							      		<th scope="row" colspan="2" class="bloque fondo">TÉCNICAS</th>
							    	</tr>
							    	<tr>
							      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
							      		<th class="bloque">GRADO DE DOMINIO</th>
							    	</tr>
						  		</thead>
						  		<tbody>
								    <tr>
								      <td>COMPROMISO</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>CONCIENCIA ORGANIZACIONAL</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>EQUIDAD</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>ÉTICA</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>RESPONSABILIDAD</td>
								      <td></td>
								    </tr>
								    <tr>
								      <td>RESPONSABILIDAD SOCIAL</td>
								      <td></td>
								    </tr>
						  		</tbody>
							</table>
				    	</td>
					</tr>
				</tbody>
			</table> 
		</div>-->

		<!--<div id="7_competencias">
			<table class="">
			  	<tr>
			    	<td>
			      		<table class="table table-bordered bloque">
					  		<thead>
						    	<tr>
						      		<th scope="row" colspan="2" class="bloque fondo">INSTITUCIONALES</th>
						    	</tr>
						    	<tr>
						      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
						      		<th class="bloque">GRADO DE DOMINIO</th>
						    	</tr>
					  		</thead>
					  		<tbody>
							    <tr>
							      <td>COMPROMISO</td>
							      <td>ÚNICO</td>
							    </tr>
							    <tr>
							      <td>CONCIENCIA ORGANIZACIONAL</td>
							      <td>ÚNICO</td>
							    </tr>
							    <tr>
							      <td>EQUIDAD</td>
							      <td>ÚNICO</td>
							    </tr>
							    <tr>
							      <td>ÉTICA</td>
							      <td>ÚNICO</td>
							    </tr>
							    <tr>
							      <td>RESPONSABILIDAD</td>
							      <td>ÚNICO</td>
							    </tr>
							    <tr>
							      <td>RESPONSABILIDAD SOCIAL</td>
							      <td>ÚNICO</td>
							    </tr>
					  		</tbody>
						</table>
			    	</td>
			    	<td>
			      		<table class="table table-bordered bloque">
					  		<thead>
						    	<tr>
						      		<th scope="row" colspan="2" class="bloque fondo">GERENCIAS</th>
						    	</tr>
						    	<tr>
						      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
						      		<th class="bloque">GRADO DE DOMINIO</th>
						    	</tr>
					  		</thead>
					  		<tbody>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
					  		</tbody>
						</table>
			    	</td>
			    	<td>
			      		<table class="table table-bordered bloque">
					  		<thead>
						    	<tr>
						      		<th scope="row" colspan="2" class="bloque fondo">TÉCNICAS</th>
						    	</tr>
						    	<tr>
						      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
						      		<th class="bloque">GRADO DE DOMINIO</th>
						    	</tr>
					  		</thead>
					  		<tbody>
							    <tr>
							      <td>COMPROMISO</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>CONCIENCIA ORGANIZACIONAL</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>EQUIDAD</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>ÉTICA</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>RESPONSABILIDAD</td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>RESPONSABILIDAD SOCIAL</td>
							      <td></td>
							    </tr>
					  		</tbody>
						</table>
			    	</td>
				</tr>
			</table> 
		</div>-->

		<div id="7_competencias">
			<table class="table table-bordered bloque">
		  		<thead>
			    	<tr>
			      		<th scope="row" colspan="6" class="bloque">Competencias</th>
			    	</tr>
			    	<tr>
			      		<th class="bloque fondo" colspan="2" style="vertical-align: middle; width: 33%;">INSTITUCIONALES</th>
			      		<th class="bloque fondo" colspan="2" style="vertical-align: middle; width: 34%;">GENERALES</th>
			      		<th class="bloque fondo" colspan="2" style="vertical-align: middle; width: 33%;">TÉCNICAS</th>
			    	</tr>
			    	<tr>
			      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
			      		<th class="bloque">GRADO DE DOMINIO</th>
			      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
			      		<th class="bloque">GRADO DE DOMINIO</th>
			      		<th class="bloque" style="vertical-align: middle;">COMPETENCIA</th>
			      		<th class="bloque">GRADO DE DOMINIO</th>
			    	</tr>
		  		</thead>
		  		<tbody>
				    <tr>
				      <td>COMPROMISO</td>
				      <td style="vertical-align: middle;">ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][0]))?$descripcion['COMPETENCIAS_GENERICAS'][0]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][0]))?$descripcion['COMPETENCIAS_GENERICAS'][0]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][0]))?$descripcion['COMPETENCIAS_TECNICAS'][0]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][0]))?$descripcion['COMPETENCIAS_TECNICAS'][0]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
				    <tr>
				      <td>CONCIENCIA ORGANIZACIONAL</td>
				      <td>ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][1]))?$descripcion['COMPETENCIAS_GENERICAS'][1]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][1]))?$descripcion['COMPETENCIAS_GENERICAS'][1]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][1]))?$descripcion['COMPETENCIAS_TECNICAS'][1]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][1]))?$descripcion['COMPETENCIAS_TECNICAS'][1]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
				    <tr>
				      <td>EQUIDAD</td>
				      <td>ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][2]))?$descripcion['COMPETENCIAS_GENERICAS'][2]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][2]))?$descripcion['COMPETENCIAS_GENERICAS'][2]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][3]))?$descripcion['COMPETENCIAS_TECNICAS'][2]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][2]))?$descripcion['COMPETENCIAS_TECNICAS'][2]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
				    <tr>
				      <td>ÉTICA</td>
				      <td>ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][3]))?$descripcion['COMPETENCIAS_GENERICAS'][3]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][3]))?$descripcion['COMPETENCIAS_GENERICAS'][3]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][3]))?$descripcion['COMPETENCIAS_TECNICAS'][3]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][3]))?$descripcion['COMPETENCIAS_TECNICAS'][3]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
				    <tr>
				      <td>RESPONSABILIDAD</td>
				      <td>ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][4]))?$descripcion['COMPETENCIAS_GENERICAS'][4]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][4]))?$descripcion['COMPETENCIAS_GENERICAS'][4]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][4]))?$descripcion['COMPETENCIAS_TECNICAS'][4]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][4]))?$descripcion['COMPETENCIAS_TECNICAS'][4]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
				    <tr>
				      <td>RESPONSABILIDAD SOCIAL</td>
				      <td>ÚNICO</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][5]))?$descripcion['COMPETENCIAS_GENERICAS'][5]->DESCRIPCION_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_GENERICAS'][5]))?$descripcion['COMPETENCIAS_GENERICAS'][5]->GRADO_COMPETENCIA_GENERICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][5]))?$descripcion['COMPETENCIAS_TECNICAS'][5]->DESCRIPCION_COMPETENCIA_TECNICA:'')}}</td>
				      <td>{{((isset($descripcion['COMPETENCIAS_TECNICAS'][5]))?$descripcion['COMPETENCIAS_TECNICAS'][5]->GRADO_COMPETENCIA_TECNICA:'')}}</td>
				    </tr>
		  		</tbody>
			</table>
		</div>

		<div id="8_idiomas">
			<table class="table table-bordered" >
			  <thead>
			    <tr>
			      <th scope="row" colspan="2" class="bloque">Idiomas</th>
			    </tr>
			    <tr>
			      <th scope="row" class="bloque fondo" style="width: 50%">Idioma</th>
			      <th scope="row" class="bloque fondo" style="width: 50%">Nivel de Dominio</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>{{(($descripcion['IDIOMA'])?$descripcion['IDIOMA']->IDIOMA:'')}}</td>
			      <td align="justify">{{(($descripcion['IDIOMA'])?$descripcion['IDIOMA']->NIVEL_DOMINIO_IDIOMA:'')}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

		<div id="9_computacion">
			<table class="table table-bordered" >
			  <thead>
			    <tr>
			      <th scope="row" colspan="2" class="bloque">Computación</th>
			    </tr>
			    <tr>
			      <th scope="row" class="bloque fondo" style="width: 50%">Paquetería</th>
			      <th scope="row" class="bloque fondo" style="width: 50%">Nivel de Dominio</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td scope="row" class="bloque fondo" style="width: 50%">{{(($descripcion['COMPUTACION'])?$descripcion['COMPUTACION']->PAQUETERIA_COMPUTACION:'')}}</td>
			      <td scope="row" class="bloque fondo" style="width: 50%">{{(($descripcion['COMPUTACION'])?$descripcion['COMPUTACION']->NIVEL_DOMINIO_COMPUTACION:'')}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

		<div id="10_distribucion">
			<table class="table table-bordered" >
			  <thead>
			    <tr>
			      <th scope="row" colspan="2" class="bloque">Lista de Distribucion</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if($descripcion['LISTA_DISTRIBUCION'])
				    @for($i = 0; $i < count($descripcion['LISTA_DISTRIBUCION']); $i++)
					    <tr>
					      <td>{{((isset($descripcion['LISTA_DISTRIBUCION'][$i]))?$descripcion['PUESTOS_ID'][$descripcion['LISTA_DISTRIBUCION'][$i]->FK_LISTA_DISTRIBUCION]->NOMBRE_PUESTO:'')}}</td>
					      <td>{{((isset($descripcion['LISTA_DISTRIBUCION'][$i+1]))?$descripcion['PUESTOS_ID'][$descripcion['LISTA_DISTRIBUCION'][$i+1]->FK_LISTA_DISTRIBUCION]->NOMBRE_PUESTO:'')}}</td>
					    </tr>
					 	<!--{{$i++}}-->
					@endfor
				@endif
			  </tbody>
			</table>
		</div>

		<!--<div id="11_firmas">
			<table  style="width: 100%">
				<tbody>
					<tr>
						<td style="width: 33%">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="row" class="bloque">Elaboró</th>		
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="bloque">Irais Ramírez López</td>
									</tr>
									<tr>
										<td class="bloque" height="50">Firma:</td>
									</tr>
									<tr>
										<td class="bloque">Fecha: 29/11/2018</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 34%">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="bloque">Revisó</th>		
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="bloque">Alfredo Avendaño</td>
									</tr>
									<tr>
										<td class="bloque" height="50">Firma:</td>
									</tr>
									<tr>
										<td class="bloque">Fecha: 29/11/2018</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="width: 33%">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="bloque">Autorizó</th>		
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="bloque">M.C. Jaime Meneses Guerra</td>
									</tr>
									<tr>
										<td class="bloque" height="50">Firma:</td>
									</tr>
									<tr>
										<td class="bloque">Fecha: 29/11/2018</td>
									</tr>
								</tbody>
							</table>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>-->
		<h5>FIRMA ELECTRÓNICA</h5>
		e9086ed03ed7b14413642dcd6a4cd882-9866e1f12fc8a852cfc7bbbd67a3fe64-dddbd7f3ee20b6162f107d58e855693c


	</body>
</html>

<script type="text/javascript">

</script>