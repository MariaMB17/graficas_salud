<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Action;
use yii\web\Session;
use app\controllers\Estudio;

class EstudioController extends Controller{

	public function actionIndex()
    {

    	$db = Yii::$app->db;
        $session = Yii::$app->session;



/*==========GRAFICA ESTUDIOS REALIZADOS ========================*/

		$estudio = new Estudio();
		$estudios = $estudio->estudio();

		/*======== UNIDAD EJECUTORA ================*/
		/*-------- GRAFICA -------------------------*/
		$unidadEjecutora = implode(',',$estudios['unidadEjecutora']);
		$realizados = implode(',',$estudios['realizados']);
		$informados = implode(',',$estudios['informados']);
		$pendientes = implode(',',$estudios['pendientes']);
		$tiempoPromedio = implode(',',$estudios['tiempoPromedio']);

		/*-------- TABLA -------------------------*/
		$unidadEjecutoras = $estudios['unidadEjecutora'];
		$E_realizadosTotal = $estudios['E_realizadosTotal'];
        $p_realizados = $estudios['p_realizados'];
        $p_informados = $estudios['p_informados'];
        $p_pendientes = $estudios['p_pendientes'];
        $r_activos = $estudios['r_activos'];
        $ep_radiologos = $estudios['ep_radiologos'];
        $t_activos = $estudios['t_activos'];
        $er_tecnicos = $estudios['er_tecnicos'];
        $promedio = $estudios['promedio'];
        $contador_unidad = $estudios['contador_unidad'];
        $unidades = $estudios['unidades'];


		/*======== MODALIDAD ================*/
		/*-------- GRAFICA -------------------------*/
		$modalidad = implode(',',$estudios['modalidad']);
		$realizadosM = implode(',',$estudios['realizadosM']);
		$informadosM = implode(',',$estudios['informadosM']);
		$pendientesM = implode(',',$estudios['pendientesM']);
		$tiempoPromedioM = implode(',',$estudios['tiempoPromedioM']);

		/*-------- TABLA -------------------------*/
		$modalidads = $estudios['modalidad'];
		$E_realizadosTotalM = $estudios['E_realizadosTotalM'];
        $p_realizadosM = $estudios['p_realizadosM'];
        $p_informadosM = $estudios['p_informadosM'];
        $p_pendientesM = $estudios['p_pendientesM'];
        $r_activosM = $estudios['r_activosM'];
        $ep_radiologosM = $estudios['ep_radiologosM'];
        $t_activosM = $estudios['t_activosM'];
        $er_tecnicosM = $estudios['er_tecnicosM'];
        $promedioM = $estudios['promedioM'];


		/*======== TIPO DE ESTUDIO ================*/
		/*-------- GRAFICA -------------------------*/
		$TipoEstudio = implode(',',$estudios['estudio']);
		$realizadosE = implode(',',$estudios['realizadosE']);
		$informadosE = implode(',',$estudios['informadosE']);
		$pendientesE = implode(',',$estudios['pendientesE']);
		$tiempoPromedioE = implode(',',$estudios['tiempoPromedioE']);

		/*-------- TABLA -------------------------*/
		$TipoEstudios = $estudios['estudio'];
		$E_realizadosTotalE = $estudios['E_realizadosTotalE'];
        $p_realizadosE = $estudios['p_realizadosE'];
        $p_informadosE = $estudios['p_informadosE'];
        $p_pendientesE = $estudios['p_pendientesE'];
        $r_activosE = $estudios['r_activosE'];
        $ep_radiologosE = $estudios['ep_radiologosE'];
        $t_activosE = $estudios['t_activosE'];
        $er_tecnicosE = $estudios['er_tecnicosE'];
        $promedioE = $estudios['promedioE'];


        return $this->render('index',[
																		/*======== UNIDAD EJECUTORA ================*/
																			/*----GRAFICA---------*/
																			'unidadEjecutora' => $unidadEjecutora,
																			'realizados' => $realizados,
																			'informados' => $informados,
																			'pendientes' => $pendientes,
																			'tiempoPromedio' => $tiempoPromedio,

																			/*----TABLA------*/
																			'unidadEjecutoras' => $unidadEjecutoras,
																			'E_realizadosTotal' =>$E_realizadosTotal,
                                                                            'p_realizados' => $p_realizados,
                                                                            'p_informados' => $p_informados,
                                                                            'p_pendientes' => $p_pendientes,
                                                                            'r_activos' => $r_activos,
                                                                            'ep_radiologos' => $ep_radiologos,
                                                                            't_activos' => $t_activos,
                                                                            'er_tecnicos' => $er_tecnicos,
                                                                            'promedio' => $promedio,
                                                                            'contador_unidad' => $contador_unidad,
                                                                            'unidades' => $unidades,


																		/*======== MODALIDAD ================*/
																			/*----GRAFICA--------*/
																			'modalidad' => $modalidad,
																			'realizadosM' => $realizadosM,
																			'informadosM' => $informadosM,
																			'pendientesM' => $pendientesM,
																			'tiempoPromedioM' => $tiempoPromedioM,

																			/*----TABLA--------*/
																			'modalidads' => $modalidads,
																			'E_realizadosTotalM' => $E_realizadosTotalM,
                                                                            'p_realizadosM' => $p_realizadosM,
                                                                            'p_informadosM' => $p_informadosM,
                                                                            'p_pendientesM' => $p_pendientesM,
                                                                            'r_activosM' => $r_activosM,
                                                                            'ep_radiologosM' => $ep_radiologosM,
                                                                            't_activosM' => $t_activosM,
                                                                            'er_tecnicosM' => $er_tecnicosM,
                                                                            'promedioM' => $promedioM,


																			/*======== TIPO DE ESTUDIO ================*/
																				/*----GRAFICA--------*/
																				'TipoEstudio' => $TipoEstudio,
																				'realizadosE' => $realizadosE,
																				'informadosE' => $informadosE,
																				'pendientesE' => $pendientesE,
																				'tiempoPromedioE' => $tiempoPromedioE,
																				/*----TABLA--------*/
																				'TipoEstudios' => $TipoEstudios,
																				'E_realizadosTotalE' => $E_realizadosTotalE,
                                                                                'p_realizadosE' => $p_realizadosE,
                                                                                'p_informadosE' => $p_informadosE,
                                                                                'p_pendientesE' => $p_pendientesE,
                                                                                 'r_activosE' => $r_activosE,
                                                                                 'ep_radiologosE' => $ep_radiologosE,
                                                                                 't_activosE' => $t_activosE,
                                                                                 'er_tecnicosE' => $er_tecnicosE,
                                                                                 'promedioE' => $promedioE,

        														]);


    }



}
