<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*public function VerificaSesion(){
	if(count(\Session::get('usuario'))==0){
		return redirect('/');
	}
}//*/

Route::get('/', function () {
    return view('login');
});


Route::get('/revisado', function () {
   return view('revisado');
});


Route::get('/registro', function () {
   return view('registro');
});


Route::get('/blanco', function () {
	if(\Session::get('usuario')==null){
		return redirect('/');
	}
    return view('prueba');
});
/*Route::get('/404', function () {
    return view('errors.404');
});//*/

//descripciones
/*Route::get('/descripcion/nuevo', function () {
    return view('formulario');
});//*/
/*Route::get('/descripcion/{ID_descripcion}', function () {
   return view('formulario') ->with ("ID_descripcion",$ID_descripcion) ;
});//*/
Route::get('/descripciones/gestionar/{id_dependencia}' , 'DescripcionesPuestosController@traeDescripciones');
Route::post('/descripciones/listado' , 'DescripcionesPuestosController@traeDescripcionesDependencia');
/*Route::get('/descripciones', function () {
    return view('descripciones');
});//*/
Route::get('/descripciones','DescripcionesPuestosController@traeTodasDescripciones');
Route::post('/descripciones/registrar', 'DescripcionesPuestosController@registrarDescripcion');
Route::post('/descripciones/actualizar', 'DescripcionesPuestosController@actualizarDescripcion');
Route::post('/descripciones/trae_descripcion' , 'DescripcionesPuestosController@traeDetalleDescripcion');
Route::get('/descripcion/{ID_descripcion}' , 'DescripcionesPuestosController@abrirdescripcion');
Route::post('/descripcion/guarda_proposito', 'DescripcionesPuestosController@guardaproposito');
Route::post('/descripcion/actualiza_actgral', 'DescripcionesPuestosController@actualizar_actividad_gral');
Route::post('/descripcion/actualiza_actesp', 'DescripcionesPuestosController@actualizar_actividad_esp');
Route::post('/descripcion/actualiza_prov', 'DescripcionesPuestosController@ActualizarPuestoProveedor');
Route::post('/descripcion/actualiza_cliente', 'DescripcionesPuestosController@ActualizarPuestoCliente');
Route::post('/descripcion/guarda_formacion', 'DescripcionesPuestosController@GuardarFormacionProfesional');
Route::post('/descripcion/guarda_distribucion', 'DescripcionesPuestosController@GuardarDistribucion');
Route::post('/descripcion/guardar_Actividades', 'DescripcionesPuestosController@guardarActividad');
Route::post('/descripcion/guardar_ActividadesEspecifica', 'DescripcionesPuestosController@guardar_ActividadesEspecifica');
Route::post('/descripcion/guardar_relacion', 'DescripcionesPuestosController@guardarelacion');
Route::post('/descripcion/guardar_relacion2', 'DescripcionesPuestosController@guardarelacion2');
Route::post('/descripcion/guardar_CompetenciasG', 'DescripcionesPuestosController@guardarcompetenciaG');
Route::post('/descripcion/actualizar_CompetenciasG', 'DescripcionesPuestosController@actualizarCompG');
Route::post('/descripcion/guardar_CompetenciasT', 'DescripcionesPuestosController@guardarcompetenciaT');
Route::post('/descripcion/actualizar_CompetenciasT', 'DescripcionesPuestosController@actualizarCompT');
Route::post('/descripcion/guardar_formacion', 'DescripcionesPuestosController@guardaformacion');
Route::post('/descripcion/guardaIdioma', 'DescripcionesPuestosController@guardarIdioma');
Route::post('/descripcion/guardaComputacion', 'DescripcionesPuestosController@guardaComputacion');
Route::post('/descripciones/marcarRevisionFutura', 'DescripcionesPuestosController@marcarRevisionFutura');
Route::post('/descripciones/permisos_usuarios' , 'DescripcionesPuestosController@permisosDescripciones');
Route::post('/descripciones/solicitar_modificacion' , 'DescripcionesPuestosController@SolicitarModificacion');
Route::post('/descripciones/solicitar_baja', 'DescripcionesPuestosController@SolicitarBaja');
Route::post('/descripciones/datos_configuracion', 'DescripcionesPuestosController@DatosConfiguracion');
Route::post('/descripciones/cambiar_estatus', 'DescripcionesPuestosController@FuncionCambioEstatus');

