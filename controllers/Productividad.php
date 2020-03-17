<?php

namespace app\controllers;

use Yii;
use yii\web\Session;

class Productividad {


  public function personalEquipo(){

      /*----------------------------RECIBE PARAMETROS DE BUSQUEDA---------------------------*/

      $session = Yii::$app->session;
      $db = Yii::$app->db;

      $tarea = $mes = $provincia = $nivelA = $unidadE = null;

      $tarea = $session['tarea'];
      $mes = $session['mes'];
      $provincia = $session['provincias'];
      $nivelA = $session['nivelA'];
      $unidadE = $session['unidadE'];


      $sqlProductividad = $sqlPe = $sqlProdmeses = $mensual = array();

       $sqlModalidades = $db->createCommand("SELECT `modalidad`
                                              FROM `personalEquipo`
                                              group by modalidad
                                              order by modalidad")->queryAll();

       $sqlMeses = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                       where `ID` < month (now())
                                       order by `ID`")->queryAll();

      switch ($tarea) {

        case 'mes':
         if($mes<13){
        for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->queryAll();

            $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->queryAll();
          }
        }
      } else{

        for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->queryAll();

            $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes<:mes')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->queryAll();
          }
        }

      }

        break;

        case 'provincia':
        if($mes<13){
          for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->queryAll();

            $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and provincia =:provincia')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':provincia',$provincia)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and provincia=:provincia')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':provincia',$provincia)
                                ->queryAll();
          }
        }
      }else{

        for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->queryAll();

            $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and provincia =:provincia')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':provincia',$provincia)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and provincia=:provincia')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':provincia',$provincia)
                                ->queryAll();
          }
        }

      }
        break;

        case 'nivel':
        if($mes<13){
          for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->queryAll();

           $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and nivelAtencion =:nivelAtencion')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':nivelAtencion',$nivelA)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and nivelAtencion =:nivelAtencion')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':nivelAtencion',$nivelA)
                                ->queryAll();
          }
        }
      }else{

        for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->queryAll();

           $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and nivelAtencion =:nivelAtencion')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':nivelAtencion',$nivelA)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and nivelAtencion =:nivelAtencion')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':nivelAtencion',$nivelA)
                                ->queryAll();
          }
        }

      }

        break;

        case 'Ejecutora':
        if($mes<13){
          for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->queryAll();

          $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and unidadEjecutora =:unidadEjecutora')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':unidadEjecutora',$unidadE)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and unidadEjecutora =:unidadEjecutora')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':unidadEjecutora',$unidadE)
                                ->queryAll();
          }
        }
      } else{

        for ($i=0; $i < count($sqlModalidades) ; $i++) {

            $sqlPe[] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM personalEquipo
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->queryAll();

          $sqlProductividad[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(`esperados`) END) as esperados
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and unidadEjecutora =:unidadEjecutora')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':unidadEjecutora',$unidadE)
                                ->queryAll();

          for ($l=0; $l < count($sqlMeses) ; $l++) {

              $sqlProdmeses[]=$db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(realizados) END) as realizados,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['MES'].'"'.'
                                else '.'"'.$sqlMeses[$l]['MES'].'"'.' END) as MESES,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlMeses[$l]['ID'].'"'.'
                                 else '.'"'.$sqlMeses[$l]['ID'].'"'.' END) as mes
                                FROM productividad
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and unidadEjecutora =:unidadEjecutora')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$sqlMeses[$l]['ID'])
                                ->bindValue(':unidadEjecutora',$unidadE)
                                ->queryAll();
          }
        }

      }

      break;

      }
      //----------------------------- PARA LAS GRAFICAS PEQUEÑAS------------------------------------------------//

       $totalrx = $totaldx = $total_erealizados1 = $total_erealizados2 = $total_erealizados3 = $total_erealizados4 = 0;
       $total_erealizados5 = $total_erealizados6 = $total_erealizados7 = $total_erealizados8 = $total_erealizados9 = 0;
       $total_erealizados10 = $total_erealizados11 = $total_erealizados12 = 0;
       $totalmes1 = $totalmes2 = $totalmes3 = $totalmes4 = $totalmes5 = $totalmes6 = array();
       $totalmes7 = $totalmes8 = $totalmes9 = $totalmes10 = $totalmes11 = $totalmes12 = $ttmes = $mesprod = array();
       $mes1 = $mes2 = $mes3 = $mes4 = $mes5 = $mes6 = $mes7 = $mes8 = null;
       $mes9 = $mes10 = $mes11 = $mes12 = null;


        for ($l=0; $l < count($sqlModalidades) ; $l++) {
          for ($j=0; $j < count($sqlProdmeses) ; $j++) {

            if($sqlProdmeses[$j][0]['modalidad']!='Total'){
              if($sqlModalidades[$l]['modalidad']==$sqlProdmeses[$j][0]['modalidad']){
                if($sqlProdmeses[$j][0]['modalidad']=='CR' OR $sqlProdmeses[$j][0]['modalidad']=='DX'){
                $modalidad ="RX";
                $totalrx = $totalrx + $sqlProdmeses[$j][0]['realizados'];
                $totaldx = $totalrx;
              } else {
                $modalidad = $sqlProdmeses[$j][0]['modalidad'];
                $totaldx = $sqlProdmeses[$j][0]['realizados'];
              }
                $mensual[$modalidad][$sqlProdmeses[$j][0]['MESES']]=$totaldx;
              }
            }

          }
        }

       for($i=0; $i<count($sqlProdmeses); $i++){
        switch ($sqlProdmeses[$i][0]['MESES']){
          case 'ENERO':
           $mes1 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados1 = $total_erealizados1 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'FEBRERO':
           $mes2 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados2 = $total_erealizados2 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'MARZO':
           $mes3 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados3 = $total_erealizados3 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'ABRIL':
           $mes4 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados4 = $total_erealizados4 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'MAYO':
           $mes5 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados5 = $total_erealizados5 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'JUNIO':
           $mes6 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados6 = $total_erealizados6 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'JULIO':
           $mes7 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados7 = $total_erealizados7 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'AGOSTO':
           $mes8 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados8 = $total_erealizados8 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'SEPTIEMBRE':
           $mes9 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados9 = $total_erealizados9 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'OCTUBRE':
           $mes10 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados10 = $total_erealizados10 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'NOVIEMBRE':
           $mes11 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados11 = $total_erealizados11 + $sqlProdmeses[$i][0]['realizados'];
          break;
          case 'DICIEMBRE':
           $mes12 = $sqlProdmeses[$i][0]['MESES'];
           $total_erealizados12 = $total_erealizados12 + $sqlProdmeses[$i][0]['realizados'];
          break;

         }
       }

       $totalmes1[$mes1]=$total_erealizados1;$totalmes2[$mes2]=$total_erealizados2;
       $totalmes3[$mes3]=$total_erealizados3;$totalmes4[$mes4]=$total_erealizados4;
       $totalmes5[$mes5]=$total_erealizados5;$totalmes6[$mes6]=$total_erealizados6;
       $totalmes7[$mes7]=$total_erealizados7;$totalmes8[$mes8]=$total_erealizados8;
       $totalmes9[$mes9]=$total_erealizados9;$totalmes10[$mes10]=$total_erealizados10;
       $totalmes11[$mes11]=$total_erealizados11;$totalmes12[$mes12]=$total_erealizados12;
       $ll = array_merge($totalmes1,$totalmes2,$totalmes3,$totalmes4,$totalmes5,$totalmes6,
                         $totalmes7,$totalmes8,$totalmes9,$totalmes10,$totalmes11,$totalmes12);

      for ($i=0; $i <count($sqlMeses) ; $i++) {
         $ttmes[]=$ll[$sqlMeses[$i]['MES']];
         $mesprod[]= $sqlMeses[$i]['MES'];
       }

       $total_mesP = implode(',',$ttmes);
       $mesproductividad = implode(',',$mesprod);
       $contador = count($mensual);

      //----------------------------- GRAFICA CON TARGET Y PORCENTAJE EN LA TABLA -------------------------------//

      $modalidad_prod = $valor_prod = $valorprod1 = array();
      $totalPV = $total_prod = $totalRealiazados = $totalEsperados = 0;

      for ($i=0; $i < count($sqlProductividad) ; $i++) {
        if($sqlProductividad[$i][0]['modalidad']!='Total'){
          if($sqlProductividad[$i][0]['esperados']==0){
              $esperados=1;
          }else {
            $esperados= $sqlProductividad[$i][0]['esperados'];
          }
            if($sqlProductividad[$i][0]['modalidad']=='CR' OR $sqlProductividad[$i][0]['modalidad']=='DX'){
                $modalidad_prod ="RX";
                $total_prod = ROUND(($sqlProductividad[$i][0]['realizados']/$esperados)*100,1) + $total_prod;
                $valor_prod = $total_prod;
            }elseif ($sqlProductividad[$i][0]['modalidad']!='CR' OR $sqlProductividad[$i][0]['modalidad']!='DX') {
                $modalidad_prod =$sqlProductividad[$i][0]['modalidad'];
                $valor_prod = ROUND(($sqlProductividad[$i][0]['realizados']/$esperados)*100,1);
            }
            $totalRealiazados = $totalRealiazados + $sqlProductividad[$i][0]['realizados'];
            $totalEsperados = $esperados + $totalEsperados;
            $valorprod1[$modalidad_prod] = $valor_prod;
        }
      }

      $totalPRODM ="Total";
      $totalPRODV = round(($totalRealiazados/$totalEsperados)*100,1);

       $modalidadProd = array_keys($valorprod1);
       $valorTP = array();

       for ($k=0; $k < count($modalidadProd) ; $k++) {
         $valorTP[] =$valorprod1[$modalidadProd[$k]];
       }

      $modalidadProd = array_merge(array($totalPRODM),array_keys($valorprod1));
      $valorProd = array_merge(array($totalPRODV),$valorprod1);

      $modalidadProd2 = implode(',',$modalidadProd);
      $valorProd2 = implode(',',$valorProd);
      $porcentaje = array_merge($valorTP);

      //----------------------------- TABLA PE -------------------------------
      $modalidad = $valor = $valorPe = array();
      $totalV = $total = 0;

      for ($i=0; $i < count($sqlPe) ; $i++) {
         if($sqlPe[$i][0]['modalidad']=='CR' OR $sqlPe[$i][0]['modalidad']=='DX'){
              $modalidad ="RX";
              $total = $sqlPe[$i][0]['total'] + $total;
              $valor = $total;
            }elseif ($sqlPe[$i][0]['modalidad']!='CR' OR $sqlPe[$i][0]['modalidad']!='DX') {
              $modalidad=$sqlPe[$i][0]['modalidad'];
              $valor= $sqlPe[$i][0]['total'];
            }
            if ($sqlPe[$i][0]['modalidad']=='Total') {
              $totalM = $sqlPe[$i][0]['modalidad'];
              $totalV = $sqlPe[$i][0]['total'];
            } else {
            $valorPe[$modalidad] = $valor;
            }
       }
      $modalidadPe = array_keys($valorPe);
      $valorT = array();

      for ($k=0; $k < count($modalidadPe) ; $k++) {
         $valorT[] =$valorPe[$modalidadPe[$k]];
      }
     /* echo "<pre>";
      print_r($mensual);
      echo "<pre>";*/


      return $PE = array(
                          'totalV' => $totalV,
                          'valor' => $valorT,
                          'modalidadProductividad' => $modalidadProd2,
                          'totalProductividad' => $valorProd2,
                          'porcentaje' => $porcentaje,
                          'total_porcentaje' => $totalPRODV,
                          'modalidadesP' => $modalidadPe,
                          'contador' => $contador,
                          'mensual' => $mensual,
                          'total_mesP' => $total_mesP,
                          'mesproductividad' => $mesproductividad
                            );

    }


    public function tiempoEspera(){

      /*----------------------------RECIBE PARAMETROS DE BUSQUEDA---------------------------*/

      $session = Yii::$app->session;
      $db = Yii::$app->db;

      $tarea = $mes = $provincia = $nivelA = $unidadE = null;

      $tarea = $session['tarea'];
      $mes = $session['mes'];
      $provincia = $session['provincias'];
      $nivelA = $session['nivelA'];
      $unidadE = $session['unidadE'];


       $sqlModalidades = $db->createCommand("SELECT `modalidad`
                                              FROM `tiempoagendamientocita`
                                              group by modalidad
                                              order by modalidad")->queryAll();

       $tipo = $db->createCommand("SELECT `tipo`
                                    FROM `tiempoagendamientocita`
                                    group by tipo
                                    order by tipo")->queryAll();
       $sql1 = $sql11 = array();

      switch ($tarea) {

        case 'mes':

      if($mes<13){
        for ($i=0; $i <count($sqlModalidades) ; $i++) {

           $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
      }else{

        for ($i=0; $i <count($sqlModalidades) ; $i++) {

           $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro','Nacional')
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }

      }

        break;

        case 'provincia':

        if($mes<13){
          for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
        } else {

            for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$provincia)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }

        }
        break;

        case 'nivel':

        if($mes<13){
          for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
      } else{
          for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$nivelA)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
      }

        break;

        case 'Ejecutora':

        if($mes<13){

         for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes=:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
      } else {

        for ($i=0; $i <count($sqlModalidades) ; $i++) {

            $sql [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidad,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else valor END) as total
                                FROM tiempoEspera
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->queryAll();

            for ($j=0; $j < count($tipo) ; $j++) {
              $sql1 [] = $db->createCommand('SELECT
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$sqlModalidades[$i]['modalidad'].'"'.'
                                else '.'"'.$sqlModalidades[$i]['modalidad'].'"'.' END) as modalidades,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN COUNT(`modalidad`) else SUM(VALOR) END) as total,
                                (CASE COUNT(`modalidad`) WHEN 0
                                THEN '.'"'.$tipo[$j]['tipo'].'"'.'
                                else '.'"'.$tipo[$j]['tipo'].'"'.' END) as tipo
                                FROM `tiempoagendamientocita`
                                WHERE modalidad=:CMDO
                                and mes<:mes
                                and tipo=:tipo
                                and filtro =:filtro')
                                ->bindValue(':CMDO',$sqlModalidades[$i]['modalidad'])
                                ->bindValue(':mes',$mes)
                                ->bindValue(':filtro',$unidadE)
                                ->bindValue(':tipo',$tipo[$j]['tipo'])
                                ->queryAll();
            }

          }
      }
        break;
      }


    //------------------------ TIEMPO DE ESPERA ------------------------------------
      $valor_te=0;
      $modalidad = $valor = array();
      $modalidad_te="RX";
      $total_m=0;
      $totalM = $totalV = 0;

      for ($i=0; $i < count($sql) ; $i++) {
         if($sql[$i][0]['modalidad']=='CR' OR $sql[$i][0]['modalidad']=='DX'){
              $modalidad="RX";
              $total_m = $sql[$i][0]['total'] + $total_m;
              $valor_te = $total_m;
            }elseif ($sql[$i][0]['modalidad']!='CR' OR $sql[$i][0]['modalidad']!='DX') {
              $modalidad=$sql[$i][0]['modalidad'];
              $valor_te = $sql[$i][0]['total'];
            }
            if ($sql[$i][0]['modalidad']=='Total') {
              $totalM = $sql[$i][0]['modalidad'];
              $totalV = $sql[$i][0]['total'];
            } else {
              $valor[$modalidad] =$valor_te;
            }
       }

      $totalM2 = array($totalM);
      $totalV2 = array($totalV);

      $modalidadT = array_merge($totalM2,array_keys($valor));
      $valorT = array_merge($totalV2,$valor);

      $modalidad2 = implode(',',$modalidadT);
      $valor2 = implode(',',$valorT);

       //------------------------------------- T. ENTRE AGENDAMIENTO Y CITA ---------------------------------

        $modalidad_amb = $valor_amb = $modalidad_hosp = $valor_hosp = $modalidad_urg = $valor_urg = array();
        $total_amb = $total_amb1 = $valor_amb1 = $valor_amb2 = 0;
        $total_hosp = $total_hosp1 = $valor_hosp1 = $valor_hosp2 = 0;
        $total_urg = $total_urg1 = $valor_urg1 = $valor_urg2 = 0;
        $totalAM = $totalAV = $totalUM = $totalUV = 0;

        for ($i=0; $i < count($sql1) ; $i++) {
          switch ($sql1[$i][0]['tipo']) {
            case 'Amb':
            if($sql1[$i][0]['modalidades']=='CR' OR $sql1[$i][0]['modalidades']=='DX'){
             $modalidad_amb="RX";
              $total_amb1 = $sql1[$i][0]['total'] + $total_amb1;
              $valor_amb2 = $total_amb1;
            }elseif ($sql1[$i][0]['modalidades']!='CR' OR $sql1[$i][0]['modalidades']!='DX') {
              $modalidad_amb=$sql1[$i][0]['modalidades'];
              $valor_amb2 = $sql1[$i][0]['total'];
            }
            if ($sql1[$i][0]['modalidades']=='Total') {
              $totalAM = $sql1[$i][0]['modalidades'];
              $totalAV = $sql1[$i][0]['total'];
            } else {
              $valor_amb[$modalidad_amb] =$valor_amb2;
            }
            break;
            case 'Hos':
             if($sql1[$i][0]['modalidades']=='CR' OR $sql1[$i][0]['modalidades']=='DX'){
                $modalidad_hosp="RX";
                $total_hosp1 = ($sql1[$i][0]['total'] * 24) + $total_hosp1;
                $valor_hosp2 = $total_hosp1;
              }elseif ($sql1[$i][0]['modalidades']!='CR' OR $sql1[$i][0]['modalidades']!='DX') {
                      $modalidad_hosp=$sql1[$i][0]['modalidades'];
                      $valor_hosp2 = ($sql1[$i][0]['total'] * 24);
              }
            if ($sql1[$i][0]['modalidades'] == 'Total') {
                     $totalHM = $sql1[$i][0]['modalidades'];
                     $totalHV = ($sql1[$i][0]['total']*24);
                   } else {
                     $valor_hosp[$modalidad_hosp] =$valor_hosp2;
                   }
            break;
            case 'Urg':
              if($sql1[$i][0]['modalidades']=='CR' OR $sql1[$i][0]['modalidades']=='DX'){
                  $modalidad_urg="RX";
                  $total_urg1 = ($sql1[$i][0]['total'] * 24) + $total_urg1;
                  $valor_urg2 = $total_urg1;
                   } elseif ($sql1[$i][0]['modalidades']!='CR' OR $sql1[$i][0]['modalidades']!='DX') {
                      $modalidad_urg=$sql1[$i][0]['modalidades'];
                      $valor_urg2 = ($sql1[$i][0]['total'] * 24);
                   }
                    if ($sql1[$i][0]['modalidades'] == 'Total') {
                     $totalUM = $sql1[$i][0]['modalidades'];
                     $totalUV = ($sql1[$i][0]['total']*24);
                   } else {
                     $valor_urg[$modalidad_urg] =$valor_urg2;
                   }
            break;
          }
        }



      $modalidadAMB = array_merge(array($totalAM),array_keys($valor_amb));
      $valorAMB = array_merge(array($totalAV),$valor_amb);
      $modalidadHOSP = array_merge(array($totalAM),array_keys($valor_hosp));
      $valorHOSP = array_merge(array($totalAV),$valor_hosp);
      $modalidadURG = array_merge(array($totalUM),array_keys($valor_urg));
      $valorURG = array_merge(array($totalUV),$valor_urg);

      $modalidadAMB2 = implode(',',$modalidadAMB);
      $valorAMB2 = implode(',',$valorAMB);
      $modalidadHOSP2 = implode(',',$modalidadHOSP);
      $valorHOSP2 = implode(',',$valorHOSP);
      $modalidadURG2 = implode(',',$modalidadURG);
      $valorURG2 = implode(',',$valorURG);


      return $Tespera = array(
                          'modalidad' => $modalidad2,
                          'valor' => $valor2,
                          'modalidad_ambulatorio' => $modalidadAMB2,
                          'valor_ambulatorio' => $valorAMB2,
                          'modalidad_hospitalizados' => $modalidadHOSP2,
                          'valor_hospitalizados' => $valorHOSP2,
                          'modalidad_urgencias' => $modalidadURG2,
                          'valor_urgencias' => $valorURG2
                            );

    }


    public function agendamiento(){

      /*----------------------------RECIBE PARAMETROS DE BUSQUEDA---------------------------*/

     /*------- ojo -----if (!empty($array))*/

     $session = Yii::$app->session;

      $tarea = $mes = $provincia = null;
      $tarea = $session['tarea'];
      $mes = $session['mes'];
      $provincia = $session['provincias'];
      $nivelA = $session['nivelA'];
      $unidadE = $session['unidadE'];

      $db = Yii::$app->db;

      $queryagendados = $estudiosAgendados = $mesag = $querycancelados =  $estudiosc = $querycancelados1 = array();
      $modalidadesecancelados = array();



       $modalidadesdemanda = $db->createCommand('SELECT DISTINCT `modalidad`
                                                 FROM `demandaestudioscancelaciones`
                                                 ORDER BY `modalidad`')
                                                 ->queryAll();

       $mesesdemanda = $db->createCommand('SELECT `ID`,`MES` FROM `mes`
                                            WHERE `ID` < month (now())
                                            ORDER BY `ID`')
                                            ->queryAll();

       $mesesagendados = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                             WHERE `ID` > '$mes'
                                             AND `ID` < 13
                                             ORDER BY `ID`")
                                            ->queryAll();

       switch ($tarea) {

          case 'mes':

          for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

            for ($j=0; $j < count($mesesdemanda) ; $j++) {

                /*----------------------------ESTUDIOS CANCELADOS (GRAFICAS PEQUEÑAS) ----------------------------*/

                $querycancelados[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$mesesdemanda[$j]['MES'].'"'.'
                                        else '.'"'.$mesesdemanda[$j]['MES'].'"'.' END) as meses,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes', $mesesdemanda[$j]['ID'])
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->queryAll();
              }
            }

          if($mes<13){

            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->queryAll();
            }
          } else {

            $mesesagendados = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                                  WHERE `ID` < 13
                                                  ORDER BY `ID`")
                                                  ->queryAll();


            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES<:mes
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->queryAll();
            }

          }
      break;

      case 'provincia':

        for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

            for ($j=0; $j < count($mesesdemanda) ; $j++) {

                /*----------------------------ESTUDIOS CANCELADOS (GRAFICAS PEQUEÑAS) ----------------------------*/

                $querycancelados[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$mesesdemanda[$j]['MES'].'"'.'
                                        else '.'"'.$mesesdemanda[$j]['MES'].'"'.' END) as meses,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and provincia=:provincia
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes', $mesesdemanda[$j]['ID'])
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':provincia',$provincia)
                                        ->queryAll();
              }
            }

          if($mes<13){

            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and provincia=:provincia
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':provincia',$provincia)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and provincia=:provincia
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':provincia',$provincia)
                                        ->queryAll();
            }
          } else {

            $mesesagendados = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                                  WHERE `ID` < 13
                                                  ORDER BY `ID`")
                                                  ->queryAll();


            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and provincia=:provincia
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':provincia',$provincia)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES<:mes
                                        and provincia=:provincia
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':provincia',$provincia)
                                        ->queryAll();
            }

          }
      break;

      case 'nivel':

       for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

            for ($j=0; $j < count($mesesdemanda) ; $j++) {

                /*----------------------------ESTUDIOS CANCELADOS (GRAFICAS PEQUEÑAS) ----------------------------*/

                $querycancelados[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$mesesdemanda[$j]['MES'].'"'.'
                                        else '.'"'.$mesesdemanda[$j]['MES'].'"'.' END) as meses,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and nivelAtencion=:nivelAtencion
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes', $mesesdemanda[$j]['ID'])
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':nivelAtencion',$nivelA)
                                        ->queryAll();
              }
            }

          if($mes<13){

            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and nivelAtencion=:nivelAtencion
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':nivelAtencion',$nivelA)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and nivelAtencion=:nivelAtencion
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':nivelAtencion',$nivelA)
                                        ->queryAll();
            }
          } else {

            $mesesagendados = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                                  WHERE `ID` < 13
                                                  ORDER BY `ID`")
                                                  ->queryAll();


            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and nivelAtencion=:nivelAtencion
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':nivelAtencion',$nivelA)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES<:mes
                                        and nivelAtencion=:nivelAtencion
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':nivelAtencion',$nivelA)
                                        ->queryAll();
            }

          }

      break;

      case 'Ejecutora':

        for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

            for ($j=0; $j < count($mesesdemanda) ; $j++) {

                /*----------------------------ESTUDIOS CANCELADOS (GRAFICAS PEQUEÑAS) ----------------------------*/

                $querycancelados[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$mesesdemanda[$j]['MES'].'"'.'
                                        else '.'"'.$mesesdemanda[$j]['MES'].'"'.' END) as meses,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and unidadEjecutora=:unidadEjecutora
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes', $mesesdemanda[$j]['ID'])
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':unidadEjecutora',$unidadE)
                                        ->queryAll();
              }
            }

          if($mes<13){

            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and unidadEjecutora=:unidadEjecutora
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':unidadEjecutora',$unidadE)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES=:mes
                                        and unidadEjecutora=:unidadEjecutora
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':unidadEjecutora',$unidadE)
                                        ->queryAll();
            }
          } else {

            $mesesagendados = $db->createCommand("SELECT `ID`,`MES` FROM `mes`
                                                  WHERE `ID` < 13
                                                  ORDER BY `ID`")
                                                  ->queryAll();


            for ($i=0; $i < count($modalidadesdemanda) ; $i++) {

              for ($k=0; $k < count($mesesagendados) ; $k++) {

              /*----------------------------ESTUDIOS AGENDADOS ----------------------------*/

              $queryagendados[]=$db->createCommand('SELECT modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                      else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN '.'"'.$mesesagendados[$k]['MES'].'"'.'
                                      else '.'"'.$mesesagendados[$k]['MES'].'"'.' END) as meses,
                                      (CASE COUNT(`modalidad`) WHEN 0
                                      THEN  COUNT(`modalidad`)
                                      else SUM(`agendados`) END) as total
                                      FROM `estudiosagendados`
                                      WHERE MES=:mes
                                      and unidadEjecutora=:unidadEjecutora
                                      and modalidad=:CMDO')
                                      ->bindValue(':mes',$mesesagendados[$k]['ID'])
                                      ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                      ->bindValue(':unidadEjecutora',$unidadE)
                                      ->queryAll();


              }

              /*----------------------------ESTUDIOS CANCELADOS (GRAFICA CON TARGET)----------------------------*/

              $querycancelados1[] = $db->createCommand('SELECT modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.'
                                        else '.'"'.$modalidadesdemanda[$i]['modalidad'].'"'.' END) as modalidad,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN COUNT(`modalidad`)
                                        else SUM(`cancelados`) END) as total,
                                        (CASE COUNT(`modalidad`) WHEN 0
                                        THEN  COUNT(`modalidad`)
                                        else SUM(`agendados`) END) as totalag
                                        FROM `demandaestudioscancelaciones`
                                        WHERE MES<:mes
                                        and unidadEjecutora=:unidadEjecutora
                                        and modalidad=:CMDO')
                                        ->bindValue(':mes',$mes)
                                        ->bindValue(':CMDO',$modalidadesdemanda[$i]['modalidad'])
                                        ->bindValue(':unidadEjecutora',$unidadE)
                                        ->queryAll();
            }

          }

      break;
      }

      if($mes || $provincia || $nivelA){
      /*-----------------------------------------GRAFICAS PEQUEÑAS----------------------------------*/
          $total_a = $total_ag = 0;
          for($a=0; $a<count($modalidadesdemanda); $a++){
            for ($i=0; $i <count($queryagendados) ; $i++) {
              if($modalidadesdemanda[$a]['modalidad']==$queryagendados[$i][0]['modalidad']){
                if($modalidadesdemanda[$a]['modalidad']=='CR' OR $modalidadesdemanda[$a]['modalidad']=='DX'){
                  $modalidad_ag = "RX";
                  $total_a = $total_a + $queryagendados[$i][0]['total'];
                  $total_ag = $total_a;
                } else{
                  $modalidad_ag = $modalidadesdemanda[$a]['modalidad'];
                  $total_ag = $queryagendados[$i][0]['total'];
                }
                $estudiosAgendados[$modalidad_ag][$queryagendados[$i][0]['meses']]=$total_ag;
              }
            }
          }


        /*-----------------------------------------GRAFICA SPARKLINE-----------------------------------*/

          $totalestudioscanc=0;
          $porcentajeestudioscanc=0;
          $porcentajeecancel=0;

          $porcentajeestudioscanc=0;
          $totalcanc = $total_d = $total_de = $total_dag = $total_deag = 0;
          $totalagen=0;
          $porcentajec = $totaldc = array();

        for($a=0; $a<count($modalidadesdemanda); $a++){
          for ($i=0; $i <count($querycancelados) ; $i++) {
            if($modalidadesdemanda[$a]['modalidad']==$querycancelados[$i][0]['modalidad']){
              if($modalidadesdemanda[$a]['modalidad']=='CR' OR $modalidadesdemanda[$a]['modalidad']=='DX'){
                $modalidad_d = "RX";
                $total_d = $total_d + $querycancelados[$i][0]['total'];
                $total_de = $total_d;
              } else{
                $modalidad_d = $modalidadesdemanda[$a]['modalidad'];
                $total_de = $querycancelados[$i][0]['total'];
              }
                $estudiosc[$modalidad_d][$querycancelados[$i][0]['meses']]=$total_de;
            }
          }
        }
      $totalecan=count($estudiosc);
      $modalidadesecancelados = array_merge(array_keys($estudiosc));
      $total_d1 = $total_de1 = $canceladosporc = $canceladosporcd = 0;
      $porcentajeecancelados1=array();

       $totalmes1 = $totalmes2 = $totalmes3 = $totalmes4 = $totalmes5 = $totalmes6 = array();
       $totalmes7 = $totalmes8 = $totalmes9 = $totalmes10 = $totalmes11 = $totalmes12 = $ttmescanc = $mescanc = array();
       $mes1 = $mes2 = $mes3 = $mes4 = $mes5 = $mes6 = $mes7 = $mes8 = null;
       $mes9 = $mes10 = $mes11 = $mes12 = null;
       $total_ecancelados1 = $total_ecancelados2 = $total_ecancelados3 = $total_ecancelados4 = 0;
       $total_ecancelados5 = $total_ecancelados6 = $total_ecancelados7 = $total_ecancelados8 = 0;
       $total_ecancelados9 = $total_ecancelados10 = $total_ecancelados11 = $total_ecancelados12 = 0;

       for($i=0; $i<count($querycancelados); $i++){
        switch ($querycancelados[$i][0]['meses']){
          case 'ENERO':
           $mes1 = $querycancelados[$i][0]['meses'];
           $total_ecancelados1 = $total_ecancelados1 + $querycancelados[$i][0]['total'];
          break;
          case 'FEBRERO':
           $mes2 = $querycancelados[$i][0]['meses'];
           $total_ecancelados2 = $total_ecancelados2 + $querycancelados[$i][0]['total'];
          break;
          case 'MARZO':
           $mes3 = $querycancelados[$i][0]['meses'];
           $total_ecancelados3 = $total_ecancelados3 + $querycancelados[$i][0]['total'];
          break;
          case 'ABRIL':
           $mes4 = $querycancelados[$i][0]['meses'];
           $total_ecancelados4 = $total_ecancelados4 + $querycancelados[$i][0]['total'];
          break;
          case 'MAYO':
           $mes5 = $querycancelados[$i][0]['meses'];
           $total_ecancelados5 = $total_ecancelados5 + $querycancelados[$i][0]['total'];
          break;
          case 'JUNIO':
           $mes6 = $querycancelados[$i][0]['meses'];
           $total_ecancelados6 = $total_ecancelados6 + $querycancelados[$i][0]['total'];
          break;
          case 'JULIO':
           $mes7 = $querycancelados[$i][0]['meses'];
           $total_ecancelados7 = $total_ecancelados7 + $querycancelados[$i][0]['total'];
          break;
          case 'AGOSTO':
           $mes8 = $querycancelados[$i][0]['meses'];
           $total_ecancelados8 = $total_ecancelados8 + $querycancelados[$i][0]['total'];
          break;
          case 'SEPTIEMBRE':
           $mes9 = $querycancelados[$i][0]['meses'];
           $total_ecancelados9 = $total_ecancelados9 + $querycancelados[$i][0]['total'];
          break;
          case 'OCTUBRE':
           $mes10 = $querycancelados[$i][0]['meses'];
           $total_ecancelados10 = $total_ecancelados10 + $querycancelados[$i][0]['total'];
          break;
          case 'NOVIEMBRE':
           $mes11 = $querycancelados[$i][0]['meses'];
           $total_ecancelados11 = $total_ecancelados11 + $querycancelados[$i][0]['total'];
          break;
          case 'DICIEMBRE':
           $mes12 = $querycancelados[$i][0]['meses'];
           $total_ecancelados12 = $total_ecancelados12 + $querycancelados[$i][0]['total'];
          break;

         }
       }

       $totalmes1[$mes1]=$total_ecancelados1;$totalmes2[$mes2]=$total_ecancelados2;
       $totalmes3[$mes3]=$total_ecancelados3;$totalmes4[$mes4]=$total_ecancelados4;
       $totalmes5[$mes5]=$total_ecancelados5;$totalmes6[$mes6]=$total_ecancelados6;
       $totalmes7[$mes7]=$total_ecancelados7;$totalmes8[$mes8]=$total_ecancelados8;
       $totalmes9[$mes9]=$total_ecancelados9;$totalmes10[$mes10]=$total_ecancelados10;
       $totalmes11[$mes11]=$total_ecancelados11;$totalmes12[$mes12]=$total_ecancelados12;
       $mcancelados = array_merge($totalmes1,$totalmes2,$totalmes3,$totalmes4,$totalmes5,$totalmes6,
                         $totalmes7,$totalmes8,$totalmes9,$totalmes10,$totalmes11,$totalmes12);

      for ($i=0; $i <count($mesesdemanda) ; $i++) {
         $ttmescanc[]=$mcancelados[$mesesdemanda[$i]['MES']];
         $mescanc[]= $mesesdemanda[$i]['MES'];
       }

       $total_mescanc = implode(',',$ttmescanc);
       $mescance = implode(',',$mescanc);
       $modali = array();
      for($y=0;$y<count($querycancelados1);$y++){

            if($querycancelados1[$y][0]['totalag']>0){
              $querycancelados1[$y][0]['totalag']=$querycancelados1[$y][0]['totalag'];
            }else{
              $querycancelados1[$y][0]['totalag']=1;
            }
            if($querycancelados1[$y][0]['modalidad']=='CR' OR $querycancelados1[$y][0]['modalidad']=='DX'){
               $modalidadag = "RX";
               $total_d1 = $total_d1 + $querycancelados1[$y][0]['total'];
               $total_de1 = $total_d1;
               $total_dag = $total_dag + $querycancelados1[$y][0]['totalag'];
               $total_deag = $total_dag;
               $canceladosporc = $canceladosporc + ROUND(($total_de1/$total_deag)*100,1);
               $canceladosporcd = $canceladosporc;
             }else{
               $modalidadag = $querycancelados1[$y][0]['modalidad'];
               $total_de1 = $querycancelados1[$y][0]['total'];
               $total_deag = $querycancelados1[$y][0]['totalag'];
               $canceladosporcd =  ROUND(($total_de1/$total_deag)*100,1);
             }

              $porcentajeecancelados1[$modalidadag]=$canceladosporcd;
              $totalecancelados[]=ROUND($total_de1);
              $totalestudioscanc=$totalestudioscanc+$total_de1;
              $totalagen=$totalagen+$total_deag;
              $modali[$modalidadag] = $modalidadag;

      }
              $porcentajeestudioscanc=ROUND(($totalestudioscanc/$totalagen)*100,1);

      }
            $modalidadesc=array_keys($modali);
            for ($i=0; $i < count($modalidadesc) ; $i++) {
             $porcentajeecancelados[]=$porcentajeecancelados1[$modalidadesc[$i]];
            }
            $modalidaddem = array_merge(array('Total'),$modalidadesc);
            $valordemanda = array_merge(array($porcentajeestudioscanc),$porcentajeecancelados);
            $contadoTotalc=count($estudiosc);
            $porcentajeecanc=implode(",",$valordemanda);
            $modalidadescanc=implode(",",$modalidaddem);

     /*------------------------------- estudios Agendados ----------------------------*/


     for ($i=0; $i < count($mesesagendados) ; $i++) {
       $mesag[substr($mesesagendados[$i]['MES'],0,3)]=substr($mesesagendados[$i]['MES'],0,3);
     }

     $CTAG=implode(",",$estudiosAgendados['CT']);
     $MGAG=implode(",",$estudiosAgendados['MG']);
     $MRAG=implode(",",$estudiosAgendados['MR']);
     $OTAG=implode(",",$estudiosAgendados['OT']);
     $RFAG=implode(",",$estudiosAgendados['RF']);
     $RXAG=implode(",",$estudiosAgendados['RX']);
     $USAG=implode(",",$estudiosAgendados['US']);
     $XAAG=implode(",",$estudiosAgendados['XA']);
     $MESAGE=implode(",",array_keys($mesag));

     /* echo "<pre>";
      print_r($porcentajeecancelados1);
      echo "<pre>";*/


          $array = array(
                         /*'mesAGE'=>$mesAGE,*/
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
                         'porcentajeecancel'=>$porcentajeecancel,
                         'mescance'=>$mescance,
                         'total_mescanc'=>$total_mescanc,
                         'porcentajeecanc' => $porcentajeecanc,
                         'estudiosc'=>$estudiosc,
                         'contadoTotalc'=>$contadoTotalc,
                         'porcentajeecancelados'=>$porcentajeecancelados,
                         'modalidadesecancelados'=>$modalidadesecancelados,
                         'totalecancelados'=>$totalecancelados,
                         'modalidadescanc'=>$modalidadescanc,
                      );

          return $array;

    }


  public function Estudioscancelados(){
    $session = Yii::$app->session;
      $db = Yii::$app->db;

      $tarea = $mes = $provincia = $nivelA = $unidadE = null;

      $tarea = $session['tarea'];
      $mes = $session['mes'];
      $provincia = $session['provincias'];
      $nivelA = $session['nivelA'];
      $unidadE = $session['unidadE'];

      $sqlC = $sqlRazon = $sqlTipoEstudio = array();
      $mesess = 0;

      if ($mes == 13) {
          $meses=$db->createCommand("SELECT ID,MES FROM `mes` where id<MONTH (NOW())")->queryAll();
          foreach ($meses as $row) {
            $mesess = $row['ID'];
          }
      }else {
          $meses=$db->createCommand("SELECT ID,MES FROM `mes` where id<='$mes' ")->queryAll();
          foreach ($meses as $row) {
            $mesess = $row['ID'];
          }
      }

      switch ($tarea) {
          case 'mes':

                for ($i=0; $i <count($meses) ; $i++) {
                    $sqlC[] = $db->createCommand("SELECT ROUND(sum(cancelados)/1000,1) as estudiosCancelados FROM demandaestudioscancelaciones where mes ='".$meses[$i]['ID']."' ")->queryAll();
                    $sqlRazon[] = $db->createCommand("SELECT ROUND(sum(case when `motivoCancelacion` <> ' ' then 1 else 0 end)/1000,1) as motivoCancelacion FROM `demandaestudioscancelaciones` where mes ='".$meses[$i]['ID']."' ")->queryAll();
                }

                if ($mes == 13) {
                  $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes <='$mesess' group by `tipoEstudio` ")->queryAll();
                }else{
                  $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes ='$mesess' group by `tipoEstudio` ")->queryAll();
                }

          break;

          case 'provincia':

                  for ($i=0; $i <count($meses) ; $i++) {
                      $sqlC[] = $db->createCommand("SELECT ROUND(sum(cancelados)/1000,1) as estudiosCancelados FROM demandaestudioscancelaciones where mes ='".$meses[$i]['ID']."' and provincia = '$provincia' ")->queryAll();
                      $sqlRazon[] = $db->createCommand("SELECT ROUND(sum(case when `motivoCancelacion` <> ' ' then 1 else 0 end)/1000,1) as motivoCancelacion FROM `demandaestudioscancelaciones` where mes ='".$meses[$i]['ID']."' and provincia = '$provincia' ")->queryAll();
                  }

                  if ($mes == 13) {
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes <='$mesess' and provincia = '$provincia' group by `tipoEstudio`  ")->queryAll();
                  }else{
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes ='$mesess' and provincia = '$provincia' group by `tipoEstudio`  ")->queryAll();
                  }


          break;

          case 'nivel':
                  for ($i=0; $i <count($meses) ; $i++) {
                      $sqlC[] = $db->createCommand("SELECT ROUND(sum(cancelados)/1000,1) as estudiosCancelados FROM demandaestudioscancelaciones where mes ='".$meses[$i]['ID']."' and nivelAtencion = '$nivelA' ")->queryAll();
                      $sqlRazon[] = $db->createCommand("SELECT ROUND(sum(case when `motivoCancelacion` <> ' ' then 1 else 0 end)/1000,1) as motivoCancelacion FROM `demandaestudioscancelaciones` where mes ='".$meses[$i]['ID']."' and nivelAtencion = '$nivelA' ")->queryAll();
                  }

                  if ($mes == 13) {
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes <='$mesess' and nivelAtencion = '$nivelA' group by `tipoEstudio` ")->queryAll();
                  }else{
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes ='$mesess' and nivelAtencion = '$nivelA' group by `tipoEstudio` ")->queryAll();
                  }


          break;

          case 'Ejecutora':

                  for ($i=0; $i <count($meses) ; $i++) {
                      $sqlC[] = $db->createCommand("SELECT ROUND(sum(cancelados)/1000,1) as estudiosCancelados FROM demandaestudioscancelaciones where mes ='".$meses[$i]['ID']."' and unidadEjecutora = '$unidadE' ")->queryAll();
                      $sqlRazon[] = $db->createCommand("SELECT ROUND(sum(case when `motivoCancelacion` <> ' ' then 1 else 0 end)/1000,1) as motivoCancelacion FROM `demandaestudioscancelaciones` where mes ='".$meses[$i]['ID']."' and unidadEjecutora = '$unidadE' ")->queryAll();
                  }

                  if ($mes == 13) {
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes <='$mesess' and unidadEjecutora = '$unidadE' group by `tipoEstudio` ")->queryAll();
                  }else{
                    $sqlTipoEstudio = $db->createCommand("SELECT `tipoEstudio`,ROUND(SUM(`cancelados`)/1000,1) as cancelados FROM `demandaestudioscancelaciones` where mes ='$mesess' and unidadEjecutora = '$unidadE' group by `tipoEstudio` ")->queryAll();
                  }


          break;


        }

        $total = $mesCancelados = $razon = $mesRazon = array();
        $totalTipo = $grupoEstudio = array();
        $razon2 = 0;



          for ($i=0; $i <count($sqlC) ; $i++) {
              $total[] = $sqlC[$i][0]['estudiosCancelados'];
              $mesCancelados[] = $meses[$i]['MES'];
          }

          for ($i=0; $i <count($sqlRazon) ; $i++) {
            $razon[] = $sqlRazon[$i][0]['motivoCancelacion'];
            $mesRazon[] = $meses[$i]['MES'];
          }

          for ($i=0; $i <count($sqlTipoEstudio) ; $i++) {
            $totalTipo[] = $sqlTipoEstudio[$i]['cancelados'];
            $grupoEstudio[] = $sqlTipoEstudio[$i]['tipoEstudio'];
          }


        $arreglo = array(
                          'total' => $total,
                          'mesCancelados' => $mesCancelados,
                          'razon' => $razon,
                          'mesRazon' => $mesRazon,
                          'totalTipo' => $totalTipo,
                          'grupoEstudio' => $grupoEstudio
                        );

        return $arreglo;


  }



}
