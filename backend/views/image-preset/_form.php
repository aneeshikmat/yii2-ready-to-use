<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ImagePreset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-preset-form card card-default">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'width')->textInput() ?>

        <?= $form->field($model, 'height')->textInput() ?>

    </div>
    <div class="card-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
