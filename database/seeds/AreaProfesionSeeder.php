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
        $CS_NATURALES = array("ENFERMERÍA","BIOLOGÍA","QUÍMICO FARMACOBIÓLOGO","QUÍMICA","FARMACIA","BIOMEDICINA","INGENIERÍA AGROHIDRÁULICA","INGENIERÍA AGRÓNONO ZOOTECNISTA","MEDICINA VETERINARIA Y ZOOTECNIA","INGENIERÍA AGROFORESTAL");
        $CS_SOCIALES = array("ANTROPOLOGÍA SOCIAL","FILOSOFÍA","HISTORIA","LINGÜISTICCA Y LITERATURA HISPÁNICA","PROCESOS EDUCATIVOS","ARTE DRAMÁTICO","DANZA","ETNOCOREOLOGÍA","MÚSICA","CULTURA FÍSICA","ENSEÑANZA DEL FRANCÉS","ENSEÑANDA DEL INGLÉS","PSICOLOGÍA","COMUNICACIÓN","DERECHO","CONSULTORÍA JURÍDICA","CIENCIAS POLÍTICAS","RELACIONES INTERNACIONALES","SOCIOLOGÍA");
        $CS_ECOADMIN = array("ADMINISTRACIÓN PÚBLICA Y CIENCIAS POLÍTICAS","ADMINISTRACIÓN DE EMPRESAS","ADMINISTRACIÓN TURÍSTICA","COMERCIO INTERNACIONAL","ADMINISTRACIÓN PÚBLICA","ADMINISTRACIÓN Y DIRECCIÓN DE PYMES","CONTADURÍA PÚBLICA","ECONOMÍA","FINANZAS","GASTRONOMÍA");
        $CS_EXACTAS = array("FÍSICA APLICADA","MATEMÁTICAS","MATEMÁTICAS APLICADAS","ACTUARÍA","INGENIERÍA CIVIL","INGENIERÍA GEOFÍSICA","INGENIERÍA INDUSTRIAL","INGENIERÍA TOPOGRÁFICA Y GEODÉSICA","INGENIERÍA TEXTIL","INGENIERÍA QUÍMICA","INGENIERÍA EN ALIMENTOS","INGENIERÍA AMBIENTAL","INGENIERÍA MECÁNICA Y ELÉCTRICA","ARQUITECTURA","DISEÑO GRÁFICO","URBANISMO Y DISEÑO AMBIENTAL");

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
