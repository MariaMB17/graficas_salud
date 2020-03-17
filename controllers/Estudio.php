<?php

namespace app\controllers;

use Yii;
use yii\web\Session;

class Estudio {

	public function estudio(){

		$session = Yii::$app->session;
		$db = Yii::$app->db;

    $tarea = $mes = $provincia = $nivelA = $unidadE = null;

    $tarea = $session['tarea'];
    $mes = $session['mes'];
    $provincia = $session['provincias'];
    $nivelA = $session['nivelA'];
    $unidadE = $session['unidadE'];

		$grafica = $grafica2 = $grafica3 = $querytecnicos = $querytecnicos1 = $querytecnicos2 = array();

        
           $modalidades = $db->createCommand("SELECT distinct `modalidad` FROM `tiemposdetecnicos` order by modalidad")->queryAll();
           $estudios = $db->createCommand("SELECT DISTINCT `estudio` FROM `tiemposdetecnicos`ORDER BY `estudio`")->queryAll();
           $unidades = $db->createCommand("SELECT DISTINCT `unidadejecutora` FROM `tiemposdetecnicos`ORDER BY `unidadejecutora`")->queryAll();

		switch ($tarea) {
			case 'mes':
					if ($mes == 13) {
						$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
														FROM `tiemposdeinforme` 
														INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
                                                        where `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!='' 
														group by `unidadEjecutora`")->queryAll();

						$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` 
													    where `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!=''
                                                        group by `modalidad`")->queryAll();

						$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` 
														where `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!=''
                                                        group by `estudio`")->queryAll();

						for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO')
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->queryAll();
						}

						
						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE modalidad=:CMDO')
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->queryAll();
						}

					

					  for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE estudio=:estudio')
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->queryAll();
						
					}
               }else{
					 
					 $grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
														FROM `tiemposdeinforme` 
														INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
                                                        where mes='$mes' and `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!='' 
														group by `unidadEjecutora`")->queryAll();

						$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` 
													    where mes='$mes' and `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!=''
                                                        group by `modalidad`")->queryAll();

						$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` 
														where mes='$mes' and `radiologo`!='de interpretacion Valija' 
                                                        and `radiologo`!='interpretacion posterior Valija' and `radiologo`!=''
                                                        group by `estudio`")->queryAll();

						for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and mes=:mes')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->queryAll();
						}

						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                      WHERE mes=:mes 
							                                      and modalidad=:CMDO')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE mes=:mes 
							                                    and estudio=:estudio')
							                                    ->bindValue(':mes', $mes)
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->queryAll();
						
					}


					}



			break;

			case 'provincia':
				if ($mes == 13) {
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
														FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
													    where tiemposdeinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();

					$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where tiemposdeinforme.provincia ='$provincia' 
												    group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme`
													    where tiemposdeinforme.provincia ='$provincia'  group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and provincia=:provincia')
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->bindValue(':provincia',$provincia)
							                                      ->queryAll();
						}

						
						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE modalidad=:CMDO
							                                       and provincia=:provincia')
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':provincia',$provincia)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE estudio=:estudio
							                                    and provincia=:provincia')
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':provincia',$provincia)
							                                    ->queryAll();
						
					}


				}else{
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio													
														FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
														where `mes` = '$mes' and tiemposdeinforme.provincia ='$provincia' group by `unidadEjecutora`")->queryAll();

					$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where `mes` = '$mes' and provincia ='$provincia' group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where `mes` = '$mes'
													and provincia ='$provincia'  group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and mes=:mes
							                                       and provincia=:provincia')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->bindValue(':provincia',$provincia)
							                                      ->queryAll();
						}

						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                      WHERE mes=:mes 
							                                      and modalidad=:CMDO
							                                      and provincia=:provincia')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':provincia',$provincia)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE mes=:mes 
							                                    and estudio=:estudio
							                                    and provincia=:provincia')
							                                    ->bindValue(':mes', $mes)
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':provincia',$provincia)
							                                    ->queryAll();
						
					}
				}

			break;

			case 'nivel':
				if ($mes == 13) {
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
														where nivelAtencion ='$nivelA' group by `unidadEjecutora`")->queryAll();

					$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where nivelAtencion ='$nivelA' group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
												    FROM `tiemposdeinforme` where nivelAtencion ='$nivelA'  group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and nivelAtencion =:nivel')
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->bindValue(':nivel',$nivelA)
							                                      ->queryAll();
						}

						
						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE modalidad=:CMDO
							                                       and nivelAtencion =:nivel')
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':nivel',$nivelA)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE estudio=:estudio
							                                    and nivelAtencion =:nivel')
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':nivel',$nivelA)
							                                    ->queryAll();
						
					}
				}else{
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
														where `mes` = '$mes' and nivelAtencion ='$nivelA' group by `unidadEjecutora`")->queryAll();

				  $grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where `mes` = '$mes' and nivelAtencion ='$nivelA' group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio													FROM `tiemposdeinforme` where `mes` = '$mes' and nivelAtencion ='$nivelA' group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and mes=:mes
							                                       and nivelAtencion =:nivel')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->bindValue(':nivel',$nivelA)
							                                      ->queryAll();
						}

						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                      WHERE mes=:mes 
							                                      and modalidad=:CMDO
							                                      and nivelAtencion =:nivel')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':nivel',$nivelA)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE mes=:mes 
							                                    and estudio=:estudio
							                                    and nivelAtencion =:nivel')
							                                    ->bindValue(':mes', $mes)
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':nivel',$nivelA)
							                                    ->queryAll();
						
					}
				}

			break;

			case 'Ejecutora':
				if ($mes == 13) {
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													    FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
														where  unidadEjecutora ='$unidadE' group by `unidadEjecutora`")->queryAll();

					$grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
														FROM `tiemposdeinforme` where  unidadEjecutora ='$unidadE' group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where unidadEjecutora ='$unidadE' group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO')
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->queryAll();
						}

						
						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE modalidad=:CMDO
							                                       and unidadEjecutora =:unidad')
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':unidad',$unidadE)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE estudio=:estudio
							                                    and unidadEjecutora =:unidad')
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':unidad',$unidadE)
							                                    ->queryAll();
						
					}

				}else{
					$grafica = $db->createCommand("SELECT `mes`,`unidadEjecutora`,descripcion,(case when substring(descripcion ,1,21)='Hospital Regional Dr.' THEN substring(descripcion ,22)
														when substring(descripcion ,1,11)='Hospital de' THEN substring(descripcion ,12)
														when substring(descripcion ,1,12)='Hospital Dr.' THEN substring(descripcion ,13)
														when substring(descripcion ,1,13)='Hospital Dra.' THEN substring(descripcion ,14)
														when substring(descripcion ,1,8)='Hospital' THEN substring(descripcion ,9)
														when substring(descripcion ,1,22)='Policlínica Básica Dr.' THEN substring(descripcion ,23)
														when substring(descripcion ,1,15)='Policlínica Don' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,15)='Policlínica Dr.' THEN substring(descripcion ,16)
														when substring(descripcion ,1,11)='Policlínica' THEN substring(descripcion ,12)
														when substring(descripcion ,1,23)='Policlínica Hospital de' THEN substring(descripcion ,24)
														when substring(descripcion ,1,9)='ULAPS Dr.' THEN substring(descripcion ,10)
														when substring(descripcion ,1,5)='ULAPS' THEN substring(descripcion ,6)
														when substring(descripcion ,1,11)='ULAPS Prof.' THEN substring(descripcion ,12)
														when substring(descripcion ,1,21)='Complejo Hospitalario' THEN substring(descripcion ,22) ELSE 0 END) AS u_ejecutora,
														sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
														FROM `tiemposdeinforme` INNER JOIN provincias ON tiemposdeinforme.unidadEjecutora=provincias.codigo
														where `mes` = '$mes' and unidadEjecutora ='$unidadE' group by `unidadEjecutora`")->queryAll();

				  $grafica2 = $db->createCommand("SELECT `mes`,`modalidad`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where `mes` = '$mes' and unidadEjecutora ='$unidadE' group by `modalidad`")->queryAll();

					$grafica3 = $db->createCommand("SELECT `mes`,`estudio`,sum(`hechos`) as realizados,ROUND((sum(`hechos`)/1000),1) as prealizados, 
														sum(`informados`) as informados,(sum(`hechos`)-sum(`informados`)) as pendientes,
														round(sum(`informados`)/1000,1) as pinformados,
														ROUND((sum(`hechos`)-sum(`informados`))/1000,1) as ppendientes,
														count(DISTINCT `radiologo`) as radiologos,round(avg(`promedio`),1) as promedio
													FROM `tiemposdeinforme` where `mes` = '$mes' and unidadEjecutora ='$unidadE' group by `estudio`")->queryAll();

					for ($k=0; $k <count($unidades) ; $k++) {

							$querytecnicos[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN '.'"'.$unidades[$k]['unidadejecutora'].'"'.' 
							                                      else '.'"'.$unidades[$k]['unidadejecutora'].'"'.' END) as unidad,
							                                      (CASE COUNT(`unidadejecutora`) WHEN 0 
							                                      THEN COUNT(`unidadejecutora`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                       WHERE unidadejecutora=:CMDO
							                                       and mes=:mes')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$unidades[$k]['unidadejecutora'])
							                                      ->queryAll();
						}

						for ($i=0; $i < count($modalidades) ; $i++) { 

						    $querytecnicos1[] = $db->createCommand('SELECT                                   
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN '.'"'.$modalidades[$i]['modalidad'].'"'.' 
							                                      else '.'"'.$modalidades[$i]['modalidad'].'"'.' END) as modalidad,
							                                      (CASE COUNT(`modalidad`) WHEN 0 
							                                      THEN COUNT(`modalidad`) 
							                                      else count(DISTINCT tecnico) END) as tecnico
							                                      FROM `tiemposdetecnicos`
							                                      WHERE mes=:mes 
							                                      and modalidad=:CMDO
							                                      and unidadEjecutora=:unidad')
							                                      ->bindValue(':mes', $mes)
							                                      ->bindValue(':CMDO',$modalidades[$i]['modalidad'])
							                                      ->bindValue(':unidad',$unidadE)
							                                      ->queryAll();
						}

					

					for ($j=0; $j < count($estudios); $j++) { 
						$querytecnicos2[] = $db->createCommand('SELECT                                  
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN '.'"'.$estudios[$j]['estudio'].'"'.' 
							                                    else '.'"'.$estudios[$j]['estudio'].'"'.' END) as estudio,
							                                    (CASE COUNT(`estudio`) WHEN 0 
							                                    THEN COUNT(`estudio`) 
							                                    else count(DISTINCT tecnico) END) as tecnico
							                                    FROM `tiemposdetecnicos`
							                                    WHERE mes=:mes 
							                                    and estudio=:estudio
							                                    and unidadEjecutora=:unidad')
							                                    ->bindValue(':mes', $mes)
							                                    ->bindValue(':estudio',$estudios[$j]['estudio'])
							                                    ->bindValue(':unidad',$unidadE)
							                                    ->queryAll();
						
					}

				}


			break;
		}


/*=======================UNIDAD EJECUTORA====================================*/

		$unidadEjecutora = $realizados = $informados = $pendientes = array();
		$E_realizadosTotal = $p_pendientes = $p_realizados = $unidades = array();
		$p_informados = $promedio = $r_activos = $ep_radiologos = $t_activos = $er_tecnicos = $tiempoPromedio = array();
		$contador_unidad = $t_ac = $r_ac = 0;

        
		foreach ($grafica as $row) {
			$unidadEjecutora[] = $row['u_ejecutora'];

			/*------------------------ GRAFICA ---------------------------------*/

			$tiempoPromedio[] = $row['promedio'];

			if (number_format($row['realizados']/1000,1,'.','') <=100) {
				$realizados[] = number_format($row['realizados']/1000,1,'.','');
				$informados[] = number_format($row['informados']/1000,1,'.','');
				$pendientes[] = number_format($row['pendientes']/1000,1,'.','');
			}else{
				$realizados[] = '100.0';
				$informados[] = number_format((($row['informados']/1000)*100)/($row['realizados']/1000),1,'.','');
				$pendientes[] = number_format((($row['pendientes']/1000)*100)/($row['realizados']/1000),1,'.','');
			}


			/*------------------------ TABLA ---------------------------------*/
           

           for ($i=0; $i <count($querytecnicos) ; $i++) { 
				if($querytecnicos[$i][0]['tecnico']==0){
                  $t_ac = 1;
				} else{
					$t_ac = $querytecnicos[$i][0]['tecnico'];
				}
				if($querytecnicos[$i][0]['unidad']==$row['unidadEjecutora']){
					$t_activos[] = $querytecnicos[$i][0]['tecnico']; 
                    $er_tecnicos[] = ROUND(($row['realizados']/$t_ac),1);
                    $unidades[] = $row['u_ejecutora'];

				}
			}
		   
		    $contador_unidad =count($unidadEjecutora);
            
            if ($row['radiologos']==0) {
            	$r_ac = 1;
            }else{
              $r_ac = $row['radiologos'];	
            }

			$E_realizadosTotal[] = $row['realizados'];
			$p_realizados[] = $row['prealizados'];
			$p_informados[] = $row['pinformados'];
			$p_pendientes[] = $row['ppendientes'];
			$r_activos[] =  $row['radiologos'];
			$ep_radiologos[] = ROUND(($row['realizados']/$r_ac),1);
			$promedio[] = $row['promedio'];

		}

   /*echo "<pre>";
    print_r($unidades);
    echo "<pre>"; */

   

/*===========================MODALIDAD==============================*/

		$modalidad = $realizadosM = $informadosM = $pendientesM = array();
		$E_realizadosTotalM = $p_pendientesM = $p_realizadosM = $p_informadosM = $promedioM = $t_activosM = array();
		$r_activosM = $er_tecnicosM = $ep_radiologosM = $tiempoPromedioM = array();
        $t_acM = $r_acM = 0;

        
		foreach ($grafica2 as $row) {
			$modalidad[] = $row['modalidad'];

			/*------------------------ GRAFICA ---------------------------------*/

			$tiempoPromedioM[] = $row['promedio'];

			if (number_format($row['realizados']/1000,1,'.','') <=100) {
				$realizadosM[] = number_format($row['realizados']/1000,1,'.','');
				$informadosM[] = number_format($row['informados']/1000,1,'.','');
				$pendientesM[] = number_format($row['pendientes']/1000,1,'.','');
			}else{
				$realizadosM[] = '100.0';
				$informadosM[] = number_format((($row['informados']/1000)*100)/($row['realizados']/1000),1,'.','');
				$pendientesM[] = number_format((($row['pendientes']/1000)*100)/($row['realizados']/1000),1,'.','');
			}


			/*------------------------ TABLA ---------------------------------*/

			for ($i=0; $i <count($querytecnicos1) ; $i++) { 
				if($querytecnicos1[$i][0]['tecnico']==0){
                  $t_acM = 1;
				} else{
					$t_acM = $querytecnicos1[$i][0]['tecnico'];
				}
				if($querytecnicos1[$i][0]['modalidad']==$row['modalidad']){
					$t_activosM[] = $querytecnicos1[$i][0]['tecnico']; 
                    $er_tecnicosM[] = ROUND(($row['realizados']/$t_acM),1);

				}
			}
            
            if ($row['radiologos']==0) {
            	$r_acM = 1;
            }else{
              $r_acM = $row['radiologos'];	
            }

			$E_realizadosTotalM[] = $row['realizados'];
			$p_realizadosM[] = $row['prealizados'];
			$p_informadosM[] = $row['pinformados'];
			$p_pendientesM[] = $row['ppendientes'];
			$r_activosM[] =  $row['radiologos'];
			$ep_radiologosM[] = ROUND(($row['realizados']/$r_acM),1);
			$promedioM[] = $row['promedio'];

		}

	



		/*===========================TIPO DE ESTUDIO==============================*/

				$estudio = $realizadosE = $informadosE = $pendientesE = array();
				$E_realizadosTotalE = $p_pendientesE = $p_realizadosE = $p_informadosE = array();
				$r_activosE = $ep_radiologosE = $t_activosE = $er_tecnicosE = $promedioE = $tiempoPromedioE = array();
				$t_acE = $r_acE = 0;
				foreach ($grafica3 as $row) {
					$estudio[] = $row['estudio'];

					/*------------------------ GRAFICA ---------------------------------*/

					$tiempoPromedioE[] = $row['promedio'];

					if (number_format($row['realizados']/1000,1,'.','') <=100) {
						$realizadosE[] = number_format($row['realizados']/1000,1,'.','');
						$informadosE[] = number_format($row['informados']/1000,1,'.','');
						$pendientesE[] = number_format($row['pendientes']/1000,1,'.','');
					}else{
						$realizadosE[] = '100.0';
						$informadosE[] = number_format((($row['informados']/1000)*100)/($row['realizados']/1000),1,'.','');
						$pendientesE[] = number_format((($row['pendientes']/1000)*100)/($row['realizados']/1000),1,'.','');
					}


					/*------------------------ TABLA ---------------------------------*/

					for ($i=0; $i <count($querytecnicos2) ; $i++) { 
						if ($querytecnicos2[$i][0]['tecnico']==0) {
							$t_acE = 1;
						}else{
							$t_acE= $querytecnicos2[$i][0]['tecnico'];
						}
				     if($querytecnicos2[$i][0]['estudio']==$row['estudio']){
					   $t_activosE[] = $querytecnicos2[$i][0]['tecnico']; 
                       $er_tecnicosE[] = ROUND(($row['realizados']/$t_acE),1);
                       $promedioE[] = $row['promedio'];
				     }
			        }
                     
                     if ($row['radiologos']==0) {
            	       $r_acE = 1;
                      }else{
                      $r_acE = $row['radiologos'];	
                     }
					$E_realizadosTotalE[] = $row['realizados'];
					$p_realizadosE[] = $row['prealizados'];
			        $p_informadosE[] = $row['pinformados'];
			        $p_pendientesE[] = $row['ppendientes'];
			        $r_activosE[] =  $row['radiologos'];
			        $ep_radiologosE[] = ROUND(($row['realizados']/$r_acE),1);


				}

		return $arreglo = array(
													/*======== UNIDAD EJECUTORA ================*/
														'unidadEjecutora' => $unidadEjecutora,
														/*----GRAFICA-------------*/
														'realizados' => $realizados,
														'informados' => $informados,
														'pendientes' => $pendientes,
														'tiempoPromedio' => $tiempoPromedio,
														

														/*----TABLA-------------*/
														'E_realizadosTotal' =>$E_realizadosTotal,
														'p_realizados' => $p_realizados,
														'p_pendientes' => $p_pendientes,
														'r_activos' => $r_activos,
														'p_informados' => $p_informados,
														'ep_radiologos' => $ep_radiologos,
														't_activos' => $t_activos,
														'er_tecnicos' => $er_tecnicos,
														'promedio' => $promedio,
														'contador_unidad'=>$contador_unidad,
														'unidades' => $unidades,


													/*======== MODALIDAD ================*/
														'modalidad' => $modalidad,
														/*----GRAFICA-------------*/
														'realizadosM' => $realizadosM,
														'informadosM' => $informadosM,
														'pendientesM' => $pendientesM,
														'tiempoPromedioM' => $tiempoPromedioM,

														/*----TABLA-------------*/
														'E_realizadosTotalM' => $E_realizadosTotalM,
														'p_realizadosM' => $p_realizadosM,
														'p_pendientesM' => $p_pendientesM,
														'r_activosM' => $r_activosM,
														'p_informadosM' => $p_informadosM,
														'ep_radiologosM' => $ep_radiologosM,
														't_activosM' => $t_activosM,
														'er_tecnicosM' => $er_tecnicosM,
														'promedioM' => $promedioM,



													/*======== TIPO DE ESTUDIO ================*/
														'estudio' => $estudio,
														/*----GRAFICA-------------*/
														'realizadosE' => $realizadosE,
														'informadosE' => $informadosE,
														'pendientesE' => $pendientesE,
														'tiempoPromedioE' => $tiempoPromedioE,

														/*----TABLA-------------*/
														'E_realizadosTotalE' => $E_realizadosTotalE,
														'p_realizadosE' => $p_realizadosE,
														'p_pendientesE' => $p_pendientesE,
														'r_activosE' => $r_activosE,
														'p_informadosE' => $p_informadosE,
														'ep_radiologosE' => $ep_radiologosE,
														't_activosE' => $t_activosE,
														'er_tecnicosE' => $er_tecnicosE,
														'promedioE' => $promedioE,
							);
	}



}
