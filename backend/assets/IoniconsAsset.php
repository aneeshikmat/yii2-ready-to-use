<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 4/11/18
 * Time: 8:37 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

class IoniconsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/Ionicons';
    public $css = [
        'css/ionicons.min.css',
    ];

    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
        'backend\assets\AppAsset',
    ];

}