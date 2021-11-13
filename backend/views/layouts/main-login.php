<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\components\helpers\LanguageHelpers;
use common\widgets\Alert;
use yii\helpers\Html;

AppAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body class="d-flex flex-column min-vh-100 hold-transition login-page" dir="<?= LanguageHelpers::getCurrentLanguageDirection() ?>">
<?php $this->beginBody() ?>

<main role="main" class="flex-shrink-0">
   <div class="container-fluid">
     <div class="row">
         <div class="col-12">
           <?= Alert::widget() ?>
         </div>
     </div>

     <?= $content ?>
   </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
