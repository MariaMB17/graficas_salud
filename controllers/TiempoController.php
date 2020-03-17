<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Action;
use yii\web\Session;
use app\controllers\TiempoInforme;

class TiempoController extends Controller{

    public function actionIndex()
    {

        $db = Yii::$app->db;
        $session = Yii::$app->session;


/*=============== TIEMPO DE INFORME ========================*/

        $tiempo = new TiempoInforme();
        $tiempoInforme = $tiempo->TiempoInforme2();
        /* ---- Ambulatorio y Hospitalizado grafica --------*/
        $unidadEjecutora = $tiempoInforme['unidadEjecutora'];
        $graficaA = $tiempoInforme['graficaA'];
        $Hospitalizado = $tiempoInforme['Hospitalizado'];
        /*-------tabla texto y datos sup.--------------*/
        $countrad =  $tiempoInforme['countrad'];
        $querytinforme = $tiempoInforme['querytinforme'];
        $informados  = $tiempoInforme['informados'];
        $no_informado = $tiempoInforme['no_informado'];
        $t_Promedio =  $tiempoInforme['t_Promedio'];
        $radiologos = $tiempoInforme['radiologos'];
        $horas_activas = $tiempoInforme['horas_activas'];
        $estudios_inf_mensual = $tiempoInforme['estudios_inf_mensual'];
        $estudios_inf_hora = $tiempoInforme['estudios_inf_hora'];
        $porcentajeAsignado = $tiempoInforme['porcentajeAsignado'];
        $radiologos_ac = $tiempoInforme['radiologos_ac'];
        $horas_acr = $tiempoInforme['horas_acr'];
        $ei_radiologos = $tiempoInforme['ei_radiologos'];
        $ei_horas = $tiempoInforme['ei_horas'];
        $ei_pendientes =$tiempoInforme['ei_pendientes'];
        $horap_radiolog = $tiempoInforme['horap_radiolog'];




        return $this->render('index',[

                                    /* ---- Ambulatorio grafica --------*/
                                    'unidadEjecutora' => $unidadEjecutora,
                                    'graficaA' => $graficaA,
                                    'Hospitalizado' => $Hospitalizado,
                                    /*-----tabla de texto datos sup.---*/
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
                                    'horap_radiolog'=> $horap_radiolog,

                                    ]);

    }



}
