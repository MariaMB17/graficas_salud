<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
$this->title = 'Grafica';
?>



<div class="row">

	<div class="col-md-7">

<!--=============================================================================================================
					INDICADORES CLAVE
================================================================================================================-->

		<h3>Indicadores Clave</h3>

		<table  class="tablaG1 letra" border="1" width="100%">
			<tr>
				<th >12 Meses</th>
				<th >Indicador</th>
			</tr>
			<tr>
				<td width="90px"></td>
				<td width="120px">T.Promedio Total (dias)</td>
			</tr>
			<tr>
				<td height="35px"><div id="ambulatorio" > <div style="display:none" id="valorA"><?= $amb?></div></div></td>
				<td> Ambulatorio  </td>
				<td width="70px"><?= $ambulatorio?></td>
			</tr>
			<tr>
				<td height="35px"><div id="hospitalizado"> <div style="display:none" id="valorH"><?= $hosp?></div></div></td>
				<td>Hospitalizado </td>
				<td><?= $hospitalizado?></td>
			</tr>
			<tr>
				<td height="35px"><div id="urgencia"> <div style="display:none" id="valorU"><?= $urg?></div></div></td>
				<td>Urgencias </td>
				<td><?= $urgencias?></td>
			</tr>
			<tr>
				<td height="10px"></td>
				<td></td>
				<td></td>
				<td rowspan="7" class="graficaT">
					<div id="grafica1" >
						<div style="display:none" id="valorPrincipal">
								<?= $graficaIndicador?>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td height="35px"><div id="realizados"> <div style="display:none" id="valorR"><?= $realizado?></div></div></td>
				<td>E. Realizados (k) </td>
				<td><?= $EstudioR?></td>

			</tr>
			<tr>
				<td height="35px"><div id="informados"> <div style="display:none" id="valorI"><?= $informado?></div></div></td>
				<td>E. Informados (k)</td>
				<td><?= $EstudioI?></td>
			</tr>
			<tr>
				<td height="35px"><div id="pendientes"> <div style="display:none" id="valorP"><?= $pendiente?></div></div></td>
				<td>E. Pendientes (k)</td>
				<td><?= $EstudioP?></td>
			</tr>
			<tr>
				<td height="35px"><div id="posterior"> <div style="display:none" id="valorPos"><?= $posterior?></div></div></td>
				<td>E. Int. Posterior (k)</td>
				<td><?= $EstudioPost?></td>
			</tr>
			<tr>
				<td height="35px"><div id="cancelados"> <div style="display:none" id="valorC"><?= $cancelado?></div></div></td>
				<td>E. Cancelado (k)</td>
				<td><?= $EstudioC?></td>
			</tr>
			<tr>
				<td colspan="3" ></td>
			</tr>
		</table>

<!--=============================================================================================================
					TIEMPO DE INFORMES
================================================================================================================-->

		<div class="col-md-12" style="margin-top:-25px">
			<a class="titulo" href="<?= Url::to(['tiempo/index']) ?>"><h3>Tiempos de Informe</h3></a>

			<div id="grafica3">
					<div  id="global" style="display:none"><?= $tiempoGlobal?></div>
					<div  id="graficaHosp" style="display:none"><?= $tiempoHosp?></div>
					<div  id="graficaAmb" style="display:none"><?= $tiempoAmb?></div>
					<div  id="graficaUrgencia" style="display:none"><?= $tiempoUrg?></div>
					<div  id="graficaInt" style="display:none"><?= $tiempoInt?></div>
					<div  id="graficaRemota" style="display:none"><?= $tiempoRem?></div>

			</div>
		</div><!--col-md-12-->

	</div><!--col-md-7-->


<!--=============================================================================================================
					DISPONIBILIDAD
