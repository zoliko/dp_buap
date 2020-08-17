<?php
  namespace App\Http\Controllers;

    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request; //indispensable para usar Request de los JSON
    use Illuminate\Support\Facades\Storage;//gestion de archivos
    use Illuminate\Support\Facades\DB;//consulta a la base de datos

    class CompetenciasController extends Controller
    {
        /**
         * Show the profile for the given user.
         *
         * @param  int  $id
         * @return Response
         */

        //Generar reportes
        public function DescargarReporteCompetencias(Request $request){
            //dd($request);
            $rel_descripciones = DB::table('REL_DEPENDENCIA_DESCRIPCION')
                ->where('FK_DEPENDENCIA',$request['dependencia'])
                ->get();
            // dd($rel_descripciones);
            $descripciones = array();
            foreach ($rel_descripciones as $descripcion) {
                $tmp_descripcion = DB::table('DP_DESCRIPCIONES')
                ->select(
                        'DESCRIPCIONES_ID as ID_DESCRIPCION',
                        'DESCRIPCIONES_NOM_PUESTO as NOMBRE_PUESTO_DESCRIPCION',
                        'DESCRIPCIONES_AREA as AREA_DESCRIPCION',
                        'DESCRIPCIONES_CLAVE_PUESTO as CLAVE_DESCRIPCION',
                        'DESCRIPCIONES_NIVEL as NIVEL_DESCRIPCION'
                    )
                ->where('DESCRIPCIONES_ID',$descripcion->FK_DESCRIPCION)
                ->get();
                // $tmp_descripcion[0]->COMPETENCIA
                $descripciones[]=$tmp_descripcion[0];
            }
            // dd($descripciones);
            $data = array(
                "descripciones"=>$descripciones
              );

            echo json_encode($data);//*/
        }


        public function VistaCompetencias(){
            $categoria = \Session::get('categoria')[0];
            switch ($categoria) {
                case 'FACILITADOR':
                    return view('reporte_competencias');
                    break;
                default:
                    return redirect('/');
                    break;
            }
            // return view('reporte_competencias');
        }

    }