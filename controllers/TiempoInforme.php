<?php

namespace app\controllers;

use Yii;
use yii\web\Session;

class TiempoInforme {

  public function tiempoInforme(){

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
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }else{
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }

          break;

          case 'provincia':
              if ($mes=='13') {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND provincia = '$provincia' GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND provincia = '$provincia' AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND provincia = '$provincia' AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND provincia = '$provincia' AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND provincia = '$provincia' AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND provincia = '$provincia' AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }else {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND provincia = '$provincia' GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND provincia = '$provincia' AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND provincia = '$provincia' AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND provincia = '$provincia' AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND provincia = '$provincia' AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND provincia = '$provincia' AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }


          break;

          case 'nivel':
              if ($mes=='13') {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `nivelAtencion` = '$nivelA' GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `nivelAtencion` = '$nivelA' AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `nivelAtencion` = '$nivelA' AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }else {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `nivelAtencion` = '$nivelA' GROUP BY `unidadEjecutora` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Hos'  GROUP BY `unidadEjecutora` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Amb'  GROUP BY `unidadEjecutora` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `nivelAtencion` = '$nivelA' AND `localRemoto` = 'L'  GROUP BY `unidadEjecutora` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `nivelAtencion` = '$nivelA' AND `localRemoto` = 'R'  GROUP BY `unidadEjecutora` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `nivelAtencion` = '$nivelA' AND `tipoPaciente` = 'Urg'  GROUP BY `unidadEjecutora` ")->queryAll();
              }

          break;

