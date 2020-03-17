<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\Session;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this \yii\web\View */
/* @var $content string */

$session = Yii::$app->session;
$db = Yii::$app->db;

$meses = $db->createCommand("SELECT `id`,mes FROM `mes` where id<MONTH (NOW()) or id=13")->queryAll();

for ($i=0; $i < count($meses) ; $i++) {
  $mesess[$meses[$i]['id']] = $meses[$i]['mes'];
}

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="container-fluid">

    <div class="row <?= $session['meny_y_footer']?>">
      <div class="col-md-12 espacio">
        <nav class="navbar navbar-default sinBorder fondo">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#" class="hidden-lg hidden-md"><img src="imagenes/logo.png" width="50px" align="left"> </a>
              <a class="navbar-brand titulo" href="<?= Url::to(['grafica/index']) ?>"> Dashboard de Radiología Nacional</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav">
                <?= Html::beginForm(
                        Url::toRoute("grafica/fecha"),//action
                        "post",//method
                        ['class' => 'navbar-form navbar-left form-inline formulario']//options
                        );
                ?>

                  <?= Html::dropDownList(
                      'mes',
                      $session['nombreMes'],
                      $items = $mesess,
                      $options = ['class' => 'form-control filtroMes'] ) ?>

                  <?= Html::textInput("tarea",'mes',['class' => 'hidden'])?>
                  <!--<?= Html::submitInput("Buscar", ["class" => "btn btn-default "]) ?>-->
                <?= Html::endForm() ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $session['filtro']?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= Url::to(['grafica/index','tarea' => 'mes', 'mes' => $session['mes']]) ?>">Nivel Nacional</a></li>
                    <li class="dropdown-submenu">
                        <a href="#" >Provincia</a>
                        <ul class="dropdown-menu  ">
                            <?php
                                $contador = count($session['provincia']);
                                $provincia = $session['provincia'];
                                for ($i=0; $i < $contador ; $i++) {
                                    echo "
                                            <li><a href=".Url::to(['grafica/index','provincia' => $provincia[$i],'tarea' => 'provincia','mes' => $session['mes']])." >$provincia[$i]</a></li>
                                        ";
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                      <a href="#" data-toggle="dropdown" aria-expanded="false">Nivel de Atención</a>
                      <ul class="dropdown-menu">
                        <li><a href="<?= Url::to(['grafica/index', 'tarea' => 'nivel','nivelA' => 'Hospi','mes' => $session['mes']]) ?>">Hospital</a></li>
                        <li><a href="<?= Url::to(['grafica/index', 'nivelA' => 'Polic', 'tarea' => 'nivel','mes' => $session['mes']]) ?>">Policlínica</a></li>
                        <li><a href="<?= Url::to(['grafica/index', 'nivelA' => 'ULAPS', 'tarea' => 'nivel','mes' => $session['mes']]) ?>">ULAPS</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu">
                      <a href="#" data-toggle="dropdown" aria-expanded="false">Unidad Ejecutora</a>
                      <ul class="dropdown-menu anchoSubMenu">
                         <?php
                            $contadorH = count($session['hospital']);
                            $hospital = $session['hospital'];
                            $codigoH = $session['codigoHospital'];
                            for ($j=0; $j < $contadorH; $j++) {
                                echo "
                                        <li><a href=".Url::to(['grafica/index','tarea' => 'Ejecutora','unidadE' => $codigoH[$j],'mes' => $session['mes']]).">$hospital[$j]</a></li>
                                    ";
                            }
                            $contadorP = count($session['policlinica']);
                            $policlinica = $session['policlinica'];
                            $codigoP = $session['codigoPoliclinica'];
                            for ($h=0; $h < $contadorP; $h++) {
                                echo "
                                        <li><a href=".Url::to(['grafica/index','tarea' => 'Ejecutora','unidadE' => $codigoP[$h],'mes' => $session['mes']]).">$policlinica[$h]</a></li>
                                    ";
                            }
                            $contadorU = count($session['ulaps']);
                            $ulaps = $session['ulaps'];
                            $codigoU= $session['codigoUlaps'];
                            for ($l=0; $l < $contadorU; $l++) {
                                echo "
                                        <li><a href=".Url::to(['grafica/index','tarea' => 'Ejecutora','unidadE' => $codigoU[$l],'mes' => $session['mes']]).">$ulaps[$l]</a></li>
                                    ";
                            }
                        ?>

                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown <?php echo $session['seguridad']?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= Url::to(['usuario/index']) ?>">Registrar Usuario</a></li>
                    <li><a href="<?= Url::to(['disponibilidad/index']) ?>">Disponibilidad</a></li>
                    <li><a href="<?= Url::to(['configuracion/index']) ?>">Configuración</a></li>
                    <li><a href="<?= Url::to(['importar/index']) ?>">Importar CSV</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                    <!--<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()"/>-->
                    <div id="content" >
                      <a href="#"> <img src="imagenes/help.png" data-toggle="modal" data-target="#myModal" width="37px" align="left" style="margin-top:5px" ></a>
                      <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">Formulas</h4>
                              </div>
                                <div class="modal-body">
                                <b><u>INDICADORES CLAVES</u></b> <br><br>
                                    <P>-Se calcula las horas de tiempo de informe (Se resta
                                        fecha_agendado-fecha_aprobado) <br>
                                        Se suman las horas obtenidas y se divide entre la cantidad de
                                        ambulatorio,hospitalizados y urgencias. De acuerdo sea el
                                        caso
                                     </P><br>
                                      <b>**GRAFICA DE BARRAS CON TARGET</b><br>
                                       <p><b>-E_Realizados:</b> Se suman los estudios hechos. <br>
                                          <b>-E.Informados:</b> Se suman los estudios hechos en estado
                                          Informado. (Se utiliza el campo Informado). <br>
                                          <b>-E.Pendientes:</b> Se suman los estudios hechos en estado
                                          pendiente por informar. (Se utiliza el campo Informado). <br>
                                          <b>-E.int.posterior:</b> Se suman todos los estudios hechos con
                                          interpretación porsterior. (Campos interpretacion
                                          posterior="Y"). <br>
                                          <b>-E.Cancelados:</b> Se suman todos los estudios relizados en
                                          estado cancelado.
                                       </p><br>
                                        <b>**GRAFICA ULTIMO 12 MESES:</b><br>
                                         <p> Se suman los estudios hechos y se agrupan por modalidad y mes.</p><br><br>
                                  <b><u>PRODUCTIVIDAD</u></b> <br>
                                    <b>**GRAFICA ULTIMOS 12 MESES</b><br>
                                     <p>Se agrupa por modalidades y por mes para obtener el total de estudios para cada una de ellas mensualmente</p><br>
                                      <b>**GRAFICA DE BARRAS CON TARGET</b><br>
                                       <p>(total estudios realizados por modalidad/total estudios realizados)*100</p><br>
                                        <b>**TABLA DE TEXTO:</b><br>
                                         <p> <b> %: </b>  Representa el porcentaje de estudios por cada modalidad <br>
                                             <b>P.E :</b>  Estudios Realizados / cantidad de técnicos.
                                          </p><br><br>
                                  <b><u> T. ESPERA </u></b> <br>
                                               <b>**GRAFICA DE BARRAS </b><br>
                                               <p>X = FECHA_ARRIVADO - FECHA_HECHO = Minutos de espera <br>
                                                  Se calcula el promedio de minutos de espera por cada modalidad.
                                              </p>
                                  <b><u> T. ENTRE AGENDAMIENTO Y CITA</u></b> <br>
                                               <b>**GRAFICA DE BARRAS CON TARGET (AMBULATORIOS) </b><br>
                                               <p>X = FECHA_AGENDADO - FECHA_HECHO = dias <br>
                                                  Se calcula el promedio en dias por cada modalidad
                                                  de los pacientes en estado Abulatorios.
                                              </p>
                                              <b>**GRAFICA DE BARRAS CON TARGET (HOSPITALIZADOS - URGENCIAS) </b><br>
                                               <p>X = FECHA_AGENDADO - FECHA_HECHO = horas <br>
                                                  Se calcula el promedio en horas por cada modalidad
                                                  de los pacientes en estado Hopitalizados y de urgencias.
                                              </p><br>
                                              <p><b><n>E importante reasaltar que este mismo procedimiento se hace para los estudios
                                                que estan agendados pero en estado cancelado</n></b></p>
                                <b><u> ESTUDIOS AGENDADOS </u></b> <br>
                                               <p>Se suman todos los estudios agendados por modalidad y por
                                                  mes. (Solamente para este caso se muestran caundo
                                                  seleccionan un mes en especifico se muestran los estudios
                                                  agendados en los proximos meses)
                                              </p> <br>
                                <b><u>CANCELADOS</u></b> <br>
                                    <b>**GRAFICA ULTIMOS 12 MESES</b><br>
                                     <p>Se agrupa por modalidades y por mes para obtener el total de estudios en estado cancelado
                                      para cada una de ellas mensualmente</p><br>
                                      <b>**GRAFICA DE BARRAS CON TARGET</b><br>
                                       <p>(total estudios realizados por modalidad en estado canelado/total estudios realizados)*100</p><br>
                                        <b>**TABLA DE TEXTO:</b><br>
                                         <p> <b> %: </b>  Representa el porcentaje de estudios por cada modalidad en estado cancelado <br>
                                             <b>#:</b>  Estudios en estado cancelado por modalidad.
                                          </p><br><br>
                                <b><u>TIEMPO DE INFORME </u></b> <br>
                                    <b>**GRAFICA DE BIGOTES</b><br>
                                     <p>-Se suman todos los dias aprobados y se divide entre la
                                         cantidad de unidades Ejecutoras.(Esta se usa para la seleccion
                                         de mes, nivel Atencion y Provincia). Para la seleccion de una <br>
                                         unidad ejecutora en especifico se suman todos los estudios
                                         aprobados y se divide entre la cantidad de grupos de estudio.
                                         Estos calculos se utilizan para encontrar N o el Total de
                                         acuerdo sea la seleccion.<br>
                                         -Para calcular los cuartines se toma en cuenta si N es par o
                                         impar, ya que si es par se hace de la siguiente forma:<br>
                                         Q1 = N*1/4<br>
                                         Q3 = N*3/4<br>
                                         <b>y si es impar:</b><br>
                                         Q1 = 1(N+1)/4<br>
                                         Q3 = 3(N+1)/4<br>
                                         media = Q1+Q3<br>
                                         Min = 0 siempre<br>
                                         Max = N<br>
                                      </p><br>
                                        <b>**TABLA DE TEXTO:</b><br>
                                         <p> <b>-Estudios Informados:</b>
                                            Se suman todos los estudios en estado Informado. <br>
                                            <b>-%Sin Asignar:</b>
                                             -Se cuentan todos los Asignados_por <br>
                                              x= (de interpretacion valija +  interpretacion valija posterior/total asignados_por)*100
                                            <b>-Promedio en dias</b>
                                            FECHA_APROBADO`<>"0000-00-00 00:00:00
                                            se resta la fecha_aprobado-fecha_hecho par aobtener los
                                            dias.
                                            - Se calcula el promedio de los dias obtenidos. <br>
                                            <b>-Radiologos Disponibles:</b>
                                            Se cuantas los radiologos que ralizaron estudios.<br>
                                            <b>-Estudios Informados Prom:</b>
                                            -Se calcula el promedio de los estudios que fueron
                                            informados.<br>
                                            <b>-Estudios Informados por Horas:</b>
                                            sum(hours(FECHA_APROBADO))/estudios informados.<br>
                                            <b>-Estudios asignados por Radiologos:</b>
                                            Se suman los estudios informados y  pendientes por informar.<br>
                                            <b>-Por Rdiologos.</b>
                                            Se calcula el promedio en horas para cada radiologo.
                                          </p><br>
                                  <b><u>ESTUDIOS REALIZADOS</u></b> <br>
                                    <b>**TABLA DE TEXTO:</b><br>
                                         <p> <b>- % del total:</b>
                                            Se suman todos los etudios realizados y se divide entre 100. Por cada
                                            unidad ejecutora <br>
                                            <b>-Tecnicos Activos:</b>
                                             Se cuentan los tecnicos que realizaron estudios. Por cada unidadEjecutora.
                                            <b>-Estudios realizados por Tecnicos:</b>
                                            Se suman los estudios realizados por tecnico por cada Unidad Ejecutora.<br>
                                            <b>-% informados:</b>
                                            Se suman los estudios informados y se divide entre 100. Por cada
                                            Unidad Ejecutora<br>
                                            <b>-% Pendiente:</b>
                                            Se suman los estudios pendientes por informar y se divide entre 100.
                                            Por cada Unidad Ejecutora.<br>
                                            <b>-T.prom. informe:</b>
                                            Se calcula el promedio en dias. (Se resta fehca_hecho-fecha_aprobado
                                            para obtener los dias). Por cada
                                            Unidad Ejecutora<br>
                                            <b>-Radiologos Activos:</b>
                                            se cuentas los radiologos activos por cada unidad ejecutora.<br>
                                            <b>-Estudios realizados por  Radiologos:</b>
                                            Se sumn los estudios realizados por Radiologo por cada Unidad Ejecutora.
                                          </p><br>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                </li>
                <li><a href="#" class="imgL hidden-xs hidden-sm"><img src="imagenes/logo.png" width="50px" align="left"> </a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu submenu" role="menu">
                    <li>
                        <div class="well well2">
                            <p>Usuario: <b><?php echo $session['usuario'] ?> </b></p>
                            <p>Nombre: <b><?php echo $session['nombres']; echo " ".$session['apellidos']; ?></b></p>
                            <p>Cargo: <b><?php echo $session['cargo']?></b></p>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?= Url::to(['grafica/cerrar']) ?>" class="btn btn-default">Cerrar sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </div>

    <div class="row" >
        <div class="">
        <div class="col-md-12 ">

            <?= Breadcrumbs::widget([
                    'homeLink' => [
                    'label' => Yii::t('yii', 'Inicio'),
                    'url' => ['grafica/index','tarea' => $session['tarea'],'mes' => $session['mes'],'provincia' => $session['provincias'],'nivelA' => $session['nivelA'],'unidadE' => $session['unidadE']],
                    'options' => ['class' => 'breadcrumb']
                 ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        </div>
    </div>

    <div class="row <?= $session['meny_y_footer']?>">
      <div class="col-md-12 espacio">
        <footer class="footer">
            <strong>Copyright &copy; <?= date('Y') ?> Desarrollado por <a href="#">Consultores Informaticos</a>.</strong>Todos los derechos reservados.
        </footer>
      </div>
    </div>


  </div><!--container-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
