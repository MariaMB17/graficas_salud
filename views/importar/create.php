<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Contacto */

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <div class="pageheader">
        <div class="pageicon"><span class="iconfa-plus"></span></div>
        <div class="pagetitle">
            <h5>Crear Contacto</h5>
            <h1>Contacto</h1>
        </div>            
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
