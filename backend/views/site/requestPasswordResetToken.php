<?php

/* @var $this yii\web\View */
/* @var $form kartik\widgets\ActiveForm */
/* @var $model PasswordResetRequestForm */

use common\models\forms\PasswordResetRequestForm;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <div class="card login-card-wrapper">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?= Yii::t('app', 'Please fill out your email. A link to reset password will be sent there.') ?></p>
            <div class="row">
                <div class="col-12">
                  <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                  <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                  <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>

                    <div class="form-group">
                      <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                    </div>

                  <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
