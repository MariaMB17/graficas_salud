<?php

namespace app\controllers;

use Yii;
use yii\web\Session;

class indicadoresclaves {

    public function indicadorclave() {
        $session = Yii::$app->session;
        $db = Yii::$app->db;

        $tarea = $mes = $provincia = $nivelA = $unidadE = null;

        $tarea = $session['tarea'];
        $mes = $session['mes'];
        $provincia = $session['provincias'];
        $nivelA = $session['nivelA'];
        $unidadE = $session['unidadE'];

        switch ($tarea) {

          case 'mes':

              if ($mes == '13') {
                $sql = $db->createCommand("SELECT sum(`ambulatorio`) as ambulatorio,
                                                  sum(`hospitalizado`) as hospitalizado,
                                                  sum(`urgencias`) as urgencias,
                                                  sum(estudiosRealizaods) as estudiosRealizaods,
                                                  sum(estudiosInformados) as estudiosInformados,
                                                  sum(estudiosPendientes) as estudiosPendientes,
                                                  sum(estudiosInterpretacionPosterior) as estudiosInterpretacionPosterior,
                                                  sum(estudiosCancelados) as estudiosCancelados,
                                                  sum(estudiosAgendados) as estudiosAgendados
                                                  FROM `indicadoresclave` WHERE  `filtro` = 'Nacional' ")->queryAll();
              }else {
                $sql = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '$mes' and filtro ='Nacional'")->queryAll();
              }

          break;

          case 'provincia':
              if ($mes == 13) {
                $sql = $db->createCommand("SELECT sum(`ambulatorio`) as ambulatorio,
                                                  sum(`hospitalizado`) as hospitalizado,
                                                  sum(`urgencias`) as urgencias,
                                                  sum(estudiosRealizaods) as estudiosRealizaods,
                                                  sum(estudiosInformados) as estudiosInformados,
                                                  sum(estudiosPendientes) as estudiosPendientes,
                                                  sum(estudiosInterpretacionPosterior) as estudiosInterpretacionPosterior,
                                                  sum(estudiosCancelados) as estudiosCancelados,
                                                  sum(estudiosAgendados) as estudiosAgendados
                                                  FROM `indicadoresclave` WHERE  filtro ='$provincia' ")->queryAll();
              }else{
                $sql = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '$mes' and filtro ='$provincia'")->queryAll();
              }


          break;

          case 'nivel':
              if ($mes == 13) {
                $sql = $db->createCommand("SELECT sum(`ambulatorio`) as ambulatorio,
                                                  sum(`hospitalizado`) as hospitalizado,
                                                  sum(`urgencias`) as urgencias,
                                                  sum(estudiosRealizaods) as estudiosRealizaods,
                                                  sum(estudiosInformados) as estudiosInformados,
                                                  sum(estudiosPendientes) as estudiosPendientes,
                                                  sum(estudiosInterpretacionPosterior) as estudiosInterpretacionPosterior,
                                                  sum(estudiosCancelados) as estudiosCancelados,
                                                  sum(estudiosAgendados) as estudiosAgendados
                                                  FROM `indicadoresclave` WHERE filtro ='$nivelA' ")->queryAll();
              }else{
                $sql = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '$mes' and filtro ='$nivelA'")->queryAll();
              }


          break;

          case 'Ejecutora':
              if ($mes == 13) {
                $sql = $db->createCommand("SELECT sum(`ambulatorio`) as ambulatorio,
                                                  sum(`hospitalizado`) as hospitalizado,
                                                  sum(`urgencias`) as urgencias,
                                                  sum(estudiosRealizaods) as estudiosRealizaods,
                                                  sum(estudiosInformados) as estudiosInformados,
                                                  sum(estudiosPendientes) as estudiosPendientes,
                                                  sum(estudiosInterpretacionPosterior) as estudiosInterpretacionPosterior,
                                                  sum(estudiosCancelados) as estudiosCancelados,
                                                  sum(estudiosAgendados) as estudiosAgendados
                                                  FROM `indicadoresclave` WHERE filtro ='$unidadE' ")->queryAll();
              }else{
                $sql = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '$mes' and filtro ='$unidadE'")->queryAll();
              }


          break;


        }

        $ambulatorio = $hospitalizado = $urgencias = 0;
        $EstudioR = $EstudioI = $EstudioP = $EstudioPost = $EstudioC = 0;

        foreach ($sql as $row) {
            $ambulatorio = $row['ambulatorio'];
            $hospitalizado = $row['hospitalizado'];
            $urgencias = $row['urgencias'];

            $EstudioR2 = $row['estudiosRealizaods'];
            $EstudioI2 = $row['estudiosInformados'];
            $EstudioP2 = $row['estudiosPendientes'];
            $EstudioPost2 = $row['estudiosInterpretacionPosterior'];
            $EstudioC2 = $row['estudiosCancelados'];



            if ($row['estudiosRealizaods'] <= 100) {
                $EstudioR = $row['estudiosRealizaods'];
                $EstudioI = $row['estudiosInformados'];
                $EstudioP = $row['estudiosPendientes'];
                $EstudioPost = $row['estudiosInterpretacionPosterior'];
                $EstudioC = $row['estudiosCancelados'];
            }else {
                $EstudioR = 100;
                $EstudioI = number_format(($row['estudiosInformados']*100)/$row['estudiosRealizaods'],1,'.','');
                $EstudioP = number_format(($row['estudiosPendientes']*100)/$row['estudiosRealizaods'],1,'.','');
                $EstudioPost = number_format(($row['estudiosInterpretacionPosterior']*100)/$row['estudiosRealizaods'],1,'.','');
                $EstudioC = number_format(($row['estudiosCancelados']*100)/$row['estudiosRealizaods'],1,'.','');
            }

            $graficasIndicador = array($EstudioR,$EstudioI,$EstudioP,$EstudioPost,$EstudioC);
    				$graficaIndicador = implode(',',$graficasIndicador);

        }

        $nacional = array(
                          'ambulatorio' => $ambulatorio,
                          'hospitalizado' => $hospitalizado,
                          'urgencias' => $urgencias,
                          'EstudioR' => $EstudioR2,
                          'EstudioI' => $EstudioI2,
                          'EstudioP' => $EstudioP2,
                          'EstudioPost' => $EstudioPost2,
                          'EstudioC' => $EstudioC2,
                          'graficaIndicador' => $graficaIndicador);

        return $nacional;


    }



    public function indicadorMeses() {

        $session = Yii::$app->session;
        $db = Yii::$app->db;

        $tarea = $mes = $provincia = $nivelA = $unidadE = null;

        $tarea = $session['tarea'];
        $mes = $session['mes'];
        $provincia = $session['provincias'];
        $nivelA = $session['nivelA'];
        $unidadE = $session['unidadE'];

        $mes = $db->createCommand("SELECT ID,MES FROM `mes` where id<MONTH (NOW())")->queryAll();

        $meses  = array();

        switch ($tarea) {

          case 'mes':

              for ($i=0; $i < count($mes) ; $i++) {
                  $meses[] = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '".$mes[$i]['ID']."' and filtro ='Nacional'")->queryAll();
                }

          break;

          case 'provincia':
              for ($i=0; $i <count($mes) ; $i++) {
                $meses[] = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '".$mes[$i]['ID']."' and filtro ='$provincia'")->queryAll();
              }

          break;

          case 'nivel':
              for ($i=0; $i <count($mes) ; $i++) {
                $meses[] = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '".$mes[$i]['ID']."' and filtro ='$nivelA'")->queryAll();
              }


          break;

          case 'Ejecutora':
              for ($i=0; $i <count($mes) ; $i++) {
                $meses[] = $db->createCommand("SELECT * FROM indicadoresclave WHERE mes = '".$mes[$i]['ID']."' and filtro ='$unidadE'")->queryAll();
              }


          break;


        }

        $ambulatorio = $hospitalizado = $urgencias = array();
        $realizados = $informados = $pendientes = $posteriors = $cancelados = array();

        for ($i=0; $i < count($mes) ; $i++) {
            $ambulatorio[] = $meses[$i][0]['ambulatorio'];
            $hospitalizado[] = $meses[$i][0]['hospitalizado'];
            $urgencias[] = $meses[$i][0]['urgencias'];
            $realizados[] = $meses[$i][0]['estudiosRealizaods'];
            $informados[] = $meses[$i][0]['estudiosInformados'];
            $pendientes[] = $meses[$i][0]['estudiosPendientes'];
            $posteriors[] = $meses[$i][0]['estudiosInterpretacionPosterior'];
            $cancelados[] = $meses[$i][0]['estudiosCancelados'];
        }

        $ambu = implode(',',$ambulatorio);
        $hospi = implode(',',$hospitalizado);
        $urge = implode(',',$urgencias);
        $realizado = implode(',',$realizados);
        $informado = implode(',',$informados);
        $pendiente = implode(',',$pendientes);
        $posterior = implode(',',$posteriors);
        $cancelado = implode(',',$cancelados);

        return $graficaMeses = array(
                                'amb' => $ambu,
                                'hosp' => $hospi,
                                'urg' => $urge,
                                'realizado' => $realizado,
                                'informado' => $informado,
                                'pendiente' => $pendiente,
                                'posterior' => $posterior,
                                'cancelado' => $cancelado,
                                        );


    }



}
