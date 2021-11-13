<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-index card card-default">
    <div class="card-header with-border">
        <?= Html::a(Yii::t('app', 'Create User Type'), ['create'], ['class' => 'btn btn-primary']) ?>
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
                'is_active:boolean',
                [
                    'attribute' => 'created_at',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    //'format' => 'datetime',
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
                //  'created_by',
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
