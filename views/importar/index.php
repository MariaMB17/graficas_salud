<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImportarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Importar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importar-index">

<div class="pageheader">
    <div class="pageicon2"><span class="glyphicon glyphicon-import"></span></div>
    <div class="pagetitle">
        <h1>Importar Archivo a la Base de Datos</h1>
    </div>            
</div><!--pageheader-->

	
    <div class="col-md-6">
    	<p>
	    	<?= $mensaje?>
	    </p>
	    <br>
        <?php echo $this->render('_form', ['model' => $model]); ?>
    </div>
    
</div>
