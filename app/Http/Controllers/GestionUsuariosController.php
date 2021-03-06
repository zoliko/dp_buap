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
        

        public function redirigeAyuda(){
            $usuario = \Session::get('usuario')[0];
            if($usuario){
                return view('ayuda');
            }else{
                return redirect('/');
            }
        }

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

        public function vistaCrearFacilitadores(){
            /*if(\Session::get('usuario')==null){
                return redirect('/');
            }//*/
            $categoria = \Session::get('categoria')[0];
            if(strcasecmp($categoria, 'FACILITADOR')==0){
                return view('usuarios_facilitadores');
            }else{
                return redirect('/');
            }
        }

        public function crearFacilitador(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $usuario = $request['usuario'];
            $nombre = $request['nombre'];
            $tipo = $request['tipo_usuario'];
            //dd($usuario);
            $password = null;
            $exito = false;
            $error = "";
            $existe = DB::table('DP_LOGIN')
                        ->where('LOGIN_USUARIO', $usuario)->get();
            //dd($existe);
            if(count($existe)>0){
                $error="El usuario ya fué registrado anteriormente.";
                //dd("El usuario ya está registrado");
            }else{
                $password = GestionUsuariosController::randomPassword();
                DB::table('DP_LOGIN')->insert(
                    [
                        'LOGIN_USUARIO' => $usuario, 
                        'LOGIN_CONTRASENA' => $password,
                        'LOGIN_CATEGORIA' => $tipo,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );
                DB::table('DP_USUARIOS')->insert(
                    [
                        'USUARIOS_USUARIO' => $usuario, 
                        'USUARIOS_NOMBRE_RESPONSABLE' => $nombre,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );
            }

             $data = array(
                    "contrasena" => $password,
                    "error" => $error
                  );

            echo json_encode($data);

        }

        public function traeUsuarios(){

        }
        
        public function login(Request $request){
            //dd("epale");
            $usr = $request['usuario'];
            $contrasena = $request['contrasena'];
            $fl = false;
            $usuario = "";
            $existe = DB::table('DP_LOGIN')->where(['LOGIN_USUARIO'=> $usr, 'LOGIN_CONTRASENA' => $contrasena])->get();
            if(count($existe)>0){
                $n_usuario = DB::table('DP_USUARIOS')->where('USUARIOS_USUARIO', $usr)->get();
                $fl = true;
                //$usuario = $existe[0]->LOGIN_USUARIO;
                if(\Session::get('usuario')!=null){
                    \Session::forget('usuario');
                    \Session::forget('categoria');
                    \Session::forget('nombre');
                }
                \Session::push('usuario',$existe[0]->LOGIN_USUARIO);
                \Session::push('categoria',$existe[0]->LOGIN_CATEGORIA);
                \Session::push('nombre',$n_usuario[0]->USUARIOS_NOMBRE_RESPONSABLE);
            }
            $data = array(
                "usuario"=>\Session::get('usuario')[0],
                "categoria"=>\Session::get('categoria')[0],
                "nombre"=>\Session::get('nombre')[0],
                "exito" => $fl
              );

            echo json_encode($data);//*/
        }
        public function cerrarSesion(){
            \Session::forget('usuario');
            \Session::forget('categoria');
            \Session::forget('nombre');
            return redirect('/');
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
            $id_descripcion = $request['id_descripcion'];//es el usuario
            $id_dependencia = $request['id_dependencia'];
            $titular = null;
            $permisos = array();
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
                    $permisos = GestionUsuariosController::traeDescripcionesPermitidas($id_dependencia,$descripcion[0]->CLAVE_DES);
                    //dd($usuario[0]);
                    //dd($descripcion[0]);
                }else{
                    //dd("No existe el usuario");
                }
            }
            
            $data = array(
                "existe" => $existe,
                "descripcion" => $descripcion,
                "permisos" => $permisos,
                "usuario" => $usuario,
                "cuenta" => $cuenta,
                "titular" => $titular
              );

            echo json_encode($data);
        }

        public static function traeDescripcionesPermitidas($id_dependencia,$id_usuario){
            //dd($id_dependencia);
            $descripciones = array();
            $permisos = array();
            $rel_descripciones = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                ->where('FK_DEPENDENCIA',$id_dependencia)
                ->get();//*/
                //dd($rel_descripciones);
            foreach ($rel_descripciones as $descripcion) {
                $descrip = DB::table('DP_DESCRIPCIONES')
                    ->select(
                        'DESCRIPCIONES_ID as ID_DESC',
                        'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC'
                    )->where("DESCRIPCIONES_ID",$descripcion->FK_DESCRIPCION)
                    ->get();//*/
                    //$descrip[0]->ID_DEP = $nom_dependencia;
                //dd($descripcion->FK_DESCRIPCION);
                
                $permiso = DB::table('REL_USUARIO_DESCRIPCION')
                    ->where([
                        ["FK_USUARIO",$id_usuario],
                        ["FK_DESCRIPCION",$descripcion->FK_DESCRIPCION]
                    ])
                    ->get();//*/
                //dd($permiso);
                if(count($permiso)>0){
                    $descrip[0]->PERMISO = 1;
                }else{
                    $descrip[0]->PERMISO = null;
                }
                $descripciones[]=$descrip[0];
            }
            //dd($descripciones);
            return $descripciones;
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
            $permisos;
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

            $permisos = GestionUsuariosController::traeDescripcionesPermitidas($dependencia,$usr);

            $data = array(
                "contrasena" => $password,
                "permisos" => $permisos
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

    /*    
        insert into DP_LOGIN(LOGIN_USUARIO,LOGIN_CONTRASENA,LOGIN_CATEGORIA)values("marvineliosa",'123456','FACILITADOR');
        insert into DP_USUARIOS(USUARIOS_USUARIO,USUARIOS_NOMBRE_RESPONSABLE)values('marvineliosa','Marvin Eliosa');
        
        insert into DP_LOGIN(LOGIN_USUARIO,LOGIN_CONTRASENA,LOGIN_CATEGORIA)values("usuario_cga",'123456','CGA');
        insert into DP_USUARIOS(USUARIOS_USUARIO,USUARIOS_NOMBRE_RESPONSABLE)values('usuario_cga','Usuario CGA');
        
        insert into DP_LOGIN(LOGIN_USUARIO,LOGIN_CONTRASENA,LOGIN_CATEGORIA)values("director_rh",'123456','DIRECTOR_DRH');
        insert into DP_USUARIOS(USUARIOS_USUARIO,USUARIOS_NOMBRE_RESPONSABLE)values('director_rh','Director de RH');