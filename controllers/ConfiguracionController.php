<?php

namespace app\controllers;

use Yii;
use app\models\Configuracion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

class ConfiguracionController extends Controller{
    
	public function actionIndex()
    {
    	$db = Yii::$app->db;
    	$model = new Configuracion();

    	$mensaje = null;

    	if($model->load(Yii::$app->request->post())){

    		/*$db->createCommand()->insert('configuracion', [
	            'SERVIDOR' => $model->SERVIDOR,
	            'BASE_DATOS' => $model->BASE_DATOS,
	            'USUARIO' => $model->USUARIO,
	            'CLAVE' => $model->CLAVE,
	        ])->execute();*/

	        $mensaje = "<div class='alert alert-info' role='alert'><b>Configuración guardada correctamente</b></div>";

	        $file=fopen("datos/datos.txt","w") or die("Problemas");
			  //vamos añadiendo el contenido
			  fputs($file,"$model->SERVIDOR,");
			  fputs($file,"$model->BASE_DATOS,");
			  fputs($file,"$model->USUARIO,");
			  fputs($file,"$model->CLAVE");
			  fclose($file);
    	}

        return $this->render('index',['model' => $model,'mensaje' => $mensaje]);
    }

}