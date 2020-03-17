<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Estudios realizados';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
	<div class="col-md-5">

		<h3>Estudios Realizados</h3>
		<br>
	</div>
</div>

<div class="row">
	<div class="col-md-1">

	</div>
	<div class="col-md-4">
		<table  border="0" class="">
			<tr>
				<td>
					<?= CheckboxX::widget([
					    'name'=>'modalidad',
					    'options'=>['id'=>'modalidad'],
					    'pluginOptions'=>['threeState'=>false]
					]); ?>
					<?= '<label class="cbx-label" for="modalidad">Por Modalidad</label>';?>
				</td>
			</tr>
			<tr>
				<td>
					<?= CheckboxX::widget([
					    'name'=>'tipo_estudios',
					    'options'=>['id'=>'tipo_estudios'],
					    'pluginOptions'=>['threeState'=>false]
					]); ?>
					<?= '<label class="cbx-label" for="tipo_estudios">Por tipos de estudios</label>';?>
				</td>
			</tr>
		</table>
	</div>



</div><!--row-->

<br>

<div class="row">

	<div class="col-md-4">

<!--=============================================================================================================
					ESTUDIO REALIZAOS
================================================================================================================-->

		<div id="estudioRealizado" >
			<div style="display:none">
				<div id="unidadE"><?= $unidadEjecutora ?></div>
				<div id="ERealizados"><?= $realizados?></div>
				<div id="EInformado"><?= $informados?></div>
				<div id="EPendientes"><?= $pendientes?></div>
				<div id="DiasE"><?= $tiempoPromedio?></div>
				<div id="HorasE"></div>
			</div>

		</div>
<!--=========================== MODALDIAD ================================-->
		<div id="estudioRealizadoModalidad" class="check">
			<div style="display:none">
				<div id="modalidadCategoria"><?= $modalidad ?></div>
				<div id="E_realizados"><?= $realizadosM?></div>
				<div id="E_pendientes"><?= $informadosM?></div>
				<div id="E_informados"><?= $pendientesM?></div>
				<div id="DiasM"><?= $tiempoPromedioM?></div>
				<div id="HorasM"></div>
			</div>
		</div>

<!--=========================== TIPOS DE ESTUDIOS ================================-->
		<div id="estudioRealizadoTipos" class="check">
			<div style="display:none">
				<div id="TipoEstudioCategoria"><?= $TipoEstudio ?></div>
				<div id="E_realizadosTP"><?= $realizadosE?></div>
				<div id="E_pendientesTP"><?= $informadosE?></div>
				<div id="E_informadosTP"><?= $pendientesE?></div>
				<div id="DiasTP"><?= $tiempoPromedioE?></div>
				<div id="HorasTP"></div>
			</div>
		</div>



	</div><!--col-md-4-->

	<div class="col-md-8">
	 	<br>
	 	<div id="tablaUNidadE" >
			<table border="1" width="100%" class="letra tablaG6">
				<tr>
					<th>Un, ejecutora</th>
					<th>E. Realizado</th>
					<th> % de Total</th>
					<th>Técnicos actívos</th>
					<th>Estudios R. Por Técnico</th>
					<th>% Informados</th>
					<th>% Pendiente</th>
					<th>t. prom. informe</th>
					<th>Radiólogos Activos</th>
					<th>Estudios Realizados: radiólogo</th>
				</tr>
				<?php
					for ($i=0; $i < $contador_unidad; $i++) {
						echo "
							<tr>
								<td height='30px' >".$unidades[$i]."</td>
								<td>".$E_realizadosTotal[$i]."</td>
								<td>".$p_realizados[$i]."</td>
								<td>".$t_activos[$i]."</td>
								<td>".$er_tecnicos[$i]."</td>
								<td>".$p_informados[$i]."</td>
								<td>".$p_pendientes[$i]."</td>
								<td>".$promedio[$i]."</td>
								<td>".$r_activos[$i]."</td>
								<td>".$ep_radiologos[$i]."</td>
							</tr>
							";
					}
				?>
			</table>
		</div>

		<div id="tablaModalidad" class="tablaVer">
			<table border="1" width="100%" class="letra tablaG6">
				<tr>
					<th>Modalidad</th>
					<th>E. Realizado</th>
					<th> % de Total</th>
					<th>Técnicos actívos</th>
					<th>Estudios R. Por Técnico</th>
					<th>% Informados</th>
					<th>% Pendiente</th>
					<th>t. prom. informe</th>
					<th>Radiólogos Activos</th>
					<th>Estudios Realizados: radiólogo</th>
				</tr>
				<?php
					for ($i=0; $i < count($modalidads); $i++) {
						echo "
							<tr>
								<td height='30px' >".$modalidads[$i]."</td>
								<td>".$E_realizadosTotalM[$i]."</td>
								<td>".$p_realizadosM[$i]."</td>
								<td>".$t_activosM[$i]."</td>
								<td>".$er_tecnicosM[$i]."</td>								
								<td>".$p_informadosM[$i]."</td>
								<td>".$p_pendientesM[$i]."</td>
								<td>".$promedioM[$i]."</td>
								<td>".$r_activosM[$i]."</td>
								<td>".$ep_radiologosM[$i]."</td>
							</tr>
							";
					}
				?>

			</table>

		</div>

		<div id="tablaTipoEstudios" class="tablaVer">
			<table border="1" width="100%" class="letra tablaG6">
				<tr>
					<th>Tipos de Estudios</th>
					<th>E. Realizado</th>
					<th> % de Total</th>
					<th>Técnicos actívos</th>
					<th>Estudios R. Por Técnico</th>
					<th>% Informados</th>
					<th>% Pendiente</th>
					<th>t. prom. informe</th>
					<th>Radiólogos Activos</th>
					<th>Estudios Realizados: radiólogo</th>
				</tr>
				<?php
					for ($i=0; $i < count($TipoEstudios); $i++) {
						echo "
							<tr>
								<td height='30px' >".$TipoEstudios[$i]."</td>
								<td>".$E_realizadosTotalE[$i]."</td>
								<td>".$p_realizadosE[$i]."</td>
								<td>".$t_activosE[$i]."</td>
								<td>".$er_tecnicosE[$i]."</td>					
								<td>".$p_informadosE[$i]."</td>
								<td>".$p_pendientesE[$i]."</td>
								<td>".$promedioE[$i]."</td>
								<td>".$r_activosE[$i]."</td>
								<td>".$ep_radiologosE[$i]."</td>
							</tr>
							";
					}
				?>

			</table>

		</div>


	</div><!--col-md-8-->

</div><!--row-->
