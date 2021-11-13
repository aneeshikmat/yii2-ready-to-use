<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index card card-default">
    <div class="card-header with-border">
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="card-body no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                [
                    'attribute' => 'country_id',
                    'value' => 'country.arabic_name',
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
                'arabic_name',
                'alternate_names:ntext',
                [
                    'attribute' => 'created_at',
                    //'format' => 'datetime',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'attribute' => 'updated_at',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    //'format' => 'datetime',
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'updated_at',
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                // 'position',
                // 'province_id',
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
