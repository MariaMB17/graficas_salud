<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Configuración';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-cog"></span></div>
    <div class="pagetitle">
        <h1>Configuración de la Base de datos</h1>
    </div>            
</div><!--pageheader-->

<div class="col-md-8">

   	<?php $form = ActiveForm::begin(); ?>

    <?= $mensaje ?>

    <?= $form->field($model, 'SERVIDOR')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'BASE_DATOS')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'USUARIO')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => 50]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Crear +', ['class' => 'btn btn-primary', 'id' => 'btnConfig']) ?>
    </div>

    <?php ActiveForm::end(); ?>

   	
    
</div>
