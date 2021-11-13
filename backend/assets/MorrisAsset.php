<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 4/11/18
 * Time: 8:37 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

class MorrisAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';
    public $css = [
        'morris.js/morris.css',
    ];
    public $js = [
        'raphael/raphael.min.js',
        'morris.js/morris.min.js'
    ];

    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
        'backend\assets\AppAsset',
    ];

}