          case 'Ejecutora':
              if ($mes=='13') {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW()) AND `unidadEjecutora` = '$unidadE' GROUP BY `modalidad` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Hos'  GROUP BY `modalidad` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Amb'  GROUP BY `modalidad` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `unidadEjecutora` = '$unidadE' AND `localRemoto` = 'L'  GROUP BY `modalidad` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `unidadEjecutora` = '$unidadE' AND `localRemoto` = 'R'  GROUP BY `modalidad` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes <=MONTH (NOW())  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Urg'  GROUP BY `modalidad` ")->queryAll();
              }else {
                $global = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes' AND `unidadEjecutora` = '$unidadE' GROUP BY `modalidad` ")->queryAll();
                $hosp = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Hos'  GROUP BY `modalidad` ")->queryAll();
                $amb = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Amb'  GROUP BY `modalidad` ")->queryAll();
                $local = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `unidadEjecutora` = '$unidadE' AND `localRemoto` = 'L'  GROUP BY `modalidad` ")->queryAll();
                $remoto = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `unidadEjecutora` = '$unidadE' AND `localRemoto` = 'R'  GROUP BY `modalidad` ")->queryAll();
                $urg = $db->createCommand("SELECT * FROM `tiemposInforme` WHERE mes ='$mes'  AND `unidadEjecutora` = '$unidadE' AND `tipoPaciente` = 'Urg'  GROUP BY `modalidad` ")->queryAll();
              }

          break;

        }


        $contadorGlobal = $contadorGlobals = $minG = 0;
        $contadorG = 1;

        for ($i=0; $i < count($global) ; $i++) {
            $contadorGlobals = $contadorGlobals + $global[$i]['maximo'];
            $minG = $minG + $global[$i]['minimo'];
            $contadorG++;
         }

        $contadorGlobalMax = number_format(($contadorGlobals)/$contadorG,0,'.','');
        $contadorGlobalMin = number_format(($minG)/$contadorG,0,'.','');

        $parG = $imparG = $q3G = $q1G = 0 ;
        $totalG = $contadorGlobalMax + $contadorGlobalMin;
        if ($totalG/2 == 0) {
            $parG = $totalG;
        }else{
            $imparG = $totalG;
        }

        if ($parG) {
            $q1G = number_format(($parG*1)/4,0,'.','');
            $q3G = number_format(($parG*3)/4,0,'.','');
        }else{
          if ($imparG) {
              $q1G = number_format(1*($imparG+1)/4,0,'.','');
              $q3G = number_format(3*($imparG+1)/4,0,'.','');
          }
        }

        $ricG = $q3G - $q1G;
        $graficaGlobals = array($contadorGlobalMin,$q1G,$ricG,$q3G,$contadorGlobalMax);

        /*----------------- Hospitalizado ----------------------------------------------*/
        $contadorHosp = $contadorHosps = $minHosps = 0;
        $contadorH =1;

       foreach ($hosp as $row) {
            $contadorHosps = $contadorHosps + $row['maximo'];
            $minHosps = $minHosps + $row['minimo'];
            $contadorH++;
        }

        $contadorHospMax = number_format(($contadorHosps)/$contadorH,0,'.','');
        $contadorHospMin = number_format(($minHosps)/$contadorH,0,'.','');

        $parH = $imparH = $q3H = $q1H = 0 ;
        $totalH = $contadorHospMax + $contadorHospMin;
        if ($totalH/2 == 0) {
            $parH = $totalH;
        }else{
            $imparH = $totalH;
        }

        if ($parH) {
            $q1H = number_format(($parH*1)/4,0,'.','');
            $q3H = number_format(($parH*3)/4,0,'.','');
        }else{
          if ($imparH) {
              $q1H = number_format(1*($imparH+1)/4,0,'.','');
              $q3H = number_format(3*($imparH+1)/4,0,'.','');
          }
        }

        $ricH = $q3H - $q1H;
    $graficaHosp = array($contadorHospMin,$q1H,$ricH,$q3H,$contadorHospMax);


    /*----------------- Ambulatorio ----------------------------------------------*/

        $contadorAmbulatorio = $contadorAmbulatorios = $minAmbulatorios = 0;
        $contadorA = 1;


        foreach ($amb as $row) {
          $contadorAmbulatorios = $contadorAmbulatorios + $row['maximo'];
          $minAmbulatorios = $minAmbulatorios + $row['minimo'];
          $contadorA++;
      }

        $contadorAmbulatorioMax = number_format(($contadorAmbulatorios)/$contadorA,0,'.','');
        $contadorAmbulatorioMin = number_format(($minAmbulatorios)/$contadorA,0,'.','');

        $parA = $imparA = $q3A = $q1A = 0 ;
        $totalA = $contadorAmbulatorioMax + $contadorAmbulatorioMin;
        if ($totalA/2 == 0) {
            $parA = $totalA;
        }else{
            $imparA = $totalA;
        }

        if ($parA) {
            $q1A = number_format(($parA*1)/4,0,'.','');
            $q3A = number_format(($parA*3)/4,0,'.','');
        }else{
          if ($imparA) {
              $q1A = number_format(1*($imparA+1)/4,0,'.','');
              $q3A = number_format(3*($imparA+1)/4,0,'.','');
          }
        }

        $ricA = $q3A - $q1A;
        $graficaAmb = array($contadorAmbulatorioMin,$q1A,$ricA,$q3A,$contadorAmbulatorioMax);

        /*----------------- Interno ----------------------------------------------*/
        $contadorInterno = $contadorInternos = $minInternos = 0;
        $contadorI = 1;

        foreach ($local as $row) {
          $contadorInternos = $contadorInternos + $row['maximo'];
          $minInternos = $minInternos + $row['minimo'];
          $contadorI++;
      }

        $contadorInternoMax = number_format(($contadorInternos)/$contadorI,0,'.','');
        $contadorInternoMin = number_format(($minInternos)/$contadorI,0,'.','');

        $parI = $imparI = $q3I = $q1I = 0 ;
        $totalI = $contadorInternoMax + $contadorInternoMin;
        if ($totalI/2 == 0) {
            $parI = $totalI;
        }else{
            $imparI = $totalI;
        }

        if ($parI) {
            $q1I = number_format(($parI*1)/4,0,'.','');
            $q3I = number_format(($parI*3)/4,0,'.','');
        }else{
          if ($imparI) {
              $q1I = number_format(1*($imparI+1)/4,0,'.','');
              $q3I = number_format(3*($imparI+1)/4,0,'.','');
          }
        }

        $ricI = $q3I - $q1I;
        $graficaInt = array($contadorInternoMin,$q1I,$ricI,$q3I,$contadorInternoMax);


