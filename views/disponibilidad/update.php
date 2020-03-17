<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disponibilidad */

$this->title = 'Actualizar Disponibilidad: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Disponibilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-time"></span></div>
    <div class="pagetitle">
        <h1>Actualizar</h1>
    </div>            
</div><!--pageheader-->

<div class="disponibilidad-update">

    <div class="col-md-8">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>
</div>
