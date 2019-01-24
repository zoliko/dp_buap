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

        public function abrirDescripcionRevision($ID_descripcion){
            $descripcion = DescripcionesPuestosController::ontenerDescripcion($ID_descripcion);
            return view('formulario_revision') ->with ("descripcion",$descripcion);
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
                                'PROPOSITO_GENERAL_ID as ID_PROPOSITO_GENERAL',
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
                    $profesion->ID_AREA = $area->CAT_AREAS_ID;
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
            //dd(count($FormacionProfesional));
            if(count($FormacionProfesional) != 0){
                //actualizamos los años de experiencia
                $getIdAnios = DB::table('REL_AREA_ANIOS_DESCRIPCION')
                    ->where('FK_DESCRIPCION',$ID_descripcion)
                    ->select('FK_AREAS_ANIOS')
                    ->get();
                $aniosExperiencia = DB::table('DP_AREAS_ANIOS_EXPERIENCIA')
                    ->where('AREAS_ANIOS_EXPERIENCIA_ID',$getIdAnios[0]->FK_AREAS_ANIOS)
                    ->get();
                $getIdArea = DB::table('REL_PROFESION_AREA')
                    ->where('FK_PROFESION',$FormacionProfesional[0]->ID_PROFESION)
                    ->select('FK_AREA')
                    ->get();
                if(count($getIdArea)>0){
                    $FormacionProfesional[0]->AREA_PROFESION = $getIdArea[0]->FK_AREA;                   
                }else{
                    $FormacionProfesional[0]->AREA_PROFESION = null;
                }

                $FormacionProfesional[0]->ANIOS_EXPERIENCIA_PROFESION = $aniosExperiencia[0]->AREAS_ANIOS_DESCRIPCION;
                $FormacionProfesional[0]->ID_AREA_ANIOS_PROFESION = $aniosExperiencia[0]->AREAS_ANIOS_EXPERIENCIA_ID;
                $descripcion['FORMACION_PROFESIONAL'] = $FormacionProfesional[0];
            }else{
                $descripcion['FORMACION_PROFESIONAL'] = null;
            }
            //dd($FormacionProfesional[0]);


            //obteniendo las competencias generales
            $relCompGen = DB::table('REL_COMPET_GENERICA_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_COMPET_GENERICA'])
                ->get();
            $competencias_genericas = array();
            foreach ($relCompGen as $competencia){
                $CompGen = DB::table('DP_COMPETENCIAS_GENERICAS')
                    ->where('COMPETENCIAS_GENERICAS_ID',$competencia->FK_COMPET_GENERICA)
                    ->select([
                                'COMPETENCIAS_GENERICAS_ID as ID_COMPETENCIA_GENERICA',
                                'COMPETENCIAS_GENERICAS_DESCRIPCION as DESCRIPCION_COMPETENCIA_GENERICA',
                                'COMPETENCIAS_GENERICAS_GRADO as GRADO_COMPETENCIA_GENERICA',
                                'COMPETENCIAS_GENERICAS_ESTATUS as ESTATUS_COMPETENCIA_GENERICA',
                                'COMPETENCIAS_GENERICAS_MENSAJE as MENSAJE_COMPETENCIA_GENERICA',
                            ])
                    ->get();
                $competencias_genericas[]=$CompGen[0];
            }
            $descripcion['COMPETENCIAS_GENERICAS'] = $competencias_genericas;

            //obteniendo las competencias generales
            $relCompTec = DB::table('REL_COMPET_TECNICA_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_COMPET_TECNICA'])
                ->get();
            $competencias_tecnicas = array();
            foreach ($relCompTec as $competencia){
                $CompTec = DB::table('DP_COMPETENCIAS_TECNICAS')
                    ->where('COMPETENCIAS_TECNICAS_ID',$competencia->FK_COMPET_TECNICA)
                    ->select([
                                'COMPETENCIAS_TECNICAS_ID as ID_COMPETENCIA_TECNICA',
                                'COMPETENCIAS_TECNICAS_DESCRIPCION as DESCRIPCION_COMPETENCIA_TECNICA',
                                'COMPETENCIAS_TECNICAS_GRADO_DOMINIO as GRADO_COMPETENCIA_TECNICA',
                                'COMPETENCIAS_TECNICAS_ESTATUS as ESTATUS_COMPETENCIA_TECNICA',
                                'COMPETENCIAS_TECNICAS_MENSAJE as MENSAJE_COMPETENCIA_TECNICA',
                            ])
                    ->get();
                $competencias_tecnicas[]=$CompTec[0];
            }
            $descripcion['COMPETENCIAS_TECNICAS'] = $competencias_tecnicas;

            //obteniendo idioma
            $relIdioma = DB::table('REL_IDIOMA_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_IDIOMA'])
                ->get();
            $idioma = null;
            if(count($relIdioma)>0){
                $idioma = DB::table('DP_IDIOMAS')
                    ->where('IDIOMAS_ID',$relIdioma[0]->FK_IDIOMA)
                    ->select([
                                'IDIOMAS_ID as ID_IDIOMA',
                                'IDIOMAS_IDIOMA as IDIOMA',
                                'IDIOMAS_NIVEL_DOMINIO as NIVEL_DOMINIO_IDIOMA',
                                'IDIOMAS_ESTATUS as ESTATUS_IDIOMA',
                                'IDIOMAS_GRADO_MENSAJE as MENSAJE_IDIOMA',
                            ])
                    ->get();
            }
            $descripcion['IDIOMA'] = $idioma[0];

            //obteniendo computacion
            $relComputacion = DB::table('REL_COMPUTACION_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select(['FK_COMPUTACION'])
                ->get();
            $computacion = null;
            if(count($relComputacion)>0){
                $computacion = DB::table('DP_COMPUTACION')
                    ->where('COMPUTACION_ID',$relComputacion[0]->FK_COMPUTACION)
                    ->select([
                                'COMPUTACION_ID as ID_COMPUTACION',
                                'COMPUTACION_PAQUETERIA_SISTEMA as PAQUETERIA_COMPUTACION',
                                'COMPUTACION_NIVEL_DOMINIO as NIVEL_DOMINIO_COMPUTACION',
                                'COMPUTACION_ESTATUS as ESTATUS_COMPUTACION',
                                'COMPUTACION_GRADO_MENSAJE as MENSAJE_COMPUTACION',
                            ])
                    ->get();
            }
            $descripcion['COMPUTACION'] = $computacion[0];

            //obtencion de la lista de distribucion
            //primero obtenemos todos los puestos que tiene esa dependencia
            $rel_dep_des = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select('FK_DEPENDENCIA')
                ->get();
            $rel_puestos_dep = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                ->where([
                            ['FK_DEPENDENCIA',$rel_dep_des[0]->FK_DEPENDENCIA],
                            ['FK_DESCRIPCION','!=',$ID_descripcion],
                        ])
                ->select('FK_DESCRIPCION')
                ->get();
            $puestos = array();
            foreach ($rel_puestos_dep as $puesto) {
                $tmp_puestos = DB::table('DP_DESCRIPCIONES')
                    ->where('DESCRIPCIONES_ID',$puesto->FK_DESCRIPCION)
                    ->select(
                                'DESCRIPCIONES_ID  as ID_PUESTO',
                                'DESCRIPCIONES_NOM_PUESTO as NOMBRE_PUESTO'
                            )
                    ->get();
                $puestos[]=$tmp_puestos[0];
            }
            $descripcion['PUESTOS'] = $puestos;
            //dd($puestos);

            //enviamos los puestos con sus id para poder utilizarlos en la impresion
            $puestos_id = array();
            foreach ($rel_puestos_dep as $puesto) {
                $tmp_puestos = DB::table('DP_DESCRIPCIONES')
                    ->where('DESCRIPCIONES_ID',$puesto->FK_DESCRIPCION)
                    ->select(
                                'DESCRIPCIONES_ID  as ID_PUESTO',
                                'DESCRIPCIONES_NOM_PUESTO as NOMBRE_PUESTO'
                            )
                    ->get();
                $puestos_id[$tmp_puestos[0]->ID_PUESTO]=$tmp_puestos[0];
            }
            //dd($puestos_id);
            $descripcion['PUESTOS_ID'] = $puestos_id;

            //Obteniendo la relacion de la lista de distribución
            $rel_des_ldis = DB::table('REL_LDISTRIBUCION_DESCRIPCION')
                ->where('FK_DESCRIPCION',$ID_descripcion)
                ->select('FK_LISTA_DISTRIBUCION')
                ->get();
            $l_distribucion = array();
            foreach ($rel_des_ldis as $puesto) {
                $tmp_puestos = DB::table('DP_DESCRIPCIONES')
                    ->where('DESCRIPCIONES_ID',$puesto->FK_LISTA_DISTRIBUCION)
                    ->select(
                                'DESCRIPCIONES_ID  as ID_PUESTO',
                                'DESCRIPCIONES_NOM_PUESTO as NOMBRE_PUESTO'
                            )
                    ->get();
                $l_distribucion[]=$tmp_puestos[0];
            }
            $descripcion['LISTA_DISTRIBUCION'] = $rel_des_ldis;
            //dd($rel_des_ldis);
            //return view('formulario') ->with ("descripcion",$descripcion);
            return $descripcion;
        }

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
 
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
            //dd("Epale");
            //$exito=false;
            //dd($request['competenciag']);
            $insertar=DB::table('DP_COMPETENCIAS_GENERICAS')->insertGetId(
                [
                    'COMPETENCIAS_GENERICAS_DESCRIPCION' => $request['competenciag'], 
                    'COMPETENCIAS_GENERICAS_GRADO'=> $request['gradoDominio'],
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
                "exito" => $exito,
                "id_CG" => $insertar
            );
            echo json_encode($data);
        }

        public function guardarcompetenciaT(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //$exito=false;
           // dd($request['competenciag']);
            $insertar=DB::table('DP_COMPETENCIAS_TECNICAS')->insertGetId(
                [
                    'COMPETENCIAS_TECNICAS_DESCRIPCION' => $request['competenciaT'], 
                    'COMPETENCIAS_TECNICAS_GRADO_DOMINIO'=> $request['gradoDominio'],
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
                "exito" => $exito,
                "id_CT" => $insertar
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

        public function actualizarCompG(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $idCompetenciaG = $request['idCompetenciaG'];
            $competenciag = $request['competenciag'];
            $gradoDominio = $request['gradoDominio'];
            $id_des = $request['id_des'];
            $update = DB::table('DP_COMPETENCIAS_GENERICAS')
                ->where('COMPETENCIAS_GENERICAS_ID', $idCompetenciaG)
                ->update([
                            'COMPETENCIAS_GENERICAS_DESCRIPCION' => $competenciag,
                            'COMPETENCIAS_GENERICAS_GRADO' => $gradoDominio,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

        public function actualizarCompT(Request $request){
            //dd($request);
            date_default_timezone_set('America/Mexico_City');
            $idCompetenciaT = $request['idCompetenciaT'];
            $competenciat = $request['competencia'];
            $gradoDominio = $request['gradoDominio'];
            $update = DB::table('DP_COMPETENCIAS_TECNICAS')
                ->where('COMPETENCIAS_TECNICAS_ID', $idCompetenciaT)
                ->update([
                            'COMPETENCIAS_TECNICAS_DESCRIPCION' => $competenciat,
                            'COMPETENCIAS_TECNICAS_GRADO_DOMINIO' => $gradoDominio,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

        public function guardarIdioma(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //dd($request);
            $idioma = $request['idioma'];
            $nivelDiminio = $request['nivelDiminio'];
            $id_des = $request['id_des'];
            $idIdioma = '';
            $operacion='';
            $existe = DB::table('REL_IDIOMA_DESCRIPCION')
                ->select('FK_IDIOMA')
                ->where('FK_DESCRIPCION',$id_des)
                ->get();
            //dd($existe);
            if(count($existe)>0){
                //dd('Existe');
                $operacion = 'Existe';
                DB::table('DP_IDIOMAS')
                    ->where('IDIOMAS_ID', $existe[0]->FK_IDIOMA)
                    ->update([
                                'IDIOMAS_IDIOMA' => $idioma,
                                'IDIOMAS_NIVEL_DOMINIO' => $nivelDiminio,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
            }else{
                //dd('Nuevo');
                $operacion = 'Nuevo';
                $idIdioma = DB::table('DP_IDIOMAS')->insertGetId(
                    [
                        'IDIOMAS_IDIOMA' => $idioma,
                        'IDIOMAS_NIVEL_DOMINIO' => $nivelDiminio,
                        'IDIOMAS_ESTATUS' => 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );
                DB::table('REL_IDIOMA_DESCRIPCION')->insert(
                    [   
                        'FK_IDIOMA' => $idIdioma,
                        'FK_DESCRIPCION' => $id_des
                    ]
                );
            }

            $data = array(
                "idIdioma" => $idIdioma,
                'operacion' => $operacion
              );
            echo json_encode($data);
        }

        public function guardaComputacion(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //dd($request);
            $computacion = $request['computacion'];
            $nivelDiminio = $request['nivelDiminio'];
            $id_des = $request['id_des'];
            $idComputacion = '';
            $mensaje='';
            $existe = DB::table('REL_COMPUTACION_DESCRIPCION')
                ->select('FK_COMPUTACION')
                ->where('FK_DESCRIPCION',$id_des)
                ->get();
            //dd($existe);
            if(count($existe)>0){
                //dd('Existe');
                $mensaje = 'Información actualizada satisfactoriamente';
                DB::table('DP_COMPUTACION')
                    ->where('COMPUTACION_ID', $existe[0]->FK_COMPUTACION)
                    ->update([
                                'COMPUTACION_PAQUETERIA_SISTEMA' => $computacion,
                                'COMPUTACION_NIVEL_DOMINIO' => $nivelDiminio,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
            }else{
                //dd('Nueva computacion');
                $mensaje = 'Información almacenada satisfactoriamente';
                $idComputacion = DB::table('DP_COMPUTACION')->insertGetId(
                    [
                        'COMPUTACION_PAQUETERIA_SISTEMA' => $computacion,
                        'COMPUTACION_NIVEL_DOMINIO' => $nivelDiminio,
                        'COMPUTACION_ESTATUS' => 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );
                DB::table('REL_COMPUTACION_DESCRIPCION')->insert(
                    [   
                        'FK_COMPUTACION' => $idComputacion,
                        'FK_DESCRIPCION' => $id_des
                    ]
                );
            }

            $data = array(
                "idComputacion" => $idComputacion,
                'mensaje' => $mensaje
              );
            echo json_encode($data);
        }

        public function GuardarDistribucion(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $id_descripcion = $request['id_descripcion'];
            $id_puesto = $request['distribucion'];
            $dist_anterior = $request['dist_anterior'];
            $mensaje = '';
            $icono = '';
            $accion = '';
            //dd($dist_anterior);
            $existe = DB::table('REL_LDISTRIBUCION_DESCRIPCION')
                ->where([
                            ['FK_LISTA_DISTRIBUCION','=',$id_puesto],
                            ['FK_DESCRIPCION','=',$id_descripcion],
                        ])
                ->get();
            //dd($existe);
            if(count($existe) > 0){
                $mensaje = "El puesto ya fue enlazado con anterioridad";
                $icono = 'error';
                $accion = 'repetido';
            }else{
                if(strcmp($dist_anterior, '-1')==0){
                    //dd("Es nuevo");
                    DB::table('REL_LDISTRIBUCION_DESCRIPCION')->insert(
                        [   
                            'FK_LISTA_DISTRIBUCION' => $id_puesto,
                            'FK_DESCRIPCION' => $id_descripcion
                        ]
                    );
                    $mensaje = "Información registrada satisfactoriamente";
                    $icono = 'success';
                    $accion = 'nuevo';
                }else{
                    //dd('Eliminando existencia');
                    //dd($dist_anterior);
                    DB::table('REL_LDISTRIBUCION_DESCRIPCION')
                        ->where(
                            [   
                                'FK_LISTA_DISTRIBUCION' => $dist_anterior,
                                'FK_DESCRIPCION' => $id_descripcion
                            ])
                        ->delete();
                    DB::table('REL_LDISTRIBUCION_DESCRIPCION')->insert(
                        [   
                            'FK_LISTA_DISTRIBUCION' => $id_puesto,
                            'FK_DESCRIPCION' => $id_descripcion
                        ]
                    );
                    $mensaje = 'Información actualizada satisfactoriamente';
                    $icono = 'success';
                    $accion = 'actualizar';
                }
            }

            $data = array(
                'accion' => $accion,
                'icono' => $icono,
                'mensaje' => $mensaje
              );
            echo json_encode($data);

        }

        public function GuardaMensaje(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //dd($request['idElemento']);
            $opcion = $request['elemento'];
            $idElemento = $request['idElemento'];
            $mensaje = date('Y-m-d H:i:s').' - '.$request['mensaje'];
            $tabla = '';
            $campo = '';
            $id_descripcion = $request['id_descripcion'];
            switch ($opcion) {
                case '1':
                    //dd('Mensaje Proposito_General');
                    $tabla = 'DP_PROPOSITO_GENERAL';
                    $campoId = 'PROPOSITO_GENERAL_ID';
                    $campoMensaje = 'PROPOSITO_GENERAL_MENSAJE';
                    break;
                case '2':
                    //dd('Mensaje actividad_general');
                    $tabla = 'DP_ACTIVIDADES_GENERALES';
                    $campoId = 'ACTIVIDADES_GENERALES_ID';
                    $campoMensaje = 'ACTIVIDADES_GENERALES_MENSAJE';
                    break;
                case '3':
                    //dd('Mensaje actividad_especifica');
                    $tabla = 'DP_ACTIVIDADES_ESPECIFICAS';
                    $campoId = 'ACTIVIDADES_ESPECIFICAS_ID';
                    $campoMensaje = 'ACTIVIDADES_ESPECIFICAS_MENSAJE';
                    break;
                case '4':
                    //dd('Mensaje puesto-proveedor');
                    $tabla = 'DP_PUESTOS_PROVEEDORES';
                    $campoId = 'PUESTOS_PROVEEDORES_ID';
                    $campoMensaje = 'PUESTOS_PROVEEDORES_MENSAJE';
                    break;
                case '5':
                    //dd('Mensaje puesto-clientes');
                    $tabla = 'DP_PUESTOS_CLIENTES';
                    $campoId = 'PUESTOS_CLIENTES_ID';
                    $campoMensaje = 'PUESTOS_CLIENTES_MENSAJE';
                    break;
                case '6':
                    //dd('Mensaje formacion_profesional');
                    $tabla = 'REL_PROFESION_DESCRIPCION';
                    $campoId = 'FK_DESCRIPCION';
                    $idElemento = $id_descripcion;
                    $campoMensaje = 'REL_PROFESION_DESCRIPCION_MENSAJE';
                    break;
                case '7':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPETENCIAS_GENERICAS';
                    $campoId = 'COMPETENCIAS_GENERICAS_ID';
                    $campoMensaje = 'COMPETENCIAS_GENERICAS_MENSAJE';
                    break;
                case '8':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPETENCIAS_TECNICAS';
                    $campoId = 'COMPETENCIAS_TECNICAS_ID';
                    $campoMensaje = 'COMPETENCIAS_TECNICAS_MENSAJE';
                    break;
                case '9':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_IDIOMAS';
                    $campoId = 'IDIOMAS_ID';
                    $campoMensaje = 'IDIOMAS_GRADO_MENSAJE';
                    break;
                case '10':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPUTACION';
                    $campoId = 'COMPUTACION_ID';
                    $campoMensaje = 'COMPUTACION_GRADO_MENSAJE';
                    break;
                
                default:
                    dd('Error');
                    break;
            }
            $update = DB::table($tabla)
                ->where($campoId, $idElemento)
                ->update([$campoMensaje => $mensaje]);

            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

        public function CambiaEstus(Request $request){
            date_default_timezone_set('America/Mexico_City');
            //dd($request['estatus']);
            $opcion = $request['elemento'];
            $idElemento = $request['idElemento'];
            $estatus = $request['estatus'];
            $id_descripcion = $request['id_descripcion'];
            $tabla = '';
            $campo = '';
            switch ($opcion) {
                case '1':
                    //dd('Mensaje Proposito_General');
                    $tabla = 'DP_PROPOSITO_GENERAL';
                    $campoId = 'PROPOSITO_GENERAL_ID';
                    $campo = 'PROPOSITO_GENERAL_ESTATUS';
                    break;
                case '2':
                    //dd('Mensaje actividad_general');
                    $tabla = 'DP_ACTIVIDADES_GENERALES';
                    $campoId = 'ACTIVIDADES_GENERALES_ID';
                    $campo = 'ACTIVIDADES_GENERALES_ESTATUS';
                    break;
                case '3':
                    //dd('Mensaje actividad_especifica');
                    $tabla = 'DP_ACTIVIDADES_ESPECIFICAS';
                    $campoId = 'ACTIVIDADES_ESPECIFICAS_ID';
                    $campo = 'ACTIVIDADES_ESPECIFICAS_ESTATUS';
                    break;
                case '4':
                    //dd('Mensaje puesto-proveedor');
                    $tabla = 'DP_PUESTOS_PROVEEDORES';
                    $campoId = 'PUESTOS_PROVEEDORES_ID';
                    $campo = 'PUESTOS_PROVEEDORES_ESTATUS';
                    break;
                case '5':
                    //dd('Mensaje puesto-clientes');
                    $tabla = 'DP_PUESTOS_CLIENTES';
                    $campoId = 'PUESTOS_CLIENTES_ID';
                    $campo = 'PUESTOS_CLIENTES_ESTATUS';
                    break;
                case '6':
                    //dd('Mensaje formacion_profesional');
                    $tabla = 'REL_PROFESION_DESCRIPCION';
                    $campoId = 'FK_DESCRIPCION';
                    $idElemento = $id_descripcion;
                    $campo = 'REL_PROFESION_DESCRIPCION_ESTATUS';
                    break;
                case '7':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPETENCIAS_GENERICAS';
                    $campoId = 'COMPETENCIAS_GENERICAS_ID';
                    $campo = 'COMPETENCIAS_GENERICAS_ESTATUS';
                    break;
                case '8':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPETENCIAS_TECNICAS';
                    $campoId = 'COMPETENCIAS_TECNICAS_ID';
                    $campo = 'COMPETENCIAS_TECNICAS_ESTATUS';
                    break;
                case '9':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_IDIOMAS';
                    $campoId = 'IDIOMAS_ID';
                    $campo = 'IDIOMAS_ESTATUS';
                    break;
                case '10':
                    //dd('Mensaje competencia_generica');
                    $tabla = 'DP_COMPUTACION';
                    $campoId = 'COMPUTACION_ID';
                    $campo = 'COMPUTACION_ESTATUS';
                    break;
                
                default:
                    dd('Error');
                    break;
            }
            $update = DB::table($tabla)
                ->where($campoId, $idElemento)
                ->update([$campo => $estatus]);

            $data = array(
                "update" => $update
              );
            echo json_encode($data);
        }

    }//fin clase