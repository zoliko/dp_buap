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