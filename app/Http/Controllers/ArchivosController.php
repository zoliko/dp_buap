<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;//gestion de archivos
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class ArchivosController extends Controller
    {
        /**
         * Show the profile for the given user.
         *
         * @param  int  $id
         * @return Response
         */

        public function ObtenerComentarioInvalidacion(Request $request){
            // dd($request);
            $id_organigrama = $request['id_archivo'];
            $rel_comentario = DB::table('REL_COMENTARIO_INVALIDACION')->where('FK_ARCHIVO', $id_organigrama)->get();
            // dd($rel_comentario[0]);
            // $comentario = DescripcionesPuestosController::ObtenetComentariosId( $rel_comentario[0]->FK_COMENTARIO );
            $comentario = DB::table('DP_COMENTARIOS')
                ->where('COMENTARIOS_ID', $rel_comentario[0]->FK_COMENTARIO)
                ->orderBy('created_at', 'desc')
                ->first();
            // dd($comentario->COMENTARIOS_COMENTARIO);

            // dd($comentario);
            $data = array(
                "comentario"=>$comentario->COMENTARIOS_COMENTARIO
              );

            echo json_encode($data);//*/
        }

        public function InvalidarOrganigrama(Request $request){
            // dd($request);

            $id_comentario = DB::table('DP_COMENTARIOS')
                ->insertGetId(
                    [
                        'COMENTARIOS_COMENTARIO' => $request['texto_invalidacion'],
                        'created_at' => DescripcionesPuestosController::ObtenerFechaHora()
                    ]
            );


            $update = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
              ->where('FK_ARCHIVO', $request['id_archivo'])
              ->update(['ORGANIGRAMA_DEPENDENCIA' => 'ORGANIGRAMA INVALIDO']);

            DB::table('REL_COMENTARIO_INVALIDACION')->insert(
                    [
                        'FK_COMENTARIO' => $id_comentario,
                        'FK_ARCHIVO' => $request['id_archivo']
                    ]
            );

            $data = array(
                "id_comentario"=>$id_comentario
              );

            echo json_encode($data);//*/
        }

        public function ValidarOrganigrama(Request $request){
            // dd($request);
            $update = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
              ->where('FK_ARCHIVO', $request['id_archivo'])
              ->update(['ORGANIGRAMA_DEPENDENCIA' => 'ORGANIGRAMA VERIFICADO']);

            $data = array(
                "update"=>$update
              );

            echo json_encode($data);//*/
        }

        public static function ObtenerRutaArchivo($id_archivo){
            $ruta = DB::table('DP_ARCHIVOS')
                ->select('ARCHIVOS_RUTA')
                ->where('ARCHIVOS_ID',$id_archivo)
                ->get();
            return $ruta[0]->ARCHIVOS_RUTA;
        }

        public function subirArchivos(Request $request){
            date_default_timezone_set('America/Mexico_City');
            // dd($request);
            $error=null;
            $idArchivo=null;
            $nombreArchivo = $request->archivo->getClientOriginalName();
            $nuevoNombre = $request['identificador'].'_'.$nombreArchivo;
            $pathArchivo = 'public/'.$request['carpeta'].'/'.$nuevoNombre;
            $categoria = \Session::get('categoria')[0];
            $tipo_archivo_origen = '';
            if(strcmp($request['tipo_archivo'],'organigrama')==0){
                $tipo_archivo_origen = 'ORGANIGRAMA SIN VERIFICAR';
            }else if(strcmp($request['tipo_archivo'],'archivo')==0){
                $tipo_archivo_origen = 'ARCHIVO DE DEPENDENCIA';
            }else{
                $tipo_archivo_origen = 'ARCHIVO DE DRH';
            }
            $i = 1;
            while(Storage::exists($pathArchivo)) {
                $nuevoNombre = $i."_".$nombreArchivo;
                $i++;
                $nuevoNombre = $request['identificador'].'_'.$nuevoNombre;
                $pathArchivo = 'public/'.$request['carpeta'].'/'.$nuevoNombre;
                //dd($nuevoNombre);
            }
            if(Storage::exists($pathArchivo)){
                $error = 'El archivo ya está almacenado en el sistema';
            }else{
                //movemos el arhivo
                $rutaArchivo = $request->file('archivo')->store('public/'.$request['carpeta']);
                $ext = pathinfo($rutaArchivo,PATHINFO_EXTENSION);//*/
                //cambiamos de nombre al archivo
                Storage::move($rutaArchivo,$pathArchivo);
                //registro del archivo a la base de datos
                $idArchivo = DB::table('DP_ARCHIVOS')->insertGetId([
                    'ARCHIVOS_NOMBRE' => $nuevoNombre,
                    'ARCHIVOS_RUTA' => $pathArchivo,
                    'created_at' => date('Y-m-d H:i:s')
                ]);//*/

                //registrando relacion con la tabla
                if(strcasecmp($request['carpeta'], "dependencias")==0){
                    // $update = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                    //     ->where('FK_DEPENDENCIA', $request['identificador'])
                    //     ->update(['ORGANIGRAMA_DEPENDENCIA' => '']);
                    //dd("Registro en la carpeta de dependencias");
                    
                   DB::table('REL_ARCHIVOS_DEPENDENCIAS')->insert([
                        'FK_ARCHIVO' => $idArchivo,
                        'FK_DEPENDENCIA' => $request['identificador'],
                        'ORGANIGRAMA_DEPENDENCIA' => $tipo_archivo_origen
                    ]); 
                    
                    //enviamos un mail de actualizción de organigrama
                    $id_dependencia = (int)$request['identificador'];
                    $dependencia = DependenciasController::ObtenerNombreDependencia($id_dependencia);
                    $asunto = 'Actualización de organigrama';
                    $titulo = 'Actualización de organigrama';
                    $mensaje = 'Buen día, le informamos que el organigrama de '.$dependencia.' ha sido actualizado';
                    //dd($usuario);
                    $mail = MailsController::MandarMensajeGenerico($asunto,$titulo,$mensaje,'marvineliosa@gmail.com');

                }else{
                    dd("Registrando en otra carpeta");
                }
            }
            $url_archivo = Storage::url('dependencias/'.$nuevoNombre);

            $data = array(
                "error"=>$error,
                "ID_ARCHIVO" => $idArchivo,
                "RUTA_ARCHIVO" => $pathArchivo,
                "URL_ARCHIVO" => $url_archivo,
                //"ruta"=>$rutaArchivo,
                //"ruta2"=>$pathArchivo,
                "NOMBRE_ARCHIVO" => $nuevoNombre
              );

            echo json_encode($data);//*/
        }

        public function TraerArchivosDependencia(Request $request){
            $id_dependencia = $request['dependencia'];
            $archivos = array();
            //dd($id_dependencia);
            $rel_archivos = DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                ->select('FK_ARCHIVO')
                ->where("FK_DEPENDENCIA",$id_dependencia)
                ->get();
            //dd($rel_archivos);
            $i=0;
            foreach ($rel_archivos as $archivo) {
                $tmp = DB::table('DP_ARCHIVOS')
                    ->select(
                                'ARCHIVOS_ID as ID_ARCHIVO',
                                'ARCHIVOS_NOMBRE as NOMBRE_ARCHIVO',
                                'ARCHIVOS_RUTA as RUTA_ARCHIVO'
                            )
                    ->where('ARCHIVOS_ID',$archivo->FK_ARCHIVO)
                    ->get();
                //dd($tmp[0]);
                $archivos[] = $tmp[0];
                //$archivos[$i]->URL_ARCHIVO = Storage::url('dependencias/13_bd_reportes.txt');
                $archivos[$i]->URL_ARCHIVO = Storage::url('dependencias/'.$archivos[$i]->NOMBRE_ARCHIVO);
                $i++;

            }
            $data = array(
                "archivos"=>$archivos
              );

            echo json_encode($data);//*/
        }

        public function descargarArchivo($carpeta,$nombre){
            $path_publico = "/public/".$carpeta."/".$nombre;
            $path_descarga = str_replace('\\', '/', storage_path('app').$path_publico);
            if(Storage::exists($path_publico)){
                return response()->download($path_descarga);
            }
            return view("errors.404");
        }

        public function descargarArchivoId($id_archivo){
            // dd($id_archivo);
            $ruta =  ArchivosController::ObtenerRutaArchivo($id_archivo);
            $ext = pathinfo($ruta, PATHINFO_EXTENSION);
            
            $nombre_archivo = 'OrganigramaSolicitud'.'.'.$ext;
            // dd($nombre_archivo);
            $path = str_replace('\\', '/', storage_path('app').'/'.$ruta);
            // dd($path_publico);
            // dd($path_descarga);
            if(Storage::exists($ruta)){
                // dd('algo');
                if(strcmp($ext, 'pdf')==0){
                    return response()->file($path,[
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="'.$nombre_archivo.'"'
                    ]);
                }else{
                    return response()->download($path,$nombre_archivo);
                }
                // return response()->download($path,$nombre_archivo);
            }
            return view("errors.404");
        }

        public function eliminarArchivoDependencia(Request $request){
            date_default_timezone_set('America/Mexico_City');
            $id_archivo = $request['id_archivo'];
            $ruta_archivo = $request['ruta_archivo'];
            $error = null;
            //dd($ruta_archivo);
            if(Storage::exists($ruta_archivo)){
                DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                    ->where('FK_ARCHIVO', $id_archivo)
                    ->delete();//*/
                DB::table('DP_ARCHIVOS')
                    ->where('ARCHIVOS_ID', $id_archivo)
                    ->update(['updated_at' => date('Y-m-d H:i:s')]);
            }else{
                $error = "El archivo no existe o ya fué eliminado por otra persona";
            }
            $data = array(
                "error"=>$error
              );

            echo json_encode($data);//*/
        }
    }
