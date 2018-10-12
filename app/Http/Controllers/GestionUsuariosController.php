<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;//gestion de archivos
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class GestionUsuariosController extends Controller
    {
        /**
         * Show the profile for the given user.
         *
         * @param  int  $id
         * @return Response
         */

        public function login(Request $request){
            $usr = $request['usuario'];
            $contrasena = $request['contrasena'];
            $fl = false;
            $usuario = "";
            $existe = DB::table('DP_LOGIN')->where(['LOGIN_USUARIO'=> $usr, 'LOGIN_CONTRASENA' => $contrasena])->get();
            if(count($existe)>0){
                $fl = true;
                //$usuario = $existe[0]->LOGIN_USUARIO;
                if(\Session::get('usuario')!=null){
                    \Session::forget('usuario');
                    \Session::forget('categoria');
                }
                \Session::push('usuario',$existe[0]->LOGIN_USUARIO);
                \Session::push('categoria',$existe[0]->LOGIN_CATEGORIA);
            }
            $data = array(
                "usuario"=>\Session::get('categoria')[0],
                "exito" => $fl
              );

            echo json_encode($data);//*/
        }

        public function verificaSesion(){

        }

        public function abrirdescripcion($ID_descripcion){
             return view('formulario') ->with ("ID_descripcion",$ID_descripcion) ;

        }
        public function guardaproposito(Request $request){
            $exito=false;
            //dd($request['Proposito']);
            $insertar=DB::table('DP_PROPOSITO_GENERAL')->insertGetId(
                [
                    'PROPOSITO_GENERAL_DESCRIPCION' => $request['Proposito'], 
                    'PROPOSITO_GENERAL_ESTATUS' => 0
                ]
            );

        if($insertar){
            DB::table('REL_PROPOSITO_DESCRIPCION')->insert(
                    [
                        'FK_PROPOSITO' => $insertar, 
                        'FK_DESCRIPCION' =>  $request['id_des']

                    ]
                        );
            $exito=true;
         }
         $data = array(
                "exito" => $exito
              );

            echo json_encode($data);


        }


    }