<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\controllers\Productividad;

class DemandaController extends Controller{

	public function actionIndex()
    {
    	$db = Yii::$app->db;
        $session = Yii::$app->session;



				/*==================ESTUDIOS CANCELADOS ======================*/


						$agendamiento = new Productividad();
						$estudioCancelados = $agendamiento->agendamiento();
						$estudiosAgendados = $estudioCancelados['estudiosAgendados'];
						$totalestudioscanc = $estudioCancelados['totalestudioscanc'];
						$porcentajeestudioscanc = $estudioCancelados['porcentajeestudioscanc'];
						$total_mescanc = $estudioCancelados['total_mescanc'];
						$mescance = $estudioCancelados['mescance'];
						$total_mescanc = $estudioCancelados['total_mescanc'];
						$porcentajeecanc = $estudioCancelados['porcentajeecanc'];
						$estudiosc = $estudioCancelados['estudiosc'];
						$contadoTotalc = $estudioCancelados['contadoTotalc'];
						$porcentajeecancelados = $estudioCancelados['porcentajeecancelados'];
						$modalidadesecancelados = $estudioCancelados['modalidadesecancelados'];
						$totalecancelados = $estudioCancelados['totalecancelados'];
						$modalidadescanc = $estudioCancelados['modalidadescanc'];

						$productividad = new Productividad();
						$tiempoEpera = $productividad->tiempoEspera();
						$modalidad_ambulatorio = $tiempoEpera['modalidad_ambulatorio'];
						$valor_ambulatorio = $tiempoEpera['valor_ambulatorio'];
						$modalidad_hospitalizados = $tiempoEpera['modalidad_hospitalizados'];
						$valor_hospitalizados = $tiempoEpera['valor_hospitalizados'];
						$modalidad_urgencias = $tiempoEpera['modalidad_urgencias'];
				        $valor_urgencias = $tiempoEpera['valor_urgencias'];


				   		$CTAG	= $estudioCancelados['CTAG'];
				   		$MGAG	= $estudioCancelados['MGAG'];
				   		$MRAG	= $estudioCancelados['MRAG'];
				   		$OTAG	= $estudioCancelados['OTAG'];
				   		$RFAG	= $estudioCancelados['RFAG'];
				   		$RXAG	= $estudioCancelados['RXAG'];
				   		$USAG	= $estudioCancelados['USAG'];
				   		$XAAG	= $estudioCancelados['XAAG'];
				   		$MESAGE = $estudioCancelados['MESAGE'];

/*======================================================================================================
			ESTUDIOS CANCELADOS
=======================================================================================================*/

		$E_Cancelados = $agendamiento->Estudioscancelados();

		$totalCancelados = implode(",", $E_Cancelados['total']);
		$mesCancelados = implode(",", $E_Cancelados['mesCancelados']);

		$razon = implode(",", $E_Cancelados['razon']);
    $mesRazon = implode(",", $E_Cancelados['mesRazon']);

    $totalTipo = implode(",", $E_Cancelados['totalTipo']);
    $grupoEstudio = implode(",", $E_Cancelados['grupoEstudio']);




        return $this->render('index',[
															'CTAG'=>$CTAG,				                       
															'MGAG'=>$MGAG,
															'MRAG'=>$MRAG,
															'OTAG'=>$OTAG,
															'RFAG'=>$RFAG,
															'RXAG'=>$RXAG,
															'USAG'=>$USAG,
															'XAAG'=>$XAAG,
															'MESAGE'=>$MESAGE,
															'estudiosAgendados'=>$estudiosAgendados,
															'totalestudioscanc'=>$totalestudioscanc,
															'porcentajeestudioscanc'=>$porcentajeestudioscanc,
															'$total_mescanc'=>$total_mescanc,
															'mescance'=>$mescance,
															'total_mescanc'=>$total_mescanc,
															'porcentajeecanc'=> $porcentajeecanc,
															'estudiosc'=>$estudiosc,
															'contadoTotalc'=>$contadoTotalc,
															'porcentajeecancelados'=>$porcentajeecancelados,
															'modalidadesecancelados'=>$modalidadesecancelados,
															'totalecancelados'=>$totalecancelados,
															'modalidadescanc'=>$modalidadescanc,
															'modalidad_ambulatorio' => $modalidad_ambulatorio,
															'valor_ambulatorio' => $valor_ambulatorio,
															'modalidad_hospitalizados' => $modalidad_hospitalizados,
															'valor_hospitalizados' => $valor_hospitalizados,
															'modalidad_urgencias' => $modalidad_urgencias,
															'valor_urgencias' => $valor_urgencias,

															'totalCancelados' => $totalCancelados,
															'mesCancelados' => $mesCancelados,
															'razon' => $razon,
															'mesRazon' => $mesRazon,
															'totalTipo' => $totalTipo,
															'grupoEstudio' => $grupoEstudio,
														]);

    }



}
