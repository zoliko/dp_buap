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

        public function subirArchivos(Request $request){
            //dd($request);
            $error=null;
            $idArchivo=null;
            $nombreArchivo = $request->archivo->getClientOriginalName();
            $nuevoNombre = $request['identificador'].'_'.$nombreArchivo;
            $pathArchivo = 'public/'.$request['carpeta'].'/'.$nuevoNombre;

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
                    'ARCHIVOS_RUTA' => $pathArchivo
                ]);//*/

                //registrando relacion con la tabla
                if(strcasecmp($request['carpeta'], "dependencias")==0){
                    //dd("Registro en la carpeta de dependencias");
                    DB::table('REL_ARCHIVOS_DEPENDENCIAS')->insert([
                        'FK_ARCHIVO' => $idArchivo,
                        'FK_DEPENDENCIA' => $request['identificador']
                    ]);
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

        public function eliminarArchivoDependencia(Request $request){
            $id_archivo = $request['id_archivo'];
            $ruta_archivo = $request['ruta_archivo'];
            $error = null;
            //dd($ruta_archivo);
            if(Storage::exists($ruta_archivo)){
                DB::table('REL_ARCHIVOS_DEPENDENCIAS')
                ->where('FK_ARCHIVO', $id_archivo)
                ->delete();
                /*DB::table('DP_ARCHIVOS')
                ->where('ARCHIVOS_ID', $id_archivo)
                ->delete();
                Storage::delete($ruta_archivo);//*/
            }else{
                $error = "El archivo no existe o ya fué eliminado por otra persona";
            }
            $data = array(
                "error"=>$error
              );

            echo json_encode($data);//*/
        }
    }
