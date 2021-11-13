<?php

use yii\bootstrap4\Html;

?>

<footer class="main-footer">
    <strong>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?> </strong>

    <div class="float-right d-none d-sm-inline-block">
      <?= Yii::powered() ?>
    </div>
</footer>