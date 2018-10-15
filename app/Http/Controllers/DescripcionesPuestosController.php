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

        public function traeDescripciones($dependencia){
            //dd($dependencia);
            $relacion = DB::table('REL_DEPENDENCIA_DESCRIPCION')->where('FK_DEPENDENCIA',$dependencia)->get();
            $nom_dependencia = DB::table('DP_DEPENDENCIAS')->where('DEPENDENCIAS_ID',$dependencia)->get();
            //dd($nom_dependencia[0]);
            $descripciones = array();
            foreach ($relacion as $id_descripcion) {
                $descripcion = DB::table('DP_DESCRIPCIONES')
                ->select(
                    'DESCRIPCIONES_ID as ID_DESC', 
                    'DESCRIPCIONES_NOM_PUESTO as NOM_DESC',
                    'DESCRIPCIONES_N_REVISION as REVISION_DESC',
                    'DESCRIPCIONES_ESTATUS_GRAL as ESTATUS_DESC'
                    )
                ->where('DESCRIPCIONES_ID',$id_descripcion->FK_DESCRIPCION)->get();//*/
                $descripciones[] = $descripcion[0];
                //dd($id_descripcion->FK_DESCRIPCION);
            }

            //dd($descripciones[0][0]->ID_DESC);
            //dd($descripciones);

            //return view('gestionar_descripciones')->with('descripciones', $descripciones);
            return view('gestionar_descripciones',[
                'descripciones'=> $descripciones,
                'id_dependencia'=> $dependencia,
                'nomenclatura'=> $nom_dependencia[0]->DEPENDENCIAS_NOMENCLATURA,
                'dependencia' => $nom_dependencia[0]->DEPENDENCIAS_NOM_DEPENDENCIA
            ]);
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
                    'DESCRIPCIONES_FECHA_REVISION' => date('Y-m-d'), 
                    'DESCRIPCIONES_N_REVISION' => 1, 
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

    }