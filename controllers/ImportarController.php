<?php

namespace app\controllers;

use Yii;
use app\models\Importar;
use app\models\ImportarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class ImportarController extends Controller
{
   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Importar models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $tables = Yii::$app->db;

        $model = new Importar();
        $mensaje = null;
        $archi=$model->archivo;
        if ($model->load(Yii::$app->request->post())) {    

            $model->archivo = UploadedFile::getInstance($model,'archivo'); 

            if($model->archivo){
                $model->archivo->saveAs('datos/'.$model->archivo);
                $model->archivo='datos/'.$model->archivo;
            }

            if ($model->archivo) {
                $sql = "  LOAD DATA LOCAL INFILE '".$model->archivo."'
                    REPLACE INTO TABLE `dashboard`
                    FIELDS
                        TERMINATED BY ','
                        ENCLOSED BY '\"'
                    LINES
                        TERMINATED BY '\r\n'
                     IGNORE 1 LINES
                    (   
                        CODIGO_ESTUDIO, 
                        CODIGO_PACIENTE, 
                        CODIGO_UNIDAD_EJECUTORA,
                        UNIDAD_EJECUTORA,
                        PROVINCIA,
                        ASIGNADO_A,
                        APROBADO_POR,
                        @FECHA_CREADO,
                        @FECHA_AGENDADO,
                        @FECHA_HECHO,
                        @FECHA_APROBADO,
                        @FECHA_CANCELADO,
                        @FECHA_ARRIVADO,
                        CODIGO_MODALIDAD,
                        TIPO_MODALIDAD,
                        GRUPO_ESTUDIO,
                        ESTUDIO,
                        SERVICIO_CLINICO,
                        PROCEDENCIA,
                        TIPO_PACIENTE,
                        CON_INTERPRETACION_POSTERIOR,
                        MOTIVO_CANCELACION,
                        NO_ACUDIO,
                        DIAS_AGENDADOS,
                        DIAS_APROBADO,
                        INFORMADO,
                        ORIGEN_APROBACION,
                        MODALIDAD,
                        TECNICO,
                        CLAVE_ESTADO,
                        ESTADO
                    )
                    
                    SET FECHA_CREADO = STR_TO_DATE(@FECHA_CREADO, '%m/%d/%Y %H:%i:%s'),
                        FECHA_AGENDADO = STR_TO_DATE(@FECHA_AGENDADO, '%m/%d/%Y %H:%i:%s'),
                        FECHA_HECHO = STR_TO_DATE(@FECHA_HECHO, '%m/%d/%Y %H:%i:%s'),
                        FECHA_APROBADO = STR_TO_DATE(@FECHA_APROBADO, '%m/%d/%Y %H:%i:%s'),
                        FECHA_CANCELADO = STR_TO_DATE(@FECHA_CANCELADO, '%m/%d/%Y %H:%i:%s'),
                        FECHA_ARRIVADO = STR_TO_DATE(@FECHA_ARRIVADO, '%m/%d/%Y %H:%i:%s')
                ";

                 $tables->createCommand($sql)->execute();

                 unlink($model->archivo);

                  $mensaje = "<p class='alert alert-info'>Los datos fueron importado con éxito</p>";
                return $this->render('index', [
                    'model' => $model,'mensaje' => $mensaje,
                ]);
            }          

        
       
       } else {
        
            return $this->render('index', [
                'model' => $model,'mensaje' => $mensaje,
            ]);
        }

    }

    public function actionTablas($bsd){ 
        $fp = fopen('datos/datos.txt','r');
        $line = fgets($fp);
        $fila = explode(",", $line);
        $baseD = $fila[1];

        $sql = 'SHOW TABLES';
        $tables = Yii::$app->db
            ->createCommand($sql)
            ->queryAll();
        $tab =array('tabl'=>$tables);
        $total= count($tables);        
        if($total > 0){
                for ($i=0; $i < $total; $i++) {
                   echo "<option >".$tab['tabl'][$i]['Tables_in_'.$baseD]."</options>"; 
                }
            } else {
                echo "<option > - </options>";
            }
        }


    

    protected function findModel($id)
    {
        if (($model = Importar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    }











