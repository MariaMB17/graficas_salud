<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\touchspin\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\Disponibilidad */
/* @var $form yii\widgets\ActiveForm */

    $db = Yii::$app->db;
    $sqlModalidad = $db->createCommand("SELECT distinct CODIGO_MODALIDAD FROM dashboard")->queryAll();
    for ($i=0; $i < count($sqlModalidad) ; $i++) {
        $modalidad[$sqlModalidad[$i]['CODIGO_MODALIDAD']] = $sqlModalidad[$i]['CODIGO_MODALIDAD'];
    }

    $indicador2 = array('Red' => 'Red','RIS' => 'RIS', 'PACS' => 'PACS', 'Equipo' => 'Equipo');
    $indicador = array_merge($indicador2, $modalidad);
    $indicador3 = array(
                        'Red' => 'Red',
                        'RIS' => 'RIS',
                        'PACS' => 'PACS',
                        'Equipo' => 'Equipo',
                        'RX' => 'RX',
                        'CT' => 'CT',
                        'MR' => 'MR',
                        'US' => 'US',
                        'MG' => 'MG',
                        'XA' => 'XA',
                        'RF' => 'RF'

                    );
?>

<div class="disponibilidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'INCIDENCIA')->widget(
        DatePicker::className(), [
        'language' => 'es',
        'pluginOptions' => [
        	'todayHighlight' => true,
	        'autoclose' => true,
	        'format' => 'dd/mm/yyyy',
        ]
    ]); ?>

    <?= $form->field($model, 'INDICADOR')->dropDownList(
        $indicador3,
        ['prompt'=>'Seleccione Indicador','id' => 'usuario']) ?>

    <?= $form->field($model, 'TIEMPO_SERVICIOS')->widget(
        TouchSpin::classname(), [
            'options' => ['placeholder' => 'Minutos'],
            'pluginOptions' => [
                'min' => 0,
                'max' => 100000,
                'postfix' => 'mm'
            ],
        ]);

    ?>

    <?= $form->field($model, 'DESCRIPCION')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar +' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
