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
        public function crearPdf($id_descripcion){
            $descripcion = DescripcionesPuestosController::ontenerDescripcion($id_descripcion);
            $pdf = \PDF::loadView('pdf.descripcion',['descripcion'=>$descripcion]);
            return $pdf->download($descripcion['DATOS']->NOM_DESC.'.pdf');
            //return $pdf->stream();
        }

        /*public function visualizaPdf($id_descripcion){
            $descripcion = DescripcionesPuestosController::ontenerDescripcion($id_descripcion);
            //dd($descripcion);
            return view('pdf.descripcion')->with("descripcion",$descripcion);
        }//*/

        public function visualizaPdf(){
            $id_descripcion = 1;
            $descripcion = DescripcionesPuestosController::ontenerDescripcion($id_descripcion);
            //dd($descripcion);
            return view('pdf.descripcion')->with("descripcion",$descripcion);
        }
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
            $descripcion = DescripcionesPuestosController::ontenerDescripcion($ID_descripcion);
            return view('formulario') ->with ("descripcion",$descripcion);
        }

        //Se obtiene la descripcion de puesto con todos sus datos <<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>
        public function ontenerDescripcion($ID_descripcion){
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
                    'DESCRIPCIONES_N_REVISION as N_REVISION_DESC',
                    'DESCRIPCIONES_REPORTAN_DIRECTOS as N_DIRECTOS_DESC',
                    'DESCRIPCIONES_REPORTAN_INDIRECTOS as N_INDIRECTOS_DESC'
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

            //aqui obtenemos la relacion de actividades generales
            $rel_actgral = DB::table('REL_ACT_GRAL_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_ACTIVIDAD_GENERAL'])
                ->get();
            $actividades_grles = array();
            foreach ($rel_actgral as $actividad) {
                $rel_act = DB::table('DP_ACTIVIDADES_GENERALES')
                    ->where('ACTIVIDADES_GENERALES_ID',$actividad->FK_ACTIVIDAD_GENERAL)
                    ->select([
                            'ACTIVIDADES_GENERALES_ID as ID_ACT_GRAL',
                            'ACTIVIDADES_GENERALES_ACTIVIDAD as NOMBRE_ACTIVIDAD',
                            'ACTIVIDADES_GENERALES_INDICADOR as INDICADOR_ACTIVIDAD',
                            'ACTIVIDADES_GENERALES_ESTATUS as ESTATUS_ACTIVIDAD',
                            'ACTIVIDADES_GENERALES_MENSAJE as MENSAJE_ACTIVIDAD',
                            ])
                    ->get();
                $actividades_grles[] = $rel_act[0];
            }
            $descripcion['ACTIVIDADES_GRLES'] = $actividades_grles;

            //aqui obtenemos la relacion de actividades especificas
            $rel_actesp = DB::table('REL_ACT_ESP_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_ACTIVIDAD_ESPECIFICA'])
                ->get();
            $actividades_esp = array();
            foreach ($rel_actesp as $actividad) {
                $rel_act = DB::table('DP_ACTIVIDADES_ESPECIFICAS')
                    ->where('ACTIVIDADES_ESPECIFICAS_ID',$actividad->FK_ACTIVIDAD_ESPECIFICA)
                    ->select([
                            'ACTIVIDADES_ESPECIFICAS_ID as ID_ACT_ESP',
                            'ACTIVIDADES_ESPECIFICAS_ACTIVIDAD as NOMBRE_ACTIVIDAD',
                            'ACTIVIDADES_ESPECIFICAS_ESTATUS as ESTATUS_ACTIVIDAD',
                            'ACTIVIDADES_ESPECIFICAS_MENSAJE as MENSAJE_ACTIVIDAD',
                            ])
                    ->get();
                $actividades_esp[] = $rel_act[0];
            }
            $descripcion['ACTIVIDADES_ESPECIFICAS'] = $actividades_esp;

            //obteniendo Puestos proveedores
            $rel_pp = DB::table('REL_PUESTOS_PROV_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_PUESTO_PROVEEDOR'])
                ->get();
            $puestos_proveedores = array();
            //dd($rel_pp);
            foreach ($rel_pp as $puesto) {
                $rel_prov = DB::table('DP_PUESTOS_PROVEEDORES')
                    ->where('PUESTOS_PROVEEDORES_ID',$puesto->FK_PUESTO_PROVEEDOR)
                    ->select([
                            'PUESTOS_PROVEEDORES_ID as ID_PUESTO_PROVEEDOR',
                            'PUESTOS_PROVEEDORES_DESCRIPCION as DESCRIPCION_PROVEEDOR',
                            'PUESTOS_PROVEEDORES_INSUMO as INSUMO_PROVEEDOR',
                            'PUESTOS_PROVEEDORES_FRECUENCIA as FRECUENCIA_PROVEEDOR',
                            'PUESTOS_PROVEEDORES_ESTATUS as ESTATUS_PROVEEDOR',
                            'PUESTOS_PROVEEDORES_MENSAJE as MENSAJE_PROVEEDOR',
                            ])//*/
                    ->get();
                $puestos_proveedores[] = $rel_prov[0];
            }
            $descripcion['PUESTOS_PROVEEDORES'] = $puestos_proveedores;

            //obtenemos los puestos que son clientes
            $rel_pc = DB::table('REL_PUESTOS_CLIENTES_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_PUESTO_CLIENTE'])
                ->get();
            $puestos_clientes = array();
            //dd($rel_pp);
            foreach ($rel_pc as $puesto) {
                $rel_clientes = DB::table('DP_PUESTOS_CLIENTES')
                    ->where('PUESTOS_CLIENTES_ID',$puesto->FK_PUESTO_CLIENTE)
                    ->select([
                            'PUESTOS_CLIENTES_ID as ID_PUESTO_CLIENTE',
                            'PUESTOS_CLIENTES_DESCRIPCION as DESCRIPCION_CLIENTE',
                            'PUESTOS_CLIENTES_PRODUCTO as PRODUCTO_CLIENTE',
                            'PUESTOS_CLIENTES_FRECUENCIA as FRECUENCIA_CLIENTE',
                            'PUESTOS_CLIENTES_ESTATUS as ESTATUS_CLIENTE',
                            'PUESTOS_CLIENTES_MENSAJE as MENSAJE_CLIENTE',
                            ])//*/
                    ->get();
                $puestos_clientes[] = $rel_clientes[0];
            }
            $descripcion['PUESTOS_CLIENTES'] = $puestos_clientes;

            //obtenemos las areas y las profesiones
            $areas = DB::table('DP_CAT_AREAS')
                        ->select('CAT_AREAS_ID', 'CAT_AREAS_AREA')
                        ->get();

            //dd($areas);
            $cat_profesiones = array();
            foreach ($areas as $area) {
                $rel_profesion = DB::table('REL_PROFESION_AREA')
                        ->where('FK_AREA',$area->CAT_AREAS_ID)
                        ->select('FK_PROFESION')
                        ->get();
                //dd($rel_profesion);
                $prof = array();
                foreach ($rel_profesion as $profesion) {
                    $profesion = DB::table('DP_CAT_PROFESIONES')
                        ->where('CAT_PROFESIONES_ID',$profesion->FK_PROFESION)
                        ->select(   
                                'CAT_PROFESIONES_ID as ID_PROFESION',
                                'CAT_PROFESIONES_PROFESION as PROFESION')
                        ->get();
                    $prof[]=$profesion[0];
                }
                $cat_profesiones[$area->CAT_AREAS_ID]=$prof;
                //dd($cat_profesiones);
            }
            $descripcion['CAT_AREAS'] = $areas->toArray();
            $descripcion['CAT_PROFESIONES'] = $cat_profesiones;

            //obtenemos la formacion profesional de la descripcion

            $FormacionProfesional = DB::table('REL_PROFESION_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(
                            'FK_PROFESION as ID_PROFESION',
                            'REL_PROFESION_DESCRIPCION_OTROS as OTRA_PROFESION',
                            'REL_PROFESION_DESCRIPCION_ESTATUS as STATUS_PROFESION',
                            'REL_PROFESION_DESCRIPCION_MENSAJE as MENSAJE_PROFESION'
                        )
                ->get();
            //actualizamos los años de experiencia
            $getIdAnios = DB::table('REL_AREA_ANIOS_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select('FK_AREAS_ANIOS')
                ->get();
            $aniosExperiencia = DB::table('DP_AREAS_ANIOS_EXPERIENCIA')
                ->where('AREAS_ANIOS_EXPERIENCIA_ID',$getIdAnios[0]->FK_AREAS_ANIOS)
                ->get();

            $FormacionProfesional[0]->ANIOS_EXPERIENCIA_PROFESION = $aniosExperiencia[0]->AREAS_ANIOS_DESCRIPCION;
            //dd($FormacionProfesional[0]);
            $descripcion['FORMACION_PROFESIONAL'] = $FormacionProfesional[0];

            //dd($descripcion);

            //return view('formulario') ->with ("descripcion",$descripcion);
            return $descripcion;
        }
 
     /*  public function guardaformacion(request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            $accion="";
            $existe_formacion= DB:table('')

        }

        */
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
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            }else{
                //dd("Insertar");
                $accion = "Inserción";
                $insertar=DB::table('DP_PROPOSITO_GENERAL')->insertGetId(
                    [
                        'PROPOSITO_GENERAL_DESCRIPCION' => $request['Proposito'], 
                        'PROPOSITO_GENERAL_ESTATUS' => 0,
                        'created_at' => date('Y-m-d H:i:s')
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

        //guardar actividad general
        public function guardarActividad(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            //dd($request['Proposito']);
            $insertar=DB::table('DP_ACTIVIDADES_GENERALES')->insertGetId(
                [
                    'ACTIVIDADES_GENERALES_ACTIVIDAD' => $request['Actividad'], 
                    'ACTIVIDADES_GENERALES_INDICADOR' => $request['indicador'],
                    'ACTIVIDADES_GENERALES_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')
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
                "exito" => $exito,
                "id_act_gral" => $insertar
            );
            echo json_encode($data);
        }

        public function actualizar_actividad_gral(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //$exito = false;
            $id_act_gral = $request['id_act_gral'];
            $act_gral = $request['Actividad'];
            $indicador = $request['indicador'];
            //dd($id_act_gral);
            $update = DB::table('DP_ACTIVIDADES_GENERALES')
                ->where('ACTIVIDADES_GENERALES_ID', $id_act_gral)
                ->update(
                    [
                        'ACTIVIDADES_GENERALES_ACTIVIDAD' => $act_gral,
                        'ACTIVIDADES_GENERALES_INDICADOR' => $indicador,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            $data = array(
                //"exito" => $exito,
                "update" => $update
            );
            echo json_encode($data);
        }

        public function guardar_ActividadesEspecifica(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            //dd($request['Proposito']);
            $insertar=DB::table('DP_ACTIVIDADES_ESPECIFICAS')->insertGetId(
                [
                    'ACTIVIDADES_ESPECIFICAS_ACTIVIDAD' => $request['ActividadE'], 
                    'ACTIVIDADES_ESPECIFICAS_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')
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
                "exito" => $exito,
                "id_act_esp" => $insertar
            );
            echo json_encode($data);
        }

        public function actualizar_actividad_esp(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //$exito = false;
            $id_act_esp = $request['id_act_esp'];
            $act_esp = $request['Actividad'];
            //dd($id_act_esp);
            $update = DB::table('DP_ACTIVIDADES_ESPECIFICAS')
                ->where('ACTIVIDADES_ESPECIFICAS_ID', $id_act_esp)
                ->update(
                    [
                        'ACTIVIDADES_ESPECIFICAS_ACTIVIDAD' => $act_esp,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            $data = array(
                //"exito" => $exito,
                "update" => $update
            );
            echo json_encode($data);

        }
         public function guardarelacion(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            //dd($request['frecuencia']);
            $insertar=DB::table('DP_PUESTOS_PROVEEDORES')->insertGetId(
                [
                    'PUESTOS_PROVEEDORES_DESCRIPCION' => $request['Proveedor'], 
                    'PUESTOS_PROVEEDORES_INSUMO'=> $request['insumo'],
                    'PUESTOS_PROVEEDORES_FRECUENCIA'=>  $request['frecuencia'],
                    'PUESTOS_PROVEEDORES_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')

                ]
            );

        if($insertar){
            DB::table('REL_PUESTOS_PROV_DESCRIPCION')->insert(
                    [
                        'FK_PUESTO_PROVEEDOR' => $insertar, 
                        'FK_DESCRIPCION' =>  $request['id_des']

                    ]
                        );
            $exito=true;
         }
         $data = array(
                "exito" => $exito,
                "id_puesto" => $insertar
              );

            echo json_encode($data);


        }

        public function guardarelacion2(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $exito=false;
            //dd($request['frecuencia']);
            $insertar=DB::table('DP_PUESTOS_CLIENTES')->insertGetId(
                [
                    'PUESTOS_CLIENTES_DESCRIPCION' => $request['puesto'], 
                    'PUESTOS_CLIENTES_PRODUCTO'=> $request['producto'],
                    'PUESTOS_CLIENTES_FRECUENCIA'=>  $request['frecuencia'],
                    'PUESTOS_CLIENTES_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
            if($insertar){
                DB::table('REL_PUESTOS_CLIENTES_DESCRIPCION')->insert(
                    [
                        'FK_PUESTO_CLIENTE' => $insertar, 
                        'FK_DESCRIPCION' =>  $request['id_des']
                    ]
                );
                $exito=true;
            }
            $data = array(
                "id_puesto" => $insertar
            );
            echo json_encode($data);
        }

        public function guardarcompetenciaG(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //$exito=false;
            //dd($request['competenciag']);
            $insertar=DB::table('DP_COMPETENCIAS_GENERICAS')->insertGetId(
                [
                    'COMPETENCIAS_GENERICAS_DESCRIPCION' => $request['competenciag'], 
                    'COMPETENCIAS_GENERICAS_GRADO'=> $request['indicador'],
                    'COMPETENCIAS_GENERICAS_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );

            if($insertar){
                DB::table('REL_COMPET_GENERICA_DESCRIPCION')->insert(
                        [
                            'FK_COMPET_GENERICA' => $insertar, 
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

        public function guardarcompetenciaT(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //$exito=false;
           // dd($request['competenciag']);
            $insertar=DB::table('DP_COMPETENCIAS_TECNICAS')->insertGetId(
                [
                    'COMPETENCIAS_TECNICAS_DESCRIPCION' => $request['competenciat'], 
                    'COMPETENCIAS_TECNICAS_GRADO_DOMINIO'=> $request['indicador'],
                    'COMPETENCIAS_TECNICAS_ESTATUS'=> 0,
                    'created_at' => date('Y-m-d H:i:s')

                ]
            );

            if($insertar){
                DB::table('REL_COMPET_TECNICA_DESCRIPCION')->insert(
                    [
                        'FK_COMPET_TECNICA' => $insertar, 
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

        public function ActualizarPuestoProveedor(Request $request){
            $id_puesto_prov = $request['id_puesto_prov'];
            $puesto = $request['puesto'];
            $insumo = $request['insumo'];
            $frecuencia = $request['frecuencia'];
            $update = DB::table('DP_PUESTOS_PROVEEDORES')
                ->where('PUESTOS_PROVEEDORES_ID', $id_puesto_prov)
                ->update([
                            'PUESTOS_PROVEEDORES_DESCRIPCION' => $puesto,
                            'PUESTOS_PROVEEDORES_INSUMO' => $insumo,
                            'PUESTOS_PROVEEDORES_FRECUENCIA' => $frecuencia,
                        ]);
            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

        public function ActualizarPuestoCliente(Request $request){
            $id_puesto_cliente = $request['id_puesto_cliente'];
            $puesto = $request['puesto'];
            $producto = $request['producto'];
            $frecuencia = $request['frecuencia'];
            $update = DB::table('DP_PUESTOS_CLIENTES')
                ->where('PUESTOS_CLIENTES_ID', $id_puesto_cliente)
                ->update([
                            'PUESTOS_CLIENTES_DESCRIPCION' => $puesto,
                            'PUESTOS_CLIENTES_PRODUCTO' => $producto,
                            'PUESTOS_CLIENTES_FRECUENCIA' => $frecuencia,
                        ]);
            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

        public function GuardarFormacionProfesional(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $area = $request['area'];
            $anios_exp = $request['anios_exp'];
            $nuevaProfesion = $request['nuevaProfesion'];
            $formacion = $request['formacion'];
            $id_descripcion = $request['descripcion'];
            $mensaje = "";

            //dd($id_descripcion);
            //dd($nuevaProfesion);
            $existeFormacion = DB::table('REL_PROFESION_DESCRIPCION')
                ->where('FK_DESCRIPCION',$id_descripcion)
                ->get();
            //dd(count($existeFormacion));
            if(count($existeFormacion)==0){
                //insertamos un nuevo registro en las tablas necesarias
                //dd('nuevo registro');
                $mensaje = "Informacion almacenada correctamente";
                if(strcmp($area, 'otro')==0){
                    DB::table('REL_PROFESION_DESCRIPCION')->insert(
                        [
                            'FK_DESCRIPCION' => $id_descripcion,
                            'REL_PROFESION_DESCRIPCION_OTROS' => $nuevaProfesion,
                            'REL_PROFESION_DESCRIPCION_ESTATUS'=> 0
                        ]
                    );
                }else{
                    DB::table('REL_PROFESION_DESCRIPCION')->insert(
                        [
                            'FK_PROFESION' => $formacion,
                            'FK_DESCRIPCION' => $id_descripcion,
                            'REL_PROFESION_DESCRIPCION_ESTATUS'=> 0
                        ]
                    );
                }
                $id_anios = DB::table('DP_AREAS_ANIOS_EXPERIENCIA')->insertGetId(
                    [
                        'AREAS_ANIOS_DESCRIPCION' => $anios_exp,
                        'AREAS_ANIOS_ESTATUS'=> 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );
                DB::table('REL_AREA_ANIOS_DESCRIPCION')->insert(
                    [
                        'FK_AREAS_ANIOS' => $id_anios,
                        'FK_DESCRIPCION' => $id_descripcion
                    ]
                );
            }else{
                //solo actualizamos los datos
                //dd('actualizacion de registro');
                $mensaje = "Informacion actualizada correctamente";
                if(strcmp($area, 'otro')==0){
                    //dd("otros");
                    DB::table('REL_PROFESION_DESCRIPCION')
                        ->where('FK_DESCRIPCION', $id_descripcion)
                        ->update(['FK_PROFESION'=> null]);

                    DB::table('REL_PROFESION_DESCRIPCION')
                        ->where('FK_DESCRIPCION', $id_descripcion)
                        ->update(['REL_PROFESION_DESCRIPCION_OTROS'=> $nuevaProfesion]);
                }else{
                    //dd('existente');
                    DB::table('REL_PROFESION_DESCRIPCION')
                        ->where('FK_DESCRIPCION', $id_descripcion)
                        ->update(['FK_PROFESION'=> $formacion]);
                    DB::table('REL_PROFESION_DESCRIPCION')
                        ->where('FK_DESCRIPCION', $id_descripcion)
                        ->update(['REL_PROFESION_DESCRIPCION_OTROS'=> null]);
                }

                //actualizamos los años de experiencia
                $getIdAnios = DB::table('REL_AREA_ANIOS_DESCRIPCION')
                    ->where('FK_DESCRIPCION',$id_descripcion)
                    ->select('FK_AREAS_ANIOS')
                    ->get();
                //dd($getIdAnios[0]->FK_AREAS_ANIOS);
                DB::table('DP_AREAS_ANIOS_EXPERIENCIA')
                    ->where('AREAS_ANIOS_EXPERIENCIA_ID', $getIdAnios[0]->FK_AREAS_ANIOS)
                    ->update(['AREAS_ANIOS_DESCRIPCION'=> $anios_exp]);
            }
            $data = array(
                "mensaje" => $mensaje
              );
            echo json_encode($data);
        }

    }//fin clase