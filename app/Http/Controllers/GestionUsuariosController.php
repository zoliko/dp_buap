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

        public function vistaUsuarios(){
            /*if(\Session::get('usuario')==null){
                return redirect('/');
            }//*/
            $dependencias = DB::table('DP_DEPENDENCIAS')->whereNotNull('DEPENDENCIAS_ACTIVA')->select('DEPENDENCIAS_ID as ID_DEP', 'DEPENDENCIAS_NOM_DEPENDENCIA as NOMBRE_DEP')->get();
            //dd($dependencias);
            return view('usuarios',[
                'dependencias'=> $dependencias
            ]);
        }

        public function traeUsuarios(){

        }
        
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
            dd($request['Proposito']);
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

        //esta funcion regresa si un puesto ya tiene usuario y sus datos
        public function traeUsuario(Request $request){
            $existe = false;
            $usuario = null;
            $id_descripcion = $request['id_descripcion'];
            $id_dependencia = $request['id_dependencia'];
            $titular = null;
            //dd($id_descripcion);
            $descripcion = DB::table('DP_DESCRIPCIONES')
                ->select(
                    'DESCRIPCIONES_CLAVE_PUESTO AS CLAVE_DES',
                    'DESCRIPCIONES_NIVEL AS NIVEL_DES'
                )
                ->where('DESCRIPCIONES_ID',$id_descripcion)->get();
            if(count($descripcion)>0){
                $cuenta = DB::table('DP_LOGIN')
                ->where('LOGIN_USUARIO',$descripcion[0]->CLAVE_DES)
                ->select(

                    'LOGIN_CONTRASENA as CONTRASENA_LOGIN'

                )->get();

                $usuario = DB::table('DP_USUARIOS')
                ->where('USUARIOS_USUARIO',$descripcion[0]->CLAVE_DES)
                ->select(

                    'USUARIOS_NOMBRE_RESPONSABLE as RESPONSABLE_USUARIO'

                )->get();
                //dd($id_dependencia);
                if(strcmp($descripcion[0]->NIVEL_DES, "TITULAR")==0){
                    $titular = DB::table('DP_DEPENDENCIAS')
                    ->where('DEPENDENCIAS_ID',$id_dependencia)
                    ->select(
                        'DEPENDENCIAS_NOM_TITULAR as TITULAR_DEPENDENCIA'
                    )->get();
                    $titular = $titular[0]->TITULAR_DEPENDENCIA;
                }//*/
                //dd($usuario);
                if(count($usuario)>0){
                    $existe = true;
                    //dd($usuario[0]);
                    //dd($descripcion[0]);
                }else{
                    //dd("No existe el usuario");
                }
            }
            
            $data = array(
                "existe" => $existe,
                "descripcion" => $descripcion,
                "usuario" => $usuario,
                "cuenta" => $cuenta,
                "titular" => $titular
              );

            echo json_encode($data);
        }

        public static function randomPassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }

        public function crearUsuario(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $usr = $request['id_usr'];
            $responsable = $request['responsable'];
            $nivel = $request['nivel'];
            $dependencia = $request['id_dependencia'];
            $exito = false;
            $password = GestionUsuariosController::randomPassword();
            $categoria = ((strcmp($nivel, "TITULAR")==0)?'DIRECTOR_D/UA':'ENCARGADO_D/UA');
            //dd($categoria);
            //dd($dependencia);
            DB::table('DP_LOGIN')->insert(
                [
                    'LOGIN_USUARIO' => $usr, 
                    'LOGIN_CONTRASENA' => $password,
                    'LOGIN_CATEGORIA' => $categoria,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
            DB::table('DP_USUARIOS')->insert(
                [
                    'USUARIOS_USUARIO' => $usr, 
                    'USUARIOS_NOMBRE_RESPONSABLE' => $responsable,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
            DB::table('REL_USUARIO_DEPENDENCIA')->insert(
                [
                    'FK_USUARIO' => $usr, 
                    'FK_DEPENDENCIA' => $dependencia
                ]
            );

            //dd($responsable);

            $data = array(
                "contrasena" => $password
              );

            echo json_encode($data);
        }

        public function actualizarUsuario(Request $request){
            $clave = $request['clave'];
            //$clave = "EPALE";
            $responsable = $request['responsable'];
            $exito = false;
            //dd($clave);//
            $exito = DB::table('DP_USUARIOS')
            ->where('USUARIOS_USUARIO', $clave)
            ->update(['USUARIOS_NOMBRE_RESPONSABLE' => $responsable]);
            $data = array(
                "exito" => (($exito==1)?true:false)
                //"exito" => $exito
              );

            echo json_encode($data);
        }

    }