/*----------------- Remoto ----------------------------------------------*/
        $contadorRemoto = $contadorRemotos = $minRemotos = 0;
         $contadorR = 1;


        foreach ($remoto as $row) {
          $contadorRemotos = $contadorRemotos + $row['maximo'];
          $minRemotos = $minRemotos + $row['minimo'];
           $contadorR++;
      }

        $contadorRemotoMax = number_format(($contadorRemotos)/$contadorR,0,'.','');
        $contadorRemotoMin = number_format(($minRemotos)/$contadorR,0,'.','');

        $parR = $imparR = $q3R = $q1R = 0 ;
        $totalR = $contadorRemotoMax + $contadorRemotoMin;
        if ($totalR/2 == 0) {
            $parR = $totalR;
        }else{
            $imparR = $totalR;
        }

        if ($parR) {
            $q1R = number_format(($parR*1)/4,0,'.','');
            $q3R = number_format(($parR*3)/4,0,'.','');
        }else{
          if ($imparR) {
              $q1R = number_format(1*($imparR+1)/4,0,'.','');
              $q3R = number_format(3*($imparR+1)/4,0,'.','');
          }
        }

        $ricR = $q3R - $q1R;

        $graficaRem = array($contadorRemotoMin,$q1R,$ricR,$q3R,$contadorRemotoMax);

