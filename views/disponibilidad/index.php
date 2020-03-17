<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisponibilidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disponibilidad';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-time"></span></div>
    <div class="pagetitle">
        <h1>Disponibilidad</h1>
    </div>            
</div><!--pageheader-->
<div class="disponibilidad-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar +', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'INCIDENCIA',
            'INDICADOR',
            'TIEMPO_SERVICIOS',
            'DESCRIPCION:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
