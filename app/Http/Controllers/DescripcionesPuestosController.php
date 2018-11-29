<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;//gestion de archivos
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class DescripcionesPuestosController extends Controller
    {
        /**
         * Show the profile for the given user.
         *
         * @param  int  $id
         * @return Response
         */

        public function descripcionesPermisos(Request $request){
            $id_dependencia = $request['id_dependencia'];
            $id_usuario = $request['id_usuario'];
            dd("ENTRANDO");
            $permisos = GestionUsuariosController::traeDescripcionesPermitidas($id_dependencia,$descripcion[0]->CLAVE_DES);
        }
        //gestion de permisos entre usuarios y descripciones de puestos
        public function permisosDescripciones(Request $request){
            $id_descripcion = $request['id_descripcion'];
            $fl = $request['fl'];
            //$usuario = \Session::get('usuario')[0];
            $usuario = $request['id_usuario'];
            //dd($usuario);
            //dd(gettype($fl));
            //dd($fl);
            if(strcmp($fl,"1")==0){
                DB::table('REL_USUARIO_DESCRIPCION')->insert(
                    [   
                        'FK_USUARIO' => $usuario, 
                        'FK_DESCRIPCION' => $id_descripcion
                    ]
                );
                //dd("PERMITIR");
            }else{
                //dd($id_descripcion);
                DB::table('REL_USUARIO_DESCRIPCION')
                    ->where([
                        ["FK_USUARIO",$usuario],
                        ["FK_DESCRIPCION",$id_descripcion]
                    ])
                    ->delete();//*/
            }
            $data = array(
                "descripcion"=>"eee"
              );

            echo json_encode($data);//*/
        }

        //trae las descripciones de una dependencia por metodo get
        public function traeDescripciones($dependencia){
            $usuario = \Session::get('categoria')[0];
            if(strcasecmp($usuario, 'FACILITADOR')==0){
                $relacion = DB::table('REL_DEPENDENCIA_DESCRIPCION')->where('FK_DEPENDENCIA',$dependencia)->get();
                $nom_dependencia = DB::table('DP_DEPENDENCIAS')->where('DEPENDENCIAS_ID',$dependencia)->get();
                //dd($nom_dependencia[0]);
                $descripciones = array();
                foreach ($relacion as $id_descripcion) {
                    $descripcion = DB::table('DP_DESCRIPCIONES')
                    ->select(
                        'DESCRIPCIONES_ID as ID_DESC', 
                        'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                        'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                        'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC'
                        )
                    ->where('DESCRIPCIONES_ID',$id_descripcion->FK_DESCRIPCION)->get();//*/
                    //if(count($descripcion)>0)
                        $descripciones[] = $descripcion[0];
                    //dd($id_descripcion->FK_DESCRIPCION);
                }

                //dd($descripciones[0][0]->ID_DESC);
                //dd($descripciones);
                return view('gestionar_descripciones',[
                    'descripciones'=> $descripciones,
                    'id_dependencia'=> $dependencia,
                    'nomenclatura'=> $nom_dependencia[0]->DEPENDENCIAS_NOMENCLATURA,
                    'dependencia' => $nom_dependencia[0]->DEPENDENCIAS_NOM_DEPENDENCIA
                ]);
            }else{
                return redirect('/');
            }
        }

        //trae las descripciones de una dependencia por metodo POST
        public function traeDescripcionesDependencia(Request $request){
            $dependencia = $request['dependencia'];
            //dd($dependencia);
            $relacion = DB::table('REL_DEPENDENCIA_DESCRIPCION')->where('FK_DEPENDENCIA',$dependencia)->get();
            //$nom_dependencia = DB::table('DP_DEPENDENCIAS')->where('DEPENDENCIAS_ID',$dependencia)->get();
            //dd($relacion);
            $descripciones = array();
            foreach ($relacion as $id_descripcion) {
                $descripcion = DB::table('DP_DESCRIPCIONES')
                ->select(
                    'DESCRIPCIONES_ID as ID_DESC', 
                    'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                    'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                    'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                    'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC'
                    )
                ->where('DESCRIPCIONES_ID',$id_descripcion->FK_DESCRIPCION)->get();//*/
                $descripciones[] = $descripcion[0];
                //dd($id_descripcion->FK_DESCRIPCION);
            }
            //dd($descripciones);
            $data = array(
                "descripcion"=>$descripciones,
                "total"=>count($descripciones)
              );

            echo json_encode($data);//*/
        }


        //este metodo trae todas las descripciones que le corresponden a la dependencia y que tiene autorizado en caso de que sea un encargado
        public function traeTodasDescripciones(){
            //$usuario = true;
            //if(\Session::get('categoria')[0],'FACILITADOR')
            $usuario = \Session::get('usuario')[0];
            $cagtegoria = \Session::get('categoria')[0];
            //dd($cagtegoria);           

            //---------------------------------------------------------------------      
            if(strcmp($cagtegoria, 'DIRECTOR_D/UA')==0 || strcmp($cagtegoria, 'ENCARGADO_D/UA')==0){
                //dd("epale");
                $descripciones = array();
                //obtenemos la dependencia a la que pertenece el usuario
                $dependencia = DB::table('REL_USUARIO_DEPENDENCIA')
                    ->select('FK_DEPENDENCIA')
                    ->where('FK_USUARIO',$usuario)
                    ->get();
                //dd($usuario);
                if(strcmp($cagtegoria, 'DIRECTOR_D/UA')==0){
                    //obtenemos las descripciones que estan enlazadas a la dependencia
                    $rel_descripciones =  DB::table('REL_DEPENDENCIA_DESCRIPCION')
                        ->select('FK_DESCRIPCION')
                        ->where('FK_DEPENDENCIA',$dependencia[0]->FK_DEPENDENCIA)
                        ->get();
                }else{
                    //obtenemos las descripciones que estan enlazadas a la dependencia
                    $rel_descripciones =  DB::table('REL_USUARIO_DESCRIPCION')
                        ->select('FK_DESCRIPCION')
                        ->where('FK_USUARIO',$usuario)
                        ->get();

                }
                //No se requiere que se obtenga la dependencia pues ya está incluida en DIR_DESC
                /*$nom_dependencia = DB::table('DP_DEPENDENCIAS')
                    ->where('DEPENDENCIAS_ID',$dependencia[0]->FK_DEPENDENCIA)
                    ->select("DEPENDENCIAS_NOM_DEPENDENCIA")
                    ->get();
                $nom_dependencia = $nom_dependencia[0]->DEPENDENCIAS_NOM_DEPENDENCIA;//*/
                //dd($nom_dependencia);

                //obtenemos el detalle de las descripciones ontenidas en $rel_descripciones
                foreach ($rel_descripciones as $descripcion) {
                    $descrip = DB::table('DP_DESCRIPCIONES')
                    ->select(
                        'DESCRIPCIONES_ID as ID_DESC', 
                        'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                        'DESCRIPCIONES_DIRECCION as DIR_DESC',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                        'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                        'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC'
                    )->where("DESCRIPCIONES_ID",$descripcion->FK_DESCRIPCION)
                    ->get();//*/
                    //$descrip[0]->ID_DEP = $nom_dependencia;

                    $descripciones[]=$descrip[0];
                }
                //dd($descripciones);
                //return view('descripciones')->with('descripciones', $descripciones);
                //return view('descripciones')
                return view('descripciones',[
                    'descripciones'=> $descripciones
                ]);//*/
            }else{
                return view('errors.404');
            }
        }

        public function traeDetalleDescripcion(Request $request){
            $id_descripcion = $request['id_descripcion'];
            $descripcion = DB::table('DP_DESCRIPCIONES')
            ->select( 
                'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                'DESCRIPCIONES_REPORTA_A as REPORTA_A_DESC',
                'DESCRIPCIONES_AREA as AREA_DESC',
                'DESCRIPCIONES_DIRECCION as DIRECCION_DESC',
                'DESCRIPCIONES_DTP as DTP_DESC',
                'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                'DESCRIPCIONES_FECHA_CREACION as CREACION_DESC',
                'DESCRIPCIONES_FECHA_REVISION as REVISION_DESC',
                'DESCRIPCIONES_N_REVISION as N_REVISION_DESC',
                'DESCRIPCIONES_NIVEL  as NIVEL_DESC',
                'DESCRIPCIONES_REPORTAN_DIRECTOS as DIRECTOS_DESC',
                'DESCRIPCIONES_REPORTAN_INDIRECTOS as INDIRECTOS_DESC',
                'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC',
                'DESCRIPCIONES_FUTURA_REVISION as REV_FUTURA_DESC'
                )
            ->where('DESCRIPCIONES_ID',$id_descripcion)->get();//*/
            //dd($descripcion);
            $data = array(
                "descripcion"=>$descripcion[0],
                "total"=>count($descripcion)
              );

            echo json_encode($data);//*/
        }

        public function registrarDescripcion(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito = false;
            $puesto = $request['puesto'];
            $reporta_a = $request['reporta_a'];
            $area = $request['area'];
            $direccion = $request['direccion'];
            $id_dependencia = $request['id_dependencia'];
            $dtp = $request['dtp'];
            $clave = $request['clave'];
            $nivel = $request['nivel'];
            $rep_directos = $request['rep_directos'];
            $rep_indirectos = $request['rep_indirectos'];
            //dd($id_dependencia);
            $id_descripcion = DB::table('DP_DESCRIPCIONES')->insertGetId(
                [
                    'DESCRIPCIONES_NOM_PUESTO' => $puesto,
                    'DESCRIPCIONES_REPORTA_A' => $reporta_a, 
                    'DESCRIPCIONES_AREA' => $area, 
                    'DESCRIPCIONES_DIRECCION' => $direccion, 
                    'DESCRIPCIONES_DTP' => ((strcmp($dtp,"DT")==0)? "TIPO":"PUESTO"), 
                    'DESCRIPCIONES_CLAVE_PUESTO' => $clave, 
                    'DESCRIPCIONES_FECHA_CREACION' => date('Y-m-d'), 
                    //'DESCRIPCIONES_FECHA_REVISION' => date('Y-m-d'), 
                    'DESCRIPCIONES_N_REVISION' => 1, 
                    'DESCRIPCIONES_NIVEL' => $nivel, 
                    'DESCRIPCIONES_REPORTAN_DIRECTOS' => $rep_directos, 
                    'DESCRIPCIONES_REPORTAN_INDIRECTOS' => $rep_indirectos,
                    'DESCRIPCIONES_ESTATUS_GRAL' => 'ELABORACION'
                ]
            );
            if($id_descripcion){
                $exito = true;
                DB::table('REL_DEPENDENCIA_DESCRIPCION')->insert(
                    [
                        'FK_DEPENDENCIA' => $id_dependencia,
                        'FK_DESCRIPCION' => $id_descripcion
                    ]
                );
            }//*/
            $data = array(
                "exito"=>$exito,
                "id_descripcion" => $id_descripcion
              );

            echo json_encode($data);//*/
            
        }

        public function actualizarDescripcion(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito = false;
            $id_descripcion = $request['id_descripcion'];
            $puesto = $request['puesto'];
            $reporta_a = $request['reporta_a'];
            $area = $request['area'];
            $direccion = $request['direccion'];
            $id_dependencia = $request['id_dependencia'];
            $dtp = $request['dtp'];
            $clave = $request['clave'];
            $rep_directos = $request['rep_directos'];
            $rep_indirectos = $request['rep_indirectos'];
            $nivel = $request['nivel'];
            //dd($nivel);
            $actualizar = DB::table('DP_DESCRIPCIONES')
            ->where('DESCRIPCIONES_ID' , $id_descripcion)
            ->update([
                    'DESCRIPCIONES_NOM_PUESTO' => $puesto,
                    'DESCRIPCIONES_REPORTA_A' => $reporta_a, 
                    'DESCRIPCIONES_AREA' => $area, 
                    //'DESCRIPCIONES_DIRECCION' => $direccion, 
                    'DESCRIPCIONES_DTP' => ((strcmp($dtp,"DT")==0)? "TIPO":"PUESTO"), 
                    'DESCRIPCIONES_CLAVE_PUESTO' => $clave, 
                    //'DESCRIPCIONES_FECHA_CREACION' => date('Y-m-d'), 
                    //'DESCRIPCIONES_FECHA_REVISION' => date('Y-m-d'), 
                    //'DESCRIPCIONES_N_REVISION' => 1, 
                    'DESCRIPCIONES_REPORTAN_DIRECTOS' => $rep_directos, 
                    'DESCRIPCIONES_REPORTAN_INDIRECTOS' => $rep_indirectos,
                    'DESCRIPCIONES_NIVEL' => $nivel,
                    //'DESCRIPCIONES_ESTATUS_GRAL' => 'ELABORACION'
                ]);
            if($actualizar){
                $exito = true;
            }

            $data = array(
                "exito"=>$exito
              );

            echo json_encode($data);//*/
        }

         public function abrirdescripcion($ID_descripcion){
            $descripcion = array();
            $proposito_gral = null;

            //Obtenemos los datos principales de la descripcion
            $descrip = DB::table('DP_DESCRIPCIONES')
                ->select([
                            'DESCRIPCIONES_ID as ID_DESCRIPCION',
                            'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                            'DESCRIPCIONES_REPORTA_A as REPORTA_A_DESC',
                            'DESCRIPCIONES_AREA as AREA_DESC',
                            'DESCRIPCIONES_DIRECCION as DIRECCION_DESC',
                            'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                            'DESCRIPCIONES_FECHA_CREACION as CREACION_DESC',
                            'DESCRIPCIONES_FECHA_REVISION as REVISION_DESC',
                            'DESCRIPCIONES_N_REVISION as N_REVISION_DESC'
                        ])
                ->where('DESCRIPCIONES_ID',$ID_descripcion)
                ->get();
            $descripcion['DATOS'] = $descrip[0];

            //aqui obtenemos el proposito general de la descripcion de pestos
            $existe_proposito = DB::table('REL_PROPOSITO_DESCRIPCION')
            ->where([
                        ['FK_DESCRIPCION',$ID_descripcion]
                    ])
            ->get();
            if(count($existe_proposito)>0){
                $proposito = DB::table('DP_PROPOSITO_GENERAL')
                    ->where([
                                ['PROPOSITO_GENERAL_ID',$existe_proposito[0]->FK_PROPOSITO]
                            ])
                    ->select([
                                'PROPOSITO_GENERAL_DESCRIPCION as PROPOSITO_GENERAL',
                                'PROPOSITO_GENERAL_ESTATUS as ESTATUS_PROPOSITO_GENERAL',
                                'PROPOSITO_GENERAL_MENSAJE as MENSAJE_PROPOSITO_GENERAL',
                            ])
                    ->get();
                $proposito_gral = $proposito[0];    
            }
            $descripcion['PROPOSITO_GENERAL'] = $proposito_gral;
            return view('formulario') ->with ("descripcion",$descripcion);
        }


        public function guardaproposito(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            $accion = "";
            //dd($request['Proposito']);
            //verificamos que exista el proposito
            $existe_proposito = DB::table('REL_PROPOSITO_DESCRIPCION')
                ->where([
                            ['FK_DESCRIPCION',$request['id_des']]
                        ])
                ->get();
            //dd($existe_proposito);
            //en caso de que exista el proposito entonces actualizamos
            if(count($existe_proposito)>0){
                //dd("actualizando...");
                $accion = "Actualización";
                DB::table('DP_PROPOSITO_GENERAL')
                    ->where('PROPOSITO_GENERAL_ID', $existe_proposito[0]->FK_PROPOSITO)
                    ->update(
                        [
                            'PROPOSITO_GENERAL_DESCRIPCION' => $request['Proposito'],
                            'updated_at' => date('Y-m-d')
                        ]);
            }else{
                //dd("Insertar");
                $accion = "Inserción";
                $insertar=DB::table('DP_PROPOSITO_GENERAL')->insertGetId(
                    [
                        'PROPOSITO_GENERAL_DESCRIPCION' => $request['Proposito'], 
                        'PROPOSITO_GENERAL_ESTATUS' => 0,
                        'created_at' => date('Y-m-d')
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
            }
            $data = array(
                "exito" => $exito,
                "accion" => $accion
            );
            echo json_encode($data);
        }

        public function marcarRevisionFutura(Request $request){
            $id_descripcion = $request['id_descripcion'];
            $estatus = $request['estatus_revision'];
            $exito = false;
            //dd($estatus);
            $exito = DB::table('DP_DESCRIPCIONES')
            ->where('DESCRIPCIONES_ID', $id_descripcion)
            ->update(['DESCRIPCIONES_FUTURA_REVISION' => $estatus]);
            $data = array(
                "exito" => $exito
            );
            echo json_encode($data);
        }

        public function guardarActividad(Request $request){
            $exito=false;
            //dd($request['Proposito']);
            $insertar=DB::table('DP_ACTIVIDADES_GENERALES')->insertGetId(
                [
                    'ACTIVIDADES_GENERALES_ACTIVIDAD' => $request['Actividad'], 
                    'ACTIVIDADES_GENERALES_INDICADOR' => "indicador",
                    'ACTIVIDADES_GENERALES_ESTATUS'=> 0
                ]
            );

        if($insertar){
            DB::table('REL_ACT_GRAL_DESCRIPCION')->insert(
                    [
                        'FK_ACTIVIDAD_GENERAL' => $insertar, 
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

        public function guardar_ActividadesEspecifica(Request $request){
            $exito=false;
            //dd($request['Proposito']);
            $insertar=DB::table('DP_ACTIVIDADES_ESPECIFICAS')->insertGetId(
                [
                    'ACTIVIDADES_ESPECIFICAS_ACTIVIDA' => $request['ActividadE'], 
                    'ACTIVIDADES_GENERALES_ESTATUS'=> 0

                ]
            );

        if($insertar){
            DB::table('REL_ACT_ESP_DESCRIPCION')->insert(
                    [
                        'FK_ACTIVIDAD_ESPECIFICA' => $insertar, 
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