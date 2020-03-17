<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disponibilidad */

$this->title = 'Create Disponibilidad';
$this->params['breadcrumbs'][] = ['label' => 'Disponibilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Registrar';
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-time"></span></div>
    <div class="pagetitle">
        <h1>Registrar </h1>
    </div>            
</div><!--pageheader-->

<div class="disponibilidad-create">

  	<div class="col-md-8">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

    </div>
</div>
