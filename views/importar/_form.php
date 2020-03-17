<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Importar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="importar-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

   
    <?= $form->field($model, 'archivo')->fileInput(['maxlength' => 255,'class'=>"btn btn-default archivo"]) ?>
    
    <!--<div class="barra" id="barra">
        <div class="progress">
          <div class="progress-bar progress-bar-striped active bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:45%;" >
            45% Complete
            <span class="sr-only">45% Complete</span>
          </div>
        </div>
    </div>
    -->
    
    <!--<?= $form->field($model, 'tabla')->dropDownList(['prompt'=>'Seleccione la Tabla']) ?>
      -->
    
    <div class="form-group">
        <?= Html::submitButton('Importar', ['class' => 'btn btn-primary','id'=> 'btn-import']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$fp = fopen('datos/datos.txt','r');
$line = fgets($fp);
$fila = explode(",", $line);
$baseD = $fila[1];


$script = <<< JS
(function($){
   $('#importar-archivo').change(function(){             
         $.get("index.php?r=importar/tablas&bsd="+'<?php echo $baseD ?>', function(data){
           if(data !==" "){
            $("#tabla").css("display", "block");
            $('select#importar-tabla').html(data);
           }                
        });                  
   });
   $('#btnImportar').click(function(){   
        alert('hsjahsagshasg');                  
   });               
})(jQuery);
JS;
$this->registerJs($script);
?>
