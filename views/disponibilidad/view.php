<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disponibilidad */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Disponibilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-time"></span></div>
    <div class="pagetitle">
        <h1>Disponibilidad</h1>
    </div>            
</div><!--pageheader-->

<div class="disponibilidad-view">

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            'INCIDENCIA',
            'INDICADOR',
            'TIEMPO_SERVICIOS',
            'DESCRIPCION:ntext',
        ],
    ]) ?>

</div>
