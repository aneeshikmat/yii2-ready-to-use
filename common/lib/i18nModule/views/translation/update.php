<?php

use common\lib\i18nModule\Module;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model common\lib\i18nModule\models\SourceMessage */

$this->title = Module::t('Update Translation');
$this->params['breadcrumbs'][] = ['label' => Module::t('Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->message;
$this->params['breadcrumbs'][] = Module::t('Update');
?>
<div class="element-box source-message-update card card-default">

    <div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="source-message-form">
        <p><?=$model->message?></p>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
        <?php foreach ($model->messages as $language => $message) : ?>
            <div class="col-sm-6"><?= $form->field($message, '[' . $language . ']translation', ['options' => ['class' => 'form-group']])->textarea()->label($language) ?></div>
        <?php endforeach; ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton(Module::t('Update'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    </div>

</div>
