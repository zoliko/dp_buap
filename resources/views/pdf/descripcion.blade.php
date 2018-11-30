<?php 
	//$descripcion = json_encode($descripcion);
	//dd($descripcion["DATOS"]->NOM_DESC);
	//dd($descripcion);
?>
<!DOCTYPE html>
<html>
	<head>
	    <!-- jQuery -->
	    <script src="../vendors/jquery/dist/jquery.min.js"></script>	

	   <!-- Bootstrap --> 
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

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
			      <td>37</td>
			      <th scope="row" class="fondo">Directos:</th>
			      <td>37</td>
			      <th scope="row" class="fondo">Indirector:</th>
			      <td>0</td>
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
			      <td align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
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
			    <tr>
			      <td>1</td>
			      <td align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
			      <td align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
			    </tr>
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
			    <tr>
			      <td>1</td>
			      <td align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
			    </tr>
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
			      <th scope="row" class="bloque fondo">Puestos que son sus proveedores</th>
			      <th scope="row" class="bloque fondo">Insumos que obtiene</th>
			      <th scope="row" class="bloque fondo">Frecuencia</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Dirección General de Bibliotecas</td>
			      <td align="justify">Lineamientos estratégicos para la realización del proceso de Gestión de Recursos y Servicios de Información</td>
			      <td align="justify">Variable</td>
			    </tr>
			  </tbody>
			</table>

			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="row" class="bloque fondo">Puestos que son sus clientes</th>
			      <th scope="row" class="bloque fondo">Productos que ofrece</th>
			      <th scope="row" class="bloque fondo">Frecuencia</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Usuarios Internos y Externos</td>
			      <td>Servicios de información, servicios de extensión</td>
			      <td align="justify">Variable</td>
			    </tr>
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
			    <tr>
			      <td>1</td>
			      <td align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
			    </tr>
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
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
				    </tr>
				    <tr>
				      <td>CONCIENCIA ORGANIZACIONAL</td>
				      <td>ÚNICO</td>
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
				    </tr>
				    <tr>
				      <td>EQUIDAD</td>
				      <td>ÚNICO</td>
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
				    </tr>
				    <tr>
				      <td>ÉTICA</td>
				      <td>ÚNICO</td>
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
				    </tr>
				    <tr>
				      <td>RESPONSABILIDAD</td>
				      <td>ÚNICO</td>
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
				    </tr>
				    <tr>
				      <td>RESPONSABILIDAD SOCIAL</td>
				      <td>ÚNICO</td>
				      <td>COMPROMISO</td>
				      <td></td>
				      <td>COMPROMISO</td>
				      <td></td>
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
			      <td>Inglés</td>
			      <td align="justify">Medio</td>
			    </tr>
			    <tr>
			      <td>Inglés</td>
			      <td align="justify">Medio</td>
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
			      <th scope="row" class="bloque fondo" style="width: 50%">Paqueteria o Sistema</th>
			      <th scope="row" class="bloque fondo" style="width: 50%">Nivel de Dominio</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Paquetería de Office	</td>
			      <td align="justify">Medio</td>
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
			    @for ($i = 1; $i < 6; $i++)
				    <tr>
				      <td>Distribucion {{$i}}</td>
				      <td>Distribucion {{$i+1}}</td>
				    </tr>
				 	<!--{{$i++}}-->
				@endfor
			  </tbody>
			</table>
		</div>

		<div id="11_firmas">
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
		</div>


	</body>
</html>

<script type="text/javascript">

</script>