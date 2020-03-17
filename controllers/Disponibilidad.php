<?php

namespace app\controllers;

use Yii;
use yii\web\Session;

class Disponibilidad {

    public function Disponible(){

        $session = Yii::$app->session;
        $db = Yii::$app->db;

        $tarea = $mes = $tareas = null;

        $tarea = $session['tarea'];
        $mes = $session['mes'];
        $porcentajeDisp = "0.00";
        $sql = $indicadorTotal = $modalidad = $variable = array();
        $dias_disponible =1;


        if ($mes != "") {
            $tareas = "mes";
        }


        switch ($tareas) {
            case 'mes':

                    if ($mes !=13) {
                        $sql = $db->createCommand("SELECT `incidencia`,`indicador`,SUM(`tiempo_servicios`) AS TIEMPO
                                                    FROM `disponibilidad` WHERE MONTH(`incidencia`) = '$mes'
                                                    GROUP by `indicador`")->queryAll();

                        $ano = date("Y");
                        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
                        $dias_disponible = ($dias*24)*60;
                        $porcentajeDisp = "100";
                    }else{

                        $ano = date("Y");
                        $mesFecha = date("n");
                        $porcentajeDisp = "100";
                        $j =1;
                        for ($i=0; $i < $mesFecha ; $i++) {
                            $arregloMes[] = cal_days_in_month(CAL_GREGORIAN, $j++, $ano);
                        }
                        $sumaMeses = array_sum($arregloMes);
                        $dias_disponible = ($sumaMeses*24)*60;

                        $sql = $db->createCommand("SELECT `indicador`,sum(`TIEMPO_SERVICIOS`) AS TIEMPO, month(`incidencia`) as MES
                                                      FROM `disponibilidad` WHERE `incidencia`>= date_sub(curdate(), interval 12 month)
                                                      AND year(`incidencia`)=year(now())
                                                      group by  `indicador`")->queryAll();





                    }


            break;


        }


        $totalIndicador2 = array('Red','RIS','PACS','Equipo','RX','CT','MR','US','MG','XA','RF');
        $totalIndicador3 = array('Total','Red','RIS','PACS','Equipo','RX','CT','MR','US','MG','XA','RF');



        $total = $totalDispo = $totalDisp = $totalRed = $totalRis = $totalPacs = $totalEquipo = $totalCr = $totalDx = $totalCt = $totalMg = $totalMr = $totalUs = $totalXa = $porcentajeDisp;
        $totalInd = $red = $ris = $pacs = $equipo = $cr = $dx = $ct = $mg = $mr = $us = $xa = 0;
        $DispTotal = $var = $modalidades = $variables = array();


        for ($i=0; $i < count($sql) ; $i++) {

            if ($sql[$i]['indicador'] == 'Red') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'RIS') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'PACS') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'Equipo') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'RX') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'CT') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'MR') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'US') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'MG') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'XA') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

            if ($sql[$i]['indicador'] == 'RF') {
                $variables[$sql[$i]['indicador']] = number_format((($dias_disponible - $sql[$i]['TIEMPO'])/$dias_disponible)*100,2,'.','');
            }

        }

        $modalidades = array($variables);

        for ($i=0; $i <count($modalidades) ; $i++) {
            for ($j=0; $j < count($totalIndicador2); $j++) {
                if (isset($modalidades[$i][$totalIndicador2[$j]])) {
                    $indicadorTotals[] = $modalidades[$i][$totalIndicador2[$j]];
                }else{
                    $indicadorTotals[] = $porcentajeDisp;
                }
            }
        }


            for ($i=0; $i <count($indicadorTotals) ; $i++) {
                $totalInd = $totalInd + $indicadorTotals[$i];
                $total = number_format((($dias_disponible - $totalInd)/$dias_disponible)*100,2,'.','');
            }


        $promedioTotalDisp = array($total);

        $promedioDisponible = array_merge($promedioTotalDisp,$indicadorTotals);

        $array = array(
                        'promedioDisponible' => $promedioDisponible,
                        'totalIndicador3' => $totalIndicador3
                    );


        return $array;

    }


    public function DisponibleMese(){

        $db = Yii::$app->db;

        $mesesDisp = $db->createCommand("SELECT ID,MES FROM `mes` where id<MONTH (NOW())")->queryAll();
        $totalIndicador2 = array('Red','RIS','PACS','Equipo','RX','CT','MR','US','MG','XA','RF');

        for ($i=0; $i <count($totalIndicador2) ; $i++) {
            $sqlMese[] = $db->createCommand("SELECT count(`indicador`) as total,`indicador`,SUM(`tiempo_servicios`) AS TIEMPO,
                                                            (CASE Month(`incidencia`)
                                                            WHEN 01 THEN 'ENERO'
                                                            WHEN 02 THEN 'FEBRERO'
                                                            WHEN 03 THEN 'MARZO'
                                                            WHEN 04 THEN 'ABRIL'
                                                            WHEN 05 THEN 'MAYO'
                                                            WHEN 06 THEN 'JUNIO'
                                                            WHEN 07 THEN 'JULIO'
                                                            WHEN 08 THEN 'AGOSTO'
                                                            WHEN 09 THEN 'SEPTIEMBRE'
                                                            WHEN 10 THEN 'OCTUBRE'
                                                            WHEN 11 THEN 'NOVIEMBRE'
                                                            WHEN 12 THEN 'DICIEMBRE'
                                                            else '0' end) as MES
                                                            FROM `disponibilidad`
                                                            where `indicador`='".$totalIndicador2[$i]."'
                                                            group by month(`incidencia`)")->queryAll();
        }

        $meses12 = array($sqlMese);

        for ($i=0; $i <count($sqlMese) ; $i++) {
            for ($j=0; $j < count($sqlMese[$i]) ; $j++) {
                $var[$sqlMese[$i][$j]['indicador']][$sqlMese[$i][$j]['MES']] = number_format(((525600-$sqlMese[$i][$j]['TIEMPO'])/525600)*100,2,'.','');
            }

        }

        $vars = array($var);

        for ($i=0; $i < count($vars); $i++) {
            for ($j=0; $j < count($totalIndicador2) ; $j++) {
                for ($h=0; $h < count($mesesDisp); $h++) {
                    if (isset($vars[$i][$totalIndicador2[$j]])) {
                        if (isset($vars[$i][$totalIndicador2[$j]][$mesesDisp[$h]['MES']])) {
                            $mesess[$totalIndicador2[$j]][] = $vars[$i][$totalIndicador2[$j]][$mesesDisp[$h]['MES']];
                        }else{
                            $mesess[$totalIndicador2[$j]][] = "100";
                        }
                    }
                }
            }
        }


        $messs = array($mesess);

        for ($i=0; $i < count($messs); $i++) {
            for ($j=0; $j < count($totalIndicador2) ; $j++) {
                for ($h=0; $h < count($mesesDisp) ; $h++) {
                    if (isset($messs[$i][$totalIndicador2[$j]])) {
                        $otro[$totalIndicador2[$j]][] = $messs[$i][$totalIndicador2[$j]][$h];
                    }else{
                        $otro[$totalIndicador2[$j]][] = "100";
                    }

                }
            }
        }

        $mesesDisponible = array($otro);

        $graficaIndicador = array(
                                'mesesDisponible' => $otro
                                );

        return $graficaIndicador;

    }


}
