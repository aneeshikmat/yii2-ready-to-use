<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss(<<<CSS
.avatar-wrapper img{
width:50px;
height: 50px;
}
CSS
);



$citesUrls = \yii\helpers\Url::to(['helper/city']);
$selectCity = Yii::t('app', 'Select City');
$this->registerJs(<<<JS

$(document).on('change','#usersearch-country_id',function(){
      
        var country_id = $(this).val();
        
         jQuery.ajax({
                type : "GET",
                url  : "$citesUrls",
                data : {country_id:country_id},
            }).done(function(response) {

                var new_options = '';

             
                    new_options += '<option value = "">$selectCity</option>';

                $.each(response, function(id,name) {
                    new_options += '<option value = "'+id+'">'+name+'</option>';
                });
                

                $('#usersearch-city_id').empty().append(new_options);

                    // $('#user-city-list').select2("destroy");
                    // $('#user-city-list').select2();
            });
        
        
        
    });


JS
    ,\yii\web\View::POS_END);


?>
<div class="user-index card card-default">
    <div class="card-header with-border">
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="card-body no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                        'attribute' => 'avatar',
                        'format' => 'image',
                        'contentOptions' => ['class'=>'avatar-wrapper']

                ],
                'id',
                [
                    'attribute' => 'user_type_id',
                    'value' => 'userType.name',
                    'filterOptions' => ['style'=>'min-width:150px'],
                    'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'user_type_id',
                            'data' => \common\models\UserType::getNameList(),
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options' => [
                                'placeholder' => Yii::t('app', 'User Type'),
                            ]
                        ]
                    ),
                ],
                [
                    'attribute' => 'country_id',
                    'value' => 'country.arabic_name',
                    'filterOptions' => ['style'=>'min-width:150px'],
                    'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'country_id',
                            'data' => \common\models\Country::getCountryList('ar'),
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options' => [
                                'placeholder' => Yii::t('app', 'Country'),
                            ]
                        ]
                    ),
                ],
                [
                    'attribute' => 'city_id',
                    'value' => 'city.name',
                    'filterOptions' => ['style'=>'min-width:150px'],
                    'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'city_id',
                            'data' => !empty($searchModel->country_id) ? ArrayHelper::map($searchModel->country->cities, 'id', 'name') : [],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options' => [
                                'placeholder' => Yii::t('app', 'City'),
                            ]
                        ]
                    ),
                ],
                'first_name',
                'last_name',
                [
                    'attribute' => 'gender',
                    'filter' => \common\models\User::getEnumValues('gender'),
                ],

                'phone_number',

                'email:email',

                [
                    'attribute' => 'dob',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'dob',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'attribute' => 'created_at',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'attribute' => 'updated_at',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'updated_at',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                // 'access_token',

                // 'city_id',
                 'is_active:boolean',
                // 'media_id',
                // 'created_at',
                // 'created_by',
                // 'updated_at',
                // 'updated_by',
                // 'is_deleted',
                // 'deleted_at',
                // 'deleted_by',
                // 'ip_address',
                // 'user_agent',

                ['class' => 'kartik\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
