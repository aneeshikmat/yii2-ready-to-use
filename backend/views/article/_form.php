<?php

use common\models\UserType;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form card card-default">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::className(),[
                    'data' => \common\models\Category::getNameList(),
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app','Select Category')
                    ]
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'user_id')->widget(\kartik\select2\Select2::className(),[
                    'data' => !empty($model->user) ? ArrayHelper::map([$model->user],'id',function($model){
                        return $model->id.'-'.$model->username;
                    }): [],
                    'pluginOptions' => [
                        'minimumInputLength' => 3,
                        'placeholder' => Yii::t('app', 'Select User'),
                        'allowClear' => true,
                        'ajax' => [
                            'url' => \yii\helpers\Url::to(['helper/user','user_type_id'=>[UserType::SUPER_ADMIN,UserType::ADMIN,UserType::USER]]),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                    ],
                ]) ?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->widget(\backend\widgets\TinyMce::className(),[
                    'options' => ['rows' => 3],
                ]) ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'body')->widget(\backend\widgets\TinyMce::className(),[
                    'options' => ['rows' => 20],
                ]) ?>

            </div>
            <div class="col-md-6">
                <?php
                $modelImage = !empty($model->media) ? $model->media : false;
                $initialPreview = [];
                if ($modelImage) {
                    $pathImg = $modelImage->getThumb();
                    $initialPreview[] = Html::img($pathImg, ['class' => 'file-preview-image']);
                }
                ?>
                <?= $form->field($model, "image")->label(false)->widget(FileInput::classname(), [
                    'options' => [
                        'multiple' => false,
                        'accept' => 'image/*',
                    ],
                    'pluginOptions' => [
                        'previewFileType' => 'image',
                        'showCaption' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-default btn-sm',
                        'browseLabel' => ' Pick image',
                        'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',
                        'removeClass' => 'btn btn-danger btn-sm',
                        'removeLabel' => ' Delete',
                        'removeIcon' => '<i class="fa fa-trash"></i>',
                        'previewSettings' => [
                            'image' => ['width' => '138px', 'height' => 'auto']
                        ],
                        'initialPreview' => $initialPreview,
                        'layoutTemplates' => ['footer' => '']
                    ]
                ]) ?>
            </div>
        </div>




        <?= $form->field($model, 'is_active')->checkbox() ?>

    </div>
    <div class="card-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
