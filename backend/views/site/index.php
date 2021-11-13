<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
$this->title = Yii::t('app','Dashboard');

?>

<div class="row">
  <div class="col-lg-6">
    <?= \hail812\adminlte\widgets\Alert::widget([
        'type' => 'success',
        'body' => '<h3>Congratulations!</h3>',
    ]) ?>
    <?= \hail812\adminlte\widgets\Callout::widget([
        'type' => 'danger',
        'head' => 'I am a danger callout!',
        'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
    ]) ?>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-sm-6 col-12">
    <?= \hail812\adminlte\widgets\InfoBox::widget([
        'text' => 'Messages',
        'number' => '1,410',
        'icon' => 'far fa-envelope',
    ]) ?>
  </div>
  <div class="col-md-4 col-sm-6 col-12">
    <?= \hail812\adminlte\widgets\InfoBox::widget([
        'text' => 'Bookmarks',
        'number' => '410',
        'theme' => 'success',
        'icon' => 'far fa-flag',
    ]) ?>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <?= \hail812\adminlte\widgets\SmallBox::widget([
        'title' => '44',
        'text' => 'User Registrations',
        'icon' => 'fas fa-user-plus',
        'theme' => 'gradient-success',
        'loadingStyle' => true
    ]) ?>
  </div>
</div>
