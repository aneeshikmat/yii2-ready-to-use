<?php

use common\lib\i18nModule\Module;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model common\lib\i18nModule\models\SourceMessage */

$this->title = Module::t('Create Translation');
$this->params['breadcrumbs'][] = ['label' => Module::t('Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Module::t('Create');
?>
<div class="element-box source-message-update  card card-default">

    <div class="card-body">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="source-message-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'message')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton(Module::t('Update'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
