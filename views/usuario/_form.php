<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->dropDownList([
        'Gerente'=>'Gerente',
        'Medico'=>'Medico',
        ],['prompt'=>'Seleccione Cargo','id' => 'usuario']) ?>

    <?= $form->field($model, 'nivel')->dropDownList([
        'Administrador'=>'Administrador',
        'Usuario'=>'Usuario',
        ],['prompt'=>'Seleccione Nivel','id' => 'usuario']) ?>

     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar +' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
