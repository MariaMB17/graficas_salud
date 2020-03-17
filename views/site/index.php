<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>
<div class=" container" > 
    
   <!-- <div class="col-md-8 espacio">
        <img src="imagenes/medicina2.jpg" width="100%">
    </div>
    -->

    <div class="row ">
        <div class="col-md-4">
            
        </div>

        <div class="col-md-4" >
            <center>
                <img src="imagenes/logo.png" class="" width="100%">
            </center>
            

            <div id="login">
                <h1>Iniciar sesión</h1>
                <br>
                <?= $mensaje?>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'usuario')->textInput(['maxlength' => 64]) ?>

                <?= $form->field($model, 'clave')->passwordInput(['maxlength' => 64]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Aceptar', ['class' => 'btn btn-primary']) ?>                
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <div class="col-md-4">
            
        </div>
    </div>
    
</div>