<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Tiempos de informe';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

	<div class="col-md-6">
		<center>
		    <table class="tablaG4 " border="1" width="50%" >
			      <tr >
			          <td height="30px" > Estudios Informados:</td>
			          <td><?=$informados?></td>
			     </tr>
			     <tr >
			          <td height="30px" >Estudios Pendientes:</td>
			          <td><?=$no_informado?></td>
			     </tr>
			     <tr >
			          <td height="30px" >% Sin asignar:</td>
			          <td><?=$porcentajeAsignado?></td>
			     </tr>
			     <tr >
			          <td height="30px" > T.Informe promedio:</td>
			          <td><?=$t_Promedio?> días</td>
			     </tr>
			</table>
		</center>
	</div><!--col-md-6-->

	<div class="col-md-6">
		<center>
		    <table border="1" width="50%" class="tablaG4 ">
			      <tr >
			          <td height="30px" >Radiólogos activos:</td>
			          <td><?=$radiologos?></td>
			     </tr>
			     <tr  >
			          <td height="30px" >Horas act. Prom:</td>
			          <td><?= $horas_activas?></td>
			     </tr>
			     <tr >
			          <td height="30px" >E. Informados Prom:</td>
			          <td><?=$estudios_inf_mensual?></td>
			     </tr>
			     <tr >
			          <td height="30px" > E. Informados X Hora:</td>
			          <td><?=$estudios_inf_hora?></td>
			     </tr>
			</table>
		</center>
	</div><!--col-md-6-->


</div><!--row-->
<br>
<div class="row">

	<div class="col-md-6">

		<div id='contador' style='display:none'>
				<?= implode(",", $unidadEjecutora)?>
		</div>

		<table border="1" width="100%" class="letra tablaG4">
			<tr align="center">
				<td><b>Un. Ejecutora</b></td>
				<td><b>Distribución T. Informe días - Ambulatorio</b></td>
				<td><b>Distribución T. Informe días - Hospitalizado</b></td>
			</tr>
			<?php

				for ($i=0; $i <count($unidadEjecutora); $i++) {
					echo "
						<tr align='center'>
							<td height='20px'>".$unidadEjecutora[$i]."</td>
							<td >
								<div id='bigote".$i."' >
									<div id='bigotes".$i."' style='display:none;'>
											".implode(",", $graficaA[$i])."
									</div>
								</div>
							</td>

							<td>
								<div id='bigoteH".$i."' >
									<div id='bigotesH".$i."' style='display:none;'>
											".implode(",", $Hospitalizado[$i])."
									</div>
								</div>
							</td>
						</tr>
						";
				}
			?>
		</table>

	</div><!--col-md-6-->


	<div class="col-md-6">
	    <table width="100%" border="1" class="letra tablaG4" >
		      <tr align="center">
		          <td height="30px"><b>Radiólogo</b></td>
		          <td><b>Estudios Pendientes</b></td>
		          <td><b>Estudios Informados</b></td>
		          <td><b>Horas Activo</b></td>
		          <td><b>Estudios Informados por Hora</b></td>
		          <td><b>Tiempo promedio de informe(horas)</b></td>
		     </tr>
		     <?php for($rad=0;$rad<$countrad;$rad++){
		  echo "<tr align='center'>
		         <td height='30px' >".$radiologos_ac[$rad]."</td>
		         <td >".$ei_pendientes[$rad]."</td>
		         <td >".$ei_radiologos[$rad]."</td>
		         <td >".$horas_acr[$rad]."</td>
		         <td >".$ei_horas[$rad]."</td>
		         <td >".$horap_radiolog[$rad]."</td>
		     </tr>";
		}?>
		</table>
	</div>
</div><!--row-->