/*----------------- Urgencias ----------------------------------------------*/
        $contadorUrgencia = $contadorUrgencias = $minUrgencias = 0;
        $contadorU = 1;

        foreach ($urg as $row) {
          $contadorUrgencias = $contadorUrgencias + $row['maximo'];
          $minUrgencias = $minUrgencias + $row['minimo'];
           $contadorU++;
      }

        $contadorUrgenciaMax = number_format(($contadorUrgencias)/$contadorU,0,'.','');
        $contadorUrgenciaMin = number_format(($minUrgencias)/$contadorU,0,'.','');

        $parU = $imparU = $q3U = $q1U = 0 ;
        $totalU = $contadorUrgenciaMax + $contadorUrgenciaMin;
        if ($totalU/2 == 0) {
            $parU = $totalU;
        }else{
            $imparU = $totalU;
        }

        if ($parU) {
            $q1U = number_format(($parU*1)/4,0,'.','');
            $q3U = number_format(($parU*3)/4,0,'.','');
        }else{
          if ($imparU) {
              $q1U = number_format(1*($imparU+1)/4,0,'.','');
              $q3U = number_format(3*($imparU+1)/4,0,'.','');
          }
        }

        $ricU = $q3U - $q1U;

        $graficaU = array($contadorUrgenciaMin,$q1U,$ricU,$q3U,$contadorUrgenciaMax);

        return $array = array(
                    "global" => $graficaGlobals,
                    "hosp" => $graficaHosp,
                    "amb" => $graficaAmb,
                    "int" => $graficaInt,
                    "rem" => $graficaRem,
                    'urg' => $graficaU
                  );

  }



   public function TiempoInforme2(){
       $session = Yii::$app->session;
       $db = Yii::$app->db;

       $tarea = $mes = $provincia = $nivelA = $unidadE = null;

       $tarea = $session['tarea'];
       $mes = $session['mes'];
       $provincia = $session['provincias'];
       $nivelA = $session['nivelA'];
       $unidadE = $session['unidadE'];

       $graficaTiempoInformeHos = $graficaTiempoInforme = array();

       switch ($tarea) {
          case 'mes':

          if($mes==13){

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            group by `radiologo`")->queryAll();

           $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R'
                                          group by `nombre`
                                          order by nombre")->queryAll();

           $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Amb'  group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Hos'  group by `unidadEjecutora`")->queryAll();
          } else{


            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where mes = '$mes'
                                            group by `radiologo`,`mes`")->queryAll();

            $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R' and mes = '$mes'
                                          group by `nombre`,mes
                                          order by nombre")->queryAll();


            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Amb'  group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Hos'  group by `unidadEjecutora`")->queryAll();

          }
          break;

          case 'provincia':

          if($mes==13){

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where `provincia` = '$provincia'
                                            group by `radiologo`,provincia")->queryAll();

        $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R'
                                          and `provincia` = '$provincia'
                                          group by `nombre`,provincia
                                          order by nombre")->queryAll();

        $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme`
                                                        INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Amb'
                                                        and tiemposinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();

        $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme`
                                                        INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Hos'
                                                        and tiemposinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();


          }else{

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where mes = '$mes'
                                            and `provincia` = '$provincia'
                                            group by `radiologo`,`mes`,provincia")->queryAll();

        $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R' and mes = '$mes'
                                          and `provincia` = '$provincia'
                                          group by `nombre`,mes,provincia
                                          order by nombre")->queryAll();


            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                       (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme`
                                                        INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Amb'
                                                        and tiemposinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                       (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme`
                                                        INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Hos'
                                                        and tiemposinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();
        }
          break;

          case 'nivel':

          if($mes==13){



             $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where `nivelAtencion` = '$nivelA'
                                            group by `radiologo`,`nivelAtencion`")->queryAll();

          $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R'
                                          and `nivelAtencion` = '$nivelA'
                                          group by `nombre`,`nivelAtencion`
                                          order by nombre")->queryAll();



            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Amb' and `nivelAtencion` ='$nivelA'  group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Hos' and `nivelAtencion` ='$nivelA'  group by `unidadEjecutora`")->queryAll();

          }else{

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where mes = '$mes'
                                            and `nivelAtencion` = '$nivelA'
                                            group by `radiologo`,`mes`,`nivelAtencion`")->queryAll();

          $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R' and mes = '$mes'
                                          and `nivelAtencion` = '$nivelA'
                                          group by `nombre`,mes,`nivelAtencion`
                                          order by nombre")->queryAll();


            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Amb' and `nivelAtencion` ='$nivelA'  group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Hos' and `nivelAtencion` ='$nivelA'  group by `unidadEjecutora`")->queryAll();
        }
          break;

          case 'Ejecutora':

          if($mes==13){

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where `unidadEjecutora` = '$unidadE'
                                            group by `radiologo`,`unidadEjecutora`")->queryAll();

          $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R'
                                          and `unidad` = '$unidadE'
                                          group by `nombre`,`unidad`
                                          order by nombre")->queryAll();


            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Amb' and `unidadEjecutora` ='$unidadE' group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `tipoPaciente` ='Hos' and `unidadEjecutora` ='$unidadE' group by `unidadEjecutora`")->queryAll();

          } else {

            $querytinforme =$db->createCommand("SELECT sum(`hechos`) as hechos, sum(`informados`) as informados,
                                            count(informados) as ttinf,count(hechos) as tthechos,
                                            (sum(`hechos`) - sum(`informados`)) as pendientes,`mes`,
                                            (case when `radiologo`='' then 'nt' else count(`radiologo`) end) as tradiologo,
                                            (case when `radiologo`='' then 0 else 1 end) as ttradiologo,radiologo
                                            FROM `tiemposdeinforme`
                                            where mes = '$mes'
                                            and `unidadEjecutora` = '$unidadE'
                                            group by `radiologo`,`mes`,`unidadEjecutora`")->queryAll();

           $queryhoras = $db->createCommand("SELECT sum(`horas`) as horas,count(horas) as thoras,(sum(horas)/24) as dias,
                                          (case when `nombre`='' then 0 else (avg(horas)) end) as phoras,
                                          `nombre`,mes FROM `horastrabajadas`
                                          where `tipo` = 'R' and mes = '$mes'
                                          and `unidad` = '$unidadE'
                                          group by `nombre`,mes,`unidad`
                                          order by nombre")->queryAll();



            $graficaTiempoInforme = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Amb' and `unidadEjecutora` ='$unidadE' group by `unidadEjecutora`")->queryAll();

            $graficaTiempoInformeHos = $db->createCommand("SELECT `tipoPaciente`, `unidadEjecutora`,descripcion ,
                                                      (case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
                                                        when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
                                                        when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
                                                        when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
                                                        when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
                                                        when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
                                                        when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
                                                        when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
                                                        when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
                                                        when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
                                                        when substring(descripcion ,1,21)='Complejo Hospitalario ' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
                                                        count(distinct(modalidad)) as modalidad,
                                                        sum(`maximo`) as maximo,sum(`minimo`) as minimo
                                                        FROM `tiemposinforme` INNER JOIN provincias ON tiemposinforme.unidadEjecutora=provincias.codigo
                                                        where `mes` ='$mes' and `tipoPaciente` ='Hos' and `unidadEjecutora` ='$unidadE' group by `unidadEjecutora`")->queryAll();
        }
          break;


       }



       /*-------------------tabla de texto y datos superiores----------------*/

      $estudios_informados = $estudios_pendientes = $sin_asignar = $estudios_realizados = 0;
     $total_radiologos = $totalhoras = $totalr = $total_inf = $horas_activas = $total_dias = 0;
     $hora_radiologos = $hora_radiologos1 = $estudios_ir = $horas_acr = $e_informados = $ei_radiologos = $ei_horas = array();
     $e_pendientes = $e_realizados = $hp_radiologo = array();

    foreach ($queryhoras as $row) {
      $totalhoras = $totalhoras + $row['horas'];
      $totalr = $totalr + $row['thoras'];
      $total_dias = ROUND($total_dias + $row['dias']);

    }

     for ($i=0; $i <count($querytinforme) ; $i++) {
      if($querytinforme[$i]['radiologo']=='de interpretacion Valija' || $querytinforme[$i]['radiologo']=='interpretacion posterior Valija' || $querytinforme[$i]['radiologo']=='' ){
       $sin_asignar = $sin_asignar + $querytinforme[$i]['tradiologo'] ;
      }
       for ($j=0; $j < count($queryhoras) ; $j++) {
         if($querytinforme[$i]['radiologo']==$queryhoras[$j]['nombre']){
           $hora_radiologos[$queryhoras[$j]['nombre']]=$queryhoras[$j]['horas'];
           $estudios_ir[$queryhoras[$j]['nombre']]= ROUND($querytinforme[$i]['informados']/$queryhoras[$j]['horas'],2);
           $e_informados[$queryhoras[$j]['nombre']]= $querytinforme[$i]['informados'];
           $e_pendientes[$queryhoras[$j]['nombre']]= $querytinforme[$i]['pendientes'];
           $e_realizados[$queryhoras[$j]['nombre']]= $querytinforme[$i]['hechos'];
           $hp_radiologo[$queryhoras[$j]['nombre']]= ROUND($queryhoras[$j]['phoras'],2);
           $total_inf = $total_inf + $querytinforme[$i]['ttinf'];
         }else{
            $hora_radiologos1[$querytinforme[$i]['radiologo']]=0;
         }
       }
     }
     $radiologos_ac = array_keys($hora_radiologos);

     for ($i=0; $i < count($radiologos_ac) ; $i++) {
      $horas_acr[]=$hora_radiologos[$radiologos_ac[$i]];
      $ei_radiologos[] = $e_informados[$radiologos_ac[$i]];
      $ei_horas[] = $estudios_ir[$radiologos_ac[$i]];
      $ei_pendientes[] = $e_pendientes[$radiologos_ac[$i]];
      $ei_realizados[] = $e_realizados[$radiologos_ac[$i]];
      $estudios_informados = $estudios_informados + $e_informados[$radiologos_ac[$i]];
      $estudios_pendientes = $estudios_pendientes + $e_pendientes[$radiologos_ac[$i]];
      $estudios_realizados = $estudios_realizados + $e_realizados[$radiologos_ac[$i]];
      $horap_radiolog[] = $hp_radiologo[$radiologos_ac[$i]];
     }
     $radiologos = count($radiologos_ac);
     $countrad=count($radiologos_ac);
     $informados = $estudios_informados;
     $no_informado = $estudios_pendientes;
     $horas_activas = number_format($totalhoras/$totalr,2);
     $t_Promedio = number_format($horas_activas/24,2);
     $estudios_inf_mensual = number_format($estudios_informados/$total_inf,2);
     $estudios_inf_hora = number_format($estudios_informados/$totalhoras,2);
     $porcentajeAsignado = number_format(($sin_asignar/$estudios_realizados)*100,2);



       /* --------------- Ambulatorio grafica ---------------------*/

        $unidadEjecutora = $unidadEjecutora2 = $grafica =array();
        $par = $impar = $q3 = $q1 = 0 ;
       foreach ($graficaTiempoInforme as $row) {
         $unidadEjecutora2[$row['u_ejecutora']] = $row['u_ejecutora'];
          $unidadEjecutora[] = $row['u_ejecutora'];
          $modalidad = $row['modalidad'];
          $maximo = $row['maximo'];
          $minimo = $row['minimo'];

          $Max = number_format(($maximo)/$modalidad,0,'.','');
          $Min = number_format(($minimo)/$modalidad,0,'.','');


          $total = $Max + $Min;
          if ($total/2 == 0) {
              $par = $total;
          }else{
              $impar = $total;
          }

          if ($par) {
              $q1 = number_format(($par*1)/4,0,'.','');
              $q3 = number_format(($par*3)/4,0,'.','');
          }else{
            if ($impar) {
                $q1 = number_format(1*($impar+1)/4,0,'.','');
                $q3 = number_format(3*($impar+1)/4,0,'.','');
            }
          }

          $ric = $q3 - $q1;

          $graficaA[] = array($Min,$q1,$ric,$q3,$Max);
       }

       /* --------------- Ambulatorio grafica ---------------------*/

        $unidadEjecutoraH = $graficaH =array();
        $parH = $imparH = $q3H = $q1H = 0 ;
       foreach ($graficaTiempoInformeHos as $row) {
          $unidadEjecutoraH[] = $row['u_ejecutora'];
          $modalidadH = $row['modalidad'];
          $maximoH = $row['maximo'];
          $minimoH = $row['minimo'];

          $MaxH = number_format(($maximoH)/$modalidadH,0,'.','');
          $MinH = number_format(($minimoH)/$modalidadH,0,'.','');


          $totalH = $MaxH + $MinH;
          if ($totalH/2 == 0) {
              $parH = $totalH;
          }else{
              $imparH = $totalH;
          }

          if ($parH) {
              $q1H = number_format(($parH*1)/4,0,'.','');
              $q3H = number_format(($parH*3)/4,0,'.','');
          }else{
            if ($imparH) {
                $q1H = number_format(1*($imparH+1)/4,0,'.','');
                $q3H = number_format(3*($imparH+1)/4,0,'.','');
            }
          }

          $ricH = $q3H - $q1H;

          $graficaH[] = array($MinH,$q1H,$ricH,$q3H,$MaxH);
          $graficaH2[$row['u_ejecutora']] = array($MinH,$q1H,$ricH,$q3H,$MaxH);
       }

       $graficaH3 = array($graficaH2);
       for ($i=0; $i <count($unidadEjecutora) ; $i++) {
            for ($j=0; $j <count($graficaH3) ; $j++) {
                if (isset($graficaH3[$j][$unidadEjecutora[$i]])) {
                    $Hospitalizado[] = $graficaH3[$j][$unidadEjecutora[$i]];
                }else {
                    $Hospitalizado[] = array(0,0,0,0,0);
                }
            }
        }


       return $arreglo = array(

                              /* ---- Ambulatorio grafica --------*/
                              'unidadEjecutora' => $unidadEjecutora,
                              'graficaA' => $graficaA,
                              'Hospitalizado' => $Hospitalizado,
                              /*---tabla de texto datos sup.-----*/
                              'countrad'=>$countrad,
                              'querytinforme'=>$querytinforme,
                              'informados'=>$informados,
                              'no_informado'=>$no_informado,
                              't_Promedio'=>$t_Promedio,
                              'radiologos'=>$radiologos,
                              'estudios_inf_mensual'=>$estudios_inf_mensual,
                              'estudios_inf_hora'=>$estudios_inf_hora,
                              'porcentajeAsignado' => $porcentajeAsignado,
                              'horas_activas' => $horas_activas,
                              'radiologos_ac' => $radiologos_ac,
                              'horas_acr' => $horas_acr,
                              'ei_radiologos' => $ei_radiologos,
                              'ei_horas' => $ei_horas,
                              'ei_pendientes' => $ei_pendientes,
                              'horap_radiolog' => $horap_radiolog,

                            );

    }


}
