<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Sesion;
use yii\web\Session;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();

        $session['meny_y_footer'] = 'hidden';

        $db = Yii::$app->db;
        $model = new Sesion();
        $mensaje = null;
        $provincia = $codigoHospital = $hospital = $codigoPoliclinica = $policlinica = $codigoUlaps = $ulaps = array();


        if ($model->load(Yii::$app->request->post())){
            $model->clave=md5($model->clave);

            $consulta = $db->createCommand('SELECT * FROM usuario WHERE usuario="'.$model->usuario.'" and clave="'.$model->clave.'" ');
            $selectU = $consulta->queryAll();

            $sql = $db->createCommand(' SELECT distinct `provincia` FROM provincias')->queryAll();
            $prinvincia = array();
            foreach ($sql as $row) {
                $provincia[] = $row['provincia'];
            }

            $sql2 = $db->createCommand('SELECT distinct `codigo`,descripcion FROM `provincias` where upper (`descripcion`) like ("%HOSPITAL %") ')->queryAll();
            $hospital = array();
            foreach ($sql2 as $row) {
                $codigoHospital[] = $row['codigo'];
                $hospital[] = $row['descripcion'];
            }

            $sql3 = $db->createCommand('SELECT distinct `codigo`,descripcion FROM `provincias` where upper (`descripcion`) like ("%POLICLINICA%") ')->queryAll();
            $policlinica = array();
            foreach ($sql3 as $row) {
                $codigoPoliclinica[] = $row['codigo'];
                $policlinica[] = $row['descripcion'];
            }

            $sql4 = $db->createCommand('SELECT distinct `codigo`,`descripcion` FROM `provincias` where upper (`descripcion`) like ("%ULAPS%") ')->queryAll();
            $ulaps = array();
            foreach ($sql4 as $row) {
                $codigoUlaps[] = $row['codigo'];
                $ulaps[] = $row['descripcion'];
            }

            $ultimos = $db->createCommand("SELECT MONTH(NOW())-1 AS ULTIMO")->queryAll();
            $x = 0;
            foreach ($ultimos as $row) {
                $x = $row['ULTIMO'];
            }

            $session['provincia'] = $provincia;
            $session['codigoHospital'] = $codigoHospital;
            $session['hospital'] = $hospital;
            $session['codigoPoliclinica'] = $codigoPoliclinica;
            $session['policlinica'] = $policlinica;
            $session['codigoUlaps'] = $codigoUlaps;
            $session['ulaps'] = $ulaps;

            if ($selectU) {
                foreach ($selectU as $row) {
                    $session['usuario'] = $row['usuario'];
                    $session['nombres'] = $row['nombres'];
                    $session['apellidos'] = $row['apellidos'];
                    $session['cargo'] = $row['cargo'];

                    if($row['nivel'] == 'Administrador'){
                        $session['seguridad'] = 'show';
                    }else{
                        if ($row['nivel'] == 'Usuario') {
                            $session['seguridad'] = 'hidden';
                        }
                    }
                }

                $session['meny_y_footer'] = 'show';
                $session['nombreMes'] = $x;
                $session['filtro'] = "Nivel Nacional";
                return $this->redirect(['grafica/index','tarea' => 'mes','mes' => $session['nombreMes']]);

            }else{
                $mensaje = "<p class='alert alert-danger'>El Usuario o Contraseña no coincide</p>";
            }

        }
        return $this->render('index',['model' => $model,'mensaje' => $mensaje]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
