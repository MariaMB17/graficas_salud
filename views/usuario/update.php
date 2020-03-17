<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Registrar Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Registrar';
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-user"></span></div>
    <div class="pagetitle">
        <h1>Registrar</h1>
    </div>            
</div><!--pageheader-->
<div class="usuario-update">

	<div class="col-md-8">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>
</div>
