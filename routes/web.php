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
//gestion de usuarios
Route::post('/usuarios/login' , 'GestionUsuariosController@login');

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
Route::get('/descripcion/{ID_descripcion}', function () {
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
Route::post('/descripciones/marcarRevisionFutura', 'DescripcionesPuestosController@marcarRevisionFutura');

//dependencias
Route::get('/dependencias', function () {
    return view('dependencias');
});
Route::get('/dependencias/coordinacion', function () {
    return view('principal_coordinacion');
});
Route::get('/dependencias/nueva', function () {
    return view('crear_dependencia');
});
Route::post('/dependencias/trae' , 'DependenciasController@traeDependencias');
Route::post('/dependencias/trae_activas' , 'DependenciasController@traeDependenciasActivas');
Route::post('/dependencias/registrar' , 'DependenciasController@registrarDependencia');
//gestion de usuarios
Route::get('/usuarios' , 'GestionUsuariosController@vistaUsuarios');
Route::get('/usuarios/facilitador' , 'GestionUsuariosController@vistaCrearFacilitadores');
Route::post('/usuarios/trae_usuario' , 'GestionUsuariosController@traeUsuario');
Route::post('/usuarios/crear' , 'GestionUsuariosController@crearUsuario');
Route::post('/usuarios/actualizar' , 'GestionUsuariosController@actualizarUsuario');


Route::post('/archivos/subir' , 'ArchivosController@subirArchivos');
Route::post('/archivos/trae/dependencia' , 'ArchivosController@TraerArchivosDependencia');
Route::get('/archivos/descargar/{carpeta}/{nombre}' , 'ArchivosController@descargarArchivo');
Route::post('/archivos/eliminar' , 'ArchivosController@eliminarArchivoDependencia');