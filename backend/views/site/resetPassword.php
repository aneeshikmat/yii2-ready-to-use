<?php

/* @var $this yii\web\View */

/* @var $model ResetPasswordForm */

use common\models\forms\ResetPasswordForm;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <div class="site-request-password-reset">
        <div class="card login-card-wrapper">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?= Yii::t('app', 'Please choose your new password:.') ?></p>

                <div class="row">
                    <div class="col-12">
                      <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                      <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                        <div class="form-group">
                          <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                        </div>

                      <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
