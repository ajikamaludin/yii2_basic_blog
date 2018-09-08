<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'backend/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'backend/bower_components/font-awesome/css/font-awesome.min.css',
        'backend/bower_components/Ionicons/css/ionicons.min.css',
        'backend/bower_components/jvectormap/jquery-jvectormap.css',
        'backend/dist/css/AdminLTE.min.css',
        'backend/dist/css/skins/_all-skins.min.css',
        'backend/css/spacing.css'
    ];
    public $js = [
        //'backend/bower_components/jquery/dist/jquery.min.js',
        'backend/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'backend/bower_components/fastclick/lib/fastclick.js',
        'backend/dist/js/adminlte.min.js',
        'backend/plugins/ckeditor/ckeditor.js',
        //'backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        //'backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        //'backend/bower_components/chart.js/Chart.js',
        //'backend/dist/js/pages/dashboard2.js',
        'backend/dist/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
