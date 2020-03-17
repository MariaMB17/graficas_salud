<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\controllers\IndicadoresClaves;
use app\controllers\Disponibilidad;
use app\controllers\TiempoInforme;
use app\controllers\Productividad;


class GraficaController extends Controller{

	public function actionIndex($tarea=null,$mes=null,$provincia=null,$nivelA=null,$unidadE=null)
	{

		$session = Yii::$app->session;
		$db = Yii::$app->db;

		$session['tarea'] = $tarea;
		$session['mes'] = $mes;
		$session['provincias'] = $provincia;
		$session['nivelA'] = $nivelA;
		$session['unidadE'] = $unidadE;
		$session['filtro'] = "Nivel Nacional";

		if ($mes == null) {
			$session['nombreMes'] = 'MES';
		}

		if ($provincia !=null) {
				$session['filtro'] =$provincia;
		}

		if ($nivelA !=null) {
				if ($nivelA == 'Hospi') {
						$session['filtro'] ='Hospital';
				}

				if ($nivelA == 'Polic') {
						$session['filtro'] ='Policlínica';
				}

				if ($nivelA == 'ULAPS') {
						$session['filtro'] ='ULAPS';
				}

		}

		if ($unidadE !=null) {
				$sql4 = $db->createCommand("SELECT distinct `descripcion` FROM `provincias` where codigo ='$unidadE' ")->queryAll();
				foreach ($sql4 as $row) {
						$x = $row['descripcion'];
				}
				$session['filtro'] = $x;
		}




/*=============== PRIMERA GRAFICA DE INDICADORES DE CLAVE ========================*/

        $indicadorClave = new IndicadoresClaves();

        $indicadoresClaves = $indicadorClave->indicadorclave();
				$ambulatorio = $indicadoresClaves['ambulatorio'];
				$hospitalizado = $indicadoresClaves['hospitalizado'];
				$urgencias = $indicadoresClaves['urgencias'];
				$EstudioR = $indicadoresClaves['EstudioR'];
				$EstudioI = $indicadoresClaves['EstudioI'];
				$EstudioP = $indicadoresClaves['EstudioP'];
				$EstudioPost = $indicadoresClaves['EstudioPost'];
				$EstudioC = $indicadoresClaves['EstudioC'];
				$graficaIndicador = $indicadoresClaves['graficaIndicador'];

	/*============ GRAFICA PEQUEÑA 12 MESES ===========*/
				$meses = $indicadorClave->indicadorMeses();
				$ambu = $meses['amb'];
				$hospi = $meses['hosp'];
				$urge = $meses['urg'];
				$realizado = $meses['realizado'];
				$informado = $meses['informado'];
				$pendiente = $meses['pendiente'];
				$posterior = $meses['posterior'];
				$cancelado = $meses['cancelado'];


/*=============== PRIMERA GRAFICA DISPONIBILIDAD ========================*/

		$disponible = new Disponibilidad();
		$disp = $disponible->Disponible();

 		$promedioDisponible = $disp['promedioDisponible'];
 		$totalIndicador3 = $disp['totalIndicador3'];


	/*======== GRAFICA 12 MESES =================*/

		$meseDisponible = $disponible->DisponibleMese();
		$mesDisponible = $meseDisponible['mesesDisponible'];


/*============ TERCERA GRAFICA TIEMPOS DE INFORMES ========================*/

		$Tiempoinforme = new TiempoInforme();
		$tiempo = $Tiempoinforme->tiempoInforme();
		$tiempoGlobal = implode(",", $tiempo['global']);
		$tiempoHosp = implode(",", $tiempo['hosp']);
		$tiempoAmb = implode(",", $tiempo['amb']);
		$tiempoInt = implode(",", $tiempo['int']);
		$tiempoRem = implode(",", $tiempo['rem']);
		$tiempoUrg = implode(",", $tiempo['urg']);



		/*===============  GRAFICA PRODUCTIVIDAD ========================*/

				$productividad = new Productividad();
				$tiempoEpera = $productividad->tiempoEspera();
				$modalidad = $tiempoEpera['modalidad'];
				$valor = $tiempoEpera['valor'];
				$modalidad_ambulatorio = $tiempoEpera['modalidad_ambulatorio'];
				$valor_ambulatorio = $tiempoEpera['valor_ambulatorio'];
				$modalidad_hospitalizados = $tiempoEpera['modalidad_hospitalizados'];
				$valor_hospitalizados = $tiempoEpera['valor_hospitalizados'];
				$modalidad_urgencias = $tiempoEpera['modalidad_urgencias'];
		        $valor_urgencias = $tiempoEpera['valor_urgencias'];


				$personalEquipo = $productividad->personalEquipo();
				$totalPE = $personalEquipo['totalV'];
				$valorPE = $personalEquipo['valor'];
				$modalidadProductividad = $personalEquipo['modalidadProductividad'];
				$totalProductividad = $personalEquipo['totalProductividad'];
				$porcentaje = $personalEquipo['porcentaje'];
				$total_porcentaje = $personalEquipo['total_porcentaje'];
				$modalidadesP = $personalEquipo['modalidadesP'];
				$mensual = $personalEquipo['mensual'];
				$contador = $personalEquipo['contador'];
				$total_mesP = $personalEquipo['total_mesP'];
		        $mesproductividad = $personalEquipo['mesproductividad'];





/*========================== PARA REDIRECCIONAR VARIABLES A LA VISTA ========================*/
		return $this->render('index',[

			/*===== VARIABLES DE LA GRAFICA INDICADORES DE CLAVE =====*/
				'graficaIndicador' => $graficaIndicador,
				'ambulatorio' => $ambulatorio,
				'hospitalizado' => $hospitalizado,
				'urgencias' => $urgencias,
				'EstudioR' => $EstudioR,
				'EstudioI' => $EstudioI,
				'EstudioP' => $EstudioP,
				'EstudioPost' => $EstudioPost,
				'EstudioC' => $EstudioC,

				'amb' => $ambu,
				'hosp' => $hospi,
				'urg' => $urge,
				'realizado' => $realizado,
				'informado' => $informado,
				'pendiente' => $pendiente,
				'posterior' => $posterior,
				'cancelado' => $cancelado,


			/*==== VARIABLES DE LA GRAFICA DISPONIBILIDAD =======*/
				'mesDisponible' => $mesDisponible,
				'promedioDisponible' => $promedioDisponible,
				'totalIndicador3' => $totalIndicador3,

			/*==== VARIABLES DE LA GRAFICA TIEMPO DE INFORME =========*/
				'tiempoGlobal' => $tiempoGlobal,
				'tiempoHosp' => $tiempoHosp,
				'tiempoAmb' => $tiempoAmb,
				'tiempoInt' => $tiempoInt,
				'tiempoRem' => $tiempoRem,
				'tiempoUrg' => $tiempoUrg,

				/*==== VARIABLES PE =======*/
					'totalPE' => $totalPE,
					'valorPE' => $valorPE,
					'modalidadProductividad' => $modalidadProductividad,
	        'totalProductividad' => $totalProductividad,
	        'porcentaje' => $porcentaje,
	        'total_porcentaje' => $total_porcentaje,
	        'modalidadesP' => $modalidadesP,
	        'mensual' => $mensual,
	        'contador' => $contador,
	        'total_mesP' => $total_mesP,
      		'mesproductividad' => $mesproductividad,


				/*==== VARIABLES DE LA GRAFICA TIEMPO DE ESPERA =======*/

					'modalidad' => $modalidad,
					'valor' => $valor,
					'modalidad_ambulatorio' => $modalidad_ambulatorio,
          'valor_ambulatorio' => $valor_ambulatorio,
          'modalidad_hospitalizados' => $modalidad_hospitalizados,
          'valor_hospitalizados' => $valor_hospitalizados,
          'modalidad_urgencias' => $modalidad_urgencias,
          'valor_urgencias' => $valor_urgencias,

			]);
	}


	public function actionFecha()
    {
    	$session = Yii::$app->session;

        if (isset($_POST["mes"] ))
        {
            $mes = $_POST["mes"];
            $tarea = $_POST["tarea"];
        }

        if ($mes == 0) {
        	return $this->redirect(["grafica/index"]);
        }

        $session['nombreMes'] = $mes;

       return $this->redirect(["grafica/index",'tarea'=> $tarea ,'mes' => $mes]);

    }



	public function actionCerrar()
    {
    	$session = Yii::$app->session;
    	$session->close();
    	$session->destroy();

			return $this->redirect(["site/index"]);
    }




}
