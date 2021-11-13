<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\components\helpers\LanguageHelpers;
use yii\helpers\Html;

AppAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

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
<body class="hold-transition sidebar-mini" dir="<?= LanguageHelpers::getCurrentLanguageDirection() ?>">
<?php $this->beginBody() ?>

<main class="wrapper">
    <!-- Navbar -->
  <?= $this->render('header') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
  <?= $this->render('left') ?>

    <!-- Content Wrapper. Contains page content -->
  <?= $this->render('content', ['content' => $content]) ?>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
  <?= $this->render('footer') ?>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
