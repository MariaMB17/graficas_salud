<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Demanda de estudios y Cancelaciones';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

	<div class="col-md-7">

<!--=============================================================================================================
					ESTUDIO CANCELADOS
================================================================================================================-->

		<h3>Estudios Cancelados</h3>
		<?php $form = ActiveForm::begin();?>
			<table border="1" width="100%" class="letra tablaG">
				<tr>
					<td rowspan="5" width="400px">
						<div id="EstudioCancelados">
							<div id="totalCancelados" style="display:none"><?= $totalCancelados?></div>
							<div id="mesCancelados" style="display:none"><?= $mesCancelados?></div>
						</div>

						<div id="por_razon" class="check">
							<div id="razon" style="display:none"><?= $razon?></div>
							<div id="mesRazon" style="display:none"><?= $mesRazon?></div>
						</div>

						<div id="TipoEstudios" class="check">
							<div id="totalTipo" style="display:none"><?= $totalTipo?></div>
							<div id="grupoEstudio" style="display:none"><?= $grupoEstudio?></div>
						</div>
					</td>

				</tr>

				<tr>
					<td height="20px" >
						<?= CheckboxX::widget([
						    'name'=>'razons',
						    'options'=>['id'=>'razons'],
						    'pluginOptions'=>['threeState'=>false]
						]); ?>
						<?= '<label class="cbx-label" for="razons">Por razon</label>';?>
					</td>
				</tr>

				<!--<tr>
					<td height="20px">
						<?= CheckboxX::widget([
						    'name'=>'s_4',
						    'options'=>['id'=>'s_4'],
						    'pluginOptions'=>['threeState'=>false]
						]); ?>
						<?= '<label class="cbx-label" for="s_4">T. entre agendamiento y cita</label>';?>
					</td>
				</tr>-->
				<tr>
					<td height="20px" >
						<?= CheckboxX::widget([
						    'name'=>'tipoEstudio',
						    'options'=>['id'=>'tipoEstudio'],
						    'pluginOptions'=>['threeState'=>false]
						]); ?>
						<?= '<label class="cbx-label" for="tipoEstudio">Tipos de Estudios</label>';?>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
		<?php ActiveForm::end();?>

	</div><!--col-md-7-->


	<div class="col-md-5">
		<h3>Estudios Agendados</h3>
		<div id="E_AGENDADOS">
		   <div style="display:none" id="mesagen">
			   	<?=$MESAGE?>
		    </div>
		    <div style="display:none" id="agct">
			   	<?=$CTAG?>
		    </div>
		    <div style="display:none" id="agmg">
			   	<?=$MGAG?>
		    </div>
		    <div style="display:none" id="agmr">
			   	<?=$MRAG?>
		    </div>
		    <div style="display:none" id="agot">
			   	<?=$OTAG?>
		    </div>
		    <div style="display:none" id="agrf">
			   	<?=$RFAG?>
		    </div>
		    <div style="display:none" id="agrx">
			   	<?=$RXAG?>
		    </div>
		    <div style="display:none" id="agus">
			   	<?=$USAG?>
		    </div>
		    <div style="display:none" id="agxa">
			   	<?=$XAAG?>
		    </div>
		</div>
	</div>
</div>

<!--=============================================================================================================
					ESTUDIOS AGENDADOS
================================================================================================================-->


<div class="row">
	<div class="col-md-5">
		<h3>Estudios Cancelados por modalidad</h3>
		<br>
	    <table border="1" width="100%" class="letra tablaG4" >
		      <tr>
		          <th height="34px">12 Meses</th>
		          <th>Modalidad</th>
		          <th></th>
		          <th>%</th>
		          <th>TOTAL</th>
		     </tr>
		     <tr>
		        <td height="34px">
		            <div id="tagendadoscancelados">
			       		<div style="display:none" id="data">
			            	<?= $total_mescanc?>
				        </div>
				        <div style="display:none" id="data1">
				            <?= $mescance?>
				        </div>
			        </div>
				</td>
				<td>Total</td>
				<td rowspan="11" width="300px">
					<div id="E_CANCELADOSM" class="graficaEcancelados">
					    <div style="display:none" id="porcentajemcanc">
					    	<?= $porcentajeecanc?>

					    </div>
					    <div style="display:none" id="modcance">
					    	<?= $modalidadescanc?>

					    </div>
					</div>
				</td>
				<td><?=$porcentajeestudioscanc?></td>
				<td><?=$totalestudioscanc?></td>
		    </tr>
			<?php for($tt=0;$tt<$contadoTotalc;$tt++){
			  	echo "<tr>
			            <td height='34px'>
			            	<div id=".$modalidadesecancelados[$tt].">
				            	<div id='data'>
				            	   ".implode(",",$estudiosc[$modalidadesecancelados[$tt]])."
				            	</div>
				            	<div id='mesdata'>
				            		".implode(",",array_keys($estudiosc[$modalidadesecancelados[$tt]]))."
				            	</div>
							</div>
						</td>
						<td>".$modalidadesecancelados[$tt]."</td>
						<td>".$porcentajeecancelados[$tt]."</td>
						<td>".$totalecancelados[$tt]."</td>
			    </tr>";
			}?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

		</table>
	</div>

	<div class="col-md-7">
		<h3>T. entre agendamiento y cita</h3>
		<br>
		<table border="1" width="100%" class="letra tablaG4">
			<tr>

				<th height="34px">Ambulatorios - días</th>
				<th width="60px"></th>
				<th>Hospitalizados - horas</th>
				<th width="60px"></th>
				<th>Urgencias - horas</th>


			</tr>
			<tr></tr>
			<tr>
				<td width="900px">
					<div id="ambulatorioscancelados" class="graficaEcancelados">
				        <div style="display:none" id="modalidadambc">
				        	<?= $modalidad_ambulatorio?>
					    </div>
					    <div style="display:none" id="promedioambc">
					    	<?= $valor_ambulatorio?>
					    </div>
				    </div>
				</td>
				<td></td>
				<td width="900px">
					<div id="hospitalizadoscancelados" class="graficaEcancelados">
				         <div style="display:none" id="hospitalcancelados">
				         	<?= $modalidad_hospitalizados?>
					    </div>
					    <div style="display:none" id="totalhospcanc">
					    	<?= $valor_hospitalizados?>
					    </div>
				    </div>
				</td>
				<td></td>
				<td width="900px">
					<div id="Gurgenciascancelados" class="graficaEcancelados">
				         <div style="display:none" id="Mucancelados">
				         	<?= $modalidad_urgencias?>
					    </div>
					    <div style="display:none" id="Pucancelados">
					    	<?= $valor_urgencias?>
					    </div>
				    </div>
				</td>
			</tr>
		</table>
	</div><!--col-md-5-->

</div><!--row-->
