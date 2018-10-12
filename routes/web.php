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


/*Route::get('/descripcion/{ID_descripcion}', function () {
   return view('formulario') ->with ("ID_descripcion",$ID_descripcion) ;
});*/

Route::get('/descripcion/{ID_descripcion}' , 'GestionUsuariosController@abrirdescripcion');

Route::post('/descripcion/guarda_proposito', 'GestionUsuariosController@guardaproposito');
