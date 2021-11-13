<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form kartik\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

?>
<div class="card login-card-wrapper">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><?= Yii::t('app', 'Sign in to start your session') ?></p>

      <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

      <?= $form->field($model, 'email_or_phone_number', [
          'addon' => [
              'append' => [
                  'content' => '<i class="fas fa-envelope"></i>'
              ]
          ]
      ])
          ->label(false)
          ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

      <?= $form->field($model, 'password', [
          'addon' => [
              'append' => [
                  'content' => '<i class="fas fa-lock"></i>'
              ]
          ]
      ])
          ->label(false)
          ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-8">
              <?= $form->field($model, 'rememberMe')->checkbox([
              ]) ?>
            </div>
            <div class="col-4">
              <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

      <?php ActiveForm::end(); ?>

        <p class="mb-1">
          <?= Html::a(Yii::t('app', 'I forgot my password'), ['site/request-password-reset']) ?>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>