//revision de las descripciones
Route::get('/descripcion/revision/{ID_descripcion}' , 'DescripcionesPuestosController@abrirDescripcionRevision');

//dependencias
Route::get('/dependencias','DependenciasController@redirigeDependencias');

Route::get('/dependencias/coordinacion', function () {
    return view('principal_coordinacion');
});
Route::get('/dependencias/nueva','DependenciasController@redirigeNuevaDependencia');

Route::post('/dependencias/trae' , 'DependenciasController@traeDependencias');
Route::post('/dependencias/trae_activas' , 'DependenciasController@traeDependenciasActivas');
Route::post('/dependencias/solicitud' , 'DependenciasController@SolicitarRevision');
Route::post('/dependencias/registrar' , 'DependenciasController@registrarDependencia');
//gestion de usuarios
Route::get('/usuarios' , 'GestionUsuariosController@vistaUsuarios');
Route::get('/usuarios/facilitador' , 'GestionUsuariosController@vistaCrearFacilitadores');
Route::post('/usuarios/trae_usuario' , 'GestionUsuariosController@traeUsuario');
Route::post('/usuarios/crear' , 'GestionUsuariosController@crearUsuario');
Route::post('/usuarios/crear/facilitador' , 'GestionUsuariosController@crearFacilitador');
Route::post('/usuarios/actualizar' , 'GestionUsuariosController@actualizarUsuario');
Route::post('/usuarios/login' , 'GestionUsuariosController@login');
Route::get('/usuarios/salir' , 'GestionUsuariosController@cerrarSesion');


Route::post('/archivos/subir' , 'ArchivosController@subirArchivos');
Route::post('/archivos/trae/dependencia' , 'ArchivosController@TraerArchivosDependencia');
Route::get('/archivos/descargar/{carpeta}/{nombre}' , 'ArchivosController@descargarArchivo');
Route::get('/archivos/descargar/{id_archivo}' , 'ArchivosController@descargarArchivoId');
Route::post('/archivos/eliminar' , 'ArchivosController@eliminarArchivoDependencia');

Route::get('/ayuda' , 'GestionUsuariosController@redirigeAyuda');

Route::get('/solicitudes' , 'DependenciasController@SolicutudesDependencias');
Route::get('/solicitudes_modificacion' , 'DependenciasController@SolicutudesModificacionDescripciones');
Route::get('/solicitudes_baja' , 'DependenciasController@SolicutudesBajaDescripciones');
Route::post('/solicitudes/denegar' , 'DependenciasController@SolicutudesCancelarSolicitud');

//PDF
/*Route::get('/pdf',function(){
  $pdf = PDF::loadView('pdf.descripcion');
  return $pdf->download('login.pdf');
});//*/
Route::get('/descripciones/pdf2/{id_descripcion}','DescripcionesPuestosController@crearPdf2');
Route::get('/descripciones/pdf/{id_descripcion}','DescripcionesPuestosController@crearPdf');
Route::get('visualizar','DescripcionesPuestosController@visualizaPdf');
/*Route::get('visualizar', function(){
  return view('pdf.descripcion');
});//*/

//mensaje y status
Route::post('/descripcion/mensaje', 'DescripcionesPuestosController@GuardaMensaje');
Route::post('/descripcion/cambia_estatus', 'DescripcionesPuestosController@CambiaEstus');

Route::get('/competencias', 'CompetenciasController@VistaCompetencias');
Route::post('/competencias/reporte_competencias', 'CompetenciasController@DescargarReporteCompetencias');

Route::post('/observaciones/obtener', 'DescripcionesPuestosController@ObtenerComentarios');
Route::post('/observaciones/insertar', 'DescripcionesPuestosController@InsertarComentario');

Route::get('/mail/prueba','MailsController@PruebaMail');

// Route::get('/organigramas','DependenciasController@ListadoOrganigramas');
Route::get('/organigramas','DependenciasController@redirigeDependencias');
Route::post('/organigramas/validar','ArchivosController@ValidarOrganigrama');
Route::post('/organigramas/invalidar','ArchivosController@InvalidarOrganigrama');
Route::post('/organigramas/obtener_comentario','ArchivosController@ObtenerComentarioInvalidacion');

Route::get('/dependencias/organigramas','DependenciasController@RevisionOrganigramas');
Route::get('/dependencias/organigramas_invalidos','DependenciasController@OrganigramasInvalidos');
