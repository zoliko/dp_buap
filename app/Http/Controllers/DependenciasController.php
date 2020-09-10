<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;//gestion de archivos
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class DependenciasController extends Controller
    {
        /**
         * Show the profile for the given user.
         *
         * @param  int  $id
         * @return Response
         */

        //Generar reportes

        public function SolicutudesCancelarSolicitud(Request $request){
            // dd($request);
            $id_comentario = DB::table('DP_COMENTARIOS')
                ->insertGetId(
                    [
                        'COMENTARIOS_COMENTARIO' => $request['motivo_cancelacion'],
                        'created_at' => DescripcionesPuestosController::ObtenerFechaHora()
                    ]
            );
            $update = DB::table('REL_REGISTRO')
              ->where('FK_REGISTRO', $request['id_solicitud'])
              ->update([
                    'FK_COMENTARIO' => $id_comentario,
                    'REL_REGISTRO_STATUS' => -1
                ]);

            $data = array(
                "update" => $update
            );
            echo json_encode($data);

        }

        public function OrganigramasInvalidos(){
            // dd('te encontré');
            $rel_organigramas = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                ->where('ORGANIGRAMA_DEPENDENCIA','ORGANIGRAMA INVALIDO')
                ->get();
            // dd($rel_organigramas);
            $organigramas = array();
            foreach ($rel_organigramas as $id_organigrama) {
                $tmp_organigramas = DB::table('DP_ARCHIVOS')
                    ->where('ARCHIVOS_ID',$id_organigrama->FK_ARCHIVO)
                    ->get();

                $tmp_organigramas[0]->ID_DEPENDENDIA = $id_organigrama->FK_DEPENDENCIA;
                $tmp_organigramas[0]->DEPENDENCIA = DependenciasController::ObtenerNombreDependencia($id_organigrama->FK_DEPENDENCIA);

                $organigramas[]=$tmp_organigramas[0];
                // dd($tmp_organigramas[0]);
            }
            
            // return view('listado_organigramas_revision');
            // dd($organigramas);
            return view('listado_organigramas_invalidos')->with (["organigramas"=>$organigramas]);
        }

        public function RevisionOrganigramas(){
            // dd('te encontré');
            $rel_organigramas = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                ->where('ORGANIGRAMA_DEPENDENCIA','ORGANIGRAMA SIN VERIFICAR')
                ->get();
            // dd($rel_organigramas);
            $organigramas = array();
            foreach ($rel_organigramas as $id_organigrama) {
                $tmp_organigramas = DB::table('DP_ARCHIVOS')
                    ->where('ARCHIVOS_ID',$id_organigrama->FK_ARCHIVO)
                    ->get();

                $tmp_organigramas[0]->ID_DEPENDENDIA = $id_organigrama->FK_DEPENDENCIA;
                $tmp_organigramas[0]->DEPENDENCIA = DependenciasController::ObtenerNombreDependencia($id_organigrama->FK_DEPENDENCIA);

                $organigramas[]=$tmp_organigramas[0];
                // dd($tmp_organigramas[0]);
            }
            
            // return view('listado_organigramas_revision');
            // dd($organigramas);
            return view('listado_organigramas_revision')->with (["organigramas"=>$organigramas]);
        }


        //validación de usuario en dependencias
        public function redirigeDependencias(){
            $categoria = \Session::get('categoria')[0];
            switch ($categoria) {
                case 'DIRECTOR_DRH':
                    return view('dependencias');
                    break;
                case 'FACILITADOR':
                    return view('dependencias');
                    break;
                case 'CGA':
                    return view('dependencias');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }

        public function SolicutudesModificacionDescripciones(){
            // dd('epale');
            $descripciones = DB::table('DP_DESCRIPCIONES')
                    ->select(
                        'DESCRIPCIONES_ID as ID_DESC', 
                        'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                        'DESCRIPCIONES_DIRECCION as DIR_DESC',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                        'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                        'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC',
                        'DESCRIPCIONES_ESTATUS as ESTATUS'
                    )->where("DESCRIPCIONES_ESTATUS",'MODIFICACIÓN')
                    ->get();//*/
                foreach ($descripciones as $descripcion) {
                    $descripcion->DEPENDENCIA = 'BACHILLERATO';
                    $rel_dependencia = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                        ->where("FK_DESCRIPCION",$descripcion->ID_DESC)
                        ->get();//*/
                    $descripcion->DEPENDENCIA = DependenciasController::ObtenerNombreDependencia($rel_dependencia[0]->FK_DEPENDENCIA);
                }
            // dd($descripciones);
            return view('listado_solicitud_bajas')->with (["descripciones"=>$descripciones]);
        }

        public function SolicutudesBajaDescripciones(){
            // dd('epale');
            $descripciones = DB::table('DP_DESCRIPCIONES')
                    ->select(
                        'DESCRIPCIONES_ID as ID_DESC', 
                        'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                        'DESCRIPCIONES_DIRECCION as DIR_DESC',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESC',
                        'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                        'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC',
                        'DESCRIPCIONES_ESTATUS as ESTATUS'
                    )->where("DESCRIPCIONES_ESTATUS",'SOLICITUD DE BAJA')
                    ->get();//*/
                foreach ($descripciones as $descripcion) {
                    $rel_dependencia = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                        ->where("FK_DESCRIPCION",$descripcion->ID_DESC)
                        ->get();//*/
                    $descripcion->DEPENDENCIA = DependenciasController::ObtenerNombreDependencia($rel_dependencia[0]->FK_DEPENDENCIA);
                }
            // dd($descripciones);
            return view('listado_modificacion')->with (["descripciones"=>$descripciones]);
        }

        public function SolicutudesDependencias(){
            $rel_solicitudes = DB::table('REL_REGISTRO')
                ->select(
                    'FK_REGISTRO as ID_REGISTRO',
                    'FK_DEPENDENCIA as ID_DEPENDENDIA',
                    'FK_ARCHIVO as ORGANIGRAMA'
                        )
                ->where('REL_REGISTRO_STATUS',0)
                ->get();
            $solicitudes = array();
            foreach ($rel_solicitudes as $solicitud) {
                $tmp_solicitud = DB::table('DP_REGISTRO')
                    ->select(
                        'REGISTRO_ID as ID_REGISTRO',
                        'REGISTRO_ENCARGADO as ENCARGADO_REGISTRO',
                        'REGISTRO_CONTACTO as CONTACTO_REGISTRO',
                        'REGISTRO_ID_TRABAJADOR as ID_TRABAJADOR_REGISTRO',
                        'REGISTRO_MAIL as MAIL_REGISTRO'
                    )
                    ->where('REGISTRO_ID',$solicitud->ID_REGISTRO)
                    ->get();
                $tmp_solicitud[0]->ID_DEPENDENCIA = $solicitud->ID_DEPENDENDIA;
                $tmp_solicitud[0]->DEPENDENCIA = DependenciasController::ObtenerNombreDependencia($solicitud->ID_DEPENDENDIA);
                // $tmp_solicitud[0]->ORGANIGRAMA = ArchivosController::ObtenerRutaArchivo($solicitud->ORGANIGRAMA);
                $tmp_solicitud[0]->ORGANIGRAMA = $solicitud->ORGANIGRAMA;
                $solicitudes[] = $tmp_solicitud[0];
            }
            // dd($solicitudes);
            return view('listado_solicitudes')->with (["solicitudes"=>$solicitudes]);
            
        }

        public static function ObtenerNombreDependencia($id_dependencia){
            $dependencia = DB::table('DP_DEPENDENCIAS')
                ->where('DEPENDENCIAS_ID',$id_dependencia)
                ->select('DEPENDENCIAS_NOM_DEPENDENCIA')
                ->get();
            $nom_dependencia = $dependencia[0]->DEPENDENCIAS_NOM_DEPENDENCIA;
            //dd($nom_dependencia);
            return $nom_dependencia;
        }

        public function SolicitarRevision(Request $request){
            //dd($request);
            
            date_default_timezone_set('America/Mexico_City');
       
            // dd('epale ::D');
            $id_registro = DB::table('DP_REGISTRO')->insertGetId(
                [
                    'REGISTRO_ENCARGADO' => $request['encargado'], 
                    'REGISTRO_CONTACTO' => $request['contacto'], 
                    'REGISTRO_ID_TRABAJADOR' => $request['id_trabajador'], 
                    'REGISTRO_MAIL' => $request['mail'],
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );

            $path = Storage::putFile('public/organigramas', $request->file('organigrama'));
            
            $idArchivo = DB::table('DP_ARCHIVOS')->insertGetId([
                    'ARCHIVOS_NOMBRE' => 'Organigrama_Solicitud_'.$id_registro,
                    'ARCHIVOS_RUTA' => $path,
                    'created_at' => date('Y-m-d H:i:s')
                ]);//
            // $id_archivo = 1;

            DB::table('REL_REGISTRO')->insert(
                [
                    'FK_REGISTRO' => $id_registro, 
                    'FK_DEPENDENCIA' => $request['dependencia'], 
                    'FK_ARCHIVO' => $idArchivo,
                    'REL_REGISTRO_STATUS' => 0
                ]
            );

            //*/
            // dd('Epale');
            $dependencia = DependenciasController::ObtenerNombreDependencia($request['dependencia']);
            MailsController::NotificarSolicitudRevision($request['mail'],$dependencia,$request['encargado'],$request['contacto'],$request['mail']);
            $data = array(
                "dependencias"=>$id_registro
              );

            echo json_encode($data);//*/
        }

        //validación de usuario en nueva dependencia dependencias
        public function redirigeNuevaDependencia(){
            $categoria = \Session::get('categoria')[0];
            switch ($categoria) {
                case 'FACILITADOR':
                    return view('crear_dependencia');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }

        //funcion que trae todas las dependencias
        public function traeDependencias(Request $request){
            //dd('Epale');
            $dependencias = DB::table('DP_DEPENDENCIAS')->select('DEPENDENCIAS_ID as ID_DEP', 'DEPENDENCIAS_NOM_DEPENDENCIA as NOM_DEP','DEPENDENCIAS_ACTIVA as ACTIVA')->get();
            //dd($dependencias);

            $data = array(
                "dependencias"=>$dependencias,
                "total" => count($dependencias)
              );

            echo json_encode($data);//*/
        }

        //funcion que solo trae las dependencias activas junto con us cabeza de sector
        public function traeDependenciasActivas(Request $request){
            //$dependencias = array();
            $dependencias = DB::table('DP_DEPENDENCIAS')->whereNotNull('DEPENDENCIAS_ACTIVA')->select('DEPENDENCIAS_ID as ID_DEP', 'DEPENDENCIAS_NOM_DEPENDENCIA as NOMBRE_DEP','DEPENDENCIAS_NOM_TITULAR as TITULAR_DEP')->get();
            //dd($dependencias[0]);
            $i=0;
            foreach ($dependencias as $dependencia) {
                $relacion = DB::table('REL_CABEZA_SECTOR')->where('FK_DEPENDENCIA',$dependencia->ID_DEP)->get();
                if(count($relacion)>0){
                    $CABEZA_SECTOR = DB::table('DP_DEPENDENCIAS')->where('DEPENDENCIAS_ID',$relacion[0]->FK_CABEZA_SECTOR)->get();
                    $dependencia->CABEZA_SECTOR = $CABEZA_SECTOR[0]->DEPENDENCIAS_NOM_DEPENDENCIA;
                }else{
                    $dependencia->CABEZA_SECTOR = "NA";
                }
                $i++;
            }
            $data = array(
                "dependencias"=>$dependencias,
                "total" => count($dependencias)
              );

            echo json_encode($data);//*/
        }

        public function registrarDependencia(Request $request){
            //dd($request);
            date_default_timezone_set('America/Mexico_City');
            $fl = false;
            $dependencia = $request['dependencia'];
            $nomenclatura = $request['nomenclatura'];
            $titular = $request['titular'];
            $fl_cabeza_sector = $request['fl_cabeza_sector'];
            $cabeza_sector = $request['cabeza_sector'];//
            $update = DB::table('DP_DEPENDENCIAS')
                ->where('DEPENDENCIAS_ID', $dependencia)
                ->update([
                    'DEPENDENCIAS_NOMENCLATURA' => $nomenclatura, 
                    'DEPENDENCIAS_NOM_TITULAR' => $titular, 
                    'DEPENDENCIAS_CABEZA_SECTOR' => ((strcmp($fl_cabeza_sector,"false")==0)?1:0),
                    'DEPENDENCIAS_ACTIVA' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            if(strcmp($fl_cabeza_sector,"true")==0){
                DB::table('REL_CABEZA_SECTOR')->insert([
                    'FK_DEPENDENCIA' => $dependencia,
                    'FK_CABEZA_SECTOR' => $cabeza_sector
                ]);
            }
            if($update){
                $fl=true;
            }
            $data = array(
                "update"=>$update,
                "exito" => $fl
              );

            echo json_encode($data);//*/
            //$existe = DB::table('DP_DEPENDENCIAS')->where(['DEPENDENCIAS_CABEZA_SECTOR'=> $cabeza_sector)->get();
        }


    }