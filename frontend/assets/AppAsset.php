<?php

namespace frontend\assets;

use common\components\helpers\LanguageHelpers;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
      'js/helper.js',
      'js/app.js'
  ];

  public function init()
  {
    parent::init();
    $this->cssConfig();
  }

  private function cssConfig()
  {
    $this->css[] = "css/site.css";

    if (LanguageHelpers::getCurrentLanguageDirection() === LanguageHelpers::RTL_DIRECTIONS) {
      $this->css[] = "css/site-rtl.css";
      $this->css[] = "css/lib/bootstrap-rtl.min.css";
      $this->css[] = "css/lib/fontawesome-rtl.css";
    }
  }

  public $depends = [
      'yii\web\YiiAsset',
      'yii\bootstrap4\BootstrapAsset',
  ];
}
