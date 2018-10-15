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
//gestion de usuarios
Route::post('/usuarios/login' , 'GestionUsuariosController@login');

Route::get('/blanco', function () {
	if(\Session::get('usuario')==null){
		return redirect('/');
	}
    return view('prueba');
});
Route::get('/404', function () {
    return view('error_404');
});


Route::get('/descripcion/nuevo', function () {
    return view('formulario');
});
/*Route::get('/descripcion/gestionar/{id_dependencia}', function () {
    return view('gestionar_descripciones');
});//*/
Route::get('/descripcion/gestionar/{id_dependencia}' , 'DescripcionesPuestosController@traeDescripciones');
Route::post('/descripcion/registrar' , 'DescripcionesPuestosController@registrarDescripcion');
//Route::post('/descripcion/listado' , 'DescripcionesPuestosController@traeDescripciones');

Route::get('/dependencias', function () {
    return view('dependencias');
});
Route::get('/dependencias/nueva', function () {
    return view('crear_dependencia');
});
Route::post('/dependencias/trae' , 'DependenciasController@traeDependencias');
Route::post('/dependencias/trae_activas' , 'DependenciasController@traeDependenciasActivas');
Route::post('/dependencias/registrar' , 'DependenciasController@registrarDependencia');