================================================================================================================-->

	<div class="col-md-5">
		<h3>Disponibilidad</h3>

		<table border="0" width="100%" class="tablaG2 letra">
			<tr>
				<th width="85px" height="40px">12 Meses</th>
				<th width="85px">Indicador</th>
				<td rowspan="15" >
					<div id="grafica2s" class="graficaD">
							<div id="graficasDisps" style="display:none">
									<?php  echo implode(",",$promedioDisponible)?>
							</div>
					</div>
				</td>
				<th width="70px">%</th>
			</tr>
			<tr>
				<td height="40px"></td>
				<td><?= $totalIndicador3[0]?></td>
				<td><?= $promedioDisponible[0]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaRed">
						<div id="grafiRed" style="display:none">
							<?php echo implode(",", $mesDisponible['Red']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[1]?></td>
				<td><?= $promedioDisponible[1]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaRis">
						<div id="grafiRis" style="display:none">
							<?php echo implode(",", $mesDisponible['RIS']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[2]?></td>
				<td><?= $promedioDisponible[2]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaPacs">
						<div id="grafiPacs" style="display:none">
							<?php echo implode(",", $mesDisponible['PACS']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[3]?></td>
				<td><?= $promedioDisponible[3]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaEquipo">
						<div id="grafiEquipo" style="display:none">
							<?php echo implode(",", $mesDisponible['Equipo']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[4]?></td>
				<td><?= $promedioDisponible[4]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaRx">
						<div id="grafiRx" style="display:none">
							<?php echo implode(",", $mesDisponible['RX']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[5]?></td>
				<td><?= $promedioDisponible[5]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaCt">
						<div id="grafiCt" style="display:none">
							<?php echo implode(",", $mesDisponible['CT']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[6]?></td>
				<td><?= $promedioDisponible[6]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaMr">
						<div id="grafiMr" style="display:none">
							<?php echo implode(",", $mesDisponible['MR']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[7]?></td>
				<td><?= $promedioDisponible[7]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaUs">
						<div id="grafiUs" style="display:none">
							<?php echo implode(",", $mesDisponible['US']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[8]?></td>
				<td><?= $promedioDisponible[8]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaMg">
						<div id="grafiMg" style="display:none">
							<?php echo implode(",", $mesDisponible['MG']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[9]?></td>
				<td><?= $promedioDisponible[9]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaXa">
						<div id="grafiXa" style="display:none">
							<?php echo implode(",", $mesDisponible['XA']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[10]?></td>
				<td><?= $promedioDisponible[10]?></td>
			</tr>
			<tr>
				<td height="40px">
					<div id="graficaRf">
						<div id="grafiRf" style="display:none">
							<?php echo implode(",", $mesDisponible['RF']);?>
						</div>
					</div>
				</td>
				<td><?= $totalIndicador3[11]?></td>
				<td><?= $promedioDisponible[11]?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>

	</div><!--col-md-5-->


</div><!--row-->
<!--=============================================================================================================
					PRODUCTIVIDAD
================================================================================================================-->

<div class="row">
	<div class="col-md-5">
		<a class="titulo" href="<?= Url::to(['estudio/index']) ?>"><h3>Productividad</h3></a>
		<br>
	    <table width="100%" border="1" class="tablaG4 letra">
			<tr align="center" >
				<th height="34px" width="100px">12 Meses</th>
				<th width="100px">Modalidad</th>
				<th></th>
				<th width="100px">%</th>
				<th width="100px">P.E</th>
			</tr>
		  <tr>
				<td height="34px">
					<div id="tproductividadesAg">
						<div style="display:none" id="tproductividad">
							<?= $total_mesP?>
						</div>
						<div style="display:none" id="tmodalidadprod">
							<?= $mesproductividad?>
						</div>
					</div>
				</td>
				<td>Total</td>
				<td rowspan="11" >
					<div id="modalidadprod" class="graficaPro">
					    <div style="display:none" id="totalmodalidadp">
					    	<?= $totalProductividad?>
					    </div>
					    <div style="display:none" id="modalidadp">
					    	<?= $modalidadProductividad?>
					    </div>
					</div>
				</td>
				<td><?= $total_porcentaje?></td>
				<td><?= $totalPE ?></td>
			</tr>
			<?php for($t=0;$t<$contador;$t++){
				echo "<tr>
				        <td height='34px'>
				         	<div id=".$modalidadesP[$t].">
				                <div id='data'>
				                  ".implode(",",$mensual[$modalidadesP[$t]])."
				                </div>
				                <div id='mesdata'>
				                  ".implode(",",array_keys($mensual[$modalidadesP[$t]]))."
				                </div>
				        	</div>
				        </td>
				        <td align='center'>".$modalidadesP[$t]."</td>
				        <td align='center'>".$porcentaje[$t]."</td>
				        <td align='center'>".$valorPE[$t]."</td>
				     </tr>";
			}?>

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div><!--col-md-6-->

	<div class="col-md-2">
		<h3>T. espera</h3>
		<br>
		<table width="100%" border="1" class="tablaG4 letra">
			<tr>
				<th height="34px">Para realizar estudio (min)</th>
			</tr>
			<tr>
				<td>
					<div id="t_espera" class="graficaPro2">
				        <div style="display:none" id="modalidadt">
									<?= $modalidad?>
				    	</div>
				    	<div style="display:none" id="porcentaje">
									<?= $valor?>
				    	</div>
				    </div>
				</td>
			</tr>
		</table>

	</div><!--col-md-2-->

	<div class="col-md-4">
		<a class="titulo" href="<?= Url::to(['demanda/index']) ?>"><h3>T. entre agendamiento y cita</h3></a>
		<br>
		<table width="100%" border="1" class="tablaG4 letra">
			<tr>
				<th height="34px">Ambulatorios - días</th>
				<th width="10px"></th>
				<th>Hospitalizados - horas</th>
				<th width="30px"></th>
				<th>Urgencias - horas</th>
			</tr>
			<tr>
				<td>
					<div id="ambulatorios" class="graficaPro2">
				        <div style="display:none" id="modalidadtacp">
				        	<?= $modalidad_ambulatorio?>

					    </div>
					    <div style="display:none" id="totalmodalidadtacp">
					    	<?= $valor_ambulatorio?>

					    </div>
				    </div>
				</td>
				<td ></td>
				<td>
					<div id="hospitalizados" class="graficaPro2">
				        <div style="display:none" id="modalidadhosp">
				        	<?= $modalidad_hospitalizados?>

					    </div>
					    <div style="display:none" id="totalhosp">
                            <?= $valor_hospitalizados?>

					    </div>
				    </div>
				</td>
				<td ></td>
			   <td>
					<div id="urgencias" class="graficaPro2">
				        <div style="display:none" id="modalidadurgen">
				        	<?= $modalidad_urgencias?>

					    </div>
					    <div style="display:none" id="totalurgen">
					    	<?= $valor_urgencias?>

					    </div>
				    </div>
				</td>
			</tr>
		</table>

	</div><!--col-md-4-->

</div><!--row-->
