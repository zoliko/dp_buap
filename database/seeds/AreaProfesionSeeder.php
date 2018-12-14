<?php

use Illuminate\Database\Seeder;

class AreaProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
       	date_default_timezone_set('America/Mexico_City');
        $areas = array("CIENCIAS NATURALES Y DE SALUD","CIENCIAS SOCIALES Y HUMANIDADES","CIENCIAS ECONÓMICO ADMINISTRATIVAS","INGENIERIA Y CIENCIAS EXACTAS");
        $CS_NATURALES = array("BIOLOGÍA","BIOMEDICINA","ENFERMERÍA","ESTOMATOLOGÍA","FARMACIA","FISIOTERAPIA","INGENIERÍA AGROFORESTAL","INGENIERÍA AGROHIDRÁULICA","INGENIERÍA AGRÓNONO ZOOTECNISTA","MEDICINA","MEDICINA VETERINARIA Y ZOOTECNIA","QUÍMICA","QUÍMICO FARMACOBIÓLOGO");
        $CS_SOCIALES = array("ANTROPOLOGÍA SOCIAL","ARTE DRAMÁTICO","CIENCIAS POLÍTICAS","COMUNICACIÓN","CONSULTORÍA JURÍDICA","CULTURA FÍSICA","DANZA","DERECHO","ENSEÑANDA DEL INGLÉS","ENSEÑANZA DEL FRANCÉS","ETNOCOREOLOGÍA","FILOSOFÍA","HISTORIA","LINGÜISTICCA Y LITERATURA HISPÁNICA","MÚSICA","PROCESOS EDUCATIVOS","PSICOLOGÍA","RELACIONES INTERNACIONALES","SOCIOLOGÍA");
        $CS_ECOADMIN = array("ADMINISTRACIÓN DE EMPRESAS","ADMINISTRACIÓN PÚBLICA","ADMINISTRACIÓN PÚBLICA Y CIENCIAS POLÍTICAS","ADMINISTRACIÓN TURÍSTICA","ADMINISTRACIÓN Y DIRECCIÓN DE PYMES","COMERCIO INTERNACIONAL","CONTADURÍA PÚBLICA","ECONOMÍA","FINANZAS","GASTRONOMÍA");
        $CS_EXACTAS = array("ACTUARÍA","ARQUITECTURA","CIENCIAS DE LA COMPUTACIÓN","CIENCIAS DE LA ELECTRÓNICA","DISEÑO GRÁFICO","FÍSICA","FÍSICA APLICADA","INGENIERÍA AMBIENTAL","INGENIERÍA CIVIL","INGENIERÍA EN ALIMENTOS","INGENIERÍA EN CIENCIAS DE LA COMPUTACIÓN","INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN","INGENIERÍA GEOFÍSICA","INGENIERÍA INDUSTRIAL","INGENIERÍA MECÁNICA Y ELÉCTRICA","INGENIERÍA MECATRÓNICA","INGENIERÍA QUÍMICA","INGENIERÍA TEXTIL","INGENIERÍA TOPOGRÁFICA Y GEODÉSICA","MATEMÁTICAS","MATEMÁTICAS APLICADAS","URBANISMO Y DISEÑO AMBIENTAL");

        foreach ($areas as $area) {
        	DB::table('DP_CAT_AREAS')->insert(
			    [
			    	'CAT_AREAS_AREA' => $area, 
			    	'created_at' => date('Y-m-d H:i:s')
				]
			);
        }

        foreach ($CS_NATURALES as $profesion) {
        	$id_profesion = DB::table('DP_CAT_PROFESIONES')->insertGetId(
			    ['CAT_PROFESIONES_PROFESION' => $profesion]
			);
			DB::table('REL_PROFESION_AREA')->insert(
			    [
			    	'FK_PROFESION' => $id_profesion,
			    	'FK_AREA' => 1
			    ]
			);
        }

        foreach ($CS_SOCIALES as $profesion) {
        	$id_profesion = DB::table('DP_CAT_PROFESIONES')->insertGetId(
			    ['CAT_PROFESIONES_PROFESION' => $profesion]
			);
			DB::table('REL_PROFESION_AREA')->insert(
			    [
			    	'FK_PROFESION' => $id_profesion,
			    	'FK_AREA' => 2
			    ]
			);
        }

        foreach ($CS_ECOADMIN as $profesion) {
        	$id_profesion = DB::table('DP_CAT_PROFESIONES')->insertGetId(
			    ['CAT_PROFESIONES_PROFESION' => $profesion]
			);
			DB::table('REL_PROFESION_AREA')->insert(
			    [
			    	'FK_PROFESION' => $id_profesion,
			    	'FK_AREA' => 3
			    ]
			);
        }

        foreach ($CS_EXACTAS as $profesion) {
        	$id_profesion = DB::table('DP_CAT_PROFESIONES')->insertGetId(
			    ['CAT_PROFESIONES_PROFESION' => $profesion]
			);
			DB::table('REL_PROFESION_AREA')->insert(
			    [
			    	'FK_PROFESION' => $id_profesion,
			    	'FK_AREA' => 4
			    ]
			);
        }


    }
}
