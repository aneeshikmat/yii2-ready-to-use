<?php

namespace backend\assets;

use common\components\helpers\LanguageHelpers;
use Yii;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public function init()
    {
      parent::init();
      $this->cssConfig();
      $this->jsConfig();
    }

    private function cssConfig()
    {
      $this->css[] = "css/site.css";

      if(LanguageHelpers::getCurrentLanguageDirection() === LanguageHelpers::RTL_DIRECTIONS){
        $this->css[] = "css/site-rtl.css";
        $this->css[] = "css/lib/bootstrap-rtl.min.css";
        $this->css[] = "css/lib/adminlte-rtl.css";
        $this->css[] = "css/lib/adminlte-rtl-fixes.css";
        $this->css[] = "css/lib/fontawesome-rtl.css";
      }else {
        $this->css[] = "css/lib/adminlte.css";
      }
    }

    private function jsConfig()
    {
      $this->js[] = "js/lib/adminlte.min.js";
    }

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset'
        // 'hail812\adminlte3\assets\BaseAsset',
        // 'hail812\adminlte3\assets\PluginAsset'
    ];
}
