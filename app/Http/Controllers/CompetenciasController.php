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
                
                $tmp_descripcion = CompetenciasController::AgregaCompetencias($tmp_descripcion[0],$descripcion->FK_DESCRIPCION);
                // dd($tmp_descripcion);
                $descripciones[]=$tmp_descripcion;
            }
            // dd($descripciones);
            $data = array(
                "descripciones"=>$descripciones
              );

            echo json_encode($data);//*/
        }

        public function AgregaCompetencias($tmp_descripcion,$id_descripcion){
             // $tmp_descripcion[0]->COMPETENCIA
            //variables
                $rel_comp_generica = array();
                $rel_comp_tecnica = array();

                $tmp_descripcion->Analisis_de_problemas="";
                $tmp_descripcion->Apertura_al_cambio="";
                $tmp_descripcion->Aprendizaje="";
                $tmp_descripcion->Autoconfianza="";
                $tmp_descripcion->Autodesarrollo="";
                $tmp_descripcion->Comunicación_oral="";
                $tmp_descripcion->Control_de_actividades="";
                $tmp_descripcion->Delegacion="";
                $tmp_descripcion->Desarrollo_de_las_personas="";
                $tmp_descripcion->Dinamismo="";
                $tmp_descripcion->Dominio_de_estres="";
                $tmp_descripcion->Enfoque_a_la_calidad="";
                $tmp_descripcion->Enfoque_a_resultados="";
                $tmp_descripcion->Iniciativa="";
                $tmp_descripcion->Innovación="";
                $tmp_descripcion->Liderazgo="";
                $tmp_descripcion->Madurez_social="";
                $tmp_descripcion->Negocacion="";
                $tmp_descripcion->Organizacion="";
                $tmp_descripcion->Orientación_al_servicio="";
                $tmp_descripcion->Perseverancia="";
                $tmp_descripcion->Pensamiento_estratégico="";
                $tmp_descripcion->Persuacion="";
                $tmp_descripcion->Planeacion="";
                $tmp_descripcion->Sensibilidad_a_lineamiento="";
                $tmp_descripcion->Relaciones_interpersonales="";
                $tmp_descripcion->Toma_de_decisiones="";
                $tmp_descripcion->Trabajo_en_equipo="";
                $tmp_descripcion->Sensibilidad_a_Lineamientos="";
                $tmp_descripcion->OTRO="";

            $rel_comp_generica = DB::table('REL_COMPET_GENERICA_DESCRIPCION')
            ->where('FK_DESCRIPCION',$id_descripcion)
            ->get();
            foreach ($rel_comp_generica as $id_desc) {
                $comp_generica = DB::table('DP_COMPETENCIAS_GENERICAS')
                    ->where('COMPETENCIAS_GENERICAS_ID',$id_desc->FK_COMPET_GENERICA)
                    ->get();
                // dd($comp_generica);

                switch ($comp_generica[0]->COMPETENCIAS_GENERICAS_DESCRIPCION) {
                    
                    case 'Análisis de problemas':
                        $tmp_descripcion->Analisis_de_problemas = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Apertura al cambio':
                        $tmp_descripcion->Apertura_al_cambio = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Aprendizaje':
                        $tmp_descripcion->Aprendizaje = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Autoconfianza':
                        $tmp_descripcion->Autoconfianza = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Autodesarrollo':
                        $tmp_descripcion->Autodesarrollo = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Comunicación oral':
                        $tmp_descripcion->Comunicacion_oral = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Control de actividades':
                        $tmp_descripcion->Control_de_actividades = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Delegación':
                        $tmp_descripcion->Delegacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Desarrollo de las personas':
                        $tmp_descripcion->Desarrollo_de_las_personas = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Dinamismo':
                        $tmp_descripcion->Dinamismo = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Dominio de estrés':
                        $tmp_descripcion->Dominio_de_estres = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                             
                    case 'Enfoque a la calidad':
                        $tmp_descripcion->Enfoque_a_la_calidad = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                             
                    case 'Enfoque a resultados':
                        $tmp_descripcion->Enfoque_a_resultados = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                               
                    case 'Iniciativa':
                        $tmp_descripcion->Iniciativa = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Innovación':
                        $tmp_descripcion->Innovacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Liderazgo':
                        $tmp_descripcion->Liderazgo = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Madurez social':
                        $tmp_descripcion->Madurez_social = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Negocación':
                        $tmp_descripcion->Negocacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Organización':
                        $tmp_descripcion->Organizacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Orientación al servicio':
                        $tmp_descripcion->Orientación_al_servicio = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Perseverancia':
                        $tmp_descripcion->Perseverancia = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Pensamiento estratégico':
                        $tmp_descripcion->Pensamiento_estrategico = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Persuación':
                        $tmp_descripcion->Persuacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Planeación':
                        $tmp_descripcion->Planeacion = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Sensibilidad a lineamiento':
                        $tmp_descripcion->Sensibilidad_a_lineamiento = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Relaciones interpersonales':
                        $tmp_descripcion->Relaciones_interpersonales = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Toma de decisiones':
                        $tmp_descripcion->Toma_de_decisiones = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Trabajo en equipo':
                        $tmp_descripcion->Trabajo_en_equipo = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                                            
                    case 'Sensibilidad a Lineamientos':
                        $tmp_descripcion->Sensibilidad_a_Lineamientos = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                    default:
                        $tmp_descripcion->OTRO = $comp_generica[0]->COMPETENCIAS_GENERICAS_GRADO;
                        break;
                }
            }

            $rel_comp_tecnicas = DB::table('REL_COMPET_TECNICA_DESCRIPCION')
            ->where('FK_DESCRIPCION',$id_descripcion)
            ->get();
            $compTec = array();
            $dominioTec = array();
            foreach ($rel_comp_tecnicas as $id_desc) {
                $comp_tecnica = DB::table('DP_COMPETENCIAS_TECNICAS')
                    ->where('COMPETENCIAS_TECNICAS_ID',$id_desc->FK_COMPET_TECNICA)
                    ->get();
                $compTec[] = $comp_tecnica[0]->COMPETENCIAS_TECNICAS_DESCRIPCION;
                $dominioTec[] = $comp_tecnica[0]->COMPETENCIAS_TECNICAS_GRADO_DOMINIO;
            }
            $tmp_descripcion->Competencia_Tecnica1=(isset($compTec[0])?$compTec[0]:'');
            $tmp_descripcion->Dominio_Competencia_Tecnica1=(isset($dominioTec[0])?$dominioTec[0]:'');
            $tmp_descripcion->Competencia_Tecnica2=(isset($compTec[1])?$compTec[1]:'');
            $tmp_descripcion->Dominio_Competencia_Tecnica2=(isset($dominioTec[1])?$dominioTec[1]:'');
            $tmp_descripcion->Competencia_Tecnica3=(isset($compTec[2])?$compTec[2]:'');
            $tmp_descripcion->Dominio_Competencia_Tecnica3=(isset($dominioTec[2])?$dominioTec[2]:'');
            $tmp_descripcion->Competencia_Tecnica4=(isset($compTec[3])?$compTec[3]:'');
            $tmp_descripcion->Dominio_Competencia_Tecnica4=(isset($dominioTec[3])?$dominioTec[3]:'');
            $tmp_descripcion->Competencia_Tecnica5=(isset($compTec[4])?$compTec[4]:'');
            $tmp_descripcion->Dominio_Competencia_Tecnica5=(isset($dominioTec[4])?$dominioTec[4]:'');


            // dd($tmp_descripcion);
            return $tmp_descripcion;

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