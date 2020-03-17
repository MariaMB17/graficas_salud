<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap-submenu.css',
        'css/estilo.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/script.js',
        'js/bootstrap.js',
        'js/grafica1.js',
        'js/grafica2.js',
        'js/grafica3.js',
        'js/grafica4.js',
        'js/grafica5.js',
        'js/grafica6.js',
        'js/bigote.js',
        'highcharts/highcharts.src.js',
        'highcharts/highcharts-more.src.js',
        'js/bootstrap-submenu.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
