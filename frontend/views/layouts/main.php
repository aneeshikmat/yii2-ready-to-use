<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\components\helpers\LanguageHelpers;
use common\widgets\LanguageSwitcher;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);

$this->registerJsVar('isGuest', Yii::$app->user->isGuest);
$this->registerJsVar('user_id', Yii::$app->user->id);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body class="d-flex flex-column min-vh-100" dir="<?= LanguageHelpers::getCurrentLanguageDirection() ?>">
<?php $this->beginBody() ?>

<header>
  <?php
  NavBar::begin([
      'brandLabel' => Yii::$app->name,
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
          'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
      ],
  ]);
  $menuItems = [
      ['label' => 'Home', 'url' => ['/site/index']],
      ['label' => 'About', 'url' => ['/site/about']],
      ['label' => 'Contact', 'url' => ['/site/contact']],
      ['label' => 'Articles', 'url' => ['/article/index']],
      LanguageSwitcher::widget(),
  ];
  if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
  } else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
  }
  echo Nav::widget([
      'options' => ['class' => 'navbar-nav'],
      'items' => $menuItems,
  ]);
  NavBar::end();
  ?>
</header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
          <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
          <?= Alert::widget() ?>
          <?= $content ?>
        </div>
    </main>


    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
