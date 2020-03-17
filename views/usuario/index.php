<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="pageheader">
        <div class="pageicon2"><span class="glyphicon glyphicon-user"></span></div>
        <div class="pagetitle">
            <h1>Usuarios</h1>
        </div>            
    </div><!--pageheader-->

<div class="usuario-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::a('Registrar +', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombres',
            'apellidos',
            'usuario',
            //'clave',
            'cargo',
            'nivel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
