<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="row">

                <div class="col-md-4">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?=  $form->field($model,'user_type_id')->inline()->radioList(\common\models\UserType::getPublicNameList())?>
                </div>
                <div class="col-md-4">
                    <?=  $form->field($model,'gender')->inline()->radioList(\common\models\User::getEnumValues('gender'))?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'dob')->widget(\kartik\widgets\DatePicker::className(), [
                        'pluginOptions' => [
                            'placeholder' => Yii::t('app', 'Select Date of birth'),
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 phone-number-full-width">
                    <?= $form->field($model, 'phone_number')->widget(\borales\extensions\phoneInput\PhoneInput::className(), [
                        'jsOptions' => [
                            'preferredCountries' => [\common\components\GeoHelper::getCurrentCountryIsoCode()],
                        ]
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'country_id')->widget(\kartik\select2\Select2::className(), [
                        'data' => \common\models\Country::getCountryList('ar'),
                        'pluginOptions' => [
                            'placeholder' => Yii::t('app', 'Select Country'),
                            'allowClear' => true
                        ],
                        'options' => ['id' => 'user-country-id','data-country-picker-with-cites'=>'signup-city-list'],
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'city_id')->widget(\kartik\select2\Select2::className(), [
                        'id' => 'signup-city-list',
                        'data' => ArrayHelper::map($model->country->cities ?? [], 'id', 'name'),
                        'pluginOptions' => [
                            'placeholder' => Yii::t('app', 'Select City'),
                            'allowClear' => true
                        ],
                        'options' => ['id' => 'signup-city-list']
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'confirm_password')->passwordInput() ?>
                </div>

            </div>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
