<?php

use common\models\UserType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss(<<<CSS
.avatar-wrapper img{
width:50px;
height: 50px;
}
CSS
);

?>
<div class="article-index card card-default">
    <div class="card-header with-border">
        <?= Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="card-body no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'avatar',
                    'format' => 'image',
                    'contentOptions' => ['class'=>'avatar-wrapper']

                ],
                'id',
                [
                    'attribute' => 'user_id',
                    'value' => 'user.username',
                    'format' => 'html',
                    'value' => function(\common\models\Article $model){
                        if(empty($model->user)){
                            return null;
                        }
                        return Html::a($model->user_id.'-'.$model->user->username,['user/view','id'=>$model->user_id],['target'=>'_blank','data-pjax'=>0]);
                    },
                    'filter' =>  \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'user_id',
                            'data' => !empty($searchModel->user) ? ArrayHelper::map([$searchModel->user],'id',function($model){
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
                        ]
                    ),
                ],
                [
                    'attribute' => 'category_id',
                    'label' => Yii::t('app','Category'),
                    'value' => 'category.name',
                    'filterOptions' => ['style'=>'min-width:200px'],
                    'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'category_id',
                            'data' => \common\models\Category::getNameList(),
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'options' => [
                                'placeholder' => Yii::t('app', 'Category'),
                            ]
                        ]
                    ),
                ],
                'title',
                [
                        'attribute' => 'description',
                        'format' => 'html',
                        'value' => function(\common\models\Article $model){
                            return \yii\helpers\StringHelper::truncateWords(strip_tags($model->description),20,'..',true);
                        }
                ],
                [
                        'attribute' => 'body',
                        'format' => 'html',
                        'value' => function(\common\models\Article $model){
                            return \yii\helpers\StringHelper::truncateWords(strip_tags($model->body),20,'..',true);
                        }
                ],

                // 'media_id',
                'is_active:boolean',
                [
                    'attribute' => 'created_at',
                    'filterOptions' => ['style' => 'min-width:200px'],
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
                    'filterOptions' => ['style' => 'min-width:200px'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'updated_at',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
//                'created_at',
                // 'created_by',
//                'updated_at',
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
